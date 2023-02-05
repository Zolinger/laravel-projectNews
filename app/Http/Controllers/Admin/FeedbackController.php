<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\QueryBuilders\FeedbackQueryBuilder;

class FeedbackController extends Controller
{   
    
    /**
     * Display a listing of the resource.
     * @param FeedbackQueryBuilder $feedbackQueryBuilder
     * @return View
     */
    public function index(FeedbackQueryBuilder $feedbackQueryBuilder): View
    {
        return \view('admin.feedback.index', ['feedbackList' => $feedbackQueryBuilder->getFeedbackWithPagination()
    ]);
    }

    /**
     * Show the form for creating a new resource.
      * @param FeedbackQueryBuilder $feedbackQueryBuilder
      * @return View
      */
    public function create(FeedbackQueryBuilder $feedbackQueryBuilder): View
    {
        return \view('admin.feedback.create', [
            'feedback' => $feedbackQueryBuilder->getAll(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => 'required',
        ]);
        $feedback = new Feedback($request->except('_token', 'feedback_id')); //Feedback::create();

        if ($feedback->save()) {
            return \redirect()->route('admin.feedback.index')->with('success', 'Отзыв успешно отправлен');
        }

        return \back()->with('error', 'Не удалось отправить отзыв');
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
     * @return View
     */
    public function edit()
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
