<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\UserData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    //
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        DB::beginTransaction();
        try {
            $user = new User();
            $user->account_id = $this->generate_account_id();
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'USER';
            $user->status = 'active';
            $user->save();
            $user->assignRole('USER');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'failed to store user data',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        try {
            $userData = new UserData();
            $userData->user_id = $user->id;
            $userData->fullname = $request->fullname;
            $userData->phone = $request->phone;
            $userData->city = $request->city;
            $userData->province = $request->province;
            $userData->save();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'failed to store user data',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        DB::commit();
        

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
            'user' => $user,
            'user_data' => $userData,
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
