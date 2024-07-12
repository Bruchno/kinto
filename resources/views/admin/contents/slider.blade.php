@extends('layouts.adminzone')

@section('content')

@if (session('status'))
    <div class="alert alert-secondary">
        {{ session('status') }}
    </div>
@endif
<div class="row">
 <div class="col-12">
   <div class="card">
<table class="table">

  <tbody>
    <tr>
      <th scope="row">Фото</th>
      <td colspan="2">
        @if($foto != NULL && $foto->header != '')
        <img src="{{ asset('storage/source/'.$foto->header) }}" class="img-thumbnail" width="250px;">
        @endif
      </td>
      <td>
        <a href="{{ route('show_content', ['slag' => 'main_foto']) }}">
          <button type="button" class="btn btn-secondary">
            <i class="fas fa-edit"></i></button>
          </button>
        </a>
      </td>
    </tr>
    @php $i = 1; @endphp
    @foreach($headers as $header)
    <tr>
      <th scope="row">{{ $header->header }}</th>
      <td colspan="2">{{ $header->description }}</td>
      <td>
        <a href="{{ route('show_content', ['slag' => 'header_'.$i]) }}">
          <button type="button" class="btn btn-secondary">
            <i class="fas fa-edit"></i></button>
            </a>
      </td>
      @php $i++; @endphp
    </tr>
    @endforeach
    <tr><th scope="row">Кнопка</th><td colspan="2"></td><td></td></tr>
    <tr>
      <th scope="row">{{ $button->header }}</th>
      <td colspan="2">{{ $button->description }}</td>
      <td>
        <a href="{{ route('show_content', ['slag' => 'button']) }}">
          <button type="button" class="btn btn-secondary">
            <i class="fas fa-edit"></i></button>
            </a>
      </td>
      @php $i++; @endphp
    </tr>
  </tbody>
</table>
</div></div></div>

<!-- /.modal -->

@endsection
