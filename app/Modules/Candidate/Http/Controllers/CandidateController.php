<?php

namespace App\Modules\Candidate\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Modules\Candidate\Http\Resources\CandidateResource;
use App\Modules\Candidate\Models\Candidate;
use App\Modules\Poll\Models\Poll;
use App\Modules\Seat\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

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

            $items = $query->orderBy('candidates.id', 'desc')->paginate($paginate);
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

            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName =$fileName.time().'.'.$extension;        
            
            $request->file('image')->move(public_path('candidates'), $fileName);
            $data['image']=$fileName;      
        }    
        
        if($request->hasFile('marka_image')) {                

            $originName = $request->file('marka_image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('marka_image')->getClientOriginalExtension();
            $fileName =$fileName.time().'.'.$extension;        
            
            $request->file('marka_image')->move(public_path('candidates'), $fileName);
            $data['marka_image']=$fileName;      
        }   

        Candidate::create($data);

        return response()->json(['status'=>true ,'msg'=>'Candidate Created !!']);
    }
    public function edit(string $id)
    {
        $item=Candidate::find($id);   
        $divisions = Division::get();
        return view('Candidate::candidate.edit', compact('item', 'divisions'));
    }
    public function update(Request $request, string $id)
    {
        $item=Candidate::find($id);

        $data=$request->validate([
            'name'=> '',
            'marka'=> '',
            'party'=> '',
            'division_id'=> '',
            'district_id'=> '',
            'seat_id'=> ''              
        ]); 

        if($request->hasFile('image')) {  
            
            $old_image = $item->image;  

            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName =$fileName.time().'.'.$extension;        
            
            $request->file('image')->move(public_path('candidates'), $fileName);
            $data['image']=$fileName;  
            
            if($old_image){                
                if(File::exists(public_path().'/candidates/'.$old_image))unlink(public_path().'/candidates/'.$old_image);                
            } 

        }

        if($request->hasFile('marka_image')) {  
            
            $old_image = $item->marka_image;  

            $originName = $request->file('marka_image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('marka_image')->getClientOriginalExtension();
            $fileName =$fileName.time().'.'.$extension;        
            
            $request->file('marka_image')->move(public_path('candidates'), $fileName);
            $data['marka_image']=$fileName;  
            
            if($old_image){                
                if(File::exists(public_path().'/candidates/'.$old_image))unlink(public_path().'/candidates/'.$old_image);                
            } 

        }
   
        $item->update($data);
        return response()->json(['status'=>true ,'msg'=>'Candidate Updated !!']);
    }
    public function delete(string $id)
    {
        $item=Candidate::find($id);       
        $item->delete();
       
        return response()->json(['status'=>true ,'msg'=>'Candidate Deleted !!']);
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

    public function apiData()
    {

        $divisionId = request()->division_id;
        $districtId = request()->district_id;
        $seatId = request()->seat_id;
        $paginate = request()->paginate;
        $totalPoll = Poll::count();

        $query = Candidate::leftJoin('districts', 'candidates.district_id', '=', 'districts.id')
                            ->leftJoin('divisions', 'candidates.division_id', '=', 'divisions.id')
                            ->leftJoin('seats', 'candidates.seat_id', '=', 'seats.id')
                            ->leftJoin('polls', 'candidates.id', '=', 'polls.candidate_id');
        
        if ($divisionId) {
            $query->where('division_id', $divisionId);
        }

        if ($districtId) {
            $query->where('district_id', $districtId);
        }

        if ($seatId) {
            $query->where('seat_id', $seatId);
        }

        $query = $query->select('candidates.id','candidates.name',
                'candidates.party',
                'candidates.image','candidates.marka_image','districts.name as district_name',
                'divisions.name as division_name', 'seats.name as seat_name',
                DB::raw('COUNT(polls.id) as total_polls'),
                DB::raw('ROUND((COUNT(polls.id) / '.$totalPoll.') * 100, 2) as poll_percentage') 
            )->groupBy('candidates.id','districts.name','divisions.name', 'seats.name');
        
        $candidates = $query->orderBy('candidates.id', 'desc')->paginate($paginate);
        $candidates = CandidateResource::collection($candidates)->response()->getData(true);
        return response()->json(['status' => true, 'data' => $candidates]);
    }

    public function candidateList()
    {

        $divisionId = request()->division_id;
        $districtId = request()->district_id;
        $seatId = request()->seat_id;
        $paginate = request()->paginate;
        $totalPoll = Poll::count();

        $query = Candidate::leftJoin('districts', 'candidates.district_id', '=', 'districts.id')
                            ->leftJoin('divisions', 'candidates.division_id', '=', 'divisions.id')
                            ->leftJoin('seats', 'candidates.seat_id', '=', 'seats.id')
                            ->leftJoin('polls', 'candidates.id', '=', 'polls.candidate_id');
        
        if ($divisionId) {
            $query->where('candidates.division_id', $divisionId);
        }

        if ($districtId) {
            $query->where('candidates.district_id', $districtId);
        }

        if ($seatId) {
            $query->where('candidates.seat_id', $seatId);
        }

        $query = $query->select('candidates.id','candidates.name',
                'candidates.party',
                'candidates.image','candidates.marka_image',
                'districts.name as district_name',
                'divisions.name as division_name', 'seats.name as seat_name',
                DB::raw('COUNT(polls.id) as total_polls'),
                DB::raw('ROUND((COUNT(polls.id) / '.$totalPoll.') * 100, 2) as poll_percentage') 
            )->groupBy('candidates.id','districts.name','divisions.name', 'seats.name');
        
        $candidates = $query->orderBy('candidates.id', 'desc')->paginate($paginate);
        $candidates = CandidateResource::collection($candidates)->response()->getData(true);
        return response()->json(['status' => true, 'data' => $candidates]);
    }

}
