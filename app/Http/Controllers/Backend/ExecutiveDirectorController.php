<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\ExecutiveDirector;
use Illuminate\Http\Request;
use File;

class ExecutiveDirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item = ExecutiveDirector::first();
        return view('backend.exec_dir.index', compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ExecutiveDirector $executiveDirector)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExecutiveDirector $executiveDirector)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item=ExecutiveDirector::find($id);

        $data=$request->validate([            
            'title'=> '',
            'message'=> ''            
        ]);

        if($request->hasFile('image')) {

            $old_image = $item->image;           

            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName =$fileName.time().'.'.$extension;        
            
            $request->file('image')->move(public_path('backend/ed'), $fileName);
            $data['image']=$fileName;

            if($old_image){                
                if(File::exists(public_path().'/backend/ed/'.$old_image))unlink(public_path().'/backend/ed/'.$old_image);                
            }  
        }                   

        $item->update($data);
        return response()->json(['status'=>true ,'msg'=>'ED Updated !!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExecutiveDirector $executiveDirector)
    {
        //
    }
}
