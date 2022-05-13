<?php

namespace App\Domain\Discounts\Controllers;

use App\Domain\Discounts\Entities\Discounts;
use App\Domain\Discounts\Services\DiscountsService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DiscountsController extends Controller
{
    private DiscountsService $service;

    public function __construct(DiscountsService $service)
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
                'campaign_id' => 'required|exists:campaigns,id',
                'product_id' => 'required|exists:products,id',
                'price' => 'required|numeric'
            ], [
                'price.required' => 'Campo Preço é obrigatório',
                'price.numeric' => 'Campo Preço é valor monetário',
                'campaign_id.required' => "Selecionar a Campanha é obrigatório",
                'campaign_id.exists' => "Campanha não existe em nosso banco dados",
                'product_id.required' => "Selecionar o Produto é obrigatório",
                'product_id.exists' => "Produto não existe em nosso banco dados",
            ]);


            $this->service->create($request->all());
            return response()->json(['data' => "Cadastrado com sucesso!"], Response::HTTP_OK);
        
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(Discounts $discount, Request $request): JsonResponse
    {
        try {
            $request->validate([
                'campaign_id' => 'required|exists:campaigns,id',
                'product_id' => 'required|exists:products,id',
                'price' => 'required|numeric'
            ], [
                'price.required' => 'Campo Preço é obrigatório',
                'price.numeric' => 'Campo Preço é valor monetário',
                'campaign_id.required' => "Selecionar a Campanha é obrigatório",
                'campaign_id.exists' => "Campanha não existe em nosso banco dados",
                'product_id.required' => "Selecionar o Produto é obrigatório",
                'product_id.exists' => "Produto não existe em nosso banco dados",
            ]);

            $this->service->update($discount, $request->all());
            return response()->json(['data' => "Atualizado com sucesso!"], Response::HTTP_OK);
        
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function destroy(Discounts $discount): JsonResponse
    {
        try {
            $this->service->delete($discount);
            return response()->json(['data' => "Exclusão com sucesso!"], Response::HTTP_OK);
        
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}