<?php

namespace Api\Repositories;

use App\Models\News;

class NewsRepository
{
    protected $model;

    public function __construct(News $news)
    {
        $this->model = $news;
    }

    public function findById(int $category_id)
    {
        return News::make(
            $this->model::find($category_id));
    }

    public function getAll()
    {
        return $this->model::all();
    }
}
