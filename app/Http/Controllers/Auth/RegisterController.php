<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Carbon;


class RegisterController extends Controller
{
    //
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'account_id' => $this->generate_account_id(),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'status' => 'active',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'code' => Response::HTTP_UNAUTHORIZED,
                'message' => 'authentication is invalid.',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $accessToken = Auth::user()->createToken('access_token')->accessToken;

        return response()->json([
            'code' => Response::HTTP_OK,
            'message' => 'success',
            'data' => $user,
            'meta' => [
                'token' => $accessToken,
            ],
        ], Response::HTTP_CREATED);
    }

    public function generate_account_id()
    {
        return "ID_" . Carbon::now()->format('mYdH') . random_int(1000, 9999);
    }
}
