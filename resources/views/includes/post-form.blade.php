
<div class="container">

    @if ($errors->any())
    <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error}} </li>
                @endforeach
            </ul>
        </div>
        
    @endif

</div>

@if ($post->exists)
    
<form action="{{ route('admin.posts.update', $post)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    
@else
    
<form action="{{ route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
@endif

    @csrf
    <div class="container ">
        <div class="row justify-content-end">



            <div class="mb-3 col-8">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Type here..." value="{{ old('title', $post->title)}}">
            </div>
            <div class="col-4 ">
                <label for="category">Categoria</label>
                <select class=" form-control d-flex mx-auto" id="category" name='category_id'>
                    <option >Open this select menu</option>
                    @foreach ($categories  as $category)
                    <option 
                    @if (old('category_id', $post->category_id) == $category->id)
                        selected
                    @endif 
                    value="{{ $category->id}}"> {{ $category->label}}</option>
                        
                    @endforeach
                  </select>
            </div>
    
    
            <div class="mb-3 col-12">
                <label for="content" class="form-label">Post</label>
                <textarea class="form-control" id="content" rows="3" name="post_content" placeholder="Type here...">{{ old('post_content', $post->post_content)}}</textarea>
            </div>
            <div class="mb-3 col-12">
                <label for="image" class="form-label">URL Immagine</label>
                <input type="file" class="form-control-file" id="image" name="image" placeholder="Type here...">
            </div>

            <div class="mb-3 col-12 ">
                @foreach ($tags as $tag)
                <div class="form-check form-check-inline badge rounded-pill bg-{{ $tag->class}} @error('tags') is-invalid @enderror">
                    <input class="form-check-input" type="checkbox" id="tag-{{ $tag->id}}" value="{{$tag->id}}" name="tags[]"
                    @if (in_array($tag->id , old('tags', $post_tags_ids ?? []) ))
                        checked
                    @endif
                    >
                    <label class="form-check-label" for="tag-{{ $tag->id}}">{{ $tag->name}}</label>
                  </div>
                    
                @endforeach
                @error('tags')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
        
            <button type="submit" class="btn btn-success">Save</button>
        </div> 
    
    
    </div>
</form>
