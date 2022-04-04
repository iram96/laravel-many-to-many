@extends('layouts.app')

@section('content')

<div class="container d-flex justify-content-end">

<a href="{{ route('admin.posts.create')}}" class="btn btn-success"> <i class="fas fa-plus"></i></a>
</div>

<div class="container">
    <table class="mx-auto">
        <tr class="row">
            <th class="col">Titolo</th>
            <th class="col">Categoria</th>
            <th class="col">Tags</th>
            <th class="col">Creato il</th>
            <th class="col">Modificato il</th>
            <th class="col">Actions</th>
        </tr>
        @foreach ($posts as $post)
        <tr class="row">
            <td class="col"> {{ $post->title}}</td>
            <td class="col"> @if ($post->category)
                {{ $post->category->label}}
            @else
                -
            @endif </td>
            <td class="col"> 
                @forelse($post->tags as $tag)
                <span class="badge rounded-pill bg-{{ $tag->class}}">{{ $tag->name}}</span>
                @empty
                    -
                
                @endforelse
            
             </td>
            <td class="col"> {{ $post->created_at}}</td>
            <td class="col"> {{ $post->updated_at}}</td>
            <td class="col"> 
                <a href="{{ route('admin.posts.show', $post)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                <form action="{{ route('admin.posts.destroy', $post)}}" method="POST" class="delete-forms" >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
                {{-- <form action="{{ route('admin.posts.edit', $post)}}" method="POST"></form> --}}
                <a href="{{ route('admin.posts.edit', $post->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
            </td>
        </tr>
            
        @endforeach
    </table>
</div>
    
@endsection

@section('scripts')

<script src="{{ asset('js/alertDelete.js') }}" defer></script>
    
@endsection