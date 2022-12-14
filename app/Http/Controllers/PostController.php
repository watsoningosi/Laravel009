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
        return view('pages.create',['tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
      $post = new Post($request->validate([
            'title' => 'required',
            'exerpt' => 'required',
            'body' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tags' => 'exists:tags,id',
        ]));
     # $post->user_id = 1;
      $post->save();

      $post->tags()->attach(request('tags'));
    
        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $input['image'] = "$postImage";
        }
        $post->save($input);

        return redirect('/')
            ->with('success', 'Your Article has been submitted Successfully.');
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
}
