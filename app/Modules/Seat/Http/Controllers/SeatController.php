<?php

namespace App\Modules\Seat\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Modules\Seat\Models\Seat;
use Illuminate\Http\Request;

class SeatController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){

            $paginate = request()->paginate;
            $search_str = request()->search_str;

            $query = Seat::leftJoin('districts', 'seats.district_id', '=', 'districts.id');
            
            if(!empty($search_str)){
                $query->where('districts.name','like','%'.$search_str.'%')
                      ->orWhere('seats.name','like','%'.$search_str.'%');                     
            }

            $query = $query->select('seats.*','districts.name as district_name');

            $items = $query->paginate($paginate);
            $data = view('Seat::seat.get_data', compact('items'))->render();           
            return response()->json(['status' => true, 'data' => $data]);    
        }
        $items = Seat::where('status', Seat::ACTIVE)->get();
        return view('Seat::seat.index', compact('items'));
    }
    public function create()
    {
        $districts = District::get();
        return view('Seat::seat.create', compact('districts'));
    }
    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=> '',
            'district_id'=> ''                  
        ]);                  

        Seat::create($data);

        return response()->json(['status'=>true ,'msg'=>'Seat Created !!']);
    }
    public function edit(string $id)
    {
        $item=Seat::find($id);      
        $districts = District::get();  
        return view('Seat::seat.edit', compact('item', 'districts'));
    }
    public function update(Request $request, string $id)
    {
        $item=Seat::find($id);

        $data=$request->validate([
            'name'=> '',
            'district_id'=> ''                  
        ]);
   
        $item->update($data);
        return response()->json(['status'=>true ,'msg'=>'Seat Updated !!']);
    }
    public function delete(string $id)
    {
        $item=Seat::find($id);       
        $item->delete();
       
        return response()->json(['status'=>true ,'msg'=>'Seat Deleted !!']);
    }
}
