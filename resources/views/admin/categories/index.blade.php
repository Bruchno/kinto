@extends('layouts.adminzone')

@section('content')

@include('admin.navbar', ['create' => false])
   <h2>Категорії</h2>
   <form class="row g-3" method="post" action="{{ route('category.store') }}">
     @csrf
       <div class="col-auto">
         <label for="staticEmail2" class="visually-hidden"></label>
         <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Назва нової категорії">
       </div>
       <div class="col-auto">
         <label for="inputPassword2" class="visually-hidden"></label>
         <input type="text" name="title" class="form-control" id="inputPassword2" placeholder="Піцца" value="{{ old('title') }}">
       </div>
       <div class="col-auto">
         <button type="submit" class="btn btn-primary mb-3">Зберегти</button>
       </div>
     </form>
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
<table class="table table-striped">
  <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Назва</th>
        <th scope="col">Редагувати</th>
        <th scope="col">Видалити</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($models as $model)
      <tr>
        <th scope="row">{{ $model->id }}</th>
        <td>{{ $model->title }}</td>
        <td>
          <a href="{{ route('category.edit', ['category' => $model]) }}">
          <button type="button" class="btn btn-secondary">
          Редагувати</button></a></td>
        <td>
          <form action="{{ route('category.destroy', $model) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-dark">Видалити</button>
          </form>
        </td>
      </tr>
      @endforeach

    </tbody>

</table>
@endsection
