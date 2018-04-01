@extends('layouts.master')

@section('title')
    Post Index
@endsection

@section('content')
    <article>
        <h3>{{$post->title}}</h3>
        <span>Post by {{$post->author}}, on {{$post->created_at}} </span>
    <p>{{$post->body}}</p>
        <a href="#">Read More</a>
    </article>

@endsection