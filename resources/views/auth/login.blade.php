@extends('layouts.adminzone')
@section('content')

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

<div class="card col-lg-6">
  <div class="card-body">
<h6></h6><br>
    <!-- Horizontal Form -->
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="row mb-3">
        <label for="inputEmail" class="col-sm-4 col-form-label">{{ __('Email') }}</label>
        <div class="col-sm-8">
          <input type="email" name="email" class="form-control"  autocomplete="new-email"
          id="inputEmail" value="{{ old('email') }}" required autofocus >
        </div>
      </div>
      <div class="row mb-3">
        <label for="password" class="col-sm-4 col-form-label">{{ __('Password') }}</label>
        <div class="col-sm-8">
          <input type="password" name="password" class="form-control"
          id="password" required>
        </div>
      </div>
      <div class="form-group row">
        <div class="offset-sm-4 col-sm-8">
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck2">
            <label class="form-check-label" for="exampleCheck2">{{ __('Remember me') }}</label>
          </div>
        </div>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary">{{ __('Log in') }}</button>

          @if (Route::has('password.request'))
              <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                  {{ __('Forgot your password?') }}
              </a>
          @endif

      </div>
    </form><!-- End Horizontal Form -->

  </div>
</div>
@endsection
