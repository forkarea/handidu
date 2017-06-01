<div class="post">
    <div class="post-meta-data">
        {{ __('interface.addedWhenBy', ['date' => $post->created_at]) }} <a href="{{ route('user', $post->author->username) }}">{{ $post->author->fullname }}</a>
    </div>

    <div class="post-content">
        {{ $post->text }}
    </div>
</div>  
