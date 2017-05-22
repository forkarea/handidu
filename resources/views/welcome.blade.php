<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <title>Handidu - portal społecznościowy dla rękodzielników</title>

        <style>
        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);
        
        body {
            font-family: "Raleway";
        }
        //tu trzeba dorobić jakąś klasę na elemencie nadrzędnym
        .thumbnail img {
            width: 100%;
        }    
        
        .post {
            padding: 15px 0px 30px 0px;
            border-top: 1px solid #ddd;
        }
        
        .post-meta-data {
            font-size: small;
            color: #888;
            margin-bottom: 5px;
        }
        
        .footer {
            padding: 10px 0px;
            background-color: #ddd;
        }
        
        .handidu-navbar {
            background-color: #66c6ba;
            color: #eee;
            border-radius: 0px;
        }
        
        .handidu-navbar a {
            color: #f5f5f5;
        }
        
        .handidu-navbar .navbar-nav > li > a:hover,
        .handidu-navbar .navbar-nav > li > a:focus {
            background-color: #5BB5AA;
        }
        </style>
    </head>
    <body>
        <nav class="navbar handidu-navbar">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Handidu</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('add-thing') }}">Dodaj dzieło</a></li>
                    </ul>
                    
                    @if(Auth::check())
                    <p class="navbar-text navbar-right">
                        Signed in as <a href="{{ route('user', Auth::user()->username) }}">{{ Auth::user()->fullname }}</a> | 
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </p>
                    @else
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/login">Zaloguj</a></li>
                    </ul>
                    @endif

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        
        <div class="container">
            
            <div class="row">
                <div class="col-sm-9 col-xs-12">
                    
                    @foreach($things->chunk(4) as $chunk)
                    
                    <div class="row">
                        
                        @foreach($chunk as $thing) 
                        
                        <div class="col-md-3 col-xs-6">
                            <a href="{{ route('thing',['user' => $thing->author->username, 'slug' => $thing->slug]) }}" class="thumbnail">
                                <img src="{{ $thing->image_url }}">
                            </a>
                        </div>
                        
                        @endforeach
                        
                    </div>

                    @endforeach
                    
                    
                    <div class="row">
                        <div class="col-xs-12 posts">
                            
                            @foreach($posts as $post)
                            
                            <div class="post">
                                <div class="post-meta-data">
                                    Dodano {{ $post->created_at }} przez <a href="{{ route('user', $post->author->username) }}">{{ $post->author->first_name }}</a>
                                </div>
                                
                                <div class="post-content">
                                    {{ $post->text }}
                                </div>
                            </div>  
                            
                            @endforeach
                            
                        </div>
                    </div>
                    
                    
                </div>
                
                <div class="col-sm-3 col-xs-12">
                    <div class="list-group">
                        @foreach($categories as $category)
                            <a href="{{ route('category', $category->slug) }}" class="list-group-item">{{ $category->name }}</a>
                        @endforeach
                    </div>
                    
                    <div class="thumbnail">
                        <img src="http://placehold.it/250x200" alt="...">
                        <div class="caption">
                            <h3>Thumbnail label</h3>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
        <div class="footer">
            <div class="container">
                <a href="http://blog.piatkiewicz.com">Blog</a> | <a href="https://twitter.com/piotrevic">Twitter</a> | <a href="https://github.com/piatkiewicz/handidu">GitHub</a>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</html>
