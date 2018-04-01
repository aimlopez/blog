@extends('layouts.admin-master')

@section('content')
    <div class="content">
        <h1>Posts</h1>
        <section>
            <div class="box-panel">
                <a href="{{ route('admin.blog.create_post') }}" class="btn btn-primary admin-btn" role="button" aria-pressed="true">New Post</a>
            </div>

            <!-- if error -->
            <div class="box-panel">
                @include('errors.error-message')
            </div>

            @if ($posts->count() == 0))
                <div class="box-panel">
                    <div class="card card-not-found" style="width: 50rem;"> 
                        <h3>Not Post found</h3>
                    </div>
                </div>  
            @else
                <div class="box-panel">
                    <!-- foreach -->
                   @foreach ($posts as $post)
                        <div class="card admin-card" style="width: 50rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted"><small>Posted by {{ $post->author }}, {{ $post->created_at}}</small></h6>
                                <a href="{{route('admin.single', ['post_id' => $post->id, 'end' => 'admin'])}}" class="card-link text-primary">View post</a> 
                                <a href="{{ route('admin.post.edit',['post_id' => $post->id])}}" class="card-link text-primary">Edit</a>  
                                <a href="{{route('admin.delete', ['post_id' => $post->id])}}" class="card-link text-danger">Delete</a> 
                            </div>
                        </div> 
                   @endforeach
                </div>     
            @endif
        </section> 
     
        <section class='pagination'>
            {{ $posts->links() }}
        </section>
    
</div>
@endsection