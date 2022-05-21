@props(['post'])

<div class="d-flex flex-row align-items-center justify-content-start py-2">
    <button class="btn btn-outline-primary me-1">
        <i class="bi bi-hand-thumbs-up"></i>
        72 likes
    </button>

    <a class="btn btn-outline-primary me-1" href="{{ route('post.show', ['post' => $post->slug]) . '#comment' }}">
        <i class="bi bi-chat-left"></i>
        6 comments
    </a>

    <div class="flex-grow-1 d-flex flex-row align-items-center justify-content-end">
        <button class="btn btn-outline-success">
            <i class="bi bi-bookmark"></i>
            Save
        </button>
    </div>
</div>
