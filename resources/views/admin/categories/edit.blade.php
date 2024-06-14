@extends('layouts.adminzone')

@section('content')

@include('admin.navbar', ['create' => false])
   <h2>Редагування категорії</h2>
   <form class="row g-3" action="{{ route('category.update', $category) }}" method="POST">
     @csrf
     @method('PUT')
       <div class="col-auto">
         <label for="staticEmail2" class="visually-hidden"></label>
         <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Назва нової категорії">
       </div>
       <input type="hidden" name="id_category" value="{{ $category->id }}">
       <div class="col-auto">
         <label for="inputPassword2" class="visually-hidden"></label>
         <input type="text" name="title" class="form-control" id="inputPassword2" placeholder="Піцца" value="{{ $category->title }}">
       </div>
       <div class="col-auto">
         <button type="submit" class="btn btn-primary mb-3">Зберегти</button>
       </div>
     </form>
@endsection
