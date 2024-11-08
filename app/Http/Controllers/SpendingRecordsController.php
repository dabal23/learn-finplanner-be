<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storespending_recordsRequest;
use App\Http\Requests\Updatespending_recordsRequest;
use App\Models\spending_records;
use Illuminate\Http\Request;

class SpendingRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return spending_records::with('user')->latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $field = $request->validate([
            'name'=>'required',
            'price'=>'required',
            'category_id'=>'required|exists:categories,id'
        ]);

        $field['note'] = $field['note'] ?? '';
       
        // $category = Category::create($field);
        $spending = $request->user()->spending_records()->create($field);

        return ['spending'=>$spending, 'user'=>$spending->user];
    }

    /**
     * Display the specified resource.
     */
    public function show(spending_records $spending_records)
    {
        return ['spending'=>$spending_records, 'user'=>$spending_records->user];
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
