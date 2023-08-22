<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\User;
use App\Models\SaleItem;
use App\Http\Resources\SaleResource;
use App\Http\Requests\SaleCreateRequest;
use App\Http\Requests\SaleUpdateRequest;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::with('saleItems')->get();
    
        return SaleResource::collection($sales);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaleCreateRequest $request)
    {
        $sale = Sale::create([
            'user_id' => $request->user_id,
            'total' => $request->total,
            'start_date' => $request->start_date,
        ]);

        foreach ($request->sale_items as $item) {
            $sale->saleItems()->create([
                'product_id' => $item['product_id'],
                'quantity'  => $item['quantity'],
                'price'  => $item['price'],
                'payment_start_period'  => $item['payment_start_period'],
                'payment_end_period'  => $item['payment_end_period'],
            ]);
        }
        return response()->json(['message' => 'Sale created successfully','sale' =>  new SaleResource($sale->load('saleItems'))]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        $sale->load('saleItems');

        return new SaleResource($sale);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaleUpdateRequest $request, Sale $sale)
    {
        $sale->update([
            'user_id' => $request->user_id,
            'total' => $request->total,
            'start_date' => $request->start_date,
        ]);
        $updatedSaleItems = [];
        foreach ($request->sale_items as $item) {
            $saleItem = SaleItem::updateOrCreate(
                ['id' => $item['sale_id']],
                [
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'payment_start_period' => $item['payment_start_period'],
                    'payment_end_period' => $item['payment_end_period'],
                ]
            );
            $updatedSaleItems[] = $saleItem->id;
        }
        // Delete sale items that were not included in the update
        $sale->saleItems()->whereNotIn('id', $updatedSaleItems)->delete();
        
        return response()->json(['message' => 'Sale updated successfully','sale' =>  new SaleResource($sale->load('saleItems'))]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        $sale->saleItems()->delete();
        $sale->delete();

        return response()->json(['message' => 'Sale deleted successfully']);
    }

    public function userSale(User $user)
    {
       $sales = Sale::where('user_id', $user->id)->with('saleItems')->get();

        return response()->json(["success",$sales]);
    }
}
