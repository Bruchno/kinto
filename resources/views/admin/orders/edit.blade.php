@extends('layouts.adminzone')
@section('content')
<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

@if($errors->any())
<div class="alert alert-danger" role="alert">
  {!! $errors->first() !!}
</div>
@endif
<br>
<br>
    <div class="card card-info">
    <div class="card-header col-sm-6">
      <h3 class="card-title" style="font-size:2rem">Замовлення {{ $model->id }}</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('store_order', $model->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label>Телефон</label>
              <input type="text" class="form-control"
                     name="phone" value="{{ $model->phone }}" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label>Iм'я</label>
              <input type="text" class="form-control"
                     name="name" value="{{ $model->name }}" required>
            </div>
          </div>
        </div>
          <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label>E-mail</label>
              <input type="text" class="form-control" name="position"
                     value="{{ $model->email }}" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label>Кількість персон </label>
              <input type="number" class="form-control"
                     name="count_person" value="{{ $model->count_person }}">
            </div>
          </div>
        </div>

      <!-- datepicker -->

   <div class="row mb-3">
      <div class='col-sm-6'>
          <div class='input-group date' id='datetimepicker1'>
              <input type='text' name="date_order" class="form-control" value="{{ $model->date_order }}"/>
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
         </div>
      </div>

<!-- end datepicker -->

<div class="row">
<div class="offset-sm-2 col-sm-6">
  <div class="form-check">
    <input type="checkbox" name="status" @if($model->status != 0) checked @endif>
    <label class="form-check-label" for="exampleCheck2">Виконано</label>
  </div>
</div>
</div>
      <div class="form-group">
          <button type="submit" class="btn btn-light">Save</button>
        </div>
      </form>
    </div>
  </div>

  <script>
  $('#datetimepicker1').datetimepicker({
    format: "YYYY-MM-DD hh:mm:ss",
    defaultDate: new Date(),
  });
  </script>

  @endsection
