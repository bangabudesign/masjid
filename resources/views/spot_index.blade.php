@extends('layouts.main')

@section('content')

<x-page-header :page-title="$page_title" />

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            @forelse ($spots as $spot)
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                <div class="card-spots border rounded">
                    <div class="thumbnail">
                        <img src="{{ $spot->image_url }}" alt="news">
                    </div>
                    <div class="content">
                        <h2>{{ $spot->name }}</h2>
                        <p class="price mb-3">Rp {{ number_format($spot->daily_booking_rate) }} / Hari</p>
                        <a href="{{ route('spot.show', ['slug'=> $spot->slug]) }}" class="btn btn-primary btn-block">Lihat Fasilitas</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                <div class="card-spots border rounded">
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
