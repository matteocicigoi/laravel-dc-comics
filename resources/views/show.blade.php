@extends('layouts.main')

@section('main')
    <main class="container text-center">
        <h1 class="m-5">{{ $comic['title'] }}</h1>
        <div class="row">
            <img src="{{ $comic['thumb'] }}" alt="{{ $comic['title'] }}" class="col-6">
            <div class="col-6 text-start">
                <h2>${{ $comic['price'] }}</h2>
                <p>{{ $comic['description'] }}</p>
                <ul>
                    <li>{{ $comic['series'] }}</li>
                    <li>{{ $comic['sale_date'] }}</li>
                    <li>{{ $comic['type'] }}</li>
                </ul>
                <div class="d-flex">
                    <div class="col-6">
                        <h3>Artists</h3>
                        <ul>
                            @foreach (explode('-', $comic['artists']) as $artist)
                                <li>{{ $artist }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-6">
                        <h3>Writers</h3>
                        <ul>
                            @foreach (explode('-', $comic['writers']) as $writer)
                                <li>{{ $writer }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
    </main>
@endsection
