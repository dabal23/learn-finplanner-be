<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storespending_recordsRequest;
use App\Http\Requests\Updatespending_recordsRequest;
use App\Models\spending_records;

class SpendingRecordsController extends Controller
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
    public function store(Storespending_recordsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(spending_records $spending_records)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatespending_recordsRequest $request, spending_records $spending_records)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(spending_records $spending_records)
    {
        //
    }
}
