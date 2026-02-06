<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Property;
use App\Models\PropertyCategory;
use Illuminate\Http\Request;
use App\Models\PropertySubCategory;
use App\Models\City;
use App\Models\Area;
use App\Models\Package;
use App\Models\Subscription;
use Auth;
use DB;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){

            $paginate = request()->paginate;
            $search_str = request()->search_str;
            // $query = Property::leftJoin('property_categories as pc','properties.cat_id','=','pc.id')
            //                 ->leftJoin('property_sub_categories as psc','properties.sub_cat_id','=','psc.id')
            //                 ->leftJoin('cities as c','properties.city_id','=','c.id')
            //                 ->leftJoin('areas as a','properties.area_id','=','a.id')
            //                 ->where('owner_id',Auth::user()->id)
            //         ->select('properties.id','properties.title','pc.name as cat_name','psc.name as sub_cat_name','c.city as city','a.area_name as area');

            $query = Property::leftJoin('property_categories as pc', 'properties.cat_id', '=', 'pc.id')
                ->leftJoin('property_sub_categories as psc', 'properties.sub_cat_id', '=', 'psc.id')
                ->leftJoin('cities as c', 'properties.city_id', '=', 'c.id')
                ->leftJoin('areas as a', 'properties.area_id', '=', 'a.id')
                ->leftJoin('property_amenities as am', 'properties.id', '=', 'am.property_id')
                // ->where('owner_id',Auth::user()->id)
                ->select(
                    'properties.id',
                    'properties.title',
                    'properties.status',
                    'pc.name as cat_name',
                    'psc.name as sub_cat_name',
                    'c.city as city',
                    'a.area_name as area',
                    DB::raw('GROUP_CONCAT(am.name SEPARATOR ", ") as amenities')
                )
                ->groupBy('properties.id', 'properties.title', 'pc.name', 'psc.name', 'c.city', 'a.area_name');


            if(!Auth::user()->hasRole('superadmin')) {
                $query->where('owner_id', Auth::user()->id);
            }

            if(!empty($search_str)){
                $query->where(function($q) use ($search_str){
                    $q->where('title','like','%'.$search_str.'%')
                    ->orWhere('description','like','%'.$search_str.'%');
                });
            }

            if(!empty($paginate)){
                $items = $query->paginate($paginate);
            }                          
            
            $data = view('backend.property.get_data', compact('items'))->render();           
            return response()->json(['status' => true, 'data' => $data]);    
        }        

        $items=Property::latest()->get();
        return view('backend.property.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {        
        $categories = PropertyCategory::all();   
        $cities = City::all();
        return view('backend.property.create', compact('categories','cities'));
    }
    
    public function create_property()
    {        
        
        $check_subs = false;
        $item = Subscription::with('package')->where(['user_id'=> Auth::user()->id,'is_expired'=>0])->first();
       
        if($item){                
            $package_property_count = $item->package->no_of_property;
            
            $propery_count = Property::where(['owner_id' => Auth::user()->id,'subscription_id' => $item->id])->count();
            
            if($package_property_count <= $propery_count){               
                // return response()->json(['status'=>false,'msg'=>'Limit Cross']);
                $item->update(['is_expired'=>'1']);
                $check_subs = false;
            } else {
                $check_subs = true;
            }
            
        }        
           
        if($check_subs) {
            $categories = PropertyCategory::all();   
            $cities = City::all();
            return view('backend.property.create', compact('categories','cities'));
        }
        
        $packages = Package::where('status', 1)->whereNot('name','free')->latest()->get();
        return view('backend.property.subs_pricing', compact('packages'));

        // $packages = Package::where('status', 1)->whereNot('name','free')->latest()->get();
        // return view('frontend.property.show_package',compact('packages')); 
        
        
        // $categories = PropertyCategory::all();   
        // $cities = City::all();
        // return view('backend.property.create_property', compact('categories','cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'title'=> '',
            'phone' => '',
            'floor_area'=> '',
            'floor_type'=> '',
            'deposite_amount'=> '',
            'cat_id'=> '',
            'sub_cat_id'=> '',
            'bed'=> '',
            'bath'=> '',
            'belcony'=> '',
            'construction_status'=> '',
            'attach_drawing_room'=> '',
            'gas_facility'=> '',
            'electricity_bill'=> '',
            'water_bill'=> '',
            'price'=> '',
            'location'=> '',
            'area_id'=> '',
            'city_id'=> '',
            'landmark'=> '',
            'reception'=> '',
            'video_url'=> '',
            'special_tags'=> '',
            'description'=> '',
            'floor_plan' => 'nullable|file|mimes:jpeg,png,pdf|max:10240'
        ]);

        $data['owner_id'] = auth()->user()->id;          
       
        if($request->hasFile('floor_plan')) {        
           $originName = $request->file('floor_plan')->getClientOriginalName();
           $fileName = pathinfo($originName, PATHINFO_FILENAME);
           $extension = $request->file('floor_plan')->getClientOriginalExtension();
           $fileName =$fileName.time().'.'.$extension;
       
           $request->file('floor_plan')->move(public_path('backend/property'), $fileName);
           $data['floor_plan']=$fileName;
        } 

        $property = Property::create($data);

        if($request->hasFile('property_image')){
            
            $property_image = [];
            foreach($request->file('property_image') as $key => $pro_img){

                $originName = $pro_img->getClientOriginalName();                
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $pro_img->getClientOriginalExtension();
                $fileName =$fileName.time().'.'.$extension;
            
                $pro_img->move(public_path('backend/property_image'), $fileName);
                $property_image[] = ['image' => $fileName, 'property_id' => $property->id];                
            }          

            $property->property_image()->createMany($property_image);
        }       

        $amenities = collect($request->amenities)->map(function ($amenity) {
            return ['name' => $amenity];
        })->toArray();

        $property->amenities()->createMany($amenities);   

       return response()->json(['status'=>true ,'msg'=>'Property Created !!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $item = Property::find($id);
        $query = Property::leftJoin('property_categories as pc','properties.cat_id','=','pc.id')
                        ->leftJoin('property_sub_categories as psc','properties.sub_cat_id','=','psc.id')
                        ->leftJoin('cities as c','properties.city_id','=','c.id')
                        ->leftJoin('areas as a','properties.area_id','=','a.id')
                        ->where('properties.id',$id)
                    ->select('properties.id','properties.title','pc.name as cat_name','psc.name as sub_cat_name',
                    'c.city as city','a.area_name as area','properties.location','properties.landmark',
                    'properties.bed','properties.bath','properties.floor_area','properties.price'
                )->with('interestedUsers');
        $item = $query->first();
        return view('backend.property.show', compact('item'));
    }
    
    public function subs_pricing(){
        $packages = Package::where('status', 1)->whereNot('name','free')->latest()->get();
        return view('backend.property.subs_pricing', compact('packages'));
    }

    public function get_sub_cat(Request $request){
        $sub_cat = PropertySubCategory::where('category_id', $request->cat_id)->get();
        $html_view = view('backend.property.sub_cat_data', compact('sub_cat'))->render();       
        return response()->json([
            'status' => true,
            'html_view' => $html_view
        ]);
    }

    public function get_city(Request $request){
        $areas = Area::where('city_id', $request->city_id)->get();
        $html_view = view('backend.property.area_data', compact('areas'))->render();       
        return response()->json([
            'status' => true,
            'html_view' => $html_view
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item=Property::find($id);      
        $cities = City::all(); 
        $categories = PropertyCategory::all(); 
        $selected_amenities = DB::table('property_amenities')
                            ->where('property_id', $id)
                            ->pluck('name')
                            ->toArray();
        return view('backend.property.edit', compact('item','categories','cities','selected_amenities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item=Property::find($id);
        $data=$request->validate([
            'title'=> '',      
            'phone' => '',
            'floor_area'=> '',
            'floor_type'=> '',
            'deposite_amount'=> '',
            'cat_id'=> '',
            'sub_cat_id'=> '',
            'bed'=> '',
            'bath'=> '',
            'belcony'=> '',
            'construction_status'=> '',
            'attach_drawing_room'=> '',
            'gas_facility'=> '', 
            'electricity_bill'=> '',  
            'water_bill'=> '',  
            'price'=> '',
            'location'=> '',
            'area_id'=> '',
            'city_id'=> '',
            'landmark'=> '',
            'reception'=> '',
            'video_url'=> '',
            'special_tags'=> '',
            'description'=> '',
            'floor_plan' => 'nullable|file|mimes:jpeg,png,pdf|max:10240'
       ]);
      

        if($request->hasFile('floor_plan')) {        
           $originName = $request->file('floor_plan')->getClientOriginalName();
           $fileName = pathinfo($originName, PATHINFO_FILENAME);
           $extension = $request->file('floor_plan')->getClientOriginalExtension();
           $fileName =$fileName.time().'.'.$extension;
       
           $request->file('floor_plan')->move(public_path('backend/property'), $fileName);
           $data['floor_plan']=$fileName;
        }  
        
        if($request->hasFile('video_url')) {        
           $originName = $request->file('video_url')->getClientOriginalName();
           $fileName = pathinfo($originName, PATHINFO_FILENAME);
           $extension = $request->file('video_url')->getClientOriginalExtension();
           $fileName =$fileName.time().'.'.$extension;
       
           $request->file('video_url')->move(public_path('backend/property'), $fileName);
           $data['video_url']=$fileName;
        }

        $item->update($data);
        
        $amenities = [];

        foreach ($request->input('amenities') as $amenity) {
            $amenities[] = ['name' => $amenity];
        }

        $item->amenities()->createMany($amenities);
        
        if ($request->hasFile('property_image')) {
            $property_images = [];
            $allImages = $request->file('property_image');
        
            foreach ($allImages as $key => $pro_img) {
                $image = Image::make($pro_img);
                $originName = $pro_img->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $pro_img->getClientOriginalExtension();
                $fileName = $fileName . time() . $key . '.' . $extension;
        
                if ($key == 0) {
                    // ✅ First image → thumbnail only
                    $thumb_path = 'backend/property/' . $fileName;
                    $image->resize(416, 293);
                    $image->save(public_path($thumb_path));
        
                    // Save thumb image in property table
                    $property->update(['thumb_img' => $fileName]);
                } else {
                    // ✅ All other images → gallery images
                    $img_path = 'backend/property_image/' . $fileName;
                    $image->resize(817, 446);
                    $image->save(public_path($img_path));
        
                    $property_images[] = ['image' => $fileName, 'property_id' => $property->id];
                }
            }
        
            // Save gallery images only (excluding the thumbnail)
            if (!empty($property_images)) {
                $item->property_image()->createMany($property_images);
            }
        }

        return response()->json(['status'=>true ,'msg'=>'Property Updated !!']);
    }
    
    public function get_property_category(Request $request){
        $sub_cat = PropertySubCategory::where('category_id', $request->cat_id)->get();
        $html_view = view('frontend.property.sub_cat_data', compact('sub_cat'))->render();  
        return response()->json([
            'status' => true,
            'html_data' => $html_view
        ]); 
    }
    
    public function prop_status_change(string $id){
        $property = Property::find($id);
        $status = $property->status == '1' ? '0' : '1';
        $property->status = $status;
        $property->update();
        return response()->json(['status'=>true,'msg'=>'Status Changed']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item=Property::find($id);
        
        deleteImage('property',$item->image);
        $item->delete();

        return response()->json(['status'=>true ,'msg'=>'Property Deleted !!']);
    }
}
