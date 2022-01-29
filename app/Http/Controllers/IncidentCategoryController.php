<?php

namespace App\Http\Controllers;

use App\Http\Requests\IncidentCategoryRequest;
use App\Models\IncidentCategory;
use Illuminate\Http\Request;

/**
 * Class IncidentCategoryController
 * @package App\Http\Controllers
 */
class IncidentCategoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $incidentCategories = IncidentCategory::paginate();

        return view('incident-category.index', compact('incidentCategories'))
            ->with('i', (request()->input('page', 1) - 1) * $incidentCategories->perPage());
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $incidentCategory = new IncidentCategory();
        return view('incident-category.create', compact('incidentCategory'));
    }

    /**
     * @param IncidentCategoryRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(IncidentCategoryRequest $request)
    {
        $incidentCategory = IncidentCategory::create($request->all());

        return redirect()->route('incident-categories.index')
            ->with('success', 'IncidentCategory created successfully.');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $incidentCategory = IncidentCategory::find($id);

        return view('incident-category.show', compact('incidentCategory'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $incidentCategory = IncidentCategory::find($id);

        return view('incident-category.edit', compact('incidentCategory'));
    }

    /**
     * @param IncidentCategoryRequest $request
     * @param IncidentCategory $incidentCategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(IncidentCategoryRequest $request, IncidentCategory $incidentCategory)
    {
        $incidentCategory->update($request->all());

        return redirect()->route('incident-categories.index')
            ->with('success', 'IncidentCategory updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $incidentCategory = IncidentCategory::find($id)->delete();

        return redirect()->route('incident-categories.index')
            ->with('success', 'IncidentCategory deleted successfully');
    }
}
