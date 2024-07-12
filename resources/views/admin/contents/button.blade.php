@extends('layouts.adminzone')
@section('content')

@if($errors->any())
<div class="alert alert-danger" role="alert">
  {!! $errors->first() !!}
</div>
@endif
<br>
<br>
    <div class="card card-info">
    <div class="card-header col-sm-6">
      <h3 class="card-title" style="font-size:2rem">Текст кнопки слайдера</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('update_content', 'button') }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label>Текст</label>
              <input type="text" class="form-control"
                     name="header" value="{{ $model->header }}" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <!-- textarea -->
            <div class="form-group">
              <label>Посилання</label>
              <input type="text" class="form-control"
                     name="description" value="{{ $model->description }}" required>
            </div>
          </div>

        </div>

      <div class="form-group">
          <button type="submit" class="btn btn-light">Save</button>
        </div>
      </form>
    </div>
  </div>
  @endsection
