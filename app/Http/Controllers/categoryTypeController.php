<?php

namespace App\Http\Controllers;

use App\Models\CategoryType;
use App\Http\Resources\CategoryTypeResource;
use App\Http\Requests\CategoryTypeCreateRequest;
use App\Http\Requests\CategoryTypeUpdateRequest;

class CategoryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CategoryTypeResource::collection(CategoryType::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryTypeCreateRequest $request)
    {
        $categoryType = CategoryType::create($request->all());

        return response()->json(['message' => 'Category Type created successfully','category' =>  new CategoryTypeResource($categoryType)]);
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryType $categoryType)
    {
        return new CategoryTypeResource($categoryType);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryTypeUpdateRequest $request, CategoryType $categoryType)
    {
        $categoryType->update($request->all());
        info($request);

        return response()->json(['message' => 'Category Type updated successfully', 'category' => new CategoryTypeResource($categoryType) ]);
    }

    public function destroy(CategoryType $categoryType)
    {
        $categoryType->delete();
        
        return response()->json(['message' => 'Category Type deleted successfully']);
    }
}
