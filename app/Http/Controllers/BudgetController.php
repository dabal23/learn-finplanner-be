<?php

namespace App\Http\Controllers;


use App\Http\Requests\UpdateBudgetRequest;
use App\Models\Budget;
use Illuminate\Http\Request;


class BudgetController extends Controller 
{

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
        $field = $request->validate([
            'name'=>'required',
            'amount'=>'required',
            'category_id'=>'required|exists:categories,id'
        ]);


        $budget = $request->user()->budgets()->create($field);

        return ['data'=> $budget, 'user' => $budget->user];
    }

    /**
     * Display the specified resource.
     */
    public function show(Budget $budget)
    {
        return ['budget' => $budget, 'user' => $budget->user];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Budget $budget)
    {
        // $budget = $request->user()->budgets()->findOrFail($id);
        
        if($budget->user_id !== $request->user()->id){
            abort(403, 'Unauthorized action');
        }

        $field = $request->validate([
            'name'=>'required',
            'amount'=>'required',
            'category_id'=>'required|exists:categories,id'
        ]);

        $budget->update($field);

        return ['data'=>$budget, 'user'=>$budget->user];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Budget $budget)
    {
        if($budget->user_id !== $request->user()->id){
            abort(403, 'Unauthorized action');
        }

        $budget->delete();

        return ['message'=>'data deleted successfully'];
    }
}
