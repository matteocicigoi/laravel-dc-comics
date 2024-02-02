@extends('layouts.main')

@section('main')
    <main class="container">
        <h1 class="text-center m-5">Laravel Dc Comics</h1>
        <div class="fixed-top text-end me-3 mt-3">
            <a href="{{ route('comics.create') }}"><i class="fa-solid fa-plus fs-1"></i></a>
        </div>
        <div class="row justify-content-center gap-5">
            @foreach ($comics as $comic)
                <div class="card" style="width: 18rem;">
                    <img src="{{ $comic['thumb'] }}" alt="{{ $comic['title'] }}" class="img-card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $comic['title'] }}</h5>
                        <p class="card-text">${{ $comic['price'] }}</p>
                        <a href="{{ route('comics.show', $comic) }}" class="btn btn-primary">Details</a>
                        <a href="{{ route('comics.edit', $comic) }}" class="btn btn-success"><i
                                class="fa-solid fa-pencil"></i></a>
                        <form action="{{ route('comics.destroy', $comic) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#Comic{{ $comic->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="Comic{{ $comic->id }}" tabindex="-1"
                                aria-labelledby="Comic{{ $comic->id }}Label" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="Comic{{ $comic->id }}Label">Delete Element
                                            </h1>
                                        </div>
                                        <div class="modal-body">
                                            {{ $comic['title'] }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success"
                                                data-bs-dismiss="modal">Yes</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                                aria-label="Close">No</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection
