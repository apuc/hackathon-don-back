<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Petition;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class PetitionController
 * @package App\Http\Controllers
 */
class PetitionController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $petitions = Petition::paginate();

        return view('petition.index', compact('petitions'))
            ->with('i', (request()->input('page', 1) - 1) * $petitions->perPage());
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $petition = new Petition();
        $users = User::pluck('name', 'id');
        $address = Address::pluck('explanation', 'id');

        return view('petition.create', compact('petition', 'users', 'address'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
//        request()->validate(Petition::$rules);

        $petition = Petition::create($request->all());

        return redirect()->route('petitions.index')
            ->with('success', 'Petition created successfully.');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $petition = Petition::find($id);

        return view('petition.show', compact('petition'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $petition = Petition::find($id);
        $users = User::pluck('name', 'id');
        $address = Address::pluck('explanation', 'id');

        return view('petition.edit', compact('petition', 'users', 'address'));
    }

    /**
     * @param Request $request
     * @param Petition $petition
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Petition $petition): \Illuminate\Http\RedirectResponse
    {
//        request()->validate(Petition::$rules);

        $petition->update($request->all());

        return redirect()->route('petitions.index')
            ->with('success', 'Petition updated successfully');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $petition = Petition::find($id)->delete();

        return redirect()->route('petitions.index')
            ->with('success', 'Petition deleted successfully');
    }
}
