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
      <h3 class="card-title" style="font-size:2rem">Карта googleMap</h3>
    </div>
    <div class="card-body">
      <form action="{{ route('update_content', 'coordinate') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-sm-6">
            <!-- textarea -->
            <div class="form-group">
              <label>Вставити фрейм з googleMap</label>
              <textarea name="description" class="form-control" rows="3" >
              </textarea>
            </div>
          </div>
        </div>

      <div class="form-group">
          <button type="submit" class="btn btn-light">Save</button>
        </div>
      </form>
      <div class="col-md-6">
        <div class="map_container ">
          {!! $model->description !!}
          <!-- <div id="googleMap">{!! $model->description !!}</div> -->
          <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d11546.632182134601!2d29.977438105171323!3d47.71284964028306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sru!2sua!4v1719512260863!5m2!1sru!2sua" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
        </div>
      </div>
    </div>
  </div>

@endsection
