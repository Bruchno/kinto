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
@if (session('status'))
<div class="alert alert-success">
   {{ session('status') }}
</div>
@endif
<table class="table table-striped">
<thead>
 <tr>
   <th scope="col">#</th>
   <th scope="col">Ім'я</th>
   <th scope="col">Адмін</th>
   <th scope="col">Редагувати</th>
   <th scope="col">Видалити</th>
 </tr>
</thead>
<tbody>
 @foreach ($users_model as $model)
 <tr>
   <th scope="row">{{ $model->id }}</th>
   <td>{{ $model->name }}</td>
   <td>
     @if($model->admin == 1)
     Admin
     @else
     Користувач
     @endif
   </td>
   <td>
     <a href="{{ route('admin.edit', $model->id) }}">
     <button type="button" class="btn btn-secondary">
     Права</button></a></td>
   <td>
     <form action="{{ route('admin.destroy', $model->id) }}" method="POST">
       @csrf
       <!-- @method('DELETE') -->
       <button type="submit" class="btn btn-dark">Видалити</button>
     </form>
   </td>
 </tr>
 @endforeach

</tbody>

</table>

@endsection
