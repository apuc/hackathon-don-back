<?php

namespace App\Repositories\Petition;

use Api\Http\Requests\v1\PetitionRequest;
use App\Models\Petition;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Foundation\Http\FormRequest;

class PetitionRepository
{
    protected Petition $model;

    public function __construct(Petition $petition)
    {
        $this->model = $petition;
    }

    public function findById(int $id): Petition
    {
        return $this->model->find($id);
    }

    public function findByUserId(int $user_id)
    {
        return $this->model::where('user_id','=', $user_id)->get();
    }

    public function findByPhonePaginated(string $phone): LengthAwarePaginator
    {
        return Petition::query()->where('phone', '=', $phone)->paginate();
    }

    public function create(FormRequest $request): ?Petition
    {
        $this->model->fill($request->all());

        if ($this->model->save()) {
            return $this->model;
        }
        throw new \DomainException('Saving error');
    }
}
