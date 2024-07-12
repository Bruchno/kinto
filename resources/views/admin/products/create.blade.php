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

@if($errors->any())
<div class="alert alert-danger" role="alert">
  {!! $errors->first() !!}
</div>
@endif
<br><br>
  <div class="card card-info">
  <div class="card-header">
    <h3 class="card-title" style="font-size:2rem">Новий продукт</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-sm-6">
          <!-- text input -->
          <div class="form-group">
            <label>Назва товару</label>
            <input type="text" class="form-control"
                   name="name" value="" required autocomplete="new-password">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Ціна</label>
            <input type="text" class="form-control" name="price" value="" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <!-- textarea -->
          <div class="form-group">
            <label>Короткий опис</label>
            <textarea name="short_desc" class="form-control" rows="3" ></textarea>
          </div>
        </div>
        <div class="col-sm-6">
          <!-- select -->
          <div class="form-group">
            <label>Категорія</label>
            <select class="form-control" name="category_id">
              @foreach($categories as $item)
              <option value="{{ $item->id }}">{{ $item->title }}</option>
              @endforeach
            </select>
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
        <button type="submit" class="btn btn-light">Save</button>
      </div>
    </form>
  </div>
  <!-- /.card-body -->
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
