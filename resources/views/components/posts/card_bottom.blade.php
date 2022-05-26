@props(['post'])

<div class="d-flex flex-row align-items-center justify-content-start py-2">
    @guest
    <div class="me-2">
        <i class="bi bi-hand-thumbs-up"></i>
        {{ $post->likers->count() }} likes
    </div>
    <div class="me-2">
        <i class="bi bi-chat-left"></i>
        {{ $post->comments->count() }} comments
    </div>
    @endguest
    @auth
    @if(Auth::user()->likes($post->id))
    <form method="POST" action="{{ route('like.destroy', ['post' => $post]) }}">
        @method('DELETE')
        @csrf
        <button class="btn btn-primary me-1" type="submit">
            <i class="bi bi-hand-thumbs-up-fill"></i>
            {{ $post->likers->count() }} likes
        </button>
    </form>
    @else
    <form method="POST" action="{{ route('like.store', ['post' => $post]) }}">
        @csrf
        <button class="btn btn-outline-primary me-1" type="submit">
            <i class="bi bi-hand-thumbs-up"></i>
            {{ $post->likers->count() }} likes
        </button>
    </form>
    @endif

    <a class="btn btn-outline-primary me-1" href="{{ route('post.show', ['post' => $post->slug]) . '#comment' }}">
        <i class="bi bi-chat-left"></i>
        {{ $post->comments->count() }} comments
    </a>

    @if(Auth::user()->postSaved($post->id))
    <form method="POST" action="{{ route('saved_post.destroy', ['post' => $post]) }}" class="flex-grow-1 d-flex flex-row align-items-center justify-content-end">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-success">
            <i class="bi bi-bookmark-fill"></i>
            Saved
        </button>
    </form>
    @else
    <form method="POST" action="{{ route('saved_post.store', ['post' => $post]) }}" class="flex-grow-1 d-flex flex-row align-items-center justify-content-end">
        @csrf
        <button type="submit" class="btn btn-outline-success">
            <i class="bi bi-bookmark"></i>
            Save
        </button>
    </form>
    @endif
    @endauth
</div>
