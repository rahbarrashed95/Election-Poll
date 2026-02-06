<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Area;
use App\Models\City;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){

            $paginate = request()->paginate;
            $search_str = request()->search_str;

            $query = Area::leftJoin('cities','areas.city_id','=','cities.id')->select(['areas.id','areas.area_name as area','cities.city as city']);          

            if(!empty($search_str)){
                $query->where(function($q) use ($search_str){
                    $q->where('areas.area_name','like','%'.$search_str.'%')->orWhere('cities.city','like','%'.$search_str.'%');
                });
            }

            if(!empty($paginate)){
                $items = $query->paginate($paginate);
            }            
            
            $data = view('backend.area.get_data', compact('items'))->render();           
            return response()->json(['status' => true, 'data' => $data]);    
        }      

        return view('backend.area.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        return view('backend.area.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'area_name'=> '',         
            'city_id'=> ''         
        ]);           
       
       $area = Area::create($data);              

       return response()->json(['status'=>true ,'msg'=>'Area Created !!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item=Area::find($id);     
        $cities = City::all();       
        return view('backend.area.edit', compact('item','cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item=Area::find($id);
        $data=$request->validate([
            'area_name'=> '',
            'city_id'=> ''              
        ]);       

        $item->update($data);

        return response()->json(['status'=>true ,'msg'=>'Area Updated !!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item=Area::find($id);       
        $item->delete();
        return response()->json(['status'=>true ,'msg'=>'Area Deleted !!']);
    }
}
