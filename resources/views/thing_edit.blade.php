@extends('layouts.main')

@section('content')

    @can('update', $thing)
        tu będzie edycja
    @endcan
    
    @cannot('update', $thing)
        Nie można edytować
    @endcan

@endsection