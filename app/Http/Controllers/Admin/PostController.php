<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view( 'admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $post = new Post();
        $categories = Category::all();
        return view('admin.posts.create', compact('post', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|unique:posts|max:30',
            'post_content' => 'string',
            'image' => 'string|nullable',
            'slug' => 'string|unique:posts',
            'category_id' => 'nullable|exists:categories,id'
        ], [
            'required' => 'Il campo :attribute è obbligatorio',
            'title.max' => 'Il titolo super i :attribute caratteri',
            'unique' => "Il post $request->title è già presente"
        ]);


        $data = $request->all();
        
        $post = new Post();
        $post->fill($data);
        $post->slug = $post->title;
        $post->save();

        return redirect()->route('admin.posts.show', $post);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => [ 'required', 'string', Rule::unique('posts')->ignore($post->id), 'max:30'],
            'post_content' => 'text',
            'image' => 'string|nullable',
            'slug' => [ 'string', Rule::unique('posts')->ignore($post->id)]
        ], [
            'required' => 'Il campo :attribute è obbligatorio',
            'title.max' => 'Il titolo super i :attribute caratteri',
            'unique' => "Il post $request->title è già presente"
        ]);

        $data = $request->all();

        
        $post->fill($data);
        $post->save();
        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
