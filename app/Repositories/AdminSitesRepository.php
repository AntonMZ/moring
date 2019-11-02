<?php

namespace App\Repositories;

use App\Models\Sites;

class AdminSitesRepository extends Repository
{
    public function getList()
    {
        return Sites::all();
    }

    public function store (array $fillable)
    {
        $result = (new Sites())->create($fillable);
        return $result;
    }

    public function show($request)
    {
        return $site = Sites::find($request->site);
    }

    public function update($request, int $id)
    {
        $site = Sites::find($id);
        $result = $site->update($request);
        return $result;
    }
}