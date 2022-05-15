<?php

namespace App\Domain\Cities\Controllers;

use App\Domain\Cities\Entities\Cities;
use App\Domain\Cities\Services\CitiesService;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CitiesController extends Controller
{
    private CitiesService $service;

    public function __construct(CitiesService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'data' => $this->service->get()
        ], Response::HTTP_OK);
    }

    public function indexGroupNull(int $id = null): JsonResponse
    {
        return response()->json([
            'data' => $this->service->getGroupNull($id)
        ], Response::HTTP_OK);
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'name' => 'required',
            ], [
                'name.required' => 'Campo Preço é obrigatório',
            ]);

            $this->service->create($request->all());
            return response()->json(['data' => "Cadastrado com sucesso!"], Response::HTTP_OK);
        
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(Cities $city, Request $request): JsonResponse
    {
        try {
            $request->validate([
                'name' => 'required',
            ], [
                'name.required' => 'Campo Preço é obrigatório',
            ]);

            $this->service->update($city, $request->all());
            return response()->json(['data' => "Atualizado com sucesso!"], Response::HTTP_OK);
        
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function destroy(Cities $city): JsonResponse
    {
        try {
            if ($city->group) {
                throw new \Exception("Essa cidade possuem um grupo de cidade");
            }

            $this->service->delete($city);
            return response()->json(['data' => "Exclusão com sucesso!"], Response::HTTP_OK);
        
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}