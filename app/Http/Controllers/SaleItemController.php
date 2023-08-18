<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleItemCreateRequest;
use App\Http\Requests\SaleItemUpdateRequest;
use App\Models\SaleItem;
use App\Http\Resources\SaleItemResource;

class SaleItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SaleItemResource::collection(SaleItem::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaleItemCreateRequest $request)
    {
        info($request);
        $saleItem = SaleItem::create($request->all());

        return response()->json(['message' => 'Sale item created successfully','category' =>  new SaleItemResource($saleItem)]);
    }

    /**
     * Display the specified resource.
     */
    public function show(SaleItem $saleItem)
    {
        return new SaleItemResource($saleItem);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaleItemUpdateRequest $request, SaleItem $saleItem)
    {
        $saleItem->update($request->all());

        return response()->json(['message' => 'Sale item updated successfully', 'category' => new SaleItemResource($saleItem) ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SaleItem $saleItem)
    {
        $saleItem->delete();

        return response()->json(['message' => 'Sale item deleted successfully']);
    }
}
