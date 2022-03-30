@extends('layouts.app')

@section('content')
<header class="container">
    <h2>
        Modifica Post: {{ $post->title}}
    </h2>
</header>
@include('includes.post-form')
    
@endsection