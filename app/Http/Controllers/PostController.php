<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts = Post::latest()->filter(request(['tag', 'search']))->paginate(12);

        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        $this->authorize('create-post', $user);

        return view('pages.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create-post', $request->user);

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'tags' => ['required'],
            'description' => ['required'],
            'city' => ['required'],

        ]);
        $post = Post::create([
            'title' => $request->title,
            'tags' => $request->tags,
            'description' => $request->description,
            'user_id' => $request->user()->id,
            'city' => $request->city,
        ]);
        $post->save();
        $notification = array(
            'message' => 'Post Added Successfully!',
            'alert-type' => 'success'
        );

        return redirect('posts/company-posts')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('pages.show', compact('post'));
    }

    public function viewCompanyPosts()
    {
        $posts = Post::latest()->where('user_id', '=', Auth::user()->id)->get();

        return view('pages.show-company-posts', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {

        $this->authorize('edit-post', $post);

        return view('pages.edit', compact('post'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('edit-post', $post);

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'tags' => ['required'],
            'description' => ['required'],

        ]);
        $post->update([
            'title' => $request->title,
            'tags' => $request->tags,
            'description' => $request->description,
            'user_id' => $request->user()->id,
        ]);

        $notification = array(
            'message' => 'Post Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect('posts/company-posts')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete-post', $post);

        $post->delete();
        $notification = array(
            'message' => 'Post Deleted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
