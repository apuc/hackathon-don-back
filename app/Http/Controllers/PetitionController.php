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

    public function index()
    {
        $petitions = Petition::paginate();

        return view('petition.index', compact('petitions'))
            ->with('i', (request()->input('page', 1) - 1) * $petitions->perPage());
    }


    public function create()
    {
        $petition = new Petition();
        $users = User::pluck('name', 'id');
        $address = Address::pluck('explanation', 'id');

        return view('petition.create', compact('petition', 'users', 'address'));
    }


    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
//        request()->validate(Petition::$rules);

        $petition = Petition::create($request->all());

        return redirect()->route('petitions.index')
            ->with('success', 'Petition created successfully.');
    }


    public function show($id)
    {
        $petition = Petition::find($id);

        return view('petition.show', compact('petition'));
    }

    public function edit($id)
    {
        $petition = Petition::find($id);
        $users = User::pluck('name', 'id');
        $address = Address::pluck('explanation', 'id');

        return view('petition.edit', compact('petition', 'users', 'address'));
    }


    public function update(Request $request, Petition $petition): \Illuminate\Http\RedirectResponse
    {
//        request()->validate(Petition::$rules);

        $petition->update($request->all());

        return redirect()->route('petitions.index')
            ->with('success', 'Petition updated successfully');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $petition = Petition::find($id)->delete();

        return redirect()->route('petitions.index')
            ->with('success', 'Petition deleted successfully');
    }
}
