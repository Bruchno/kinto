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
        <div class="card-header">
          <h3 class="card-title">Наші клієнти</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <div class="input-group-append">

                  <a class="nav-link" href="{{ route('team.create') }}">
                    <button class="btn btn-light">
                    Створити
                    </button>
                  </a>

              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
   <table class="table table-hover text-nowrap">
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
             <a href="{{ route('team.show', $model->id) }}">
             <button type="button" class="btn btn-secondary">
             <i class="fas fa-eye"></i></button></a>
             <a href="{{ route('team.edit', ['team' => $model]) }}">
             <button type="button" class="btn btn-secondary">
             <i class="fas fa-edit"></i></button></a>
             <button type="button" class="btn btn-secondary"
                     data-toggle="modal" data-target="#modal-default-{{ $model->id }}">
               <i class="fas fa-trash-alt"></i>
             </button>
           </td>
         </tr>
         <div class="modal fade" id="modal-default-{{ $model->id }}">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header">
                 <h4 class="modal-title">Видалити {{ $model->fullname }}</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <div class="modal-footer justify-content-between">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                 <form action="{{ route('team.destroy', $model) }}" method="POST" id="detail-{{ $model->id }}">
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




            <!-- Modal -->
            <div class="modal fade" id="deleteModal-{{ $model->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Видалити {{ $model->title }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            Ви дійсно хочете це видалити?
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
 </div></div></div></div>

@endsection
