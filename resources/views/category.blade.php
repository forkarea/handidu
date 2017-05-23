@extends('layouts.main')

@section('content')
    <h2>{{ $category->name }}</h2>
    <ul>
        @foreach($category->things as $thing)
            <li><a href="{{ route('thing',['user' => $thing->author->username, 'slug' => $thing->slug]) }}">{{ $thing->slug }}</a></li>
        @endforeach
    </ul>
@endsection