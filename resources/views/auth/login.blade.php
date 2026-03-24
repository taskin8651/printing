@extends('custom.master')
@section('content')

<!--<< Breadcrumb Section Start >>-->
<div class="breadcrumb-wrapper section-padding bg-cover" style="background-image: url('{{ asset('assets/img/breadcrumb.png') }}');">
    <div class="container">
        <div class="page-heading">
            <div class="breadcrumb-sub-title text-center">
                <h1 class="wow fadeInUp" data-wow-delay=".3s">Sign In</h1>
                <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>
                        <i class="fal fa-minus"></i>
                    </li>
                    <li>Sign In</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Signin Section -->
<section class="signin-area section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-6 col-lg-7">

                <div class="signin-item">

                    <h3>Sign In to Your Account</h3>

                    {{-- SESSION MESSAGE --}}
                    @if(session('message'))
                        <div class="mb-3 p-2 text-sm bg-blue-100 text-blue-700">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        {{-- EMAIL --}}
                        <label for="email">Email</label>
                        <input id="email"
                               type="email"
                               name="email"
                               value="{{ old('email') }}"
                               placeholder="Enter your email"
                               required>

                        @error('email')
                            <small style="color:red;">{{ $message }}</small>
                        @enderror


                        {{-- PASSWORD --}}
                        <label for="password">Password</label>
                        <input id="password"
                               type="password"
                               name="password"
                               placeholder="Enter your password"
                               required>

                        @error('password')
                            <small style="color:red;">{{ $message }}</small>
                        @enderror


                        {{-- REMEMBER --}}
                        <div style="margin:10px 0;">
                            <label>
                                <input type="checkbox" name="remember">
                                Remember Me
                            </label>
                        </div>

                        {{-- SUBMIT --}}
                        <button type="submit" class="theme-btn w-100 text-center">
                            Sign In
                        </button>

                    </form>

                    <div class="info text-center mt-3">

                        {{-- FORGOT PASSWORD --}}
                        @if(Route::has('password.request'))
                            <p class="line1">
                                Or <a href="{{ route('password.request') }}">Forgot Password?</a>
                            </p>
                        @endif

                       
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

@endsection