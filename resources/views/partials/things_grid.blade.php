@foreach($things->chunk(4) as $chunk)

    <div class="row">

        @foreach($chunk as $thing) 

        <div class="col-md-3 col-xs-6">
            <a href="{{ $thing->link }}" class="thumbnail" style="max-width: 200px; max-height: 200px">
                <img src="{{ $thing->mainphoto->link }}">
            </a>
        </div>

        @endforeach

    </div>

@endforeach

