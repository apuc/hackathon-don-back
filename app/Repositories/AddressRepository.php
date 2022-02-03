<?php

namespace App\Repositories;

use Api\Http\Requests\v1\AddressRequest;
use App\Models\Address;

class AddressRepository
{
    /**
     * @var Address
     */
    protected Address $model;

    /**
     * @param Address $address
     */
    public function __construct(Address $address)
    {
        $this->model = $address;
    }

    /**
     * @param AddressRequest $request
     * @return Address
     */
    public function create(AddressRequest $request): ?Address
    {
        $this->model->fill($request->all());

        if ($this->model->save()) {
            return $this->model;
        }
        throw new \DomainException('Saving error');
    }
}
