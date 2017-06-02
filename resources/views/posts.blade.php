@extends('layouts.main')

@section('content')

    <h2>{{ __('interface.Posts') }}</h2>

    @if (Auth::check())
        <form method="POST" action="{{ route('posts') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <textarea class="form-control" name="text" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('interface.Add post') }}</button>
        </form>
    @endif

    @foreach($posts as $post) 
        @include('partials.post')
    @endforeach
@endsection