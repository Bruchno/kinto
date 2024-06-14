<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Category;
use App\Models\Product;
use App\Models\Discount;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = Product::all();
        return view('admin.products.index',[
          'models' => $models
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = $this->categories_arr();
      return view('admin.products.create', [
        'categories' => $categories
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $err = $this->validate_request($request);
      if(empty($err)){
        $model = new Product();
        $price = $request['price'];
        $price = str_replace(" ", '', $price);
        $model->price = $price;
        $model->name = $request['name'];
        $model->short_desc = $request['short_desc'];
        $model->category_id = $request['category_id'];
        $image = $request->file('preview');
        if ($image) {
            $path = $image->store('source', 'public');
            $base = basename($path);
            $model->preview = $base;
        }
        $model->save();
        return redirect()->route('product.show', $model->id)->with('status', 'Збережено!');
      } else {
        return redirect()->back()->withErrors(['msg' => implode('<br>', $err)]);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $model = Product::find($id);
      $cat = Category::find($model->category_id);
      $model->cat_title = $cat->title;
      $path = Storage::path($model->preview);

      return view('admin.products.show', [
        'model' => $model
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
      $categories = $this->categories_arr();
      return view('admin.products.edit', [
        'model' => $product,
        'categories' => $categories
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
      $err = $this->validate_request($product);
      if($request['discount'] !== NULL &&
        is_numeric($request['discount']) && $request['discount'] >= 100){
          $err[] = 'Скидка може бути тільки більшою за 0 і меншою за 100%!';
        }
      $model = $product;
      if(empty($err)){
        if(trim($request['price']) != $model->price){
          $price = $request['price'];
          $price = str_replace(" ", '', $price);
          $model->price = $price;
        }
        $model->name = $request['name'];
        $model->short_desc = $request['short_desc'];
        $model->category_id = $request['category_id'];
        $image = $request->file('preview');
        if ($image) {
            $path = $image->store('source', 'public');
            $base = basename($path);
            if ($model->preview) {
              Storage::disk('public')->delete('source/' . $model->preview);
            }
            $model->preview = $base;
        }
        $model->discount = $request['discount'];
        $model->save();
        return redirect()->route('product.show', $model->id)->with('status', 'Збережено!');
      } else {
        return redirect()->back()->withErrors(['msg' => implode('<br>', $err)]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->preview) {
          Storage::disk('public')->delete('source/' . $product->preview);
        }
        $product->delete();
        return redirect()->route('product.index')->with('status', 'Видалено!');
    }

    public function copy_product($id){
      $new_product = new Product();
      $old_product = Product::find($id);
      $new_product->price = $old_product->price;
      $new_product->name = $old_product->name;
      $new_product->short_desc = $old_product->short_desc;
      $new_product->preview = $old_product->preview;
      $new_product->category_id = $old_product->category_id;
      $new_product->save();
      return redirect()->route('product.index')->with('status', 'Додано!');
    }

    public function categories_arr(){
      $categories = Category::all();
      return $categories;
    }

    public function validate_request($request, $model = null){
      $errors = [];
      if(trim($request['name']) == ''){
        $errors[] = 'Не заповнено поле "Назва"!';
      }
      $price = $request['price'];
      $price = str_replace(" ", '', $price);
      if($price != '' && preg_replace( '/^[0-9]+[\.|\,]?[0-9]?+$/', '', $price) != ''){
        $errors[] = 'Ціна - це ціле число або десятковий дріб!';
      }
      return $errors;
    }

}
