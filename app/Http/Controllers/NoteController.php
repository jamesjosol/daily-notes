<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Carbon\Carbon;

class NoteController extends Controller
{
    public function index() {
        $notes = Note::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('pages.dashboard', compact('notes'));
    }

    public function newNote() {
        $today = date("m/d/Y");

        if($note = Note::where('title', $today)->where('user_id', auth()->user()->id)->first()) {
            return redirect()->route('open', ['note' => $note])->with('Notice', "Existing note opened.");
        } 

        return view('pages.new', ["today"=>$today]);
    }


    public function updateNote(Note $note, Request $request) {

        $note->update($request->all());

        return redirect()->route('updateNote', ['note' => $note->id])->with('Message', "Note $note->title saved.");
    }

    public function storeNote(Request $request) {
        $today = date("m/d/Y");
        $note = Note::create([
            'user_id'   => auth()->user()->id,
            'title'     => $today,
            'content'   => $request->content
        ]);
        
        return redirect()->route('open', ['note' => $note->id])->with('Message', "Note saved.");
    }

    public function openNote(Note $note) {
        return view('pages.note', compact('note'));
    }
    
    public function search(Request $request){
        $search = $request->input('search');

        $notes = Note::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('content', 'LIKE', "%{$search}%")
            ->where(function($query) {
                $query->where('user_id', auth()->user()->id);
            })
            ->get();
    
        return view('pages.search', compact('notes'));
    }
}
