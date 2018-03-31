@extends('layouts.auth')

@section('authenticate')
    <div class="card card-register bg-white text-dark mx-auto my-auto">
        <h2 class="title text-primary">LINQUE</h2>
        <form class="form" method="POST" action="{{ route('login') }}">
            @csrf
            <p class="mt-3">Email Address:</p>
            <input type="text" class="form-control" placeholder="Email"  name="email" >
            
            <p class="mt-3">Password: </p>
            <input type="password" class="form-control" placeholder="Password" name="password" >
            
            <button type="submit" class="btn btn-primary btn-block btn-round">Login</button>
             <hr class="my-2"/>
            <a id="storenxtbtn" href="{{ route('register') }}" 
                class="btn btn-outline-primary btn-block btn-round mt-0">
                Register
            </a>
        </form>
        <div class="forgot">
            <a href="{{ route('password.request') }}" class="btn btn-link text-info btn-block mt-1 ">Forgot password?</a>
        </div>
    </div>
@endsection
