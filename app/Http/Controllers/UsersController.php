<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequests;
use App\Http\Requests\UpdatePasswordRequest;
use App\Profile;
use App\Rules\ValidatePhoneNumber;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $pageTitle = "Users List";
        return view('admin.users.index')
                    ->with([
                        'pageTitle' => $pageTitle,
                        'users' => $users,
                    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTitle = "Add New User";
        return view('admin.users.create')
                    ->with([
                        'pageTitle' => $pageTitle,
                    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        $post = Profile::create([
            'user_id' => $user->id,
        ]);

        return redirect()
                    ->route('admin.users.index')
                    ->with([
                        'success' => 'true',
                        'message' => 'User added Successfully.'
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
        $user = User::findOrFail($id);
        $pageTitle = "Showing User";
        return view('admin.users.show')
                    ->with([
                        'pageTitle' => $pageTitle,
                        'user' => $user,
                    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $pageTitle = "Editing User";
        return view('admin.users.edit')
                    ->with([
                        'pageTitle' => $pageTitle,
                        'user' => $user,
                    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequests $request, $id)
    {
        $request->validate([
            'cell_number' => ['nullable', new ValidatePhoneNumber],
        ]);
        User::where('id', $id)
                ->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                ]);
        Profile::where('user_id', $id)
                ->update([
                    'role' => $request->input('role'),
                    'national_id' => $request->input('national_id'),
                    'cell_number' => $request->input('cell_number'),
                    'address' => $request->input('address'),
                    'bio' => $request->input('bio'),
                    'facebook' => $request->input('facebook'),
                    'twitter' => $request->input('twitter'),
                    'linkedin' => $request->input('linkedin'),
                ]);
        if($request->has('password') && $request->input('password')){
            User::where('id', $id)
                    ->update([
                        'password' => bcrypt($request->input('password'))
                    ]);
        }
        if($request->hasFile('avatar')){
            $profile = Profile::find($id);
            $profile->clearMediaCollection('avatar');

            $profile->addMediaFromRequest('avatar')
             ->toMediaCollection('avatar');
        }
        return back()
                    ->with([
                        'success' => 'true',
                        'message' => 'User updated Successfully.'
                    ]);
    }

    public function password(UpdatePasswordRequest $request, $id)
    {
        if($request->has('password') && $request->input('password')){
            User::where('id', $id)
                    ->update([
                        'password' => bcrypt($request->input('password'))
                    ]);
        }
        return back()
                    ->with([
                        'success' => 'true',
                        'message' => 'Password updated Successfully.'
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
        $user = User::where('id', $id)
                    ->update([
                        'name' => "Admin",
                        'email' => "admon@zhrmp.org",
                        'password' => "NoValidPassword"
                    ]);
        Profile::where('user_id', $id)
                ->update([
                    'role' => 'moderator',
                    'national_id' => '',
                    'cell_number' => '',
                    'bio' => '',
                    'address' => '',
                    'facebook' => '',
                    'twitter' => '',
                    'linkedin' => '',
                ]);
       return redirect()
                    ->route('admin.users.index')
                    ->with([
                        'success' => 'true',
                        'message' => 'User deactived Successfully.  The user can no longer login.'
                    ]);
    }
}
