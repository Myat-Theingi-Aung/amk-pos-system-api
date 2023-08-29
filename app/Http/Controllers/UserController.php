<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserPasswordChangeRequest;
use App\Http\Requests\OldPasswordRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::when(request('search'), function($query){
            $search = '%' . request('search') . '%';
            $query->where('name','like', $search)
                  ->orWhere('address', 'like', $search)
                  ->orWhere('phone', 'like', $search);
            })->orderBy('id','desc')->get();

        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserCreateRequest $request)
    {
        $user = User::create($request->all());

        $token = $user->createToken('auth_token')->plainTextToken;

        $cookie = cookie('token', $token, 60 * 24); // 1 day

        return response()->json(['message' => 'User created successfully','user' => new UserResource($user)])->withCookie($cookie);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->all());

        return response()->json(['message' => 'User updated successfully', 'user' => new UserResource($user)]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }

    public function confirmOldPassword(User $user, OldPasswordRequest $request)
    {
        if (!Hash::check($request->password, $user->password))
        {
            return response()->json(['error' => 'Old Password Confirmation Failed'], 401);
        }

        return response()->json(['message' => 'Old Password Confirmation Successful']);
    }

    public function changePassword(UserPasswordChangeRequest $request, User $user)
    {
        $user->update($request->all());

        return response()->json(['message' => 'Password changed successfully']);
    }
}
