<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Enums\NewsStatus;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\News\EditRequest;
use App\Http\Requests\News\CreateRequest;
use App\QueryBuilders\CategoriesQueryBuilder;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param CategoriesQueryBuilder $categoriesQueryBuilder
     * @return View
     */
    public function index(CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        return \view('admin.categories.index', ['categoriesList' => $categoriesQueryBuilder->getAll()
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param CategoriesQueryBuilder $categoriesQueryBuilder
     * @return View
     */
    public function create(CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        return \view('admin.categories.create', [
            'categories' => $categoriesQueryBuilder->getAll(),
            'statuses' => NewsStatus::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $news = Category::create($request->validated());

        if ($news) {
            $news->categories()->attach($request->getCategoryIds());
            return \redirect()->route('admin.categories.index')->with('success', __('messages.admin.category.success'));
        }

        return \back()->with('error', __('messages.admin.category.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category  $category
     * @param CategoriesQueryBuilder $categoriesQueryBuilder
     * @return View
     */
    public function edit(Category $category, CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        return \view('admin.categories.edit', [
            'category' => $category,
            'categories' => $categoriesQueryBuilder->getAll(),
            'statuses' => NewsStatus::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
      * @param EditRequest $request
     * @param Category  $category
     * @return RedirectResponse
     */
    public function update(EditRequest $request, Category $category): RedirectResponse
    {
        $news = $category->fill($request->validated());
        if ($category->save()) {
            $category->categories()->sync($request->getCategoryIds());
            return \redirect()->route('admin.categories.index')->with('success', 'Новость успешно обновлена');
        }

        return \back()->with('error', 'Не удалось сохранить запись');
    }

    /**
     * Remove the specified resource from storage.
     *
    * @param Category $category
     * @return Response
     */
    public function destroy(Category $category): JsonResponse
    {
        try{
            $category->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', 400);
        }
    }
}
