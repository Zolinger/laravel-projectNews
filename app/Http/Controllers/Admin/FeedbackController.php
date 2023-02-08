<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\QueryBuilders\FeedbackQueryBuilder;
use App\Http\Requests\Admin\FeedbackRequest;


class FeedbackController extends Controller
{   
    
    /**
     * Display a listing of the resource.
     * @param FeedbackQueryBuilder $feedbackQueryBuilder
     * @return View
     */
    public function index(FeedbackQueryBuilder $feedbackQueryBuilder): View
    {
        return \view('admin.feedback.index', ['feedbackList' => $feedbackQueryBuilder->getAll()
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
     * @param FeedbackRequest $request
     * @return RedirectResponse
     */
    public function store(FeedbackRequest $request): RedirectResponse
    {
        $feedback = Feedback::create($request->validated());

        if ($feedback) {
            return \redirect()->route('admin.feedback.index')->with('success', __('messages.admin.feedback.success'));
        }

        return \back()->with('error', __('messages.admin.feedback.fail'));
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
     * @param  Feedback  $feedback
     * @return Response
     */
    public function destroy(Feedback $feedback): JsonResponse
    {
        try{
            $feedback->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', 400);
        }
    }
}
