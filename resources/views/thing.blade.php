@extends('layouts.main')

@section('content')
    <h2>{{ $thing->name }}</h2>
    
    @if(Auth::check() && (Auth::user()->can('update', $thing) || Auth::user()->can('delete', $thing)))
        <p style="margin-top: 15px">
        @can('update', $thing)
            <a href="{{ $thing->editPageLink }}"><i class="glyphicon glyphicon-pencil"></i> {{ __('interface.Edit') }}</a>
            | 
        @endcan
        
        @can('delete', $thing)
            <a href="#" data-toggle="modal" data-target="#deleteThingConfirmationModal"><i class=" glyphicon glyphicon-trash"></i> {{ __('interface.Delete') }}</a>
        @endcan
        </p>
    @endif

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
                        <a href="{{ $photo->link }}" class="thumbnail" data-toggle="lightbox" data-gallery="thing">
                            <img src="{{ $photo->link }}">
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
                <textarea class="form-control" name="text" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('interface.Add comment') }}</button>
        </form>
        @else
        <p><a href="{{ route('login') }}">{{ __('interface.Sign in2') }}</a>, {{ __('interface.to add comment') }}</p>
        @endif
    </div>

@endsection


<div id="deleteThingConfirmationModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ __('interface.Ask for confirmation') }}</h4>
            </div>
            
            <div class="modal-body">
              <p>{{ __('interface.Are you sure you want to delete this element?') }}</p>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('interface.Cancel') }}</button>
                <form style="display: inline" method="POST" action="{{ route('delete_thing', ['id' => $thing->id]) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                    <button id="deleteThingConfirmationButton" type="button" role="submit" class="btn btn-danger">{{ __('interface.Delete') }}</button>
                    
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@section('scripts')
    @parent
    $('#deleteThingConfirmationButton').click(function() {
       $(this).parents('form').submit(); 
    });
@endsection