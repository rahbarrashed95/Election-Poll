<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\AmenitiesProperty;
use App\Models\PropertyCategory;
use Illuminate\Http\Request;
use File;

class AmenitiesPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        if(request()->ajax()){     

            $paginate = request()->paginate;
            $search_str = request()->search_str;

            $query = AmenitiesProperty::leftJoin('property_categories','amenities_properties.category_id','=','property_categories.id')
                                      ->select(['amenities_properties.id','amenities_properties.amenity','property_categories.name as cat_name']);

            if(!empty($search_str)){                
                $query->where(function($q) use ($search_str){
                    $q->where('amenity','like','%'.$search_str.'%');
                });
            }

            if(!empty($paginate)){
                $items = $query->paginate($paginate);
            }           
            
            $data = view('backend.amenity_property.get_data', compact('items'))->render();           
            return response()->json(['status' => true, 'data' => $data]);    
        }
        
        return view('backend.amenity_property.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = PropertyCategory::all();   
        return view('backend.amenity_property.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'image'=> '',
            'category_id'=> '',
            'amenity'=> ''         
        ]); 
        
         if($request->hasFile('image')) {        
           $originName = $request->file('image')->getClientOriginalName();
           $fileName = pathinfo($originName, PATHINFO_FILENAME);
           $extension = $request->file('image')->getClientOriginalExtension();
           $fileName =$fileName.time().'.'.$extension;
       
           $request->file('image')->move(public_path('backend/amenity'), $fileName);
           $data['image']=$fileName;
        } 

        AmenitiesProperty::create($data);

        return response()->json(['status'=>true ,'msg'=>'Amenities Property Created !!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(AmenitiesProperty $amenitiesProperty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item=AmenitiesProperty::find($id);  
        $categories = PropertyCategory::all();
        return view('backend.amenity_property.edit', compact('item','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item=AmenitiesProperty::find($id);

        $data=$request->validate([
            'image'=> '',
            'category_id'=> '',
            'amenity'=> ''         
        ]);
        
        if($request->hasFile('image')) {

            $old_image = $item->image;           

            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName =$fileName.time().'.'.$extension;        
            
            $request->file('image')->move(public_path('backend/amenity'), $fileName);
            $data['image']=$fileName;

            if($old_image){                
                if(File::exists(public_path().'/backend/amenity/'.$old_image))unlink(public_path().'/backend/amenity/'.$old_image);                
            }  

        }
       
        $item->update($data);

        return response()->json(['status'=>true ,'msg'=>'Amenity Updated !!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AmenitiesProperty $amenitiesProperty)
    {
        //
    }
}
