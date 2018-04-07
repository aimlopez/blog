@extends('layouts.admin-master')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/category.css') }}">    
@endsection

@section('content')
    <div class="content">
        <section class="add-category">
            @include('errors.error-message')
            <h1>Categories</h1>
            <form class="create-category form-inline" action="" method="POST">
                @csrf
                <div class="form-group">
                    <label for="category">Category Name</label>
                    <input name="category" type="text" class="form-control mx-sm-3" id="category" placeholder="Category name" {{ $errors->has('category')? 'class=danger' : ''}} value={{ Request::old('category')}}>
                </div>
                <button class="btn btn-primary cat-submit" type="submit">Create Category</button>
            </form>
            <div id="ajaxResponse"></div>
        </section>
        <section class="show-category">
            <!-- if error -->
            <div class="box-panel">
                @include('errors.error-message')
            </div>
    
            @if ($categories->count() == 0))
                <div class="box-panel">
                    <div class="card card-not-found" style="width: 50rem;"> 
                        <h3>Not Categories found</h3>
                    </div>
                </div>  
            @else
                <div class="box-panel">
                    <!-- foreach -->
                    <table id="categories">
                        <tr>
                            <th>Category</th>
                            <th></th>
                        </tr>
                        @foreach ($categories as $category)
                            <tr class="category-card" data-id="{{ $category->id }}" >
                                <td class="name">{{ $category->name }}</td>
                                <td>
                                    <div id="cat-links">
                                        <input type="text" /> 
                                        <a href="#" id="edit-category" class="text-primary">Edit</a>
                                    <a href="#" id="delete-category" class="text-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>  
                </div>     
            @endif
        </section> 
        <section class='pagination'>
            {{ $categories->links() }}
        </section>
    </div>    
@endsection
@section('scripts')
    <script>
        //var token = {{ Session::token() }}
    </script>
    <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
        </script>
    <script src="{{ URL::asset('js/category.js')}}"></script>
@endsection