<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::get();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'  => 'required',
            'price' => 'required|numeric',
            'description'   => 'required',
            'category'      => 'required'
        ],[
            'name.required'     => 'Nama Product Diisi',
            'price.required'    => 'Price Product Diisi',
            'price.numeric'     => 'Isian Hanya Boleh Angka',
            'description.requried' => 'Descripton Diisi',
            'category.required' => 'Category Diisi'
        ]);
        
        $product = Product::create([
            'name'  => $request->name,
            'slug'  => str_slug($request->name),
            'price' => $request->price,
            'description' => $request->description
        ]);
        
        $category = Category::find($request->category);

        // saveManty atau attach untuk menyimpan many to many
        $product->categories()->attach($category);

        return redirect()->route('product.index')->with('alerts', [
            'type'      => 'success',
            'message'   => 'Data Product Berhasil Disimpan'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::get();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
            'name'  => 'required',
            'price' => 'required|numeric',
            'description'   => 'required',
            'category'      => 'required'
        ],[
            'name.required'     => 'Nama Product Diisi',
            'price.required'    => 'Price Product Diisi',
            'price.numeric'     => 'Isian Hanya Boleh Angka',
            'description.requried' => 'Descripton Diisi',
            'category.required' => 'Category Diisi'
        ]);
        
        $product->update([
            'name'  => $request->name,
            'slug'  => str_slug($request->name),
            'price' => $request->price,
            'description' => $request->description
        ]);
        
        $category = Category::find($request->category);

        // sync update many to many
        $product->categories()->sync($category);

        return redirect()->route('product.index')->with('alerts', [
            'type'      => 'success',
            'message'   => 'Data Product Berhasil Diubah'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->categories()->detach();
        $product->delete();
        return back()->with('alerts', [
            'type'      => 'warning',
            'message'   => 'Data Berhasil Dihapus'
        ]);
    }
}
