@extends('layouts.frontend.master', ['title' => 'Login', 'description' => 'Login'])

@section('content')
  <section class="login_area page_section_pad_50">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7">
          <div class="card login_card">

            <div class="card-body logincard_body">
              <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="login_padding">
                  <div class="row justify-content-center mb-3">

                    <div class="col-md-8">
                      <input id="email" type="email"
                        class="login_input form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus
                        placeholder="Enter Your Email*">

                      @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>

                  <div class="row justify-content-center mb-3">

                    <div class="col-md-8">
                      <input id="password" type="password"
                        class="login_input form-control @error('password') is-invalid @enderror" name="password" required
                        autocomplete="current-password" placeholder="Password*">

                      @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>

                  <div class="row justify-content-center mb-3">
                    <div class="col-md-4">
                      <div class="form-check">
                        <input class="form-check-input " type="checkbox" name="remember" id="remember"
                          {{ old('remember') ? 'checked' : '' }} style="margin-top:6px">

                        <label class="form-check-label forget_pass_text" for="remember">
                          {{ __('Remember Me') }}
                        </label>
                      </div>

                    </div>
                    <div class="col-md-4">
                      @if (Route::has('password.request'))
                        <a class="forget_pass_text" href="{{ route('password.request') }}">
                          {{ __('Forgot Your Password?') }}
                        </a>
                      @endif
                    </div>
                  </div>

                  <div class="row justify-content-center mb-0">
                    <div class="col-md-8">
                      <button type="submit" class="form-control btn login_btn">
                        {{ __('Login') }}
                      </button>
                    </div>
                  </div>
                {{--   <div class="row justify-content-center mb-0 mt-3">
                    <div class="col-md-8">
                      <a class="form-control signup_text" href="{{ route('register') }}">
                        {{ __("Don't Have an Account? Sign UP") }}
                      </a>
                    </div>
                  </div> --}}
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
@endsection
