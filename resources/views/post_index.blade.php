@extends('layouts.main')

@section('content')

<x-page-header :page-title="$page_title" />

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            @forelse ($posts as $post)
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                <div class="card-news border rounded">
                    <div class="thumbnail">
                        <img src="{{ $post->image_url }}" alt="{{ $post->title }}">
                    </div>
                    <div class="content">
                        <h2>{{ $post->title }}</h2>
                        <div class="info">{{ $post->published_at }}</div>
                        <p>{{ \Illuminate\Support\Str::limit($post->body, 20, '...') }}</p>
                        <a href="{{ route('post.show', ['slug' => $post->slug]) }}">Baca lebih lanjut...</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                <div class="card-news border rounded">
                    <div class="thumbnail">
                        <div class="bg-secondary rounded" style="height: 100%"></div>
                    </div>
                    <div class="content">
                        <div class="bg-secondary rounded mb-3" style="height: 30px"></div>
                        <div class="bg-secondary rounded mb-3" style="height: 10px"></div>
                        <div class="bg-secondary rounded mb-1" style="height: 15px; width: 90%"></div>
                        <div class="bg-secondary rounded mb-1" style="height: 15px"></div>
                        <div class="bg-secondary rounded mb-3" style="height: 15px; width: 40%"></div>
                        <div class="bg-secondary rounded" style="height: 15px"></div>
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
