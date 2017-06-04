@extends('layouts.main')

@section('content')
    <h2>{{ $category->translation }}</h2>
    @include('partials.things_grid', ['things' => $category->things])
@endsection