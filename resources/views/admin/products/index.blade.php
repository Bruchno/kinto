@extends('layouts.adminzone')
@section('content')
@include('admin.navbar', ['create' => route('product.create')])
   <h2>Товари</h2>
   @if (session('status'))
       <div class="alert alert-success">
           {{ session('status') }}
       </div>
   @endif
   <table class="table table-striped">
     <thead>
         <tr>
           <th scope="col">#</th>
           <th scope="col">Прев'ю</th>
           <th scope="col">Назва</th>
           <th scope="col">Ціна</th>
           <th scope="col">Категорія</th>
           <th scope="col">Скидка</th>
           <th scope="col">Дії</th>
         </tr>
       </thead>
       <tbody>
         @foreach ($models as $model)
         <tr>
           <th scope="row">{{ $model->id }}</th>
           <td>
             @if($model->preview != NULL && $model->preview != '')
             <img src="{{ asset('storage/source/'. $model->preview) }}" class="img-thumbnail" width="80px;">
             @endif
           </td>
           <td>{{ $model->name }}</td>
           <td>{{ $model->price }}</td>
           <td>{{ $model->category->title }}</td>
           <td>{{ $model->discount }}%</td>
           <td>
             <a href="{{ route('product.show', ['product' => $model]) }}">
             <button type="button" class="btn btn-info">
             Переглянути</button></a>
             <a href="{{ route('product.edit', ['product' => $model]) }}">
             <button type="button" class="btn btn-warning">
             Редагувати</button></a>
             <!-- <a href="{{ route('product.copy', ['id' => $model->id]) }}">
             <button type="button" class="btn btn-secondary">
             Копіювати</button></a> -->
             <form action="{{ route('product.destroy', $model) }}" method="POST">
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
