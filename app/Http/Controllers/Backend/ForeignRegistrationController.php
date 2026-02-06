<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\ForeignRegistration;
use Illuminate\Http\Request;

class ForeignRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = ForeignRegistration::all();
        return view('backend.foreign_register.index', compact('items'));
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
    public function show(ForeignRegistration $foreignRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ForeignRegistration $foreignRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ForeignRegistration $foreignRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ForeignRegistration $foreignRegistration)
    {
        //
    }
}
