<?php

namespace App\Domain\Cities\Services;

use App\Domain\Cities\Entities\Cities;
use Illuminate\Database\Eloquent\Collection;

class CitiesService
{
    private Cities $entities;

    public function __construct()
    {
        $this->entities = new Cities();
    }

    public function get(): Collection
    {
        return $this->entities->with('group')
            ->orderBy('id', 'desc')
            ->get();
    }

    public function create(array $request): Cities
    {
        $city = $this->entities;
        $city->fill($request);
        $city->save();

        return $city;
    }

    public function update(Cities $city, array $request): Cities
    {
        $city->fill($request);
        $city->update();

        return $city;
    }

    public function delete(Cities $city): Cities
    {
        $city->delete();
        
        return $city;
    }
}