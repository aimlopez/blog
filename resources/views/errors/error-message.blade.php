<?php /*
@section('styles')
<link rel="stylesheet" href="{{ URL::to('css/common.css') }}">
@append
*/?>

@if (Session::has('fail'))
        <div class="card border-danger">
            <div class="card-body">
                {{ Session::get('fail') }}
            </div>
        </div>
@endif

@if (Session::has('success'))
        <div class="card border-success">
            <div class="card-body">
                {{ Session::get('success') }}  
            </div>
        </div>  
@endif

@if (count($errors) > 0)
    <section class="info-box">
        <ul>
            @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
            @endforeach
        </ul>
        {{-- Session::get('fail') --}}
    </section>
@endif