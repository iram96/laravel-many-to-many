@extends('layouts.app')
@section('content')

<div class="container">
    <h2>{{ $post->title}}</h2>
    <p>{{ $post->post_content}}</p>
    
    <a href="{{ route('admin.posts.index')}}" class="btn btn-dark">Back</a>
    <form action="{{ route('admin.posts.destroy', $post)}}" method="POST" class="delete-forms">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">
            <i class="fas fa-trash"></i>
        </button>
    </form>
    <a href="{{ route('admin.posts.edit', $post->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
</div>
    
@endsection

@section('scripts')

<script src="{{ asset('js/alertDelete.js') }}" defer></script>
    
@endsection