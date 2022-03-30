@extends("layouts.app")
@section('title')Login
@endsection
@section('content')
    <div class="login-wrapper">
        <div class="login-form">
            @if(session("failed"))
                <div class="alert alert-danger">
                    {{ session("failed") }}
                </div>
            @endif
            <form action="{{ route('login-store') }}" method="post">
                @csrf
                <div class="mt-3">
                    <label for="email" class="form-label">Email</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control {{ ($errors->has('email')) ? 'is-invalid' : ''}}"
                    >
                    <span class="text-danger">{{ ($errors->has('email')) ? $errors->first('email') : '' }}</span>
                </div>
                <div class="mt-3">
                    <label for="password" class="form-label">Password</label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control {{ ($errors->has('password')) ? 'is-invalid' : ''}}"
                    >
                    <span class="text-danger">{{ ($errors->has('password')) ? $errors->first('password') : '' }}</span>
                </div>
                <button class="btn btn-primary mt-3">Sign In</button>
            </form>
        </div>
    </div>
@endsection
