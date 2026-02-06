<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Page;
use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\Http\Request;
use File;
use Image;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){     

            $paginate = request()->paginate;
            $search_str = request()->search_str;

            $query = Page::select(['id','title','header_image']);

            if(!empty($search_str)){                
                $query->where(function($q) use ($search_str){
                    $q->where('title','like','%'.$search_str.'%');
                });
            }

            if(!empty($paginate)){
                $items = $query->paginate($paginate);
            }           
            
            $data = view('backend.page.get_data', compact('items'))->render();           
            return response()->json(['status' => true, 'data' => $data]);    
        }

        return view('backend.page.index');
    }
    
    
    public function all_nuk_pages(){
        $items = Page::where(['status' => 1,'type' => 'NUK Programs'])->get();
        return view('backend.nuk_programs.index', compact('items'));
    }
    
    
    public function all_news_articles(){
        $items = Page::where(['status' => 1,'type' => 'news-articles'])->get();
        return view('backend.news_articles.index', compact('items'));
    }
    
    public function all_network_pages(){
        $items = Page::where(['status' => 1,'type' => 'network'])->get();
        return view('backend.network.index', compact('items'));
    }
    
    public function all_story_pages(){
        $items = Page::where(['status' => 1,'type' => 'story'])->get();
        return view('backend.story.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
     
    public function create_nuk_pages(){
        $type=request('type');
        return view('backend.nuk_programs.create', compact('type'));
    } 
    
    public function create_news_articles(){
        $type=request('type');
        return view('backend.news_articles.create', compact('type'));
    } 
    
    public function create_network_pages(){
        $type=request('type');
        return view('backend.network.create', compact('type'));
    } 
    
    public function create_story_pages(){
        $type=request('type');
        return view('backend.story.create', compact('type'));
    } 
     
    public function create()
    {
        $type=request('type');
        return view('backend.page.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'title'=> 'required',
            'type'=> '',
            'slug'=> 'required',
            'description'=> 'required',          
            'short_description'=> '',          
            'seo_title'=> '',          
            'seo_description'=> '',          
            'seo_keyword'=> ''         
        ]); 
        
        $data['seo_title'] = $request->seo_title;
        $data['seo_description'] = $request->seo_description;

        if($request->hasFile('icon')) {                

            $originName = $request->file('icon')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('icon')->getClientOriginalExtension();
            $fileName =$fileName.time().'.'.$extension;        
            
            $request->file('icon')->move(public_path('backend/page'), $fileName);
            $data['icon']=$fileName;      
        }

        if($request->thumbnail){

            $image = Image::make($request->file('thumbnail'));
            $originName = $request->file('thumbnail')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $fileName =$fileName.time().'.'.$extension;           

            $destation_path1 = 'backend/page/'.$fileName;
            $image->resize(1280,720);
            $image->save(public_path().'/'.$destation_path1);
            
            $data['thumbnail']=$fileName;              
        }
        
        // if($request->hasFile('thumbnail')) {                

        //     $originName = $request->file('thumbnail')->getClientOriginalName();
        //     $fileName = pathinfo($originName, PATHINFO_FILENAME);
        //     $extension = $request->file('thumbnail')->getClientOriginalExtension();
        //     $fileName =$fileName.time().'.'.$extension;        
            
        //     $request->file('thumbnail')->move(public_path('backend/page'), $fileName);
        //     $data['thumbnail']=$fileName;      
        // }

        if($request->hasFile('header_image')) {                

            $originName = $request->file('header_image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('header_image')->getClientOriginalExtension();
            $fileName =$fileName.time().'.'.$extension;        
            
            $request->file('header_image')->move(public_path('backend/page'), $fileName);
            $data['header_image']=$fileName;      
        }
       
        Page::create($data);

        return response()->json(['status'=>true ,'msg'=>'Page Created !!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
     
    public function edit_news_articles(string $id){
        $item=Page::find($id);        
        return view('backend.news_articles.edit', compact('item'));
    } 
    
    public function edit_nuk_pages(string $id){
        $item=Page::find($id);        
        return view('backend.nuk_programs.edit', compact('item'));
    } 
    
    public function edit_network_pages(string $id){
        $item=Page::find($id);        
        return view('backend.network.edit', compact('item'));
    }
    
    public function edit_story_pages(string $id){
        $item=Page::find($id);        
        return view('backend.story.edit', compact('item'));
    } 
     
    public function edit(string $id)
    {
        $item=Page::find($id);        
        return view('backend.page.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item=Page::find($id);

        $data=$request->validate([
            'title'=> 'required',
            'type'=> '',
            'slug'=> 'required',
            'description'=> 'required',          
            'short_description'=> '',          
            'seo_title'=> '',          
            'seo_description'=> '',          
            'seo_keyword'=> ''         
        ]); 

        if($request->hasFile('icon')) {

            $old_icon_image = $item->icon;           

            $originName = $request->file('icon')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('icon')->getClientOriginalExtension();
            $fileName =$fileName.time().'.'.$extension;        
            
            $request->file('icon')->move(public_path('backend/page'), $fileName);
            $data['icon']=$fileName;

            if($old_icon_image){                
                if(File::exists(public_path().'/backend/page/'.$old_icon_image))unlink(public_path().'/backend/page/'.$old_icon_image);                
            }  

        }   

        if($request->thumbnail){
            $old_thumbnail_image = $item->thumbnail;           
            $image = Image::make($request->file('thumbnail'));

            $originName = $request->file('thumbnail')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $fileName =$fileName.time().'.'.$extension; 
            

            $destation_path1 = 'backend/page/'.$fileName;
            $image->resize(1280,720);
            $image->save(public_path().'/'.$destation_path1);           

            $data['thumbnail']=$fileName;
            if($old_thumbnail_image){                
                if(File::exists(public_path().'/backend/page/'.$old_thumbnail_image))unlink(public_path().'/backend/page/'.$old_thumbnail_image);                
            }  
        }
        
        // if($request->hasFile('thumbnail')) {

        //     $old_thumbnail_image = $item->thumbnail;           

        //     $originName = $request->file('thumbnail')->getClientOriginalName();
        //     $fileName = pathinfo($originName, PATHINFO_FILENAME);
        //     $extension = $request->file('thumbnail')->getClientOriginalExtension();
        //     $fileName =$fileName.time().'.'.$extension;        
            
        //     $request->file('thumbnail')->move(public_path('backend/page'), $fileName);
        //     $data['thumbnail']=$fileName;

        //     if($old_thumbnail_image){                
        //         if(File::exists(public_path().'/backend/page/'.$old_thumbnail_image))unlink(public_path().'/backend/page/'.$old_thumbnail_image);                
        //     }  

        // }   

        if($request->hasFile('header_image')) {

            $old_header_image = $item->header_image;           

            $originName = $request->file('header_image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('header_image')->getClientOriginalExtension();
            $fileName =$fileName.time().'.'.$extension;        
            
            $request->file('header_image')->move(public_path('backend/page'), $fileName);
            $data['header_image']=$fileName;

            if($old_header_image){                
                if(File::exists(public_path().'/backend/page/'.$old_header_image))unlink(public_path().'/backend/page/'.$old_header_image);                
            }  

        }                       

        $item->update($data);

        return response()->json(['status'=>true ,'msg'=>'Page Updated !!']);
    }

    /**
     * Remove the specified resource from storage.
     */
     
    public function multi_page_delete(Request $request){
        $data = Page::whereIn('id', $request->page_ids)->delete();
        return response()->json(['status'=>true ,'msg'=>'Page Deleted !!']);
    }
    
     
    public function destroy(string $id)
    {
        $item=Page::find($id);      
        $item->delete();
        
        $delete_menu = Menu::where('page_id', $item->id)->get();
        $delete_sub_menu = SubMenu::where('page_id', $item->id)->get();
        
        foreach($delete_menu as $menu){
            $menu->delete();
        }
        
        foreach($delete_sub_menu as $menu){
            $menu->delete();
        }
        
        return response()->json(['status'=>true ,'msg'=>'Page Deleted !!']);
    }
}
