<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="layout-menu-fixed" data-base-url="{{url('/')}}" data-framework="laravel">
@section('title', __('Welcome to Library Management'))
<head>
    @include('partials.head')
</head>
<body>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-end">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-secondary me-2">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                @endif
            @endauth
        @endif
    </div>
    <div class="position-fixed top-50 start-50 translate-middle px-3">
        <div class="card mx-auto">
            <div class="row g-5">
                <div class="col-md-6 d-flex align-items-center">
                    <div class="card-body">
                        <h1 class="h4 card-title">Welcome to Library Management</h1>
                        <p class="card-text">
                            This system helps you manage your library efficiently. Keep track of books, members, borrow and return history—all in one place.
                        </p>
                        <p class="card-text">
                            Get started by logging in or registering as a new user. Librarians and members can access features based on their roles.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <img class="card-img card-img-right" src="{{ asset('assets/img/illustrations/library.png') }}" alt="Library Illustration">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Scripts -->
@include('partials.scripts')
<!-- / Include Scripts -->
</body>
</html>
