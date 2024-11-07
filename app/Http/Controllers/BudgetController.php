<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Http\Requests\StoreBudgetRequest;
use App\Http\Requests\UpdateBudgetRequest;
use App\Models\Budget;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class BudgetController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth:sanctum')
        ];
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Budget::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $field = $request->validate([
        //     'name'=>'required',
        //     'amount'=>'required',
        //     'category_id'=>'required|exists:categories,id'
        // ]);

        // Log::debug('Validated Data:', $field);  // Log the validated data

        // $budget = $request->user()->budgets()->create($field);

        // return ['data'=> $budget, 'user' => $budget->user];
        // return response()->json(['data' => $budget, 'user' => $budget->user]);
        try {
            $field = $request->validate([
                'name' => 'required',
                'amount' => 'required',
                'category_id' => 'required|exists:categories,id'
            ]);
    
            Log::debug('Validated Data:', $field);
    
            $budget = $request->user()->budgets()->create($field);
    
            return response()->json(['data' => $budget, 'user' => $budget->user]);
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation failed', ['errors' => $e->errors()]);
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Budget $budget)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBudgetRequest $request, Budget $budget)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Budget $budget)
    {
        //
    }
}
