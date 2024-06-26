@extends('layout.layout')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                @include('shared.left-sidebar')
            </div>
            <div class="col-6">
                @include('shared.success-message')
                @include('shared.submit-yap')
                @forelse ($yaps as $yap)
                    <div class="mt-3">
                        @include('shared.yap-card')
                    </div>
                @empty
                    No results found
                @endforelse
                <br />
                {{ $yaps->withQueryString()->links() }}
            </div>
            <div class="col-3">
                @include('shared.search-bar')
                @include('shared.follow-box')
            </div>
        </div>
    </div>
@endsection
