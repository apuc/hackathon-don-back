<?php

namespace Api\Repositories\Petition;


use Api\Http\Requests\v1\AddressRequest;
use App\Models\Address;

class AddressRepository
{
    protected $model;

    public function __construct(Address $address)
    {
        $this->model = $address;
    }

    public function create(AddressRequest $request)//: Address
    {
        $this->model->fill($request->all());

        if ($this->model->save()) {
            return $this->model;
        }
        else {
            throw new \DomainException('Saving error');
        }
    }
}
