<?php /*
@section('styles')
<link rel="stylesheet" href="{{ URL::to('css/common.css') }}">
@append
*/?>

@if (Session::has('fail'))
    <section class="info-box danger">
        {{ Session::get('fail') }}
    </section>
@endif

@if (Session::has('success'))
    <section class="info-box danger">
        {{ Session::get('success') }}
    </section>
@endif

@if (count($errors) > 0)
    <section class="info-box danger">
        <ul>
            @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
            @endforeach
        </ul>
        {{ Session::get('fail') }}
    </section>
@endif