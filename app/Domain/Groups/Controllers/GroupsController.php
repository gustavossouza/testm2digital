<?php

namespace App\Domain\Groups\Controllers;

use App\Domain\Groups\Entities\Groups;
use App\Domain\Groups\Services\GroupsService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GroupsController extends Controller
{
    private GroupsService $service;

    public function __construct(GroupsService $service)
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
            $this->service->create($request->all());
            return response()->json(['data' => "Cadastrado com sucesso!"], Response::HTTP_OK);
        
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(Groups $group, Request $request): JsonResponse
    {
        try {
            $this->service->update($group, $request->all());
            return response()->json(['data' => "Atualizado com sucesso!"], Response::HTTP_OK);
        
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function destroy(Groups $group): JsonResponse
    {
        try {
            $this->service->delete($group);
            return response()->json(['data' => "Exclusão com sucesso!"], Response::HTTP_OK);
        
        } catch (\Exception $e) {
            return response()->json(['errors' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}