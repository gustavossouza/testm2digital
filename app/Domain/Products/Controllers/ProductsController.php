<?php

namespace App\Domain\Products\Controllers;

use App\Domain\Products\Entities\Products;
use App\Domain\Products\Services\ProductsService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductsController extends Controller
{
    private ProductsService $service;

    public function __construct(ProductsService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'data' => $this->service->get()
        ], Response::HTTP_OK);
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'name' => 'required',
                'price' => 'required|numeric',
            ], [
                'name.required' => 'Campo Nome é obrigatório',
                'price.required' => 'Campo Preço é obrigatório',
                'price.numeric' => 'Campo Preço é valor monetário',
            ]);

            $this->service->create($request->all());
            return response()->json(['data' => "Cadastrado com sucesso!"], Response::HTTP_OK);
        
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(Products $product, Request $request): JsonResponse
    {
        try {
            $request->validate([
                'name' => 'required',
                'price' => 'required|numeric',
            ], [
                'name.required' => 'Campo Nome é obrigatório',
                'price.required' => 'Campo Preço é obrigatório',
                'price.numeric' => 'Campo Preço é valor monetário',
            ]);

            $this->service->update($product, $request->all());
            return response()->json(['data' => "Atualizado com sucesso!"], Response::HTTP_OK);
        
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function destroy(Products $product): JsonResponse
    {
        try {
            if ($product->discounts->count()) {
                throw new \Exception("Esse produto possuem desconto cadastrado!");
            }

            $this->service->delete($product);
            return response()->json(['data' => "Exclusão com sucesso!"], Response::HTTP_OK);
        
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}