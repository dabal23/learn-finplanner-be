<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Category::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $field = $request->validate([
        'name'=>'required',
        'type'=>'required',
        'note'=>'nullable'
       ]); 

       $category = Category::create($field);
       return ['category'=>$category];
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return ['category' => $category];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
