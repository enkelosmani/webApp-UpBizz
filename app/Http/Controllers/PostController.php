<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Content;
use App\Models\Post;
use App\Services\ContentService;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected PostService $postService;
    protected ContentService $contentService;
    protected ContentController $contentController;

    public function __construct(
        PostService $postService,
        ContentService $contentService,
        ContentController $contentController
    ) {
        $this->postService = $postService;
        $this->contentService = $contentService;
        $this->contentController = $contentController;
    }

    public function index()
    {
        $posts = $this->postService->with('content')->latest()->paginate(5);
        return view('posts.index')->with('posts', $posts);
    }

    public function create()
    {
        $contents = $this->contentService->all();
        return view('posts.create')->with('contents', $contents);
    }

    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->user_id = $request->input('user_id', auth()->id());
        $post->save();

        if ($request->hasFile('image')) {
            $this->contentController->store($request, $post->id);
        }

        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    public function show(Post $post)
    {
        $post->load('content');
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        \Gate::authorize('update-post', $post);
        return view('posts.edit')->with('posts', $post);;
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        \Gate::authorize('update', $post);

        $post->title = $request->title;
        $post->save();

        if ($request->hasFile('image')) {
            $content = $post->content()->firstOrNew();
            $this->contentController->update($request, $content);
        }

        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}
