@extends('layouts.adminzone')

@section('content')

     @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Категорії</h3>

        <div class="card-tools px-sm-4">
          <form class="row" method="post" action="{{ route('category.store') }}">
            @csrf
          <p>Назва нової категорії</p>
          <div class="input-group input-group-sm">
            <input type="text" class="form-control" name="title">
            <span class="input-group-append">
              <button type="submit"class="btn btn-info btn-flat">Save</button>
            </span>
          </div>
        </form>
        </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
          <thead>
            <tr>
              <th>ID</th>
              <th>Назва</th>
              <th>Редагувати</th>
              <th>Видалити</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($models as $model)
            <tr>
              <td>{{ $model->id }}</td>
              <td>{{ $model->title }}</td>
              <td>
                <a href="{{ route('category.edit', ['category' => $model]) }}">
                        <i class="fas fa-edit"></i></a>
              </td>
              <td>
                <form action="{{ route('category.destroy', $model) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-dark"><i class="fas fa-trash-alt"></i></button>
                </form>
                </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
@endsection
