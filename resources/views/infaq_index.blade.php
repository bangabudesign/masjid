@extends('layouts.main')

@section('content')

<x-page-header :page-title="$page_title" />

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            @forelse ($infaq as $item)
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                <div class="card-news border rounded">
                    <div class="thumbnail">
                        <img src="{{ $item->image_url }}" alt="{{ $item->name }}">
                    </div>
                    <div class="content">
                        <h2>{{ $item->name }}</h2>
                        <div class="info">Dana Terkumpul : {{ $item->total_paid_formatted }}</div>
                        <p>{{ \Illuminate\Support\Str::limit(strip_tags($item->description), 20, '...') }}</p>
                        <a href="{{ route('infaq.form', ['id' => $item->id]) }}" class="btn btn-block btn-primary">Berinfaq Sekarang</a>
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
