<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\SliderSection;
use Illuminate\Http\Request;
use File;

class SliderSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = SliderSection::get();
        return view('backend.slider_section.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'number'=> 'required',                 
            'title'=> 'required'                 
        ]); 
        
        $data['seo_title'] = $request->seo_title;
        $data['seo_description'] = $request->seo_description;

        if($request->hasFile('icon')) {                

            $originName = $request->file('icon')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('icon')->getClientOriginalExtension();
            $fileName =$fileName.time().'.'.$extension;        
            
            $request->file('icon')->move(public_path('backend/slider_section'), $fileName);
            $data['icon']=$fileName;      
        }   

        Page::create($data);
        return response()->json(['status'=>true ,'msg'=>'Page Created !!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(SliderSection $sliderSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item=SliderSection::find($id);        
        return view('backend.slider_section.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item=SliderSection::find($id);

        $data=$request->validate([
            'number'=> 'required',                 
            'title'=> 'required'                 
        ]); 

        if($request->hasFile('icon')) {

            $old_icon_image = $item->icon;           

            $originName = $request->file('icon')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('icon')->getClientOriginalExtension();
            $fileName =$fileName.time().'.'.$extension;        
            
            $request->file('icon')->move(public_path('backend/slider_section'), $fileName);
            $data['icon']=$fileName;

            if($old_icon_image){                
                if(File::exists(public_path().'/backend/slider_section/'.$old_icon_image))unlink(public_path().'/backend/slider_section/'.$old_icon_image);                
            }  

        }                     

        $item->update($data);

        return response()->json(['status'=>true ,'msg'=>'Slider Section Updated !!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SliderSection $sliderSection)
    {
        //
    }
}
