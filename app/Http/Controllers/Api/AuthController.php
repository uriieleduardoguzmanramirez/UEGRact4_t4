<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request): JsonResponse
    {
        $datos = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $usuario = User::create([
            'name' => $datos['name'],
            'email' => $datos['email'],
            'password' => Hash::make($datos['password']),
        ]);

        $token = $usuario->createToken('token-api')->plainTextToken;

        return response()->json([
            'mensaje' => 'Usuario registrado correctamente.',
            'usuario' => new UserResource($usuario),
            'token' => $token,
            'tipo_token' => 'Bearer',
        ], 201);
    }

    public function login(Request $request): JsonResponse
    {
        $datos = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $usuario = User::where('email', $datos['email'])->first();

        if (!$usuario || !Hash::check($datos['password'], $usuario->password)) {
            return response()->json([
                'mensaje' => 'El correo o la contraseña son incorrectos.',
            ], 401);
        }

        $token = $usuario->createToken('token-api')->plainTextToken;

        return response()->json([
            'mensaje' => 'Inicio de sesión correcto.',
            'usuario' => new UserResource($usuario),
            'token' => $token,
            'tipo_token' => 'Bearer',
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->currentAccessToken()?->delete();

        return response()->json([
            'mensaje' => 'Sesión cerrada correctamente.',
        ]);
    }
}