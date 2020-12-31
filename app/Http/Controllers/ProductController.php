<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category_id = $request->category_id;
        $categories = DB::table('categories')->get();
        if (!$category_id || $categories->where('id', $category_id)->isEmpty()){
            $products = Product::paginate(10);
        }
        else{
            $products = Product::where('category_id', $category_id)->paginate(10);
        }
        return view('product.index', ['products' => $products, 'categories' => $categories,
            'selected_category' => $category_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $VAT_statuses = array("Yes", "No");
        return view('product.create', ['categories'=> $categories, 'VAT_statuses' => $VAT_statuses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_name' =>'required|max:255',
            'description' => 'required',
            'include_VAT' => 'required',
//            'image' => 'nullable',
            'image' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
        ]);
        if ($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('fail', 'Add Product Fail!!!');
        }
        else{
            $filename = $request->file('image')->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('productImages', $filename, 'public');
            Product::create([
                'product_name' => $request->input('product_name'),
                'description' => $request->input('description'),
                'image' => '/storage/'.$filePath,
                'price' => $request->input('price'),
                'creation_date' => now(),
                'include_VAT' => $request->input('include_VAT'),
                'quantity' => $request->input('quantity'),
                'category_id' => (int) $request->input('category_id'),
            ]);
            return redirect('/products') ->with('success', 'Add A Product Success.')//lưu thông báo kèm theo để hiển thị trên view
            ->with('file', $filename);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::table('products')->find($id);
        $category = DB::table('categories')->where('id', $product->category_id)->first();
        return view('product.show', ['product' => $product, 'category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = DB::table('products')->find($id);
        $categories = DB::table('categories')->get();
        $VAT_statuses = array("Yes", "No");
        return view('product.edit', ['product' => $product, 'categories' => $categories, 'VAT_statuses' => $VAT_statuses]);
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
        $validator = Validator::make($request->all(), [
            'product_name' =>'required|max:255',
            'description' => 'required',
            'include_VAT' => 'required',
            'image' => 'nullable',
//            'image' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
        ]);
        if ($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('fail', 'Update Product Fail!!!');
        }
        else{
            if ($request->hasFile('image')){

                $filename = $request->file('image')->getClientOriginalName();
                $filePath = $request->file('image')->storeAs('productImages', $filename, 'public');

                Product::find($id)
                    ->update([
                        'product_name' => $request->input('product_name'),
                        'description' => $request->input('description'),
                        'image' => '/storage/'.$filePath,
                        'price' => (int) $request->input('price'),
                        'include_VAT' => $request->input('include_VAT'),
                        'quantity' => $request->input('quantity'),
                        'category_id' => (int)$request->input('category_id'),
                    ]);
                return back() ->with('success', 'Update Product Success.')//lưu thông báo kèm theo để hiển thị trên view
                ->with('file', $filename);
            }else{
                Product::find($id)
                    ->update([
                        'product_name' => $request->input('product_name'),
                        'description' => $request->input('description'),
                        'price' => (int) $request->input('price'),
                        'include_VAT' => $request->input('include_VAT'),
                        'quantity' => $request->input('quantity'),
                        'category_id' => (int)$request->input('category_id'),
                    ]);
                return back()->with('success', 'Update Product Success.');//lưu thông báo kèm theo để hiển thị trên view
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Delete Product Success.');
    }
}
