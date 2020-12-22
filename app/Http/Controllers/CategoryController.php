<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')->get();
        return view('category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['categoryName' => 'required', 'description' => 'required']);
        Category::create($request->all());
        return redirect('/categories')->with('success', 'Add a Category Succcess');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = DB::table('categories')->find($id);
        $products = DB::table('products')->where('category_id', $id)->get();
        return view('category.show', ['category' => $category,'products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = DB::table('categories')->find($id);
        return view('category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = DB::table('categories')->find($id);
        $category->categoryName = $request->input('categoryName');
        $category->description = $request->input('description');
        $affected = DB::table('categories')
            ->where('id', $id)
            ->update([
                'categoryName' => $category->categoryName,
                'description' => $category->description
            ]);
        return redirect()->back()->with('success', 'Update Category Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $products = DB::table('products')->where('category_id', $category->id)->delete();
        $category->delete();
        return redirect('/categories')->with('success', 'Delete Success');
    }
}
