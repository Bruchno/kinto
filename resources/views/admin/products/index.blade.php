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
        <h3 class="card-title">Товари</h3>

        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <div class="input-group-append">

                <a class="nav-link" href="{{ route('product.create') }}">
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
              <td scope="col">{{ $model->id }}</td>
              <td scope="col">
                @if($model->preview != NULL && $model->preview != '')
                     <img src="{{ asset('storage/source/'. $model->preview) }}" class="img-thumbnail" width="80px;">
                 @endif
               </td>
              <td scope="col">{{ $model->name }}</td>
              <td scope="col">{{ $model->price }}</td>
              <td scope="col">{{ $model->category->title }}</td>
              <td scope="col" @if($model->discount > 0) class="text-danger" @endif>
                {{ $model->discount }}%
              </td>
              <td scope="col">
                <a href="{{ route('product.show', ['product' => $model]) }}">
                <button type="button" class="btn btn-light">
                <i class="fas fa-eye"></i></button></a>
                <a href="{{ route('product.edit', ['product' => $model]) }}">
                <button type="button" class="btn btn-light">
                  <i class="fas fa-edit"></i>
                </button></a>
                <button type="button" class="btn btn-light"
                data-toggle="modal" data-target="#modal-default-{{ $model->id }}">
                  <i class="fas fa-trash-alt"></i>
                </button>
                <div class="modal fade" id="modal-default-{{ $model->id }}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Видалити {{ $model->name }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <form action="{{ route('product.destroy', $model->id) }}" method="POST" id="detail-{{ $model->id }}">
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
