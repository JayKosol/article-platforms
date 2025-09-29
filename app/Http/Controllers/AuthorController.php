<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\author;


class AuthorController extends Controller
{
    // Display a listing of authors
    public function index()
    {
        $authors = author::all();
        return view('author.autherIndex', compact('authors'));
    }
    public function create()
    {
        return view('author.autherCreate');
    }

    // Store a newly created author
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'joined_at' => 'nullable|date',
        ]);
        $author = author::create($validated);
        if ($author) {
        return redirect()->route('authors.index')->with('success', 'Author created successfully!');
        } 
        else {
            return redirect()->back()->with('error', 'Failed to create author.');
        }
    }

    // Display the specified author
    public function show($id)
    {
        $author = author::findOrFail($id);
        return view('author.autherUpdate', compact('author'));
    }
    public function edit($id)
{
    $author = author::findOrFail($id);
    return view('author.autherUpdate', compact('author'));
}

    // Update the specified author
    public function update(Request $request, $id)
    {
        $author = author::findOrFail($id);
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'joined_at' => 'nullable|date',
        ]);
        $author->update($validated);
        if($author){
            return redirect()->route('authors.index')->with('success', 'Author updated successfully!');
        }
        else{
            return redirect()->back()->with('error', 'Failed to update author.');
        }
    }

    // Remove the specified author
    public function destroy($id)
    {
        $author = author::findOrFail($id);
        $author->delete();
        if(!$author){
            return redirect()->back()->with('error', 'Failed to delete author.');
        }   
        return redirect()->route('authors.index')->with('success', 'Author deleted successfully!');
    }
}
