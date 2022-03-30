@extends('layouts.app')
@section('title')Գրադարանավարներ
@endsection
@section('content')
    @include('includes.navbar')
    <div class="container">
        <h2>Գրադարանների ցուցակ</h2>
        @if(isset($librarians))
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Անուն, ազգանուն</th>
                        <th scope="col">Հեռախոս</th>
                        <th scope="col">Նկար</th>
                        <th scope="col">Էլ․ հասցե</th>
                        <th scope="col">Վերիֆիկացված է</th>
                        <th scope="col">Արգելափակել</th>
                        <th scope="col">Մուտք է գործել</th>
                        <th scope="col">Կարգավորումներ</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i = 0; $i < count($librarians); $i++)
                        <tr>
                            <td>{{$i + 1}}</td>
                            <td>{{ $librarians[$i]->name }}</td>
                            <td>{{ $librarians[$i]->phone }}</td>
                            <td>{{ $librarians[$i]->avatar }}</td>
                            <td>{{ $librarians[$i]->email }}</td>
                            <td>
                                @if($librarians[$i]->is_verified === 1)
                                    <span>Այո</span>
                                @else
                                    <span>Ոչ</span>
                                @endif
                            </td>
                            <td>
                                @if($librarians[$i]->is_blocked === 1)
                                    <button>Արգելափակել</button>
                                @else
                                    <button>Ապաարգելափակել</button>
                                @endif
                            </td>
                            <td>{{ $librarians[$i]->check_in_at }}</td>
                            <td>
                                <button class="btn btn-success">Փոփոխել</button>
                                <button class="btn btn-danger">Հեռացնել</button>
                            </td>

                        </tr>
                    @endfor
                </tbody>
            </table>
        @else
            <p style="text-align: center">Empty List</p>
        @endif
    </div>
@endsection
