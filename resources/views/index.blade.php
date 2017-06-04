@extends('layouts.main')

@section('content')
    @include('partials.things_grid')

    <div class="row">
        <div class="col-xs-12 posts">

            @foreach($posts as $post)

                @include('partials.post')

            @endforeach

        </div>
    </div>
@endsection