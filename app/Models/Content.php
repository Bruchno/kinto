<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    public static function show_slider(){
      $models = Content::where(['section' => 'slider'])->get();
      $result = [];
      foreach($models as $model){
        if($model->slag == 'main_foto'){
          $result['foto'] = $model;
        } elseif($model->slag == 'button') {
          $result['button'] = $model;
        } elseif($model->slag == 'logo'){
          $result['logo'] = $model;
        } else {
          $result['headers'][] = $model;
        }
      }
      return $result;
    }

    public static function show_about()
    {
      $models = Content::where(['section' => 'about'])->get();
      $result = [];
      foreach ($models as $model) {
        if($model->slag == 'foto'){
          $result['foto'] = $model;
        } else {
          $result['content'] = $model;
        }
      }
      return $result;
    }

    public static function get_coordinates()
    {
      $model = Content::where(['slag' => 'coordinate'])->first();
      return $model;
    }

    public static function get_galery()
    {
      $model = Content::where(['slag' => 'galery'])->first();
      $galery = $model->description;

      if(strpos($galery, ';') !== false){
        $arr = explode(';', $galery);
        $new_arr = array_diff($arr, array(''));
        return $new_arr;
      } else {
        return [];
      }
    }
}
