@extends('layouts.admin-master')

@section('content')
    <div class="content">
        <h1>Post</h1>
        <section>
            <div class="box-panel">
                <a href="{{ route('admin.blog.create_post') }}" class="btn btn-primary admin-btn" role="button" aria-pressed="true">New Post</a>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-primary admin-btn" role="button" aria-pressed="true">Show all Post</a>
            </div>

            <div class="box-panel">
                <div class="card admin-card" style="width: 50rem;">
                    <div class="card-body">
                       
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted"><small>Posted by {{ $post->author }}, {{ $post->created_at}}</small></h6>
                        <p>{{ $post->body }}</p>
                        <a href="{{ route('admin.post.edit',['post_id' => $post->id])}}" class="card-link text-primary">Edit</a>  
                        <a href="#" class="card-link text-danger">Delete</a> 
                    </div>
                </div> 
            </div>     
        </section> 
    </div>
@endsection