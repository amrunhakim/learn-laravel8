@extends('dashboard.layouts.main')
@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h2 class="mb-3 text-center">
                {{ $post->title }}
            </h2>            
            
            <a href="/dashboard/posts" class="btn btn-success btn-sm"><span data-feather="arrow-left"></span> Back to Posts</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning btn-sm"><span data-feather="edit"></span> Edit</a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
              </form>
            <br>
            <small> in <a href="/posts?category={{ $post->category->slug }}"class="text-decoration-none">{{ $post->category->name }}</a> {{ $post->created_at->diffForHumans() }}</small>
            {{-- image ambil dari inputan picture --}}
            @if ($post->image)
              <div style="max-height: 350px; overflow:hidden">
                <img src="{{  asset('storage/'. $post->image)  }}" class="card-img-top mt-2" alt="{{ $post->category->name }}" class="img-fluid">
              </div>
            @else                
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top mt-2" alt="{{ $post->category->name }}" class="img-fluid">
            @endif
            <article class="my-3 fs-5">
                {!! $post->body !!} 
                {{-- agar escape dari spesial character agar bs tampilin <p></p>--}}
            </article>
            <a href="/dashboard/posts" class="d-block mt-3 btn btn-primary">Back to Posts</a> 
        </div>
    </div>
</div>  
@endsection