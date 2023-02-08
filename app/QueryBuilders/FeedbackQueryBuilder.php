<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\Feedback;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

final class FeedbackQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Feedback::query();
    }

    public function getAll(): Collection
    {
        return $this->model->get();
    }
}