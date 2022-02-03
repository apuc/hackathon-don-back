<?php

namespace Api\Services\Petition;

use Api\Http\Requests\v1\AddressRequest;
use Api\Http\Requests\v1\User\UserProfileRequest;
use Api\Http\Requests\v1\User\UserRequest;
use Api\Http\Requests\v1\User\UserRolesRequest;
use App\Models\Address;
use App\Models\User;
use App\Repositories\AddressRepository;
use App\Repositories\User\UserProfileRepository;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRolesRepository;
use Illuminate\Support\Facades\DB;

class UserService
{
    protected UserRepository $userRepository;
    protected AddressRepository $addressRepository;
    protected UserProfileRepository $userProfileRepository;
    protected UserRolesRepository $userRolesRepository;

    public function __construct(
        UserRepository        $userRepository,
        AddressRepository     $addressRepository,
        UserProfileRepository $userProfileRepository,
        UserRolesRepository   $userRolesRepository
    ){
        $this->userRepository = $userRepository;
        $this->addressRepository = $addressRepository;
        $this->userProfileRepository = $userProfileRepository;
        $this->userRolesRepository = $userRolesRepository;
    }

    public function create(UserRequest $request): User
    {
        return DB::transaction(function () use ($request){
            $user = $this->storeUser($request);
            $this->storeProfile($request, $user->id);
            $this->storeRoles($request, $user->id);

            return $user;
        });
    }

    private function storeRoles($request, $user_id): void
    {
        if (!empty($request['roles'])) {
            foreach ($request['roles'] as $role)
            {
                $data = $role;
                $data['user_id'] = $user_id;

                $userRolesRequest = new UserRolesRequest();
                $userRolesRequest->merge($data);

                $this->userRolesRepository->create($userRolesRequest);
            }
        }
    }

    private function storeProfile($request, $user_id): void
    {
        if (!empty($request['fio'])) {

            $addressId = null;
            if(!empty($request['address']))
            {
                $address = $this->storeAddress($request['address']);
                $addressId = $address->id;
            }


            $path = null;
            if (!empty($request['photo'])) {
                $path = $this->storePhoto($request);
            }

            $profileRequest = new UserProfileRequest();
            $profileRequest->merge([
                'address_id' => $addressId,
                'user_id' => $user_id,
                'photo' => $path,
                'fio' => $request['fio']
            ]);

            $this->userProfileRepository->create($profileRequest);
        }
    }

    private function storePhoto($request)
    {
        return $request->file('photo')->store('uploads', 'public');
    }

    private function storeUser($request): ?User
    {
        return $this->userRepository->create($request);
    }

    private function storeAddress($data): ?Address
    {
        $addressRequest = new AddressRequest();
        $addressRequest->merge($data);

        return $this->addressRepository->create($addressRequest);
    }
}
