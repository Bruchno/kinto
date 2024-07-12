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
    <tr>
      <th scope="row">
        <a href="{{ route('product.index') }}">
          <button type="button" class="btn btn-secondary">товари</button>
        </a>
      </th>
      <td>
        <a href="{{ route('product.edit', ['product' => $model]) }}">
          <button type="button" class="btn btn-secondary">
            <i class="fas fa-edit"></i></button></a></td>
            <td>
              <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-default">
                <i class="fas fa-trash-alt"></i>
              </button>
      </td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"></th>
      <td colspan="2">
        @if($model->preview != NULL && $model->preview != '')
        <img src="{{ asset('storage/source/'. $model->preview) }}" class="img-thumbnail" width="250px;">
        @endif
      </td>
    </tr>
    <tr>
      <th scope="row">Id</th>
      <td colspan="2">{{ $model->id }}</td>
    </tr>
    <tr>
      <th scope="col">Назва</th>
      <th colspan="2">{{ $model->name }}</th>
    </tr>
    <tr>
      <th scope="row">Ціна</th>
      <td colspan="2">{{ $model->price }}</td>
    </tr>
    <tr>
      <th scope="row">Опис</th>
      <td colspan="2">{{ $model->short_desc }}</td>
    </tr>
    @if($model->discount !== NULL)
    <tr>
      <th scope="row">Скидка</th>
      <td colspan="2">{{ $model->discount }}%</td>
    </tr>
    @endif
    <tr>
      <th scope="row">Категорія</th>
      <td colspan="2">{{ $model->cat_title }}</td>
    </tr>
  </tbody>
</table>

    </div>
  </div>
</div>
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
