@extends('layouts.main')

@section('content')
<h2>{{ $thing->name }}</h2>
<p style="margin-top: 15px">
    <a href="{{ $thing->author->link }}" class="user-label"><img src="{{ $thing->author->avatar }}" class="img-circle"> <span style="margin-left: 5px">{{ $thing->author->fullname }}</span></a>
</p>
@endsection