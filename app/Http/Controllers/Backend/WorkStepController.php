<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\WorkStep;
use Illuminate\Http\Request;

class WorkStepController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){

            $paginate = request()->paginate;
            $search_str = request()->search_str;

            $query = WorkStep::select(['id','title','description','icon']);

            if(!empty($search_str)){
                $query->where(function($q) use ($search_str){
                    $q->where('title','like','%'.$search_str.'%')
                    ->orWhere('description','like','%'.$search_str.'%');
                });
            }

            if(!empty($paginate)){
                $items = $query->paginate($paginate);
            }            
            
            $data = view('backend.work_step.get_data', compact('items'))->render();           
            return response()->json(['status' => true, 'data' => $data]);    
        }      

        return view('backend.work_step.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.work_step.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'title'=> '',                       
            'description'=> '',
            'icon' => 'nullable|file|mimes:jpeg,png,svg,pdf|max:10240'
       ]);
              
       
       if($request->hasFile('icon')) {        
           $originName = $request->file('icon')->getClientOriginalName();
           $fileName = pathinfo($originName, PATHINFO_FILENAME);
           $extension = $request->file('icon')->getClientOriginalExtension();
           $fileName =$fileName.time().'.'.$extension;
       
           $request->file('icon')->move(public_path('backend/workstep'), $fileName);
           $data['icon']=$fileName;
       }       

        $property = WorkStep::create($data);              

       return response()->json(['status'=>true ,'msg'=>'WorkStep Created !!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(WorkStep $workStep)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item=WorkStep::find($id);        
        return view('backend.work_step.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item=WorkStep::find($id);
        $data=$request->validate([
            'title'=> '',                       
            'description'=> '',
            'icon' => 'nullable|file|mimes:jpeg,png,svg,pdf|max:10240'
        ]);

        if($request->hasFile('icon')) {

            deleteImage('workstep',$item->icon);

            $originName = $request->file('icon')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('icon')->getClientOriginalExtension();
            $fileName =$fileName.time().'.'.$extension;
        
            $request->file('icon')->move(public_path('backend/workstep'), $fileName);
            $data['icon']=$fileName;
        }

        $item->update($data);

        return response()->json(['status'=>true ,'msg'=>'Work Step Updated !!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item=WorkStep::find($id);
        
        deleteImage('backend/workstep',$item->icon);
        $item->delete();

        return response()->json(['status'=>true ,'msg'=>'Work Step Deleted !!']);
    }
}
