@extends('layouts.main')

@section('content')
    <h2>{{ __('interface.Adding thing') }}</h2>

    <form style="margin: 10px 0px" method="POST" action="{{ route('post_thing') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="nameInput">{{ __('interface.Name') }}</label>
            <input type="text" id="nameInput" name="name" class="form-control">
        </div>
        
        <fieldset class="form-group">
            <legend>{{ __('interface.Categories') }}</legend>
                @foreach($categories as $category)
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="categories[]" value="{{ $category->id }}">
                        {{ $category->translation }}
                    </label>
                </div>
                @endforeach
        </fieldset>
        
        <div class="form-group">
            <label for="descriptionInput">{{ __('interface.Description') }}</label>
            <textarea id="descriptionInput" name="description" class="form-control"></textarea>
        </div>
        
        <div class="form-group">
            <label for="photoInput">{{ __('interface.Photo') }}</label>
            <input type="file" class="form-control-file" id="photoInput" name="photo">
        </div>
        
        <button type="submit" class="btn btn-primary">{{ __('interface.Add') }}</button>
    </form>
@endsection