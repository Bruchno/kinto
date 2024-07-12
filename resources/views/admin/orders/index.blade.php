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
          <h3 class="card-title">Замовлення</h3>

          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <div class="input-group-append">

                  <a class="nav-link" href="">
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
           <th scope="col">Телефон</th>
           <th scope="col">E-mail</th>
           <th scope="col">Ім'я</th>
           <th scope="col">Дата/час</th>
           <th scope="col">Кількість персон</th>
           <th scope="col">Статус</th>
           <th scope="col">Дії</th>
         </tr>
       </thead>
       <tbody>
         @foreach ($models as $model)
         <tr>
           <th scope="row">{{ $model->phone }}</th>
           <td>{{ $model->email }}</td>
           <td>{{ $model->name }}</td>
           <td>{{ $model->date_order }}</td>
           <td>{{ $model->count_person }}</td>
           <td>
             @if($model->status == 0)
               Очікує
             @else
               Виконано
             @endif
           </td>
           <td>
             <a href="{{ route('edit_order', $model->id) }}">
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
                 <h4 class="modal-title">Видалити замовлення</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <div class="modal-footer justify-content-between">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                 <form action="{{ route('delete_order', $model->id) }}" method="POST" id="detail-{{ $model->id }}">
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
         @endforeach

       </tbody>

   </table>
 </div></div></div></div>

@endsection
