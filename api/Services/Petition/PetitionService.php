<?php

namespace Api\Services\Petition;

use Api\Http\Requests\PetitionRequest;
use Illuminate\Support\Facades\DB;

class PetitionService
{
    public function create(PetitionRequest $request)
    {
       // return DB::transaction();
    }

    public function show($petition_id)
    {
        // return DB::transaction();
    }

}
