<?php

namespace App\Http\Controllers;

use App\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = "Newletter Subscribers List";
        $newsletters = Newsletter::all();
        return view('admin.newsletters.index')
                    ->with([
                        'pageTitle' => $pageTitle,
                        'newsletters' => $newsletters,
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
        Newsletter::destroy($id);
        return redirect()->route('admin.newsletters.index')
                            ->with([
                                'success' => 'true',
                                'message' => "Newletter Subscriber's email deleted Successfully."
                            ]);
    }
}
