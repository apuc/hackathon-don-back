<?php

namespace App\Http\Controllers;

use App\Models\IncidentCategory;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Class NewsController
 * @package App\Http\Controllers
 */
class NewsController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $news = News::paginate();

        return view('news.index', compact('news'))
            ->with('i', (request()->input('page', 1) - 1) * $news->perPage());
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $news = new News();
        $users = User::pluck('name', 'id');
        $categories = IncidentCategory::pluck('title', 'id');
        return view('news.create', compact('news', 'users', 'categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $path = $request->file('media')->store('uploads/news', 'public');
//        echo "<pre>";
//        print_r($request->file('media')->);echo "</pre>";die();
//        $news = News::create($request->all());
        $new = new News($request->all());
        $new->media = $path;
        if ($new->save())
        return redirect()->route('news.index')
            ->with('success', 'News created successfully.');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $news = News::find($id);

        return view('news.show', compact('news'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $news = News::find($id);
        $users = User::pluck('name', 'id');
        $categories = IncidentCategory::pluck('title', 'id');

        return view('news.edit', compact('news', 'users', 'categories'));
    }

    /**
     * @param Request $request
     * @param News $news
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, News $news)
    {
        $news->update($request->all());

        return redirect()->route('news.index')
            ->with('success', 'News updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $news = News::find($id)->delete();

        return redirect()->route('news.index')
            ->with('success', 'News deleted successfully');
    }
}
