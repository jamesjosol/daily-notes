<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $notes = Note::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('pages.admin.dashboard', compact('notes'));
    }


    public function users() {
        $users = User::get();
        return view('pages.admin.users', compact('users'));
    }

    public function getUser(User $user) {
        return view('pages.admin.user', compact('user'));
    }

    public function notes() {
        $notes = Note::orderBy('created_at', 'desc')->get();
        return view('pages.admin.notes', compact('notes'));
    }

    public function Usernotes(User $user) {
        $notes = Note::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        return view('pages.admin.usernotes', compact('notes'));
    }

    public function updateUser(Request $request, User $user) {
        if(empty($request->get('new_password'))) {

            $user->update($request->except(['new_password']));
            return redirect()->route('admin.user', $user)->with('Message', "User $user->name has been updated.");

        } else {

            $request->validate([
                'new_password'             => 'required|string|min:5|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation'    => 'required|string|min:5',
            ]);
            
            $user->update($request->all());
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->route('admin.user', $user)->with('Message', "User $user->name has been updated.");
        
        }
    }

}
