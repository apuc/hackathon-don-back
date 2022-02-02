<?php

namespace Api\Repositories;

use App\Models\News;

class NewsRepository
{
    protected $model;

    /**
     * @param News $news
     */
    public function __construct(News $news)
    {
        $this->model = $news;
    }

    /**
     * @param int $category_id
     * @return mixed
     */
    public function findById(int $category_id)
    {
        return News::make(
            $this->model::find($category_id));
    }

    /**
     * @return News[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->model::all();
    }
}
