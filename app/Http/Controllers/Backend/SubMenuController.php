<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\SubMenu; 
use App\Models\Page; 
use Illuminate\Http\Request;

class SubMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = SubMenu::with('page','parentPage')->where('status', 1)->orderBy('parent_id','asc')->get();
        return view('backend.submenu.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type=request('type');
        $pages = Page::where('status', 1)->get();
        return view('backend.submenu.create', compact('type','pages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'parent_id'=> 'required',
            'page_id'=> 'required',
            'serial'=> 'required'            
        ]); 
        
        $check_items = SubMenu::where(['parent_id' => $request->parent_id,'page_id' => $request->page_id])->first();
        
        if(!empty($check_items)){
            return response()->json(['status'=>false ,'msg'=>'Sub Menu Exist !!']);
        } else {
            SubMenu::create($data);
        }
        
        return response()->json(['status'=>true ,'msg'=>'Sub Menu Created !!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(SubMenu $subMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item=SubMenu::find($id);      
        $pages = Page::where('status', 1)->get();
        return view('backend.submenu.edit', compact('item','pages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item=SubMenu::find($id);

        $data=$request->validate([
            'parent_id'=> 'required',
            'page_id'=> 'required',
            'serial'=> 'required'            
        ]); 

        $item->update($data);

        return response()->json(['status'=>true ,'msg'=>'Sub Menu Updated !!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item=SubMenu::find($id);      
        $item->delete();
        
        return response()->json(['status'=>true ,'msg'=>'Sub Menu Deleted !!']);
    }
}
