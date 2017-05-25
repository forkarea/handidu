@extends('layouts.main')

@section('content')
<h2>{{ $thing->name }}</h2>
<p style="margin-top: 15px">
    Autor: 
    <a href="{{ $thing->author->link }}" class="user-label" style="margin: 0px 6px">
        <img style="margin-right: 4px" src="{{ $thing->author->avatar }}" class="img-circle" /> 
        <span>{{ $thing->author->fullname }}</span>
    </a>
    ({{ $thing->created_at }})
</p>

<p style="margin: 20px 0px">{{ $thing->description }}</p>

<div style="margin: 20px 0px">
    <img src="{{ $thing->image_url }}" class="img-thumbnail">
</div>

<h3>Komentarze</h3>
@endsection