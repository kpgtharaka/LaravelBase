<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required', // Used to identify the token (e.g., "iPhone 15")
        ]);


        $user = User::where('email', $request->email)->first();


        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }


        // Generate the token and return it as JSON
        $token = $user->createToken($request->device_name)->plainTextToken;
        $userRole = UserRole::where('id', $user->user_role_id)->first();


        return response()->json([
            'token' => $token,
            'user' => $user,
            'user_role'=>$userRole,
        ]);
    }
}
