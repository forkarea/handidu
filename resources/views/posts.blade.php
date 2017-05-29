@extends('layouts.main')

@section('content')

    <h2>Posty</h2>

    @if (Auth::check())
        <form>
            <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Dodaj wpis</button>
        </form>
    @endif

    @foreach($posts as $post) 
        @include('partials.post')
    @endforeach
@endsection