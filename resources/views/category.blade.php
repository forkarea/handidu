@extends('layouts.main')

@section('content')
    <h2>{{ $category->translation }}</h2>
    <ul>
        @foreach($category->things as $thing)
            <li><a href="{{ $thing->link }}">{{ $thing->slug }}</a></li>
        @endforeach
    </ul>
@endsection