@extends('layouts.adminzone')

@section('content')

@include('admin.navbar', ['create' => false])
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<table class="table">
  <thead>
    <tr>
      <th scope="row">
        <a href="{{ route('team.index') }}">
          <button type="button" class="btn btn-light">Вся команда</button>
        </a>
      </th>
      <td>
        <a href="{{ route('team.edit', ['team' => $model]) }}">
          <button type="button" class="btn btn-secondary">
            Редагувати</button></a></td>
            <td>
              <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#deleteModal">
                Видалити
              </button>
      </td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"></th>
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

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">Видалити {{ $model->fullname }}</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
Ви дійсно хочете видалити особу?
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Відмінити</button>
<form action="{{ route('team.destroy', $model->id) }}" method="POST" id="detail-{{ $model->id }}">
  @csrf
  @method('DELETE')
  <button type="submit" class="btn btn-primary">Видалити</button>
</form>

</div>
</div>
</div>
</div>

@endsection
