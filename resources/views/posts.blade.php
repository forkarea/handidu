@extends('layouts.main')

@section('content')

    <h2>Posty</h2>

    @if (Auth::check())
        <form method="POST" action="{{ route('posts') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <textarea class="form-control" name="text" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Dodaj wpis</button>
        </form>
    @endif

    @foreach($posts as $post) 
        @include('partials.post')
    @endforeach
@endsection