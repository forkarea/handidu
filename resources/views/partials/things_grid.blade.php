@foreach($things->chunk(4) as $chunk)

    <div class="row">

        @foreach($chunk as $thing) 

        <div class="col-md-3 col-xs-6">
            <a href="{{ $thing->link }}" class="thumbnail" style="width: 200px; height: 200px">
                <img src="{{ $thing->mainphoto->link }}">
            </a>
        </div>

        @endforeach

    </div>

@endforeach

