<?php

namespace App\Modules\Candidate\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Modules\Candidate\Models\Candidate;
use App\Modules\Seat\Models\Seat;
use Illuminate\Http\Request;

class CandidateController extends Controller
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

            $query = Candidate::leftJoin('districts', 'candidates.district_id', '=', 'districts.id')
                            ->leftJoin('divisions', 'candidates.division_id', '=', 'divisions.id')
                            ->leftJoin('seats', 'candidates.seat_id', '=', 'seats.id');
            
            if(!empty($search_str)){
                $query->where('districts.name','like','%'.$search_str.'%')
                      ->orWhere('candidates.name','like','%'.$search_str.'%')
                      ->orWhere('divisions.name','like','%'.$search_str.'%')
                      ->orWhere('seats.name','like','%'.$search_str.'%');                     
            }

            $query = $query->select('candidates.*','districts.name as district_name', 'divisions.name as division_name', 'seats.name as seat_name');

            $items = $query->paginate($paginate);
            $data = view('Candidate::candidate.get_data', compact('items'))->render();           
            return response()->json(['status' => true, 'data' => $data]);    
        }
        return view('Candidate::candidate.index');
    }
    public function create()
    {
        $divisions = Division::get();
        return view('Candidate::candidate.create', compact('divisions'));
    }
    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=> '',
            'marka'=> '',
            'party'=> '',
            'division_id'=> '',
            'district_id'=> '',
            'seat_id'=> ''              
        ]);   
        
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/candidates/'), $filename);
            $data['image'] = 'uploads/candidates/' . $filename;
        }

        Candidate::create($data);

        return response()->json(['status'=>true ,'msg'=>'Candidate Created !!']);
    }
    public function edit(string $id)
    {
        $item=Candidate::find($id);      
        $districts = District::get();  
        return view('Seat::seat.edit', compact('item', 'districts'));
    }
    public function update(Request $request, string $id)
    {
        $item=Candidate::find($id);

        $data=$request->validate([
            'name'=> '',
            'district_id'=> ''                  
        ]);
   
        $item->update($data);
        return response()->json(['status'=>true ,'msg'=>'Seat Updated !!']);
    }
    public function delete(string $id)
    {
        $item=Candidate::find($id);       
        $item->delete();
       
        return response()->json(['status'=>true ,'msg'=>'Seat Deleted !!']);
    }

    public function getByDivision(Request $request)
    {
        $division_id = $request->division_id;
        $districts = District::where('division_id', $division_id)->get();
        return response()->json(['status' => true, 'data' => $districts]);
    }

    public function getSeats(Request $request)
    {
        $district_id = $request->district_id;
        $seats = Seat::where('district_id', $district_id)->get();
        return response()->json(['status' => true, 'data' => $seats]);
    }

}
