@extends('layouts.main')
@section('container')
    <h5 class="mb-3 text-center">{{ $title }}</h5>
    
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/posts">
                @if (request('category'))                
                    <input type="hidden" name="category" value={{ request('category') }}>
                @endif
                @if (request('author'))                
                    <input type="hidden" name="author" value={{ request('author') }}>
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit">Search</button>
                  </div>                  
            </form>
        </div>
    </div>

    @if ($posts->count())    
        <div class="card mb-3">            
            {{-- picture diambil dari inputan --}}
            @if ($posts[0]->image)
              <div style="max-height: 350px; overflow:hidden">
                <img src="{{  asset('storage/'. $posts[0]->image)  }}" class="card-img-top" alt="{{ $posts[0]->category->name }}" class="img-fluid">
              </div>
            @else                
                <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top" alt="{{ $posts[0]->category->name }}">
            @endif

            <div class="card-body text-center">
                <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug}}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
                <p>
                <small class="text-muted">
                    by: <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
                </small>
                </p>
                <p class="card-text">{{ $posts[0]->excerpt }}</p>            
                <a href="/posts/{{ $posts[0]->slug}}" class="text-decoration-none btn btn-primary"> Read More... </a>
            </div>
        </div>                 

    <div class="container">
        <div class="row">
            {{-- fungsi skip(1) => untuk menskip 1 postingan (yg udah ditampikan diatas) --}}
            @foreach ($posts->skip(1) as $post)                        
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <div class="position-absolute px-3 py-2 text-white" style="background-color: rgba(0, 0, 0, 0.7)"><a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none text-white">{{ $post->category->name }}</a></div>
                        

                        {{-- picture diambil dari inputan --}}
                        @if ($post->image)
                            <div>
                            <img src="{{  asset('storage/'. $post->image)  }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid">
                            </div>
                        @else                
                            <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                        @endif
                        
                        <div class="card-body" style="min-height: 320px">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p>
                            <small class="text-muted">
                                by: <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> {{ $post->created_at->diffForHumans() }}
                            </small>
                        </p>
                        <p class="card-text">{{ $post->excerpt }}</p>
                        <a href="/posts/{{ $post->slug}}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @else
        <p class="text-center fs-4">No post found.</p>
    @endif

    <div class="d-flex justify-content-end">
        {{ $posts -> links() }}
    </div>

    {{-- @foreach ($posts->skip(1) as $post)
        <article class="border-2 border-bottom border-danger pb-3">
            <h2>
                <a href="/posts/{{ $post->slug}}" class="text-decoration-none"> {{ $post->title }} </a>
            </h2>
            <h5>by: <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></h5>
            <p>{{ $post->excerpt }}</p>
            <a href="/posts/{{ $post->slug}}" class="text-decoration-none"> Read More... </a>
        </article>    
    @endforeach --}}
@endsection
