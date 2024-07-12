<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Discount;
use App\Models\Team;
use App\Models\Content;

class Front extends Controller
{
  public function main(){
    $models = Product::all();
    foreach($models as $prod){
      if($prod->discount > 0){
        $product_discound[] = $prod;
      } else {
        $arr_product[] = $prod;
        $arr_category[$prod->category_id] = $prod->category->title;
      }
    }
    $slider_arr = Content::show_slider();
    $galery = Content::get_galery();
    $about_arr = Content::show_about();
    $teams = Team::all();
    $coordinate = Content::get_coordinates();
    return view('front.main', [
      'products' => $arr_product,
      'discounts' => $product_discound,
      'teams' => $teams,
      'arr_category' => $arr_category,
      'main_foto' => $slider_arr['foto'],
      'slider_text' => $slider_arr['headers'],
      'slider_button' => $slider_arr['button'],
      'logo' => $slider_arr['logo'],
      'about_foto' => $about_arr['foto'],
      'about_content' => $about_arr['content'],
      'galery' => $galery,
      'coordinate' => $coordinate,
    ]);
  }
}
