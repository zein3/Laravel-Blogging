@props(['post'])

<div class="w-100 p-1">
    <div class="card shadow">
        <img class="card-img-top" src="{{ $post->thumbnail }}" style="max-height: 10rem;" />
        <div class="card-body">
            <h5 class="card-title display-6 fw-bold">
                <a href="{{ route('post.show', ['post' => $post->slug]) }}" class="text-decoration-none text-black">
                    {{ $post->title }}
                </a>
            </h5>
            <h6 class="card-subtitle text-muted">
                by 
                <a href="#" class="text-decoration-none text-muted">
                    {{ $post->author->username }}
                </a>
            </h6>
            <!-- TODO: show tags here -->
            <x-posts.card_tags :post="$post" />
            <x-posts.card_bottom :post="$post" />
        </div>
    </div>
</div>
