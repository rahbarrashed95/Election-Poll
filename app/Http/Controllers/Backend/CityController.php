<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){

            $paginate = request()->paginate;
            $search_str = request()->search_str;

            $query = City::select(['id','city','image']);

            if(!empty($search_str)){
                $query->where(function($q) use ($search_str){
                    $q->where('city','like','%'.$search_str.'%');
                });
            }

            if(!empty($paginate)){
                $items = $query->paginate($paginate);
            }            
            
            $data = view('backend.city.get_data', compact('items'))->render();           
            return response()->json(['status' => true, 'data' => $data]);    
        }      

        return view('backend.city.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.city.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'city'=> ''             
        ]);   
        
        if($request->hasFile('image')) {        
            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName =$fileName.time().'.'.$extension;
        
            $request->file('image')->move(public_path('backend/city'), $fileName);
            $data['image']=$fileName;
        } 
       
        $area = City::create($data);              

        return response()->json(['status'=>true ,'msg'=>'City Created !!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item=City::find($id);            
        return view('backend.city.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item=City::find($id);
        $data=$request->validate([
            'city'=> ''                  
        ]);     
        
        if($request->hasFile('image')) {

            deleteImage('city',$item->image);

            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName =$fileName.time().'.'.$extension;
        
            $request->file('image')->move(public_path('backend/city'), $fileName);
            $data['image']=$fileName;
        }

        $item->update($data);

        return response()->json(['status'=>true ,'msg'=>'City Updated !!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item=City::find($id);       
        $item->delete();
        return response()->json(['status'=>true ,'msg'=>'City Deleted !!']);
    }
}
