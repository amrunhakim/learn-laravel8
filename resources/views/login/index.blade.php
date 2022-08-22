@extends('layouts.main')
@section('container')
    <div class="row justify-content-center">
        <div class="col-md-4">
            @if (session()->has('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            @if (session()->has('loginError'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('loginError') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <main class="form-signin">
                <h1 class="h3 mb-3 fw-normal text-center"><i class="bi bi-vinyl-fill"></i><br>Please Login</h1>
                <form action="/login" method="post">
                  @csrf
                  <div class="form-floating">
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com" required autofocus value={{ old('email') }}>
                    <label for="floatingInput">Email address</label>
                      @error('email')                          
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                  </div>
                  <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                    @error('password')                          
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                    @enderror
                  </div>
                              
                  <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                </form>
                <small class="d-block text-center mt-3">Not Registered? <a href="/register">Register Now!</a></small>
                <p class="mt-3 mb-3 text-muted text-center">&copy; 2022</p>
              </main>
        </div>
    </div>
@endsection