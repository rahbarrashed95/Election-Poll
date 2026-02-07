<?php

namespace App\Modules\Pollers\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Pollers\Models\Pollers;
use Illuminate\Http\Request;

class PollersController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("Pollers::welcome");
    }

        public function index()
        {
            return view("Pollers::index");
        }

        public function store(Request $request)
        {
            $data=$request->validate([
                'name'=> 'required|string|max:100',
                'phone'=> 'required|string|max:20',
            ]);
            Pollers::create($data);
        }

}
