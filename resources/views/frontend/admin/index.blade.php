@extends('layouts.admin-master')

@section('title')
    Admin Main Page
@endsection

@section('content')

    <div class="content">  
        <h1>Dashboard<span>&nbsp;Statistics and more</span></h1>
        <div id="box">
            <div class="box-top">
                <span class="flaticon-newspaper1">Post </span>
                <!--<span class="right">Welcome <strong><?php //echo $_SESSION['username']."</strong>,"." "."Last update: " . date("Y-m-d"); ?></span> -->
                <a href="#" class="btn btn-primary admin-btn" role="button" aria-pressed="true">New Post</a>
                <a href="#" class="btn btn-primary admin-btn" role="button" aria-pressed="true">Show all Post</a>
            </div>
                
            
            <!-- if not post -->
                 
            <div class="box-panel">
                <div class="card card-not-found" style="width: 50rem;"> 
                    <h3>Not Post found</h3>
                </div>
            </div>
                <!-- if posts -->
            <div class="box-panel">
                <!-- foreach -->
               
                <div class="card admin-card" style="width: 50rem;">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                        <a href="#" class="card-link text-primary">View post</a> 
                        <a href="#" class="card-link text-primary">Edit</a>  
                        <a href="#" class="card-link text-danger">Delete</a> 
                    </div>
                </div>
              
            </div>     
        </div>
        <div id="box">
            <div class="box-top">
                <span class="flaticon-newspaper1">Messages</span>
            </div>
                
            <!-- if not post -->
                    
            <div class="box-panel">
                    <div class="card card-not-found" style="width: 50rem;"> 
                        <h3>Not Post found</h3>
                    </div>
                </div>

                <!-- if posts -->
            <div class="box-panel">
                <!-- foreach -->
                <div class="card admin-card" style="width: 50rem;" data-message="body" data-id="ID">
                    <div class="card-body">
                        <h5 class="card-title">Message Title</h5>
                        <h6 class="card-subtitle mb-2 text-muted">sended by | Date</h6>
                        <a href="#" class="card-link text-primary">View message</a> 
                        <a href="#" class="card-link text-danger">Delete</a> 
                    </div>
                </div>
            </div>     
        </div>
        <div class="modal" id="contact-message-info">
            <button class="btn" id="modal-close">

            </button>
        </div>
    </div>    
@endsection
@section('script')
    <script>
        var token ="{{ Session::token() }}"
    </script>
    <script src="{{ URL::secure('public/js/modal.js')}}"></script>
    <script src="{{ URL::secure('public/js/message.js')}}"></script>
@endsection