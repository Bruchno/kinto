@extends('layouts.adminzone')

@section('content')

   <h2></h2>
   <div class="col-md-6 offset-sm-1">
       <!-- Horizontal Form -->
   <form class="row" method="post" action="{{ route('category.update', $category) }}">
     @csrf
     @method('PUT')
   <p>Редагування категорії</p>
   <div class="input-group input-group-sm">
     <input type="hidden" name="id_category" value="{{ $category->id }}">
     <input type="text" class="form-control" name="title" value="{{ $category->title }}">
     <span class="input-group-append">
       <button type="submit"class="btn btn-info btn-flat">Save</button>
     </span>
   </div>
 </form>
</div>
@endsection
