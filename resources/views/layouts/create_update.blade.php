@extends('layouts.main')

@section('main')
    <main class="container">
        <h1 class="text-center m-5">Create Comic</h1>
        <div class="fixed-top text-start ms-3 mt-3">
            <a href="{{ route('comics.index') }}"><i class="fa-solid fa-house fs-1"></i></a>
        </div>
        <form action="@yield('route')" method="POST">
            @csrf
            @yield('method')
            <div class="row g-3">
            <div class="col-6">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="@if(isset($comic)){{ $comic->title }}@endif" required>
            </div>
            <div class="col-6">
                <label for="thumb" class="form-label">Link Thumb</label>
                <input type="text" class="form-control" id="thumb" name="thumb" value="@if(isset($comic)){{ $comic->thumb }}@endif" required>
            </div>
            <div class="col-6">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="@if(isset($comic)){{ $comic->price }}@endif" required>
            </div>
            <div class="col-6">
                <label for="series" class="form-label">Series</label>
                <input type="text" class="form-control" id="series" name="series" value="@if(isset($comic)){{ $comic->series }}@endif" required>
            </div>
            <div class="col-6">
                <label for="sale_date" class="form-label">Sale Date</label>
                <input type="date" class="form-control" id="sale_date" name="sale_date" value="@if(isset($comic)){{ $comic->sale_date }}@endif" required>
            </div>
            <div class="col-6">
                <label for="type" class="form-label">Type</label>
                <input type="text" class="form-control" id="type" name="type" value="@if(isset($comic)){{ $comic->type }}@endif" required>
            </div>
            <div class="col-6">
                <label for="artists" class="form-label">Artists</label>
                <input type="text" class="form-control" id="artists" name="artists" value="@if(isset($comic)){{ $comic->artists }}@endif" required>
            </div>
            <div class="col-6">
                <label for="writers" class="form-label">Writers</label>
                <input type="text" class="form-control" id="writers" name="writers" value="@if(isset($comic)){{ $comic->writers }}@endif" required>
            </div>
        </div>
            <div class="col-12">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control" required>@if(isset($comic)){{ $comic->description }}@endif</textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </main>
@endsection
