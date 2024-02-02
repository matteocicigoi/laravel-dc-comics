@extends('layouts.create_update')
@section('route')
{{ route('comics.update', $comic) }}
@endsection
@section('method')
@method('PUT')
@endsection