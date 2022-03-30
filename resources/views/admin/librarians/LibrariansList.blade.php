@extends('layouts.app')
@section('title')Librarians
@endsection
@section('content')
    @include('includes.navbar')
    <div class="container">
        <h2>Librarian List</h2>
        @if(isset($librarians))
            <tbale class="table">
                <thead>
                    <tr>
                        <th rel="cols">#</th>
                        <th rel="cols">Full Name</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i = 0; $i < count($librarians); $i++)
                        <tr>
                            <td>{{$i + 1}}</td>
                            <td>{{ $librarians[$i]->name }}</td>
                        </tr>
                    @endfor
                </tbody>
            </tbale>
        @else
            <p style="text-align: center">Empty List</p>
        @endif
    </div>
@endsection
