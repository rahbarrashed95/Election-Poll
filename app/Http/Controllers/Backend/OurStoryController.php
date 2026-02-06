<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\OurStory;
use Illuminate\Http\Request;
use File;

class OurStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item = OurStory::first();
        return view('backend.our_story.index', compact('item'));
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
    public function show(OurStory $ourStory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OurStory $ourStory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item=OurStory::find($id);

        $data=$request->validate([            
            'title'=> '',
            'description'=> ''            
        ]);

        if($request->hasFile('image')) {

            $old_image = $item->image;           

            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName =$fileName.time().'.'.$extension;        
            
            $request->file('image')->move(public_path('backend/our_story'), $fileName);
            $data['image']=$fileName;

            if($old_image){                
                if(File::exists(public_path().'/backend/our_story/'.$old_image))unlink(public_path().'/backend/our_story/'.$old_image);                
            }  
        }                   

        $item->update($data);
        return response()->json(['status'=>true ,'msg'=>'Our Story Updated !!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurStory $ourStory)
    {
        //
    }
}
