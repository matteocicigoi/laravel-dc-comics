@extends('layouts.main')

@section('main')
    <main class="container">
        <h1 class="text-center m-5">Laravel Dc Comics</h1>
        <div class="row justify-content-center gap-5">
            @foreach ($comics as $comic)
                <div class="card" style="width: 18rem;">
                    <img src="{{ $comic['thumb'] }}" alt="{{ $comic['title'] }}" class="img-card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $comic['title'] }}</h5>
                        <p class="card-text">${{ $comic['price'] }}</p>
                        <a href="{{ route('comics.show', $comic) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection
