<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\PropertyCategory;
use Illuminate\Http\Request;

class PropertyCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){

            $paginate = request()->paginate;
            $search_str = request()->search_str;

            $query = PropertyCategory::select(['id','name','image']);

            if(!empty($search_str)){
                $query->where(function($q) use ($search_str){
                    $q->where('name','like','%'.$search_str.'%');
                });
            }

            if(!empty($paginate)){
                $items = $query->paginate($paginate);
            }            
            
            $data = view('backend.category.get_data', compact('items'))->render();           
            return response()->json(['status' => true, 'data' => $data]);    
        }      

        return view('backend.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=> '',                     
            'image' => 'nullable|file|mimes:jpeg,png,svg,pdf|max:10240'
       ]);
              
       
       if($request->hasFile('image')) {        
           $originName = $request->file('image')->getClientOriginalName();
           $fileName = pathinfo($originName, PATHINFO_FILENAME);
           $extension = $request->file('image')->getClientOriginalExtension();
           $fileName =$fileName.time().'.'.$extension;
       
           $request->file('image')->move(public_path('backend/category'), $fileName);
           $data['image']=$fileName;
       }       

        $property = PropertyCategory::create($data);              

       return response()->json(['status'=>true ,'msg'=>'Category Created !!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(PropertyCategory $propertyCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item=PropertyCategory::find($id);            
        return view('backend.category.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item=PropertyCategory::find($id);
        $data=$request->validate([
            'name'=> '',                     
            'image' => 'nullable|file|mimes:jpeg,png,svg,pdf|max:10240'
        ]);

        if($request->hasFile('image')) {

            deleteImage('category',$item->image);

            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName =$fileName.time().'.'.$extension;
        
            $request->file('image')->move(public_path('backend/category'), $fileName);
            $data['image']=$fileName;
        }

        $item->update($data);

        return response()->json(['status'=>true ,'msg'=>'Category Updated !!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item=PropertyCategory::find($id);
        
        deleteImage('backend/categroy',$item->icon);
        $item->delete();

        return response()->json(['status'=>true ,'msg'=>'Category Deleted !!']);
    }
}
