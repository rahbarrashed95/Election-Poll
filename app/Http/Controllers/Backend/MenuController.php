<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Menu::with('page')->where('status', 1)->get();
        return view('backend.menu.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type=request('type');
        $pages = Page::where('status', 1)->get();
        return view('backend.menu.create', compact('type','pages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'page_id'=> 'required',
            'serial'=> 'required'            
        ]); 
    
        Menu::create($data);

        return response()->json(['status'=>true ,'msg'=>'Menu Created !!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item=Menu::find($id);        
        $pages = Page::where('status', 1)->get();
        return view('backend.menu.edit', compact('item','pages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item=Menu::find($id);

        $data=$request->validate([
            'page_id'=> 'required',
            'serial'=> 'required'            
        ]); 

        $item->update($data);

        return response()->json(['status'=>true ,'msg'=>'Menu Updated !!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item=Menu::find($id);      
        $item->delete();
        
        return response()->json(['status'=>true ,'msg'=>'Menu Deleted !!']);
    }
}
