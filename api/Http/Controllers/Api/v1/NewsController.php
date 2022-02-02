<?php

namespace Api\Http\Controllers\Api\v1;

use Api\Repositories\NewsRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class NewsController extends Controller
{
    protected $newsRepository;

    /**
     * @param NewsRepository $news
     */
    public function __construct(NewsRepository $news)
    {
        $this->newsRepository = $news;
    }

    /**
     * @param null $category_id
     * @return JsonResponse
     */
    public function show($category_id = null): JsonResponse
    {
        if(!empty($category_id)) {
            $news = $this->newsRepository->findById($category_id);
        }
        else {
            $news = $this->newsRepository->getAll();
        }

        if (empty($news)) {
            return response()->json('News not found', 404);
        }

        return response()->json(['success' => true,
            'data' => $news
        ]);
    }
}
