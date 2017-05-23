@extends('layouts.main')

@section('content')
    @foreach($things->chunk(4) as $chunk)

    <div class="row">

        @foreach($chunk as $thing) 

        <div class="col-md-3 col-xs-6">
            <a href="{{ route('thing',['user' => $thing->author->username, 'slug' => $thing->slug]) }}" class="thumbnail">
                <img src="{{ $thing->image_url }}">
            </a>
        </div>

        @endforeach

    </div>

    @endforeach


    <div class="row">
        <div class="col-xs-12 posts">

            @foreach($posts as $post)

            <div class="post">
                <div class="post-meta-data">
                    Dodano {{ $post->created_at }} przez <a href="{{ route('user', $post->author->username) }}">{{ $post->author->first_name }}</a>
                </div>

                <div class="post-content">
                    {{ $post->text }}
                </div>
            </div>  

            @endforeach

        </div>
    </div>
@endsection