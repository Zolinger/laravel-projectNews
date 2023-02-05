<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\News_Source;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

final class NewsSourcesQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = News_Source::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }
}
