<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\User;
use App\Models\Payment;
use App\Http\Resources\PaymentResource;
use App\Http\Requests\PaymentCreateRequest;
use App\Http\Requests\PaymentUpdateRequest;

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
        $sales = Sale::where('user_id', $request->user_id)->with('saleItems.product.category.categoryType')->get();
        $foundCategoryType = $this->checkForCategoryType($sales, $request->category_type_id);

        if (!$foundCategoryType) {
            return response()->json(['error' => 'User not buy this category type items'], 401);
        }

        $payment = Payment::create($request->all());
        return response()->json(['message' => 'Payment created successfully','category' =>  new PaymentResource($payment)]);
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
        $sales = Sale::where('user_id', $request->user_id)->with('saleItems.product.category.categoryType')->get();
        $foundCategoryType = $this->checkForCategoryType($sales, $request->category_type_id);

        if (!$foundCategoryType) {
            return response()->json(['error' => 'User not buy this category type items'], 401);
        }

        $payment->update($request->all());
        return response()->json(['message' => 'Payment updated successfully','category' =>  new PaymentResource($payment)]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();

        return response()->json(['message' => 'Payment deleted successfully']);
    }

    public function userPayment(User $user)
    {
        $payments = Payment::where('user_id', $user->id)->get();

        return response()->json(['payments' => $payments]);
    }

    private function checkForCategoryType($sales, $requestCategoryTypeId) 
    {
        $requestedCategoryTypeIds = $sales->flatMap(function ($sale) {
            return $sale->saleItems->pluck('product.category.categoryType.id');
        })->unique();

        return $requestedCategoryTypeIds->contains($requestCategoryTypeId);
    }
}
