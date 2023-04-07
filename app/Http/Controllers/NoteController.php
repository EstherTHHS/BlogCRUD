<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::all();
        return view("Note.noteList", compact('notes'));
    }

    public function create()
    {
        return view("Note.addNote");
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'note' => 'required'
        ]);
        Note::create([
            "title" => $request->title,
            "note" => $request->note
        ]);
        return redirect()->route('note.index');
    }

    public function edit(Note $note)
    {

        return view("Note.editNote", compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required',
            'note' => 'required'
        ]);
        $note->update($request->all());
        return redirect()->route("note.index");
    }

    public function show(Note $note)
    {
        return view("Note.showNote", compact('note'));
    }
    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route("note.index");
    }
}
