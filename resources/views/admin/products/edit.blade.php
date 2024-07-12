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
<br><br>
  <div class="card card-info">
  <div class="card-header">
    <h3 class="card-title" style="font-size:2rem">Редагування {{ $model->name }}</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
<form action="{{ route('product.update', $model) }}" method="post" enctype="multipart/form-data">
     @csrf
     @method('PUT')
     <div class="row">
       <div class="col-sm-6">
         <!-- text input -->
         <div class="form-group">
           <label>Назва товару</label>
           <input type="text" class="form-control" name="name" value="{{ $model->name }}" required>
         </div>
       </div>
       <div class="col-sm-6">
         <div class="form-group">
           <label>Ціна</label>
           <input type="text" class="form-control" name="price" value="{{ $model->price }}" required>
         </div>
       </div>
     </div>
     <div class="row">
       <div class="col-sm-6">
         <!-- textarea -->
         <div class="form-group">
           <label>Короткий опис</label>
           <textarea name="short_desc" rows="5" class="form-control col-md-10">
             {{ $model->short_desc }}
           </textarea>
         </div>
       </div>
       <div class="col-sm-6">
         <!-- select -->
         <div class="form-group">
           <label>Категорія</label>
           <select id="details-brend_id" class="form-control" name="category_id" aria-required="true">
             @foreach($categories as $item)
              @if($item->id == $model->category_id)
                 <option value="{{ $item->id }}" selected>{{ $item->title }}</option>
             @else
                 <option value="{{ $item->id }}">{{ $item->title }}</option>
             @endif
             @endforeach
           </select>
         </div>
       </div>
     </div>
    <div class="form-group field-details-arr_name">
      <label class="col-auto" for="details-arr_price">Скидка</label>
        <input type="text" class="form-control" name="discount" value="{{ $model->discount }}">
    </div>

    <div class="row mb-3">
    <div class="col-md-6">
      <p>Змінити прев'ю</p>
    <div class="col-md-12">
      <div class="form-group field-input_preview">
        <label class="control-label" for="input_preview"></label>
        <input type="file" id="input_preview" name="preview" value="{{ $model->preview }}">
        </div>
        <div id="output">
          @if($model->preview != NULL && $model->preview != '')
          <img src="{{ asset('storage/source/'. $model->preview) }}" class="img-thumbnail"  onclick="click_change_file();">
          @else
          <img src="/assets/add-a-photo.jpg" width="250px;" id="img_add_btn" onclick="click_change_file();">
          @endif
      </div>

      </div>
    </div>
    <div class="col-md-6">

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
