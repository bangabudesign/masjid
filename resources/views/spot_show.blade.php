@extends('layouts.main')

@section('content')

<x-page-header-secondary page-title="Detail" />

<section class="py-5">
    <div class="container">
        <div class="row spot-details">
            <div class="col-12 col-md-8 mb-4">
                <div class="card border-0 rounded">
                    <div id="gallery" class="splide3">
                        <div class="splide__track">
                              <ul class="splide__list">
                                  @forelse ($spot->images as $image)
                                    <li class="splide__slide">
                                        <img src="{{ $image->image_url }}">
                                        <div class="description">
                                            {{ $image->title }}
                                        </div>
                                    </li>
                                  @empty
                                    <li class="splide__slide">
                                        <img src="{{ $spot->image_url }}">
                                        <div class="description">
                                            {{ $spot->name }}
                                        </div>
                                    </li>
                                  @endforelse
                              </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="thumbnail-slider" class="splide">
                            <div class="splide__track">
                                  <ul class="splide__list">
                                    @forelse ($spot->images as $image)
                                        <li class="splide__slide">
                                            <img src="{{ $image->image_url }}">
                                        </li>
                                    @empty
                                        <li class="splide__slide">
                                            <img src="{{ $spot->image_url }}">
                                        </li>
                                    @endforelse
                                  </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h1 class="h2">{{ $page_title }}</h1>
                        <div>
                            {!! $spot->description !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-4">
                <div class="card border-0">
                    <div class="card-spots rounded-top">
                        <div class="thumbnail">
                            <img src="{{ $spot->image_url }}" alt="news">
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="mb-4">Keterangan</h3>
                        <div class="mb-4 h5 font-weight-normal">
                            <div class="d-flex justify-content-between mb-2">
                                <div>Per Hari</div>
                                <div class="text-muted">{{ 'Rp '.number_format($spot->daily_booking_rate) }}</div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>Kapasitas</div>
                                <div class="text-muted">{{ number_format($spot->capacity) }} Orang</div>
                            </div>
                        </div>
                        <a href="{{ route('booking.create', ['spot_id' => $spot->id]) }}" class="btn btn-primary btn-lg btn-block">Booking Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ url('/plugins/splide/css/themes/splide-sea-green.min.css') }}">
@endpush

@push('scripts')
<script src="{{ url('/plugins/splide/js/splide.min.js') }}"></script>
<script>
    document.addEventListener( 'DOMContentLoaded', function () {
        var main = new Splide( '#gallery', {
            type  : 'fade',
            cover      : true,
		    heightRatio: 0.6,
            pagination  : false,
            arrows  : false,
            rewind: true,
        } );

        var thumbnails = new Splide( '#thumbnail-slider', {
            fixedWidth  : 100,
            fixedHeight : 60,
            gap         : 10,
            rewind      : true,
            pagination  : false,
            cover       : true,
            isNavigation: true,
            breakpoints : {
                600: {
                fixedWidth : 60,
                fixedHeight: 44,
                },
            },
        } );

        main.sync( thumbnails );
        main.mount();
        thumbnails.mount();
    } )
</script>
@endpush