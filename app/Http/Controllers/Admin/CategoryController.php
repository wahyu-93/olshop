<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(config('olshop.pagination'));
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'nama'          => 'required',
            'description'   => 'required'
        ],[
            'nama.required' => 'Nama Category Harus Diisi',
            'description.required' => 'Description Category Harus Diisi'
        ]);


        $category = Category::create([
            'name'  => $request->nama, 
            'slug'  => str_slug($request->nama),
            'description'   => $request->description
        ]);

        return redirect()->route('category.index')->with('alerts', [
            'type'      => 'success',
            'message'   => 'Category Berhasil Ditambahkan'
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
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            'nama'          => 'required',
            'description'   => 'required'
        ],[
            'nama.required' => 'Nama Category Harus Diisi',
            'description.required' => 'Description Category Harus Diisi'
        ]);

        $category->update([
            'name'  => $request->nama, 
            'slug'  => str_slug($request->nama),
            'description'   => $request->description
        ]);

        return redirect()->route('category.index')->with('alerts',[
            'type'    => 'info',
            'message' => 'Category Berhasil Diupdate'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }
}
