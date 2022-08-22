@extends('layouts.main')
@section('container')    
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-md-8">
                        <h2 class="mb-3 text-center">
                            {{ $post->title }}
                        </h2>                        
                        
                        {{-- image ambil dari inputan picture --}}
                        @if ($post->image)
                        <div style="max-height: 350px; overflow:hidden">
                            <img src="{{  asset('storage/'. $post->image)  }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid">
                        </div>
                        @else                
                            <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid">
                        @endif
                        <small>by: <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}"class="text-decoration-none">{{ $post->category->name }}</a> {{ $post->created_at->diffForHumans() }}</small>
                        
                        <article class="my-3 fs-5">
                            {!! $post->body !!} 
                            {{-- agar escape dari spesial character agar bs tampilin <p></p>--}}
                        </article>
                        <a href="/posts" class="d-block mt-3 btn btn-primary">Back to Posts</a> 
                    </div>
                </div>
            </div>                                
@endsection
