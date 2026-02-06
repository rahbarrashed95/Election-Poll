<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Country::get();
        return view('backend.country.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type=request('type');
        return view('backend.country.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'country_name'=> ''
        ]); 
        
        Country::create($data);
        return response()->json(['status'=>true ,'msg'=>'Country Created !!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item=Country::find($id);        
        return view('backend.country.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item=Country::find($id);

        $data=$request->validate([
            'country_name'=> ''
        ]);

        $item->update($data);

        return response()->json(['status'=>true ,'msg'=>'Country Updated !!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item=Country::find($id);      
        $item->delete();

        return response()->json(['status'=>true ,'msg'=>'Country Deleted !!']);
    }
}
