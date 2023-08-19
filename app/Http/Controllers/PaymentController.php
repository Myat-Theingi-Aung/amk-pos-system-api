<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PaymentCreateRequest;
use App\Http\Requests\PaymentUpdateRequest;
use App\Http\Resources\PaymentResource;
use App\Models\Payment;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Category;
use App\Models\CategoryType;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PaymentResource::collection(Payment::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentCreateRequest $request)
    {

        $payment = Payment::create($request->all());

        $userSales = Sale::where('user_id', $request->input('user_id'))->get();

        $foundCategoryType = $this->checkForCategoryType($userSales, $request["category_type_id"]);

        if (!$foundCategoryType) {

            return response()->json(['error' => 'Category type not found in sales.'], 422);

        }
        else
        {

            return response()->json(['message' => 'Payment created successfully','category' =>  new PaymentResource($payment)]);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        return new PaymentResource($payment);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentUpdateRequest $request, Payment $payment)
    {
        $payment->update($request->all());

        $userSales = Sale::where('user_id', $request->input('user_id'))->get();

        $foundCategoryType = $this->checkForCategoryType($userSales, $request["category_type_id"]);

        if (!$foundCategoryType) {

            return response()->json(['error' => 'Category type not found in sales.'], 422);

        }
        else
        {

            return response()->json(['message' => 'Payment updated successfully','category' =>  new PaymentResource($payment)]);

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();

        return response()->json(['message' => 'Payment deleted successfully']);
    }

    private function checkForCategoryType($sales, $requestCategoryTypeId) {

        foreach ($sales as $sale) {

            foreach ($sale->saleItems as $saleItem) {

                $product = Product::find($saleItem->product_id);

                if ($product && ($category = Category::find($product->category_id)) && ($categoryType = CategoryType::find($category->category_type_id)) && $categoryType->id == $requestCategoryTypeId) {

                    return true;

                }
            }
        }

        return false;
    }

}
