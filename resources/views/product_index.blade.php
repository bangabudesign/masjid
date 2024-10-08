@extends('layouts.main')

@section('content')

<x-page-header :page-title="$page_title" />

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            @forelse ($products as $product)
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                <div class="card-products border rounded">
                    <div class="thumbnail">
                        <img src="{{ $product->image_url }}" alt="news">
                    </div>
                    <div class="content">
                        <h2>{{ $product->name }}</h2>
                        <p class="price mb-3">{{ 'Rp '.number_format($product->price) }}</p>
                        <div class="d-flex">
                            <button class="btn btn-primary add-to-cart ml-auto" data-id="{{ $product->id }}" data-name="{{ $product->name }}" data-price="{{ $product->price }}" data-image="{{ $product->image_url }}">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" viewBox="0 0 20 20" fill="currentColor"><path d="M3 1a1 1 0 0 0 0 2h1.22l.305 1.222a.997.997 0 0 0 .01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 0 0 0-2H6.414l1-1H14a1 1 0 0 0 .894-.553l3-6A1 1 0 0 0 17 3H6.28l-.31-1.243A1 1 0 0 0 5 1H3zm13 15.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zM6.5 18a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                <div class="card-products border rounded">
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
