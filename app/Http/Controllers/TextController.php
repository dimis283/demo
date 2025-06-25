<?php

namespace App\Http\Controllers;

use App\Models\Text;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TextController extends Controller
{
  public function __construct()
{
  //  $this->middleware('auth');
    // Add other middleware as needed
}
    
    /**
     * Display a listing of the texts.
     */
    public function index(): View
    {
        $texts = Text::orderBy('order')->get();;
    
        return view('texts.index', compact('texts'));
    }

    /**
     * Show the form for editing the specified text.
     */
    public function edit(Text $text): View
    {
        return view('texts.edit', compact('text'));
    }

    /**
     * Update the specified text in storage.
     */
    public function update(Request $request, Text $text): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'slug' => 'required|string|max:255|unique:texts,slug,' . $text->id,
        ]);

        $text->update($validated);

        return redirect()
            ->route('texts.index')
            ->with('success', 'Το κείμενο "' . $text->title . '" ενημερώθηκε επιτυχώς!');
    }
    public function sort(Request $request)
{
    $request->validate([
        'ids' => 'required|array',
        'ids.*' => 'exists:texts,id',
    ]);

    foreach ($request->ids as $index => $id) {
        Text::where('id', $id)->update(['order' => $index + 1]);
    }

    return response()->json(['success' => true]);
}
}