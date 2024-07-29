<?php

namespace App\Http\Controllers\Api\Auth;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class AuthController extends Controller
{
    /**
     * @description Login a user
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        try {

            if (!Auth::attempt($request->only('email', 'password'))) {
                Log::error("Invalid credentials: {$request->email}");
                return ResponseHelper::error('Invalid credentials', ResponseAlias::HTTP_UNAUTHORIZED);
            }

            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return ResponseHelper::success('User logged in successfully', ResponseAlias::HTTP_OK, ['token' => $token]);
        } catch (\Exception $e) {
            Log::error("unable to login user: {$e->getMessage()}");
            return ResponseHelper::error('An error occurred', ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @description Register a user
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();
            $data['password'] = Hash::make($data['password']);
            User::create([
                'name' =>$request->name,
                'email' => $request->email,
                'password' => $request->password,
                'phone' => $request->phone
            ]);
            return ResponseHelper::success('User registered successfully', ResponseAlias::HTTP_CREATED);
        } catch (\Exception $e) {
            Log::error("unable to register user: {$e->getMessage()}");
            return ResponseHelper::error('An error occurred', ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @description Logout a user
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        try {
            $user = Auth::user();
            if ($user) {
                $user->currentAccessToken()->delete();
                return ResponseHelper::success('User logged out successfully', ResponseAlias::HTTP_OK);
            }
            return ResponseHelper::error('User not found', ResponseAlias::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            Log::error("unable to logout user: {$e->getMessage()}");
            return ResponseHelper::error('An error occurred', ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @description Get the authenticated user
     * @return JsonResponse
     */
    public function me()
    {
        try {
            $user = Auth::user();
            if ($user) {
                return ResponseHelper::success('User retrieved successfully', ResponseAlias::HTTP_OK, ['user' => [
                    'id' => $user->getKey(),
                    'name' => $user->getName(),
                ]]);
            }
            return ResponseHelper::error('User not found', ResponseAlias::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            Log::error("unable to retrieve user: {$e->getMessage()}");
            return ResponseHelper::error('An error occurred', ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
