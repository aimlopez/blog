@extends('layouts.admin-master')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/form.css') }}">    
@endsection

@section('content')
    @include('error.error-message')
    <form action="" method="POST">
        <div class="form-group">
          <label for="title">Title</label>
          <input name="title" type="text" class="form-control" id="title" placeholder="Post title">
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input name="author" type="text" class="form-control" id="author" placeholder="Author Name">
        </div>
        <div class="form-group">
            <label class="mr-sm-2" for="category-select">Add Categories</label>
            <select name="category-select" class="custom-select mr-sm-2" id="category-select">
                <option selected>Choose...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
            <button class="btn" type="button">Add category</button>
            <div class="added-categories">
                <ul></ul>
            </div>
            <input type="hidden" name="categories" id="categories">
        </div>
        <div class="form-group">
          <label for="post-content">Description</label>
          <textarea name="post-content" class="form-control" id="post-content" rows="12"></textarea>
        </div>
        <button class="btn" type="submit">Add Posts</button>
    </form>

    
@endsection