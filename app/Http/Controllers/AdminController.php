<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        $pageTitle = "Dashboard";
        return view('admin.index')
                ->withPageTitle($pageTitle);
    }

    public function profile()
    {
        $pageTitle = "Updating Profile";
        return view('admin.users.edit')
        		->withUser(auth()->user())
                ->withPageTitle($pageTitle);
    }
}
