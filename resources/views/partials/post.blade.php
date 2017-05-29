<div class="post">
    <div class="post-meta-data">
        Dodano {{ $post->created_at }} przez <a href="{{ route('user', $post->author->username) }}">{{ $post->author->fullname }}</a>
    </div>

    <div class="post-content">
        {{ $post->text }}
    </div>
</div>  
