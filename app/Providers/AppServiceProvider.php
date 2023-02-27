<?php

declare(strict_types=1);

namespace App\Providers;

use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\FeedbackQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\NewsSourcesQueryBuilder;
use App\QueryBuilders\QueryBuilder;
use App\Services\Contracts\Parser;
use App\Services\Contracts\Social;
use App\Services\ParserServices;
use App\Services\SocialSercice;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(QueryBuilder::class, CategoriesQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, NewsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, NewsSourcesQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, FeedbackQueryBuilder::class);
        //Service
        $this->app->bind(Parser::class, ParserServices::class);
        $this->app->bind(Social::class, SocialSercice::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();
    }
}
