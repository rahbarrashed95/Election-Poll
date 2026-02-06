<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PropertyCategory;
use App\Models\PropertySubCategory;
use Illuminate\Http\Request;

class PropertySubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){

            $paginate = request()->paginate;
            $search_str = request()->search_str;

            $query = PropertySubCategory::leftJoin('property_categories as pc','property_sub_categories.category_id','=','pc.id')
                                       ->select('property_sub_categories.id','pc.name as cat_name','property_sub_categories.name as sub_cat_name',
                                       'property_sub_categories.image as image');

            if (!empty($search_str)) {
                $query->where(function($q) use ($search_str) {
                    $q->where('pc.name', 'like', '%'.$search_str.'%')
                        ->orWhere('property_sub_categories.name', 'like', '%'.$search_str.'%');
                });
            }

            if(!empty($paginate)){
                $items = $query->paginate($paginate);
            }    
            
            $data = view('backend.sub_category.get_data', compact('items'))->render();           
            return response()->json(['status' => true, 'data' => $data]);    
        }      

        return view('backend.sub_category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = PropertyCategory::all();        
        return view('backend.sub_category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=> '',                     
            'category_id'=> '',                     
            'image' => 'nullable|file|mimes:jpeg,png,svg,pdf|max:10240'
       ]);
              
       
       if($request->hasFile('image')) {        
           $originName = $request->file('image')->getClientOriginalName();
           $fileName = pathinfo($originName, PATHINFO_FILENAME);
           $extension = $request->file('image')->getClientOriginalExtension();
           $fileName =$fileName.time().'.'.$extension;
       
           $request->file('image')->move(public_path('backend/sub_category'), $fileName);
           $data['image']=$fileName;
       }       

        $property = PropertySubCategory::create($data);              

       return response()->json(['status'=>true ,'msg'=>'Sub Category Created !!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(PropertySubCategory $propertySubCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item=PropertySubCategory::find($id);    
        $categories = PropertyCategory::all();        
        return view('backend.sub_category.edit', compact('item','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item=PropertySubCategory::find($id);

        $data=$request->validate([
            'name'=> '',                     
            'category_id'=> '',                     
            'image' => 'nullable|file|mimes:jpeg,png,svg,pdf|max:10240'
        ]);

        if($request->hasFile('image')) {

            deleteImage('category',$item->image);

            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName =$fileName.time().'.'.$extension;
        
            $request->file('image')->move(public_path('backend/sub_category'), $fileName);
            $data['image']=$fileName;
        }

        $item->update($data);

        return response()->json(['status'=>true ,'msg'=>'Sub Category Updated !!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item=PropertySubCategory::find($id);        
        deleteImage('backend/categroy',$item->image);         
        $item->delete();

        return response()->json(['status'=>true ,'msg'=>'Sub Category Deleted !!']);
    }
}
