<?php

namespace App\Domain\Campaigns\Controllers;

use App\Domain\Campaigns\Entities\Campaigns;
use App\Domain\Campaigns\Services\CampaignsService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CampaignsController extends Controller
{
    private CampaignsService $service;

    public function __construct(CampaignsService $service)
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
                'product_id' => 'required|array',
            ], [
                'name.required' => 'Campo Nome é obrigatório',
                'product_id.required' => "Selecionar o Produto é obrigatório",
                'product_id.array' => "Formato do Produto é obrigatorio em array",
            ]);

            $this->service->create($request->all());
            return response()->json(['data' => "Cadastrado com sucesso!"], Response::HTTP_OK);
        
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(Campaigns $campaign, Request $request): JsonResponse
    {
        try {
            $request->validate([
                'name' => 'required',
                'product_id' => 'required|exists:products,id',
            ], [
                'name.required' => 'Campo Nome é obrigatório',
                'product_id.required' => "Selecionar o Produto é obrigatório",
                'product_id.exists' => "Produto não existe em nosso banco dados",
            ]);

            $this->service->update($campaign, $request->all());
            return response()->json(['data' => "Atualizado com sucesso!"], Response::HTTP_OK);
        
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function destroy(Campaigns $campaign): JsonResponse
    {
        try {
            $this->service->delete($campaign);
            return response()->json(['data' => "Exclusão com sucesso!"], Response::HTTP_OK);
        
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}