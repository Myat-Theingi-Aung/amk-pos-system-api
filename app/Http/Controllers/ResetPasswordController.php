<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ResetPasswordRequest;


class ResetPasswordController extends Controller
{
    public function reset(ResetPasswordRequest $request, User $user)
    {
        if ($user && Carbon::parse($user->token_expiry)->gt(now())) {
            $user->password = Hash::make($request->new_password);
            $user->reset_token = null;
            $user->token_expiry = null;
            $user->save();
    
            return response()->json(['message' => 'Password reset successfully'], 200);
        } 
        
        return response()->json(['message' => 'Invalid token or token expired'], 400);
    }
}
