<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\ResetPasswordRequest;


class ResetPasswordController extends Controller
{
    public function reset(ResetPasswordRequest $request, User $user){
        
    }
}
