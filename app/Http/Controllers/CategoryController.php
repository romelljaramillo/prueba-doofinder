<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index', [
            'categories' => Category::latest()->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        return view('categories.create', [
            'category' => $category,
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request, Category $category)
    {
        if ($request->hasFile("image")) {
            $nameimage = '';
            $path = public_path("storage\img\c");

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $file = $request->file("image");
            $nameimage = uniqid() . '_' . Str::slug($request->name) . "." . $file->guessExtension();

            $file->move($path, $nameimage);
        }

        $category = $category->create([
            'parent_id' => $request->parent_id,
            'name' => $request->name,
            'description' => $request->description,
            'image' => $nameimage,
            'link_rewrite' => Str::slug($request->name),
            'active' => $request->active ? 1 : 0
        ]);

        return to_route('categories.edit', $category)->with('status', 'Create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', [
            'category' => $category,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if ($request->hasFile("image")) {
            $nameimage = '';
            $path = public_path("storage\img\c");

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $file = $request->file("image");
            $nameimage = uniqid() . '_' . Str::slug($request->name) . "." . $file->guessExtension();

            $file->move($path, $nameimage);

            $category->image = $nameimage;
        }

        $category->update([
            'parent_id' => $request->parent_id,
            'name' => $request->name,
            'description' => $request->description,
            'link_rewrite' => Str::slug($request->name),
            'active' => $request->active ? 1 : 0
        ]);

        return to_route('categories.edit', $category)->with('status', 'Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return back();
    }
}
