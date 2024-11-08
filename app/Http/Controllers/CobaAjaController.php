<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCobaAjaRequest;
use App\Http\Requests\UpdateCobaAjaRequest;
use App\Models\CobaAja;
use Illuminate\Http\Request;

class CobaAjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CobaAja::with('user')->latest()->get();
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
        $coba = $request->user()->CobaAjas()->create($field);

        return ['coba'=>$coba,'user'=>$coba->user];
    }

    /**
     * Display the specified resource.
     */
    public function show(CobaAja $cobaAja)
    {
        return ['coba'=>$cobaAja];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCobaAjaRequest $request, CobaAja $cobaAja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CobaAja $cobaAja)
    {
        //
    }
}
