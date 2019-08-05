<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostCreateRequest;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Photo;
use App\Category;

class PostsController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth', ['except' => 'post.show']);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();
        return view('post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        $input = $request->all();
        $user = Auth::user();

        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);

            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }

        $user->posts()->create($input);

        $notification = array(
            'message' => 'The post has been successfully created',
            'type' => 'success'
        );

        return redirect('/')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::findBySlugOrFail($slug)->load(['comments.user', 'comments.user.photo']);
        $comments =  $post->comments->groupBy('parent_id');
        $comments['root'] = $comments[''];
        unset($comments['']);

        return view('post', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::pluck('name', 'id')->all();

        $this->authorize('update', $post);

        return view('post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $post = Post::findOrFail($id);

        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);

            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }

        $this->authorize('update', $post);

        $post->update($input);
        // Auth::user()->posts()->whereId($id)->first()->update($input);

        $notification = array(
            'message' => 'The post ' . $id . ' was successfully updated.',
            'type' => 'info'
        );
        return redirect('/')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        unlink(public_path() . $post->photo->file);

        $this->authorize('update', $post);

        $post->delete();

        $notification = array(
            'message' => 'The post ' . $id . ' has been successfully deleted.',
            'type' => 'error'
        );
        return redirect('/')->with($notification);
    }
}
