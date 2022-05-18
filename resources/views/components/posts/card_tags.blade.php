@props(['post'])

<div class="d-flex flex-row justify-content-start align-items-center py-2">
    @foreach($post->tags as $tag)
        <a class="btn btn-outline-primary btn-sm me-1" href="/t/{{ $tag->name }}">
            <span>
                #{{ $tag->name }}
            </span>
        </a>
    @endforeach

</div>
