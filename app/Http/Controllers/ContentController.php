<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Services\ContentService;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    protected ContentService $contentService;

    public function __construct(ContentService $contentService)
    {
        $this->contentService = $contentService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contents = $this->contentService->all();
        return view('content.index')->with('contents', $contents);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.create');
    }

    /**
     * Store a newly created content resource in storage.
     */
    public function store(Request $request, $postId)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');

            $content = new Content();
            $content->post_id = $postId;
            $content->data = $path;
            $content->save();

            return $content;
        }

        return null;
    }

    /**
     * Display the specified resource.
     */
    public function show(Content $content)
    {
        return view('content.show')->with('contents', $content);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Content $content)
    {
        return view('content.edit', compact('content'));
    }

    /**
     * Update the specified content resource in storage.
     */
    public function update(Request $request, Content $content)
    {
        // Validate the image
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');

            $content->data = $path;
            $content->save();

            return $content;
        }

        return $content;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {
        $content->delete();
        return redirect()->route('content.index')->with('success', 'Content deleted successfully');
    }
}
