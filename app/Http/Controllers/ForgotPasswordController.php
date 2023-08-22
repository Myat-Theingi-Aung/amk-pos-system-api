<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\ForgotPasswordRequest;

class ForgotPasswordController extends Controller
{
    public function forgot(ForgotPasswordRequest $request)
    {
        $user = User::where('phone', $request->phone)->first();

        if ($user->color == $request->color && $user->food == $request->food) {
            return response()->json(['message' => 'forgot successfully!', 'user' => $user]);
        }

        return response()->json(['error' => 'color or food not match'], 401);
    }
}
