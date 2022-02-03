<?php

namespace Api\Http\Controllers\Api\v1;

use Api\Http\Resources\v1\Collections\NewsResourceCollection;
use App\Http\Controllers\Controller;
use App\Repositories\News\NewsRepository;
use Illuminate\Http\JsonResponse;

class NewsController extends Controller
{
    protected NewsRepository $newsRepository;

    public function __construct(NewsRepository $news)
    {
        $this->newsRepository = $news;
    }

    public function index()
    {
        $news = $this->newsRepository->findAllPaginated();

        return response()->json([
            'success' => true,
            'data'    => new NewsResourceCollection($news)
        ]);
    }

    public function show($category_id): JsonResponse
    {
        $news = $this->newsRepository->findById($category_id);

        if (empty($news)) {
            return response()->json('News not found', 404);
        }

        return response()->json(['success' => true,
            'data' => $news
        ]);
    }
}
