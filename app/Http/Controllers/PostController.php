<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        $request1 = request('category');
        if ($request1) {
            $category = Category::firstWhere('slug', $request1);
            $title = 'in ' . $category->name;
        }
        $request2 = request('author');
        if ($request2) {
            $author = User::firstWhere('username', $request2);
            $title = 'by ' . $author->name;
        }
        #dd(request('search')); -- cara menangkap inputan di form
        return view('posts', [
            "title" => "All Posts " . $title,
            "active" => "posts",
            # pencarian based on search test & category
            "posts" => Post::latest()->filter(request(['search','category','author']))->paginate(7)->withQueryString()
            #"posts" => Post::latest()->filter(request(['search','category','author']))->get() 
            
            #"posts" => Post::latest()->get()
            #"posts" => Post::with(['author','category'])->latest()->get()
        ]);
    }

    public function show(Post $post) #variable $post harus sama dg variable di routes web.php -> route model binding
    {
        return view('post', [
            "title" => "Single Posts",
            "active" => "posts",
            "post" => $post
        ]);
    }
}
