@extends('layouts.adminzone')
@section('content')
<style>
#logo {
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
<br>
<br>
    <div class="card card-info">
    <div class="card-header col-sm-6">
      <h3 class="card-title" style="font-size:2rem">Редагування логотипу</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('update_content', ['slag' => 'logo']) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
        <div class="col-md-6">
          <p>Фото</p>
        <div class="col-md-12">
          <div class="form-group field-logo">
            <label class="control-label" for="logo">Є</label>
            <input type="file" id="logo" name="logo">
            </div>
            <img src="{{ asset('storage/source/'.$model->header) }}" width="250px;" id="img_add_btn" onclick="click_change_file();">
          </div>
        </div>
        <div class="col-md-6">
          <h5>Буде</h5>
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
  </div>

  <script>

  function click_change_file(){
  $('#logo').click();
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
  console.log('this');
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
  $("#logo").val("");
  }
  document.getElementById('logo').addEventListener('change', handleFileSelect, false);

  </script>
  @endsection
