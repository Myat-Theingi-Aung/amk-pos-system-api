<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Http\Resources\ColorResource;
use App\Http\Requests\ColorCreateRequest;
use App\Http\Requests\ColorUpdateRequest;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['colors' => ColorResource::collection(Color::all())]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ColorCreateRequest $request)
    {
        $color = Color::create($request->all());

        return response()->json(['message' => 'Color created successfully','color' =>  new ColorResource($color)]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        return response()->json(['color' => new ColorResource($color)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ColorUpdateRequest $request, Color $color)
    {
        $color->update($request->all());

        return response()->json(['message' => 'Color updated successfully', 'category' => new ColorResource($color) ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        $color->delete();
        
        return response()->json(['message' => 'Color deleted successfully']);
    }
}
