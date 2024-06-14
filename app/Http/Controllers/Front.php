<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Discount;
use App\Models\Team;

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
    $teams = Team::all();
    return view('front.main', [
      'products' => $arr_product,
      'discounts' => $product_discound,
      'teams' => $teams,
      'arr_category' => $arr_category
    ]);
  }
}
