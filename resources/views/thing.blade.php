@extends('layouts.main')

@section('content')
    <h2>{{ $thing->name }}</h2>
    <p style="margin-top: 15px">
        {{ __('interface.Author') }}: 
        <a href="{{ $thing->author->link }}" class="user-label" style="margin: 0px 6px">
            <img style="margin-right: 4px" src="{{ $thing->author->avatar }}" class="img-circle" /> 
            <span>{{ $thing->author->fullname }}</span>
        </a>
        ({{ $thing->created_at }})
    </p>

    <p style="margin: 20px 0px">{{ $thing->description }}</p>

    @if($thing->photos)
        <div style="margin: 20px 0px">
            @foreach($thing->photos->chunk(4) as $chunk)

                <div class="row">

                    @foreach($chunk as $photo) 

                    <div class="col-md-3 col-xs-6">
                        <a href="{{ $photo->filename }}" class="thumbnail" data-toggle="lightbox" data-gallery="thing">
                            <img src="{{ $photo->filename }}">
                        </a>
                    </div>

                    @endforeach

                </div>

            @endforeach
            
        </div>
    @endif

    <p>{{ __('interface.Categories') }}:
        @foreach($thing->categories as $category)
        <a href="{{ route('category', $category->slug) }}">{{ $category->translation }}</a>
            @if(!$loop->last)
            , 
            @endif
        @endforeach
    </p>
    
    <h3>{{ __('interface.Comments') }}</h3>

    <div style="margin: 20px 0px">
        @foreach($thing->comments as $comment)
            <div class="comment" style="margin: 10px 0px">
                <div style="display: inline-block; margin-right: 4px">
                    <a href="{{ $comment->author->link }}"><img class="img-circle" src="{{ $comment->author->avatar }}"></a>
                </div>
                <p style="display: inline-block">
                    <a href="{{ $comment->author->link }}">{{ $comment->author->fullname }}</a>: 
                    {{ $comment->text }} <span style="color: #aaa"> - {{ $comment->created_at }}</span>
                </p>
            </div>
        @endforeach
        
        @if (Auth::check())
        <form method="POST" action="{{ route('post_comment') }}">
            {{ csrf_field() }}
            <input type="hidden" name="thing_id" value="{{ $thing->id }}">
            <input type="hidden" name="for" value="thing">
            <div class="form-group">
                <textarea class="form-control" name="text" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('interface.Add comment') }}</button>
        </form>
        @else
        <p><a href="{{ route('login') }}">{{ __('interface.Sign in2') }}</a>, {{ __('interface.to add comment') }}</p>
        @endif
    </div>

@endsection