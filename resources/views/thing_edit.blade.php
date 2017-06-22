@extends('layouts.main')

@section('content')
    <h2>{{ __('interface.Edit thing') }}</h2>

    <form style="margin: 10px 0px" method="POST" action="{{ route('update_thing', ['id' => $thing->id]) }}">
        {{ csrf_field() }}
        
        <div class="form-group">
            <label for="nameInput">{{ __('interface.Name') }}</label>
            <input type="text" id="nameInput" name="name" value="{{ $thing->name }}" class="form-control">
        </div>
        
        <fieldset class="form-group">
            <legend>{{ __('interface.Categories') }}</legend>
                @foreach($categories as $category)
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="categories[]" value="{{ $category->id }}" 
                            @if($thing->categories->contains('id',$category->id))
                                checked
                            @endif
                        >
                        {{ $category->translation }}
                    </label>
                </div>
                @endforeach
        </fieldset>
        
        <div class="form-group">
            <label for="descriptionInput">{{ __('interface.Description') }}</label>
            <textarea id="descriptionInput" name="description" class="form-control">{{ $thing->description }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">{{ __('interface.Save changes') }}</button>
    </form>
@endsection