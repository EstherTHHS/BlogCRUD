<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:notelist', ['only' => ['index']]);
        $this->middleware('permission:noteCreate', ['only' => ['create']]);
        $this->middleware('permission:noteEdit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:noteDelete', ['only' => ['destory']]);
        $this->middleware('auth');
    }
    public function index()
    {
        $notes = Note::all();
        return view("backend.Note.noteList", compact('notes'));
    }

    public function create()
    {
        return view("backend.Note.addNote");
    }

    public function store(NoteRequest $request)
    {
        $data = $request->validated();
        Note::create($data);
        return redirect()->route('note.index');
    }

    public function edit(Note $note)
    {

        return view("backend.Note.editNote", compact('note'));
    }

    public function update(NoteRequest $request, Note $note)
    {
        $data = $request->validated();
        $note->update($data);
        return redirect()->route("note.index");
    }

    public function show(Note $note)
    {
        return view("backend.Note.showNote", compact('note'));
    }
    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route("note.index");
    }
}
