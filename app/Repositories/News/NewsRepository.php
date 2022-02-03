<?php

namespace App\Repositories\News;

use App\Models\News;
use Illuminate\Pagination\LengthAwarePaginator;

class NewsRepository
{
    protected News $model;

    public function __construct(News $news)
    {
        $this->model = $news;
    }

    public function findById(int $category_id): News
    {
        return News::make(
            $this->model::find($category_id));
    }

    public function findAllPaginated(): LengthAwarePaginator
    {
        return $this->model::query()->paginate();
    }

    public function getAll()
    {
        return $this->model::all();
    }
}
