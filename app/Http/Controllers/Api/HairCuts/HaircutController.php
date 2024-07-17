<?php

namespace App\Http\Controllers\Api\HairCuts;

use App\Http\Controllers\Controller;
use App\Http\Resources\Haircuts\HaircutCollection;
use App\Models\Haircuts\HairCut;
use Illuminate\Http\Request;

class HaircutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): HaircutCollection
    {
        return new HaircutCollection(Haircut::query()->paginate(3));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->cannot('create', HairCut::class)) {
            abort(403);
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(HairCut $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HairCut $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HairCut $id)
    {
        //
    }
}
