@extends('layouts.main')

@section('main')
    <main class="container">
        <h1 class="text-center m-5">Create Comic</h1>
        <form action="{{ route('comics.store')}}" method="POST">
            @csrf
            <div class="row g-3">
            <div class="col-6">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="col-6">
                <label for="thumb" class="form-label">Link Thumb</label>
                <input type="text" class="form-control" id="thumb" name="thumb">
            </div>
            <div class="col-6">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price">
            </div>
            <div class="col-6">
                <label for="series" class="form-label">Series</label>
                <input type="text" class="form-control" id="series" name="series">
            </div>
            <div class="col-6">
                <label for="sale_date" class="form-label">Sale Date</label>
                <input type="date" class="form-control" id="sale_date" name="sale_date">
            </div>
            <div class="col-6">
                <label for="type" class="form-label">Type</label>
                <input type="text" class="form-control" id="type" name="type">
            </div>
            <div class="col-6">
                <label for="artists" class="form-label">Artists</label>
                <input type="text" class="form-control" id="artists" name="artists">
            </div>
            <div class="col-6">
                <label for="writers" class="form-label">Writers</label>
                <input type="text" class="form-control" id="writers" name="writers">
            </div>
        </div>
            <div class="col-12">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </main>
@endsection
