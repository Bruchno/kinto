@extends('layouts.adminzone')

@section('content')

@include('admin.navbar', ['create' => false])
@if ($errors->any())
<div class="alert alert-danger">
   <ul>
       @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
       @endforeach
   </ul>
</div>

@endif
<table class="table">
  <thead>
    <tr>
      <th scope="row">
        <a href="{{ route('users') }}">
          <button type="button" class="btn btn-light">Всі користувачі</button>
        </a>
      </th>
      <td>
              <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#deleteModal">
                Видалити
              </button>
      </td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Id</th>
      <td colspan="2">{{ $model->id }}</td>
    </tr>
    <tr>
      <th scope="col">Login</th>
      <th colspan="2">{{ $model->name }}</th>
    </tr>
    <tr>
      <th scope="row">Admin</th>
      <td colspan="2">
        <div class="form-check form-check-inline">
          <form action="{{ route('admin.update', $model->id) }}" method="post">
            @csrf
          @if($model->admin == 1)
          <input class="form-check-input" type="checkbox" checked id="inlineCheckbox1" value="1">
          @else
          <input name="is_admin" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="0">
          @endif
          <button type="submit" class="btn btn-warning">Змінити</button>
        </form>
        </div>
      </td>
    </tr>
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
<form action="{{ route('admin.destroy', $model->id) }}" method="POST" id="detail-{{ $model->id }}">
  @csrf
  <button type="submit" class="btn btn-primary">Видалити</button>
</form>

</div>
</div>
</div>
</div>

@endsection
