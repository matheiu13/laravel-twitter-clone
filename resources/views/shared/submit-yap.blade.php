<h4> Share yours yaps </h4>
<div class="row">
    <form action="{{ route('yaps.create') }}" method="post">
        @csrf
        <div class="mb-3">
            <textarea name="yap" class="form-control" id="idea" rows="3"></textarea>
            @error('yap')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn btn-dark"> Share </button>
        </div>
    </form>
</div>
