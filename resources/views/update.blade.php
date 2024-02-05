@extends('layouts.create_update')
@section('title')
Update Comic
@endsection
@section('route')
{{ route('comics.update', $comic) }}
@endsection
@section('method')
@method('PUT')
@endsection