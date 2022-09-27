<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Auth;
use Illuminate\Support\Facades\Gate;
use Cviebrock\EloquentSluggable\Services\SlugService;
use File;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::allows('admin-only', auth()->user())) {
            return view('roles.admin.posts.index')-> with('posts', Post::orderBy('updated_at', "DESC")->get());
        } else {
            abort(403);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::allows('admin-only', auth()->user())) {
            return view('roles.admin.posts.create');
        } else {
            abort(403);
        }
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

        return redirect('/admin/posts')->with('message', 'Your post has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::allows('admin-only', auth()->user())) {
            return view('roles.admin.posts.edit')->with('post', Post::where('id', $id)->first());
        } else {
            abort(403);
        }
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
        $request->validate([
            'title'=>'required',
            'category'=>'required',
            'description'=>'required',
            'body'=>'required',
        ]);

        if (isset($request->image)) {
            $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('image'), $newImageName);

            Post::where('id', $id)->update([
             'image_path' => $newImageName,
            ]);
        }

        Post::where('id', $id)->update([
            'title' => $request->input('title'),
            'category' => $request->input('category'),
            'description' => $request->input('description'),
            'body' => $request->input('body'),
        ]);

        return redirect('/admin/posts')->with('message', 'The post has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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

        return redirect('/admin/posts')->with('message', 'Your post has been deleted.');
    }
}
