@props([
    'comment'
])

<div class="card shadow my-2">
    <div class="card-body">
        <div class="d-flex flex-row align-items-end">
            <img src="{{ $comment->commenter->profile_picture }}" class="rounded-circle" width="25" height="25" />
            <a href="#" class="mx-1 text-decoration-none text-black fw-bold">
                {{ $comment->commenter->username }}
            </a>
        </div>
        <span>
            {{ $comment->body }}
        </span>
        @auth
        @if($comment->commenter->id == Auth::user()->id)
        <div class="d-flex align-items-center my-2">
            <form action="{{ route('comment.destroy', ['comment' => $comment]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger">
                    Delete comment
                </button>
            </form>
        </div>
        @endif
        @endauth
    </div>
</div>
