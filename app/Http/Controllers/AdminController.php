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

}
