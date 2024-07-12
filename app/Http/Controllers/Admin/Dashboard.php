<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;

use App\Models\Order;
use App\Models\Team;
use App\Models\Content;

class Dashboard extends Controller
{
    public function index()
    {
      $orders = Order::count();
      $clients = Team::count();
      return view('admin.index', [
        'orders_count' => $orders,
        'clients_count' => $clients,
      ]);
    }

    public function show_slider(){
      $result = Content::show_slider();
      return view('admin.contents.slider', [
        'foto' => $result['foto'],
        'headers' => $result['headers'],
        'button' => $result['button'],
      ]);
    }

    public function show_content($slag)
    {
      if($slag == 'main_foto') {
        $model = Content::where(['slag' => 'main_foto'])->first();
        return view('admin.contents.main_foto', [
          'model' => $model,
        ]);
      } elseif (stripos($slag, 'header_') !== false) {
        $num = str_replace('header_', '', $slag);
        $model = Content::where(['slag' => $slag])->first();
        return view('admin.contents.header', [
          'num' => $num,
          'model' => $model,
        ]);
      } elseif ($slag == 'about'){
        $result = Content::show_about();
        return view('admin.contents.about', [
          'foto' => $result['foto'],
          'content' => $result['content'],
        ]);
      } elseif ($slag == 'coordinate') {
        $model = Content::where(['slag' => $slag])->first();
        return view('admin.contents.coordinate', [
          'model' => $model,
        ]);
      } elseif($slag == 'button') {
        $model = Content::where(['slag' => 'button'])->first();
        return view('admin.contents.button', [
          'model' => $model,
        ]);
      } elseif($slag == 'logo'){
        $model = Content::where(['slag' => 'logo'])->first();
        return view('admin.contents.logo', [
          'model' => $model,
        ]);
      } elseif($slag == 'galery'){
        $galery = Content::get_galery();
        return view('admin.contents.galery',[
          'galery' => $galery,
        ]);
      }
    }

    public function about(){
      $result = Content::show_about();
      return view('admin.contents.show_about', [
        'foto' => $result['foto'],
        'content' => $result['content'],
      ]);
    }

    public function update_content(Request $request, $slag)
    {
      if($slag == 'main_foto') {
        $model = Content::where(['slag' => 'main_foto'])->first();
        $image = $request->file('main_foto');
        $status = $this->save_big_image($model, $image);
        return redirect()->route('slider')->with('status', $status);
      } elseif (stripos($slag, 'header_') !== false) {
        $status = $this->save_header($request, $slag);
        return redirect()->route('slider')->with('status', $status);
      } elseif ($slag == 'about'){
        $status = $this->save_about($request);
        return redirect()->route('about')->with('status', $status);
      }  elseif ($slag == 'coordinate') {
        if(strpos($request['description'], '<iframe src=') === false){
          return redirect()->back()->withErrors(['msg' => 'Неправильний формат']);
        } else {
          $model = Content::where(['slag' => $slag])->first();
          $model->description = trim($request['description']);
          $model->save();
          return redirect()->route('show_content', ['slag' => 'coordinate']);
        }
      } elseif($slag == 'button') {
        $model = Content::where(['slag' => 'button'])->first();
        $model->header = $request['header'];
        $model->description = $request['description'];
        $model->save();
        return redirect()->route('slider')->with('status', 'Збережено!');
      } elseif ($slag == 'logo'){
        $model = Content::where(['slag' => 'logo'])->first();
        $image = $request->file('logo');
        if($image){
          $status = $this->save_big_image($model, $image);
        }
        return redirect()->back()->with('status', 'Збережено!');
      } elseif($slag == 'galery'){
        $status = $this->save_galery($request);
        return redirect()->back()->with('status', $status);
      } else {
        return redirect()->route('home');
      }
    }

    public function save_big_image($model, $image)
    {
      if ($image) {
        $path = $image->store('source', 'public');
        $base = basename($path);
          if ($model->header) {
            Storage::disk('public')->delete('source/' . $model->header);
          }
          $model->header = $base;
          $model->save();
          return 'Збережено!';
      } else {
        return 'Error';
      }
    }

    public function save_header($request, $slag)
    {
      $model = Content::where(['slag' => $slag])->first();
      $model->header = $request['header'];
      $model->description = $request['description'];
      $model->save();
      return 'Збережено!';
    }

    public function save_about($request)
    {
      $result = Content::show_about();
      $image = $request->file('foto');
      if($image){
        $ext = $image->extension();
        if($ext == 'png' && $request->has('transparency') && $request['transparency'] == "on"){
          $base = $this->save_png_with_transperente($image, $ext);
          $model_foto = $result['foto'];
          if ($model_foto->header) {
            Storage::disk('public')->delete('source/' . $model_foto->header);
          }
          $model_foto->header = $base;
          $model_foto->save();
        } else {
          $base = $this->save_big_image($result['foto'], $image);
        }
      }
      $model_text = $result['content'];
      $model_text->header = $request['header'];
      $model_text->description = $request['description'];
      $model_text->save();
      return 'Збережено!';
    }

    public function save_png_with_transperente($image, $ext){
      $base = $filename = md5(microtime() . rand(0, 9999)).'.'.$ext;
      $image = imagecreatefrompng($image);
      $width = imagesx($image);
      $height = imagesy($image);
      $borderWidth = 2;
      $newWidth = $width + ($borderWidth * 2);
      $newHeight = $height + ($borderWidth * 2);
      $borderedImage = imagecreatetruecolor($newWidth, $newHeight);
      $white = imagecolorallocate($borderedImage, 255, 255, 255);
      imagefill($borderedImage, 0, 0, $white);
      imagecopy($borderedImage, $image, $borderWidth, $borderWidth, 0, 0, $width, $height);
      $pngTransparency = imagecolorallocatealpha($borderedImage, 255, 255, 255, 127);
      imagefill($borderedImage , 0, 0, $pngTransparency);
      imagepng($image, storage_path('app/public/source/'.$base));
      imagedestroy($image);
      imagedestroy($borderedImage);
      return $base;
    }

    public function save_galery($request){
      $model = Content::where(['slag' => 'galery'])->first();
      if(!$model){
        $model = new Content();
        $model->section = 'galery';
        $model->header = 'galery';
        $model->slag = 'galery';
      }
      $arr_post = $request->file('galeryFiles');
      if($arr_post){
        foreach($arr_post as $image){
          if ($image) {
            $path = $image->store('galery', 'public');
            $base = basename($path);
            $gal_arr[] = $base;
          }
        }
        $gal_arr = array_diff($gal_arr, array(''));
        $model->description = implode(';', $gal_arr);
        $model->save();
        return 'Збережено! ';
      } else {
        return 'Щось не так';
      }
    }
}
