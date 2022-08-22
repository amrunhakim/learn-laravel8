<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #tampilkan data posts dari user yang login
        #return Post::where('user_id', auth()->user()->id)->get();
        return view('dashboard.posts.index', [
            'posts' =>  Post::where('user_id', auth()->user()->id)->get() 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create',[
            'categories' =>Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        #dump-die-debug
        #ddd($request);
        
        #return $request->file('image')->store('post-images');
        
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:2048', #supaya kebaca file dg format image
            'body' => 'required'
        ]);

        #kalo ada post image via inputan
        if ($request->file('image')) {
            $validatedData['image'] =  $request->file('image')->store('post-images'); #simpan ke public/storage/post-images
        }

        #return $request;
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 150); #strip_tags utk menghilangkan tag html
        
        #save
        Post::create($validatedData);
        
        return redirect('/dashboard/posts')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        #agar tidak bisa melihat & mengedit postingan author lain
        if($post->author->id !== auth()->user()->id) {
            abort(403);
        }
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        #agar tidak bisa melihat & mengedit postingan author lain
        if($post->author->id !== auth()->user()->id) {
            abort(403);
        }
        return view('dashboard.posts.edit', [
            'post' =>  $post,
            'categories' =>Category::all()
        ]);
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
        $rules = [
            'title' => 'required|max:255',            
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ];

        #cek validasi slug dg membandingkan inputan slug dg existing di table
        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        #kalo ada post image via inputan
        if ($request->file('image')) {
            #jika mau update image baru, hapus file image lamanya
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] =  $request->file('image')->store('post-images'); #simpan ke public/storage/post-images
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 150); #strip_tags utk menghilangkan tag html
        
        #update
        Post::where('id', $post->id)
            ->update($validatedData);
        
        return redirect('/dashboard/posts')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        #delete di file nya
        if ($post->image) {
            Storage::delete($post->image);
        }
        #delete di table
        Post::destroy($post->id);
        
        return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json([
            'slug' => $slug
        ]);
    }
}




