<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIncome_recordRequest;
use App\Http\Requests\UpdateIncome_recordRequest;
use App\Models\Income_record;
use App\Models\IncomeRecord;
use Illuminate\Http\Request;

class IncomeRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return IncomeRecord::with('user')->latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $field = $request->validate([
            'name'=>'required',
            'amount'=>'required',
            'category_id'=>'required|exists:categories,id',
            'note'=>'nullable|string'
        ]);

        $income = $request->user()->IncomeRecords()->create($field);

        return ['income'=>$income, 'user'=>$income->user];
    }

    /**
     * Display the specified resource.
     */
    public function show(IncomeRecord $incomeRecord)
    {
        return ['income' => $incomeRecord, 'user' => $incomeRecord->user];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncome_recordRequest $request, IncomeRecord $income_record)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IncomeRecord $income_record)
    {
        //
    }
}
