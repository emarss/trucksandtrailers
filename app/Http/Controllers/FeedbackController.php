<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "User Feedback List";
        $feedbackMessages = Feedback::all();
        return view('admin.feedback.index')
                    ->with([
                        'pageTitle' => $pageTitle,
                        'feedbackMessages' => $feedbackMessages,
                    ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pageTitle = "Showing User Feedback";
        $feedback = Feedback::find($id);
        return view('admin.feedback.show')
                    ->with([
                        'pageTitle' => $pageTitle,
                        'feedback' => $feedback,
                    ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Feedback::destroy($id);
        return redirect()->route('admin.feedback.index')
                            ->with([
                                'success' => 'true',
                                'message' => "Feedback message deleted Successfully."
                            ]);
    }
}
