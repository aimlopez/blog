@extends('layouts.master')

@section('title')
    Blog Index
@endsection

@section('content')
    @foreach ($posts as $post)
        <article class="card">
            <h3>{{ $post->title }}</h3>
            <span><small>Created by {{ $post->author }}, {{ $post->created_at }}</small></span>
            <p>{{ $post->body }}</p>
            <a href="{{route('blog.single', ['post_id' => $post->id, 'end' => 'frontend'])}}">Read More</a>
        </article>
    @endforeach
    
    
        <section class='pagination'>
            {{ $posts->links() }}
        </section>

@endsection