<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;


class NewsController extends Controller
{
    use NewsTrait;

    public function indexCategory()
    {
        return \view('category.index', [
            'category' => $this->getCategory(),
        ]);
    }

    public function showCategory()
    {
        return \view('category.show', [
            'category' => $this->getCategory(),
        ]);
    }

    public function indexNews(): View
    {
        return \view('news.index', [
            'news' => $this->getNews(),
        ]);
    }

    public function showNews(int $id): View
    {
        return \view('news.show', [
            'news' => $this->getNews($id),
        ]);
    }
}