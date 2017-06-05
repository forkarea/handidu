@extends('layouts.main')

@section('content')
    <h2>{{ $user->fullname }} <span style="color: #888;">{{ '@'.$user->username }}</span></h2>

    @include('partials.things_grid', ['things' => $user->things->sortByDesc('created_at')])
    
    <h3>{{ __('interface.Posts') }}</h3>
    
    @foreach($user->posts as $post) 
        @include('partials.post')
    @endforeach
@endsection