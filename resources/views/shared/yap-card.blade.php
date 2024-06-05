<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{ $yap->user->name }}"
                    alt="{{ $yap->user->name }} avatar">
                <div>
                    <h5 class="card-title mb-0"><a href="#"> {{ $yap->user->name }}
                        </a></h5>
                </div>
            </div>
            <div>
                @if (auth()->id() == $yap->user_id)
                    <form action="{{ route('yaps.destroy', $yap->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm">X</button>
                    </form>
                    <a href="{{ route('yaps.edit', $yap->id) }}">edit</a>
                @endif

                <a href="{{ route('yaps.show', $yap->id) }}">view</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <form action="{{ route('yaps.update', $yap->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea name="yap" class="form-control" id="yap" rows="3">{{ $yap->yap }}</textarea>
                    @error('yap')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btn-dark"> Save </button>
                </div>
            </form>
        @else
            {{-- content goes here --}}
            <p class="fs-6 fw-light text-muted">
                {{ $yap->yap }}
            </p>
        @endif
        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ $yap->likes }} </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $yap->created_at }} </span>
            </div>
        </div>
        @include('shared.comments-box')
    </div>
</div>
