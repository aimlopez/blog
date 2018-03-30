@extends('layouts.master')

@section('title')
    Blog Index
@endsection

@section('content')
    <article class="card">
        <h3>Post Tile</h3>
        <span><small>Post by | Date</small></span>
        <p>Body</p>
        <a href="#">Read More</a>
    </article>
    <section class='pagination'>
        pagination
    </section>
   
@endsection