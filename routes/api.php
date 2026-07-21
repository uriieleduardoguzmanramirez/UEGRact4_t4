<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PedidoController;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas públicas
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return response()->json([
        'mensaje' => 'API REST de pedidos funcionando correctamente.',
        'proyecto' => 'Actividad 4 - Laravel Sanctum',
        'autor' => 'Uriel Eduardo Guzmán Ramírez',
        'endpoints' => [
            'registro' => 'POST /api/register',
            'login' => 'POST /api/login',
            'pedidos' => 'GET /api/pedidos - requiere token',
        ],
    ]);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| Rutas protegidas con Sanctum
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return new UserResource($request->user());
    });

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('pedidos', PedidoController::class);
});