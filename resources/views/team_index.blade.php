@extends('layouts.main')

@section('content')

<x-page-header :page-title="$page_title" />

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            @forelse ($teams as $team)
            <div class="col-12 col-sm-4 col-lg-3 mb-4">
                <div class="card-personalia border rounded">
                    <div class="thumbnail">
                        <img src="{{ $team->image_url }}" alt="news">
                    </div>
                    <div class="content">
                        <h2>{{ $team->name }}</h2>
                        <p class="price mb-0">{{ $team->job_title }}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 col-sm-4 col-lg-3 mb-4">
                <div class="card-personalia border rounded">
                    <div class="thumbnail">
                        <div class="bg-secondary rounded" style="height: 100%"></div>
                    </div>
                    <div class="content">
                        <div class="bg-secondary rounded mb-3" style="height: 24px"></div>
                        <div class="bg-secondary rounded mb-3" style="height: 15px"></div>
                        <div class="bg-secondary rounded" style="height: 36px"></div>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection

@push('styles')
@endpush

@push('scripts')

@endpush
