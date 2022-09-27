<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use File;

class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show', 'search']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blog.index')
            -> with('posts', Post::orderBy('updated_at', "DESC")->get());
    }

    public function search(Request $request) {
        $search = $request->get('query');
        $posts = Post::where('title', 'like', '%'.$search.'%')->paginate(5);

        return view('blog.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'category'=>'required',
            'description'=>'required',
            'body'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png|max:5048',
        ]);

        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();

        $request->image->move(public_path('image'), $newImageName);

        Post::create([
            'title' => $request->input('title'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'category' => $request->input('category'),
            'description' => $request->input('description'),
            'body' => $request->input('body'),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/blog')->with('message', 'Your post has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('blog.show')->with('post', Post::where('id', $id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('blog.edit')->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title'=>'required',
            'category'=>'required',
            'description'=>'required',
            'body'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png|max:5048',
        ]);

        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();

        $request->image->move(public_path('image'), $newImageName);

        Post::where('slug', $slug)->update([
            'title' => $request->input('title'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'category' => $request->input('category'),
            'description' => $request->input('description'),
            'body' => $request->input('body'),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/blog')->with('message', 'Your post has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $image_path = $post->image_path;

        if(File::exists(public_path('image/' . $image_path))) {
            File::delete(public_path('image/' . $image_path));
        }

        $post->delete();

        return redirect('/blog')->with('message', 'Your post has been deleted.');
    }
}
