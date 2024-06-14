@extends('layouts.adminzone')
@section('content')
@include('admin.navbar', ['create' => route('team.create')])
   <h2>Наша команда</h2>
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
           <th scope="col">Ім'я</th>
           <th scope="col">Посада</th>
           <th scope="col">Дії</th>
         </tr>
       </thead>
       <tbody>
         @foreach ($models as $model)
         <tr>
           <th scope="row">{{ $model->id }}</th>
           <td>
             @if($model->avatar != NULL && $model->avatar != '')
             <img src="{{ asset('storage/source/'. $model->avatar) }}" class="img-thumbnail" width="80px;">
             @endif
           </td>
           <td>{{ $model->fullname }}</td>
           <td>{{ $model->position }}</td>
           <td>
             <a href="{{ route('team.edit', ['team' => $model]) }}">
             <button type="button" class="btn btn-secondary">
             Редагувати</button></a>
             <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $model->id }}">
               Видалити
             </button>
           </td>
         </tr>

            <!-- Modal -->
            <div class="modal fade" id="deleteModal-{{ $model->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Видалити {{ $model->title }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            Ви дійсно хочете видалити продукт?
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
         @endforeach

       </tbody>

   </table>


@endsection
