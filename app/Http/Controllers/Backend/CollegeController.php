<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\College;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = College::get();
        return view('backend.college.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type=request('type');
        return view('backend.college.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'college_name'=> ''
        ]); 
        
        College::create($data);
        return response()->json(['status'=>true ,'msg'=>'College Created !!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(College $college)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item=College::find($id);        
        return view('backend.college.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item=College::find($id);

        $data=$request->validate([
            'college_name'=> ''
        ]);

        $item->update($data);

        return response()->json(['status'=>true ,'msg'=>'College Updated !!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item=College::find($id);      
        $item->delete();

        return response()->json(['status'=>true ,'msg'=>'College Deleted !!']);
    }
}
