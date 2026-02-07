<?php

namespace App\Modules\Poll\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Poll\Models\Poll;
use App\Modules\Pollers\Models\Pollers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PollController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    
    public function storeApi(Request $request)
    {
        try {
            $request->validate([
                'candidate_id' => 'required|exists:candidates,id',
                'name' => 'required',
                'mobile' => 'required|unique:pollers,mobile'
            ]);

            DB::beginTransaction();

            // Poller create
            $poller = Pollers::create([
                'name' => $request->name,
                'mobile' => $request->mobile
            ]);

            // Poll Create
            Poll::create([
                'candidate_id' => $request->candidate_id,
                'poller_id' => $poller->id,
            ]);

            DB::commit();
            
            return response()->json([
                'success' => true,
                'message' => 'Poll submitted successfully'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
