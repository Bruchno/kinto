@extends('layouts.adminzone')
@section('content')

        <!-- Validation Errors -->


    <div class="col-md-8">
        <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">{{ __('Register') }}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">{{ __('Name') }}</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control"
                             name="name" id="inputEmail3"
                             placeholder="Name" value="{{ old('name') }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-4 col-form-label">{{ __('Email') }}</label>
                    <div class="col-sm-8">
                      <input type="email" name="email" class="form-control"
                      id="email" placeholder="Email" value="{{ old('email') }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="password" class="col-sm-4 col-form-label">{{ __('Password') }}</label>
                    <div class="col-sm-8">
                      <input type="password" name="password"
                      class="form-control" id="password"
                      required autocomplete="new-password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="password_confirmation" class="col-sm-4 col-form-label">
                      {{ __('Confirm Password') }}</label>
                    <div class="col-sm-8">
                      <input type="password" name="password_confirmation"
                      class="form-control" id="password_confirmation" required>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">{{ __('Register') }}</button>
                  <!-- <button type="submit" class="btn btn-default float-right">Cancel</button> -->
                  <a class="underline text-sm text-gray-600 hover:text-gray-900  float-right" href="{{ route('login') }}">
                      {{ __('Already registered?') }}
                  </a>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
        </div>
@endsection
