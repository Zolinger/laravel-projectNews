<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return \view('news.index', [
            'news' => $this->getNews(),
        ]);
    }

    public function indexNews()
    {
        return \view('news.index', [
            'news' => $this->getNews(),
        ]);
    }

    public function showNews(int $id)
    {
        return $this->getNews($id);
    }
}