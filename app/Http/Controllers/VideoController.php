<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\videos;

class VideoController extends Controller
{
    // Display a listing of videos
    public function index()
    {
        $videos = videos::all();
        return view('videos.index', compact('videos'));
    }

    // Show the form for creating a new video
    public function create()
    {
        return view('videos.create');
    }

    // Store a newly created video
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'filename' => 'required|string|max:255',
            'size' => 'required|integer',
            'author' => 'required|string|max:255',
        ]);
        $video = videos::create($validated);
        if ($video) {
            return redirect()->route('videos.index')->with('success', 'Video created successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to create video.');
        }
    }

    // Display the specified video
    public function show($id)
    {
        $video = videos::findOrFail($id);
        return view('videos.show', compact('video'));
    }

    // Show the form for editing the specified video
    public function edit($id)
    {
        $video = videos::findOrFail($id);
        return view('videos.edit', compact('video'));
    }

    // Update the specified video
    public function update(Request $request, $id)
    {
        $video = videos::findOrFail($id);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'filename' => 'required|string|max:255',
            'size' => 'required|integer',
            'author' => 'required|string|max:255',
        ]);
        $video->update($validated);
        return redirect()->route('videos.index')->with('success', 'Video updated successfully!');
    }

    // Remove the specified video
    public function destroy($id)
    {
        $video = videos::findOrFail($id);
        $video->delete();
        return redirect()->route('videos.index')->with('success', 'Video deleted successfully!');
    }
}
