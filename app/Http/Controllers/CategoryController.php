<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $models = Category::all();
      return view('admin.categories.index', ['models' => $models]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
      $validated = $request->validate([
        'title' => 'required|string|max:255|min:3'
      ]);
      $model = new Category();
      $model->title = $request['title'];
      $model->save();
      return redirect()->route('category.index')->with('status', 'Збережено!');
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
    public function edit( Category $category)
    {
      return view('admin.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
      $validated = $request->validate([
        'title' => 'required|string|max:255|min:3'
      ]);
      $category->title = $request['title'];
      $category->save();
      return redirect()->route('category.index')->with('status', 'Збережено!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $count_prod = Product::where(
          'category_id', '=', $category->id
          )->count();
          if($count_prod == 0){
            $category->delete();
            return redirect()->route('category.index')->with('status', 'Видалено!');
          } else {
            return redirect()->back()->with('error', 'Є продукти даної категорії');
          }
    }
}
