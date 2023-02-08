<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if (request('tag')) {

            $post = Tag::where('name', request('tag'))->firstOrfail()->posts;
        } else {

            $post = Post::latest()->get();
        }
        return view('pages.home', ['post' => $post]);
    }
    public function indexAdmin()
    {
        $post = Post::latest()->paginate(8);
        return view('pages.admin', compact('post'))
            ->with('i', (request()->input('page', 1) - 1) * 8);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('pages.create', ['tags' => $tags]);
    }

    public function store1(Request $request)
    {
        $this->ValidatePost();

        $name = time() . '.' . $request->image->extension();
        $path = $request->image->move(public_path('images'), $name);

        $post = new Post(request(['title', 'exerpt', 'image', 'body']));

        $post->auth()->id();

        $post->tags()->attach(request('tags'));

        return redirect('/');
    }

    public function store(Request $request)
    {
        $this->ValidatePost();

        $name = time() . '.' . $request->image->extension();

        $path = $request->image->move(public_path('images'), $name);

        $post = new Post();
        
        $post->title = request('title');

        $post->body = request('body');

        $post->exerpt = request('exerpt');

        $post->image = $name;

        $post->save();

        # $post->user_id = 1;

        $post->tags()->attach(request('tags'));

        return redirect('/')
                   ->with('image',$name);
    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('pages.blog', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('pages.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update(request()->validate([
            //'title' =>['required','min:3','max:255']
            'title' => 'required',
            'exerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]));

        $input = $request->all();

        if ($image = $request->file('image')) {

            $destinationPath = 'images/';

            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $image->move($destinationPath, $postImage);

            $input['image'] = "$postImage";
        } else {
            unset($input['image']);
        }

        $post->update($input);

        return redirect('/pages/admin')
            ->with('success', 'Your Article has been updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/pages/admin')
            ->with('success', 'Post deleted successfully');
    }

    public function ValidatePost()
    {
        return request()->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'title' => 'required',
            'exerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id',
        ]);
    }
}
