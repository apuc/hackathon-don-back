<?php

namespace Api\Services\Petition;

use Api\Http\Requests\v1\AddressRequest;
use Api\Http\Requests\v1\UserProfileRequest;
use Api\Http\Requests\v1\UserRequest;
use Api\Http\Requests\v1\UserRolesRequest;
use App\Repositories\AddressRepository;
use App\Repositories\User\UserProfileRepository;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRolesRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class UserService
{
    protected $userRepository;
    protected $addressRepository;
    protected $userProfile;
    protected $userRolesRepository;

    public function __construct(
        UserRepository $userRepository,
        AddressRepository $addressRepository,
        UserProfileRepository $userProfile,
        UserRolesRepository $userRolesRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->addressRepository = $addressRepository;
        $this->userProfile = $userProfile;
        $this->userRolesRepository = $userRolesRepository;
    }

    public function show($user_id)
    {
        return $this->userRepository->show($user_id);
    }

    public function create(UserRequest $request)
    {
        return DB::transaction(function () use ($request){

            $address = $this->storeAddress($request['address']);

            $user = $this->storeUser($request);

            if (!empty($request['fio'])) {

                $path = null;
                if (!empty($request['photo'])) {
                    $path = $this->storePhoto($request);
                }
                $profile = $this->storeProfile($address->id, $user->id, $request['fio'], $path);
            }

            if (!empty($request['roles'])) {
                $roles = $this->storeRoles($request['roles'], $user->id);
            }

            return  $user;
        });
    }

    private function storeRoles($roles, $user_id)
    {
        $rolesArr = array();
        foreach ($roles as $role)
        {
            $data = $role;
            $data['user_id'] = $user_id;

            $userRolesRequest = new UserRolesRequest();
            $userRolesRequest->merge($data);

            $rolesArr[] = $this->userRolesRepository->create($userRolesRequest);
        }
        return $rolesArr;
    }

    private function storeProfile($address_id, $user_id, $fio, $path=null)
    {
        $data = ['address_id' => $address_id, 'user_id' => $user_id, 'photo' => $path, 'fio' => $fio];

        $profileRequest = new UserProfileRequest();
        $profileRequest->merge($data);

        return $this->userProfile->create($profileRequest);
    }

    private function storePhoto($request)
    {
        return $request->file('photo')->store('uploads', 'public');
    }

    private function storeUser($request)
    {
        return $this->userRepository->create($request);
    }

    private function storeAddress($data)
    {
        $addressRequest = new AddressRequest();
        $addressRequest->merge($data);

        return $this->addressRepository->create($addressRequest);
    }
}
