<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;
use App\Http\Resources\PedidoResource;
use App\Models\Pedido;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PedidoController extends Controller
{
    /**
     * Mostrar una lista paginada de pedidos.
     */
    public function index(): AnonymousResourceCollection
    {
        $pedidos = Pedido::latest()->paginate(10);

        return PedidoResource::collection($pedidos);
    }

    /**
     * Crear un nuevo pedido.
     */
    public function store(StorePedidoRequest $request): JsonResponse
    {
        $pedido = Pedido::create($request->validated());

        return response()->json([
            'mensaje' => 'Pedido creado correctamente.',
            'pedido' => new PedidoResource($pedido),
        ], 201);
    }

    /**
     * Mostrar un pedido específico.
     */
    public function show(Pedido $pedido): PedidoResource
    {
        return new PedidoResource($pedido);
    }

    /**
     * Actualizar un pedido.
     */
    public function update(
        UpdatePedidoRequest $request,
        Pedido $pedido
    ): JsonResponse {
        $pedido->update($request->validated());

        return response()->json([
            'mensaje' => 'Pedido actualizado correctamente.',
            'pedido' => new PedidoResource($pedido->fresh()),
        ]);
    }

    /**
     * Eliminar un pedido.
     */
    public function destroy(Pedido $pedido): JsonResponse
    {
        $pedido->delete();

        return response()->json([
            'mensaje' => 'Pedido eliminado correctamente.',
        ]);
    }
}