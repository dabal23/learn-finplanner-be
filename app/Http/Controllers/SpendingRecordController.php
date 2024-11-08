<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpendingRecordRequest;
use App\Http\Requests\UpdateSpendingRecordRequest;
use App\Models\SpendingRecord;

class SpendingRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SpendingRecord::with('user')->latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSpendingRecordRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SpendingRecord $spendingRecord)
    {
        return ['spending'=>$spendingRecord, 'user'=>$spendingRecord->user];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSpendingRecordRequest $request, SpendingRecord $spendingRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SpendingRecord $spendingRecord)
    {
        //
    }
}
