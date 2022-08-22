@extends('layouts.main')
@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <main class="form-registration">
                <h1 class="h3 mb-3 fw-normal text-center"><i class="bi bi-vinyl-fill"></i><br>Registration Form</h1>
                <form action="/register" method="post">
                  @csrf
                  <div class="form-floating">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="name" required value={{ old('name') }}>
                    <label for="name">Name</label>
                    @error('name')                        
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-floating">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="username" required value={{ old('username') }}>
                    <label for="username">Username</label>
                    @error('username')                        
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" required value={{ old('email') }}>
                    <label for="email">Email address</label>
                    @error('email')                        
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="form-floating">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                    <label for="password">Password</label>
                    @error('password')                        
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                              
                  <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
                </form>
                <small class="d-block text-center mt-3">Already Registered? <a href="/login">Login</a></small>
                <p class="mt-3 mb-3 text-muted text-center">&copy; 2022</p>
              </main>
        </div>
    </div>
@endsection