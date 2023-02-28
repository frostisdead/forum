<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Subcategory;
use App\Models\Category;

use Illuminate\Support\Str;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $cat_id = json_decode(Category::get('id'),true);
        $subcategories = Subcategory::with('categories')->orderby('category_id')->get();
        return view('forum.crpost', compact('subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $cat = new Post();
        $cat->post_topic = $data['post_topic'];
        $cat->post_description = $data['post_description'];
        $cat->post_by = auth()->user()->name;
        $cat->subcategory_id = $data['subcategory_id'];
        $cat->slug = Str::slug($cat->post_topic);
        $cat->save();
        return redirect('forum');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $subcat_name = Subcategory::where('slug', $slug)->get('subcategory_name');
        $subcat_id = Subcategory::where('slug', $slug)->get('id');
        $id = json_decode($subcat_id,true);
        $posts = Post::with('subcategories')->where('subcategory_id', '=', $id)->latest()->get();
        $pages = Post::paginate(3);
        return view('forum.subcat', compact('subcat_name', 'posts', 'pages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug',$slug)->first();
        $post->delete();
    
        return redirect('forum')->with('success','Post deleted successfully');
    }
}
