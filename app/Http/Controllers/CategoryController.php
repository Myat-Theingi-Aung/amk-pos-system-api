<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CategoryResource::collection(Category::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryCreateRequest $request)
    {
        $category = Category::create($request->all());

        return response()->json(['message' => 'Category created successfully','category' =>  new CategoryResource($category)]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $category->update($request->all());

        return response()->json(['message' => 'Category updated successfully', 'category' => new CategoryResource($category) ]);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        
        return response()->json(['message' => 'Category deleted successfully']);
    }
}
