@extends('layouts.main')

@section('content')
    <h2>{{ $user->fullname }} <span style="color: #888;">{{ '@'.$user->username }}</span></h2>

    @include('partials.things_grid', ['things' => $user->things])
    
@endsection