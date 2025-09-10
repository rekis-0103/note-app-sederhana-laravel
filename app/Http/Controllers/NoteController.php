<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @method void authorize(string $ability, mixed $arguments = [])
 */
class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::where('user_id', Auth::id())->get();
        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        Note::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect()->route('notes.index')->with('success', 'Note berhasil ditambahkan!');
    }

    public function edit(Note $note)
    {
        $this->authorize('update', $note);
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        $this->authorize('update', $note);

        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $note->update($request->only('title', 'content'));

        return redirect()->route('notes.index')->with('success', 'Note berhasil diupdate!');
    }

    public function destroy(Note $note)
    {
        $this->authorize('delete', $note);
        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Note berhasil dihapus!');
    }
}
