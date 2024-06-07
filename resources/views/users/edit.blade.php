@extends('layout.layout')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                @include('shared.left-sidebar')
            </div>
            <div class="col-6">
                @include('shared.success-message')
                <div class="mt-3">
                    @include('shared.user-edit-card')
                </div>
                @forelse ($yaps as $yap)
                    <div class="mt-3">
                        @include('shared.yap-card')
                    </div>
                @empty
                    No results found
                @endforelse
                {{ $yaps->withQueryString()->links() }}
            </div>



            <div class="col-3">
                @include('shared.search-bar')
                @include('shared.follow-box')
            </div>
        </div>
    </div>
@endsection
