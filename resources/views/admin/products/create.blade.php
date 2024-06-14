@extends('layouts.adminzone')
@section('content')
<style>
#input_preview {
  /* display: none; */
  overflow: hidden;
    position: absolute;
    clip: rect(0 0 0 0);
    opacity: 0;
}
</style>
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
<h2>Новий продукт</h2>
@if($errors->any())
<div class="alert alert-danger" role="alert">
  {!! $errors->first() !!}
</div>
@endif
<div class="card-body col-md-12">
<form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
     @csrf

    <div class="row mb-3">
      <div class="form-group field-details-arr_name">
        <label class="col-auto" for="details-arr_name-uk">Назва товару</label>
        <input type="text" class="form-control" name="name" value="" required>
    </div>
      <div class="form-group field-details-arr_name">
        <label class="col-auto" for="details-arr_price">Ціна</label>
        <input type="text" class="form-control" name="price" value="" required>
    </div>
  <label class="col-auto" for="details-brend_id">Категорія</label>
  <select id="details-brend_id" class="form-control" name="category_id" aria-required="true">
    @foreach($categories as $item)
    <option value="{{ $item->id }}">{{ $item->title }}</option>
    @endforeach
  </select>
</div>
    <div class="">
      <label class="col-auto" for="details-arr_name-uk">Короткий опис</label>
    <div class="row mb-3 p-3">
      <textarea name="short_desc" rows="5" class="form-control col-md-10"></textarea>
    </div>
    </div>

  </div>

    <div class="row mb-3">
    <div class="col-md-6">
      <p>Додати прев'ю</p>
    <div class="col-md-12">
      <div class="form-group field-input_preview">
        <label class="control-label" for="input_preview"></label>
        <input type="file" id="input_preview" name="preview">
        </div>
        <img src="/assets/add-a-photo.jpg" width="250px;" id="img_add_btn" onclick="click_change_file();">
      </div>
    </div>
    <div class="col-md-6">
      <div id="output">
    </div>
    </div>
    <br><br>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success">Зберегти</button>
      </div>

    </form>
  </div>

  <script>

  function click_change_file(){
  $('#input_preview').click();
  return true;
  }
  function handleFileSelect(evt) {
  var file = evt.target.files; // объект списка файлов ?
  var f = file[0];
  //Только картинки!
  if (!f.type.match('image.*')) {
      alert("Только картинки please....");
  }
  var reader = new FileReader();
  // Закрыть для сбора информации о файле.
  reader.onload = (function(theFile) {
      return function(e) {
          document.getElementById('output').innerHTML = '<span onclick=\"del_prew()\">X</span>';
          document.getElementById('output').innerHTML += ['<img class="img-thumbnail" title="', escape(theFile.name), '" src="', e.target.result, '" style = "max-width: 100%;" id = "', escape(theFile.name), '" />'].join('');

      };
  })(f);
  reader.readAsDataURL(f);
  }
  function del_prew(){
  document.getElementById('output').innerHTML = '';
  $("#input_preview").val("");
  }
  document.getElementById('input_preview').addEventListener('change', handleFileSelect, false);

  </script>
  @endsection
