@extends('layouts.auth')

@section('authenticate')
                        <div class="card card-register bg-white text-dark mx-auto my-auto">
                            <h3 class="title mb-3 text-primary">Register</h3>

                            <!-- Tab panes -->
                            <form class="form"  method="POST" action="{{ route('register') }}">
                                @csrf
                                @if (count($errors))
                                    <ul>
                                        @foreach($errors->all() as $error)
                                        <div class="alert alert-danger" role="alert">
                                            {{ $error }}
                                        </div>
                                        @endforeach
                                    </ul>
                                @endif
                                <div class="tab-content">
                                    <div id="auth">
                                        <p class="lead text-center mb-0">Auth Profile</p>
                                        <hr class="my-2">
                                        <p class="mt-3">Email Address:</p>
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" />
                                        <p class="mt-3">Password:</p>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                        <p class="mt-3">Confirm Password:</p>
                                        <input type="password" id="password-confirm" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                                        <hr class="my-3">
                                        <a href="{{ route('login') }}" class="btn btn-outline-primary btn-round mt-0">
                                            <i class="nc-icon nc-single-02"></i>
                                            Login
                                        </a>
                                        <a id="authnxtbtn" class="btn btn-primary text-white pull-right btn-round mt-0">
                                            <i class="nc-icon nc-minimal-right"></i>
                                            Next
                                        </a>
                                    </div>
                                    <div id="store">
                                        <p class="lead text-center mb-0">Store Profile</p>
                                        <hr class="my-2">
                                        <p class="mt-3">Store Name:</p>
                                        <input type="text" class="form-control" name="strname" placeholder="Store Name..." />
                                        <p class="mt-3">Store Type:</p>
                                        <select class="custom-select w-100" id="strtypesel">
                                            <option selected hidden>Type...</option>
                                            <option value="1">Retail Store </option>
                                            <option value="2">Distributor Company</option>
                                        </select>
                                        <input type="text" id="strtype" class="form-control" name="strtype" hidden/>
                                        <p class="mt-3">Store Location:</p>
                                        <a id="strlocationbtn" class="btn btn-outline-primary btn-block btn-round mt-0">Set / Get Location</a>
                                        <input type="text" id="strlocation" class="form-control" name="strlocation" hidden/>
                                        <hr class="my-3">
                                        <a id="storeprvbtn" class="btn btn-primary text-white btn-round mt-0">
                                            <i class="nc-icon nc-minimal-left"></i>
                                            Prev
                                        </a>
                                        <a id="storenxtbtn" class="btn btn-primary text-white pull-right btn-round mt-0">
                                            <i class="nc-icon nc-minimal-right"></i>
                                            Next
                                        </a>
                                    </div>
                                    <div id="owner">
                                        <p class="lead text-center mb-0">Owner Profile</p>
                                        <hr class="my-2">
                                        <p class="mt-3">First Name:</p>
                                        <input type="text" class="form-control" name="fname" placeholder="First Name..." />
                                        <p class="mt-3">Last Name:</p>
                                        <input type="text" class="form-control" name="lname" placeholder="Last Name..." />
                                        <hr class="my-3">
                                        <a id="ownerprvbtn" class="btn btn-primary text-white btn-round mt-0">
                                            <i class="nc-icon nc-minimal-left"></i>
                                            Prev
                                        </a>
                                        <button type="submit" class="btn btn-danger pull-right btn-round mt-0"> {{ __('Register') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>

@endsection


@section('script')
    <script src="{{ asset('js/register.js') }}"></script>
@endsection