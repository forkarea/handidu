@extends('layouts.main')

@section('content')
    @foreach($things->chunk(4) as $chunk)

    <div class="row">

        @foreach($chunk as $thing) 

        <div class="col-md-3 col-xs-6">
            <a href="{{ $thing->link }}" class="thumbnail">
                <img src="{{ $thing->image_url }}">
            </a>
        </div>

        @endforeach

    </div>

    @endforeach


    <div class="row">
        <div class="col-xs-12 posts">

            @foreach($posts as $post)

                @include('partials.post')

            @endforeach

        </div>
    </div>
@endsection