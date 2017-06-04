@extends('layouts.main')

@section('content')
    <h2>{{ $category->translation }}</h2>
    @foreach($category->things->chunk(4) as $chunk)

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