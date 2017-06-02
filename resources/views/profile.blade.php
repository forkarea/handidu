@extends('layouts.main')

@section('content')
    <h2>{{ $user->fullname }} <span style="color: #888;">{{ '@'.$user->username }}</span></h2>

    @foreach($user->things->chunk(4) as $chunk)

        <div class="row">

            @foreach($chunk as $thing) 

            <div class="col-md-3 col-xs-6">
                <a href="{{ $thing->link }}" class="thumbnail">
                    <img src="{{ $thing->mainphoto->filename }}">
                </a>
            </div>

            @endforeach

        </div>

    @endforeach
    
@endsection