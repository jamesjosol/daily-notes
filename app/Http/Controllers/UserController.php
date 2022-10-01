<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // 
    }

    public function profile(User $user)
    {
        // return redirect()->back()->with("Notice", "Under Development.");
        return view('pages.profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // abort(503);


        $user = User::find(auth()->user()->id);
        if(empty($request->get('current_password')) && empty($request->get('new_password'))) {
            $user->update($request->except('current_password'));
            return redirect()->route('dashboard')->with('Message', "Profile has been successfully updated.");
        } else {
            $request->validate([
                'current_password'         => 'string',
                'new_password'             => 'required|string|min:5|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation'    => 'required|string|min:5',
            ]);
            if (Hash::check($request->current_password, $user->password)) {
                $user->password = bcrypt($request->new_password);
                $user->save();
                return redirect()->route('dashboard')->with('Message', "Password has been successfully updated.");
            }
            throw ValidationException::withMessages(['current_password' => 'Current password is incorrect.']);
        }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
