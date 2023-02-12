<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\View\View;
use App\Enums\IsAdminStatus;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\News\EditRequest;
use App\QueryBuilders\UserQueryBuilder;
use App\Http\Requests\Admin\UserRequest;


class UserController extends Controller
{
     
    /**
     * Display a listing of the resource.
     * @param UserQueryBuilder $feedbackQueryBuilder
     * @return View
     */
    public function index(UserQueryBuilder $userQueryBuilder): View
    {
        return \view('admin.users.index', ['usersList' => $userQueryBuilder->getAll()
    ]);
    }

    /**
     * Show the form for creating a new resource.
      * /
      */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function store(UserRequest $request): RedirectResponse
    {
        $users = User::create($request->validated());

        if ($users) {
            return \redirect()->route('admin.users.index')->with('success', __('messages.admin.users.success'));
        }

        return \back()->with('error', __('messages.admin.users.fail'));
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
     * @param User $user
     * @param UserQueryBuilder $userQueryBuilder
     * @return View
     */
    public function edit(User $user, UserQueryBuilder $userQueryBuilder): View
    {
        return \view('admin.users.edit', [
            'user' => $user,
            'is_admin' => IsAdminStatus::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(EditRequest $request, User $user): RedirectResponse
    {
        $user = $user->fill($request->validated());
        if ($user->save()) {
            $user->users()->sync($request->getUsersIds());
            return \redirect()->route('admin.users.index')->with('success', 'Статус пользователя успешно обновлен');
        }

        return \back()->with('error', 'Не удалось обновить статус');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return Response
     */
    public function destroy(User $user): JsonResponse
    {
        try{
            $user->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', 400);
        }
    }
}
