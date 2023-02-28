<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
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
    public function create()
    {
        $category = Category::all();
        return view('forum.crsubcat', ['category' => $category]);
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
        $cat = new Subcategory();
        $cat->subcategory_name = $data['subcategory_name'];
        $cat->description = $data['description'];
        $cat->category_id = $data['category_id'];
        $cat->slug = Str::slug($cat->subcategory_name);
        $cat->save();
        return redirect('forum');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $cat_name = Category::where('slug', $slug)->get('category_name');
        $cat_id = Category::where('slug', $slug)->get('id');
        $id = json_decode($cat_id,true);
        $subcategories = Subcategory::with('categories')->where('category_id', '=', $id)->latest()->get();

        $pages = Subcategory::with('categories')->where('category_id', '=', $id)->paginate(3);
        return view('forum.subcategories', compact('cat_name', 'subcategories', 'pages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        //
    }
}
