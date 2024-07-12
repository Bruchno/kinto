@extends('layouts.adminzone')
@section('content')
<style>
.input_file {
  /* display: none; */
  overflow: hidden;
    position: absolute;
    clip: rect(0 0 0 0);
    opacity: 0;
}
</style>

<h2>Оновлення галереї</h2>
<div class="row offset-md-1">
  @foreach($galery as $item)
  <img src="{{ asset('storage/galery/'.$item) }}" class="img-thumbnail" width="250px;">
  @endforeach
</div>
<div class="card-body">
  <form id="w0" action="{{ route('update_content', 'galery') }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div id="div_input" class="row">
        <div class="form-group field-add_file0">
          <label class="control-label" for="add_file0">Додати зображення для галереї</label>
          <input type="file" id="add_file0" class="input_file" name="galeryFiles[]" multiple="" accept="image/*">
        </div>
      </div>
      <div class="row m-3">
        <div class="col-md-6">
          <img src="/assets/add-a-photo.jpg" width="250px;" id="img_add_btn" onclick="click_change_file();">
        </div>
        <div class="col-md-6">
          <div id="output">
          </div>
        </div>
        <br><br>
      </div>
      <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
         <button type="submit" class="btn btn-primary">
           Зберегти
         </button>
        </div>
      </div>
    </form>
 </div>

<script>
 function makeCounter() {
   var currentCount = 0;
   var current_num = 0;
   return function() {
      return currentCount += 1;
    };
  }
  var current_inpt = 'add_file0';
  var counter = makeCounter();
  function click_change_file(){
    $('#' + current_inpt).click();
    return true;
  }
  function handleFileSelect(evt) {
    current_num = counter();
    var input = document.getElementById(current_inpt);
    var f = input.files[0];//file[0];
    //Только картинки!
    if (!f.type.match('image.*')) {
        alert("Только картинки please....");
    }
    var reader = new FileReader();

    current_inpt = 'add_file' + current_num;
    var str_input = '<input type="file" id="add_file' + current_num + '" class="input_file" name="galeryFiles[]" multiple accept="image/*" onchange="handleFileSelect(this)">';
    $('#div_input').append(str_input);

    current_inpt = 'add_file' + current_num;
    // Закрыть для сбора информации о файле.
    reader.onload = (function(theFile) {
        return function(e) {
          var str_test = '<div id="blok_del'+ current_num + '"><span onclick="del_prew(' + current_num + ')">X</span>';
          str_test += ['<img class="thumb" title="', escape(theFile.name), '" src="', e.target.result, '" style = "max-width: 100%;" id = "', escape(theFile.name), '" />'].join('');
          str_test += '</div>';
          document.getElementById('output').innerHTML += str_test;
        };
    })(f);
    // Чтение изображения в качестве данных  URL файла.
    reader.readAsDataURL(f);

    //$('#input_preview').hide();
}
function del_prew(num){
  document.getElementById('blok_del' + num).innerHTML = '';
  $("#add_file" + num).remove();
}
function del_item_img(sp){
  var bk = $( sp ).parent( '.block-img' );
  var val_hidden = $('#del-arr-img').val();
  var img_src = bk.children('img')[0].src;
  var new_val = val_hidden + img_src + ';;#';
  $('#del-arr-img').val(new_val);
  $(bk).remove();
}
document.getElementById(current_inpt).addEventListener('change', handleFileSelect, false);

</script>
@endsection
