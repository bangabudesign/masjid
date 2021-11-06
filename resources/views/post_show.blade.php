@extends('layouts.main')

@section('content')

<x-page-header-secondary page-title="Detail" />

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center post-details">
            <div class="col-8 mb-4">
                <div class="card border-0 rounded">
                    <div class="card-news rounded-top">
                        <div>
                            <img src="{{ $post->image_url }}" alt="{{ $post->title }}" style="width: 100%">
                        </div>
                    </div>
                    <div class="card-body">
                        <h1 class="h2">{{ $post->title }}</h1>
                        <div>{!! $post->body !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection