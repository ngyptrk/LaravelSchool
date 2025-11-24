<?php

namespace App\Http\Controllers;

use App\Models\sports;
use App\Http\Requests\StoresportsRequest;
use App\Http\Requests\UpdatesportsRequest;

class SportsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoresportsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(sports $sports)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatesportsRequest $request, sports $sports)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sports $sports)
    {
        //
    }
}
