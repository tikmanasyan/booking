@extends("layouts.app")
@section('title')Welcome
@endsection
@section('content')
    <div class="container">
        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>

    </div>
@endsection
