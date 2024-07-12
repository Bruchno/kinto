@extends('layouts.adminzone')

@section('content')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="row">
 <div class="col-12">
   <div class="card">
<table class="table">
  <thead>
      <th scope="row">
        <a href="{{ route('team.index') }}">
          <button type="button" class="btn btn-secondary">Всі клієнти</button>
        </a>
      </th>
      <td>
        <a href="{{ route('team.edit', ['team' => $model]) }}">
          <button type="button" class="btn btn-secondary">
            <i class="fas fa-edit"></i></button></a></td>
            <td>
              <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-default">
                <i class="fas fa-trash-alt"></i>
              </button>
      </td>
    </tr>
    <tr>
      <th colspan="2">
        Клієнт
      </th>
    </tr>
    <tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Фото</th>
      <td colspan="2">
        @if($model->avatar != NULL && $model->avatar != '')
        <img src="{{ asset('storage/source/'. $model->avatar) }}" class="img-thumbnail" width="250px;">
        @endif
      </td>
    </tr>
    <tr>
      <th scope="row">Id</th>
      <td colspan="2">{{ $model->id }}</td>
    </tr>
    <tr>
      <th scope="col">Ім'я</th>
      <th colspan="2">{{ $model->fullname }}</th>
    </tr>
    <tr>
      <th scope="row">Посада</th>
      <td colspan="2">{{ $model->position }}</td>
    </tr>
    <tr>
      <th scope="row">Повідомлення</th>
      <td colspan="2">{{ $model->description }}</td>
  </tbody>
</table>
</div></div></div>


<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Видалити {{ $model->name }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <form action="{{ route('product.destroy', $model->id) }}" method="POST" id="detail-{{ $model->id }}">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-primary">Видалити</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@endsection
