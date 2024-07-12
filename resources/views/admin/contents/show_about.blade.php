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
<table class="table">
  <thead>
    <tr>
      <th colspan="2">
        Про нас
      </th>
    </tr>
      <td>
        <a href="{{ route('show_content', 'about') }}">
          <button type="button" class="btn btn-secondary">
            <i class="fas fa-edit"></i></button></a></td>
    </tr>
    <tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Фото</th>
      <td colspan="2">
        @if($foto->header != NULL && $foto->header != '')
        <img src="{{ asset('storage/source/'. $foto->header) }}" class="img-thumbnail" width="250px;">
        @endif
      </td>
    </tr>
    <tr>
      <th scope="col">Заголовок</th>
      <th colspan="2">{{ $content->header }}</th>
    </tr>
    <tr>
      <th scope="row">Текст</th>
      <td colspan="2">{{ $content->description }}</td>
  </tbody>
</table>
</div></div></div>


@endsection
