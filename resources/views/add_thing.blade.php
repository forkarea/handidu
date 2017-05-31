@extends('layouts.main')

@section('content')
    <h2>Dodawanie dzieła</h2>

    <form style="margin: 10px 0px" method="POST" action="{{ route('post_thing') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="nameInput">Nazwa</label>
            <input type="text" id="nameInput" name="name" class="form-control">
        </div>
        
        <fieldset class="form-group">
            <legend>Kategorie</legend>
                @foreach($categories as $category)
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="categories[]" value="{{ $category->id }}">
                        {{ $category->name }}
                    </label>
                </div>
                @endforeach
        </fieldset>
        
        <div class="form-group">
            <label for="descriptionInput">Opis</label>
            <textarea id="descriptionInput" name="description" class="form-control"></textarea>
        </div>
        
        <div class="form-group">
            <label for="photoInput">Zdjęcie</label>
            <input type="file" class="form-control-file" id="photoInput" name="photo">
        </div>
        
        <button type="submit" class="btn btn-primary">Dodaj</button>
    </form>
@endsection