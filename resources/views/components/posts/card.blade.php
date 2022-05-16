@props(['post'])

<div class="w-100 p-1">
    <div class="card shadow">
        <img class="card-img-top" src="{{ $post->thumbnail }}" style="max-height: 10rem;" />
        <div class="card-body">
            <h5 class="card-title display-6 fw-bold">
                <a href="#" class="text-decoration-none text-black">
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
            <div class="d-flex flex-row align-items-center justify-content-start py-2">
                <button class="btn btn-outline-primary me-1">
                    <i class="bi bi-hand-thumbs-up"></i>
                    72 likes
                </button>

                <button class="btn btn-outline-primary me-1">
                    <i class="bi bi-chat-left"></i>
                    6 comments
                </button>

                <div class="flex-grow-1 d-flex flex-row align-items-center justify-content-end">
                    <button class="btn btn-outline-success">
                        <i class="bi bi-bookmark"></i>
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
