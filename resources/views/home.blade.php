@extends('layouts.main')

@section('content')
<x-prayer-time/>
<section class="slideshow">
    <div class="splide">
        <div class="splide__track">
              <ul class="splide__list">
                  <li class="splide__slide">
                      <a href="">
                          <img src="/images/slideshow/slideshow-1.jpg">
                      </a>
                  </li>
                  <li class="splide__slide">
                      <a href="">
                          <img src="/images/slideshow/slideshow-1.jpg">
                      </a>
                  </li>
                  <li class="splide__slide">
                      <a href="">
                          <img src="/images/slideshow/slideshow-1.jpg">
                      </a>
                  </li>
              </ul>
        </div>
    </div>
</section>

<section class="overlap bg-white pt-5 pt-sm-0">
    <div class="container">
        <div class="card card-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="d-md-flex">
                        <div class="icon text-primary mb-3 mb-md-0">
                            <svg xmlns="http://www.w3.org/2000/svg" style="height: 42px; width: 42px" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4 4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2V6h10a2 2 0 0 0-2-2H4zm2 6a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-4zm6 4a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" clip-rule="evenodd"/></svg>
                        </div>
                        <div class="ml-2 ml-sm-4">
                            <p class="mb-2">Saldo Kas Masjid</p>
                            <h2 class="font-weight-bold">{{ 'Rp '.number_format($sisa_saldo) }}</h2>
                            <a href="">Lihat Laporan <svg xmlns="http://www.w3.org/2000/svg" style="height: 20px; width: 20px" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m17 8 4 4m0 0-4 4m4-4H3"/></svg></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="d-md-flex">
                        <div class="icon text-primary mb-3 mb-md-0">
                            <svg xmlns="http://www.w3.org/2000/svg" style="height: 42px; width: 42px" viewBox="0 0 20 20" fill="currentColor"><path d="M2 3a1 1 0 0 1 1-1h2.153a1 1 0 0 1 .986.836l.74 4.435a1 1 0 0 1-.54 1.06l-1.548.773a11.037 11.037 0 0 0 6.105 6.105l.774-1.548a1 1 0 0 1 1.059-.54l4.435.74a1 1 0 0 1 .836.986V17a1 1 0 0 1-1 1h-2C7.82 18 2 12.18 2 5V3z"/></svg>
                        </div>
                        <div class="ml-2 ml-sm-4">
                            <p class="mb-2">Pusat Informasi</p>
                            <h2 class="font-weight-bold">0511-3353380</h2>
                            <a href="">Kontak <svg xmlns="http://www.w3.org/2000/svg" style="height: 20px; width: 20px" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m17 8 4 4m0 0-4 4m4-4H3"/></svg></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="d-md-flex">
                        <div class="icon text-primary mb-3 mb-md-0">
                            <svg xmlns="http://www.w3.org/2000/svg" style="height: 42px; width: 42px" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 1 1 9.9 9.9L10 18.9l-4.95-4.95a7 7 0 0 1 0-9.9zM10 11a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" clip-rule="evenodd"/></svg>
                        </div>
                        <div class="ml-2 ml-sm-4">
                            <h3 class="font-weight-bold">Alamat</h3>
                            <p class="mb-0">Jalan Jend. Sudirman NO. 1 Komp Masjid Raya Sabilal Muhtadin Banjarmasin</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-gradient-light">
    <div class="container">
        <h2 class="section-heading text-center font-weight-bold my-5">Ragam Program & Layanan<br>di {{ config('app.name', 'Laravel') }}</h2>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                <div class="card-facilty border rounded">
                    <div class="icon"><svg width="64" height="64" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M16 2a2 2 0 1 0-4 0v2H7a7 7 0 0 0-7 7v5h64v-5a7 7 0 0 0-7-7h-1v6a2 2 0 0 1-4 0V2a2 2 0 1 0-4 0v2h-4v6a2 2 0 0 1-4 0V2a2 2 0 1 0-4 0v2h-4v6a2 2 0 0 1-4 0V2a2 2 0 1 0-4 0v2h-4v6a2 2 0 0 1-4 0V2ZM0 20v37a7 7 0 0 0 7 7h50a7 7 0 0 0 7-7V20H0Zm12 9v6h6v-6h-6Zm-1-3a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2h-8Zm1 25v-6h6v6h-6Zm-3-7a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-8a2 2 0 0 1-2-2v-8Zm29.56-17.56a1.5 1.5 0 0 1 0 2.12l-7 7a1.5 1.5 0 0 1-2.12 0l-4.5-4.5a1.5 1.5 0 0 1 2.12-2.12l3.44 3.439 5.94-5.94a1.5 1.5 0 0 1 2.12 0ZM46 35v-6h6v6h-6Zm-3-7a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-8a2 2 0 0 1-2-2v-8ZM29 45v6h6v-6h-6Zm-1-3a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2h-8Zm18 9v-6h6v6h-6Zm-3-7a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-8a2 2 0 0 1-2-2v-8Z" fill="currentColor"/></svg></div>
                    <h3>Booking Tempat</h3>
                    <p>Dengan sistem daring, peminjaman tempat di {{ config('app.name', 'Laravel') }} kini lebih mudah dan praktis, insya Allah.</p>
                    <a href="{{ route('spot.index') }}" class="btn btn-block btn-primary">Ajukan Peminjaman</a>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                <div class="card-facilty border rounded">
                    <div class="icon"><svg width="64" height="64" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M31.972 2.188 29.833 7h22.334l-2.14-4.812A2 2 0 0 0 48.2 1H33.8a2 2 0 0 0-1.828 1.188Zm3.807 13.635L29.75 11h22.5l-6.545 5.236C56.218 18.891 64 28.412 64 39.75 64 53.143 53.143 64 39.75 64c-1.234 0-2.447-.092-3.632-.27a26.863 26.863 0 0 0 9.363-7.705C52.191 53.663 57 47.268 57 39.75c0-9.527-7.723-17.25-17.25-17.25-9.527 0-17.25 7.723-17.25 17.25 0 5.653 2.72 10.672 6.922 13.818a14.72 14.72 0 0 1-5.172.932c-1.46 0-2.87-.212-4.2-.607A24.14 24.14 0 0 1 15.5 39.75c0-12.04 8.775-22.032 20.28-23.927Zm-17.26 7.652C11.809 25.837 7 32.232 7 39.75 7 49.277 14.723 57 24.25 57c9.527 0 17.25-7.723 17.25-17.25 0-5.654-2.72-10.672-6.922-13.818A14.72 14.72 0 0 1 39.75 25c1.46 0 2.87.212 4.2.607A24.14 24.14 0 0 1 48.5 39.75C48.5 53.143 37.643 64 24.25 64S0 53.143 0 39.75 10.857 15.5 24.25 15.5c1.234 0 2.447.092 3.632.27a26.862 26.862 0 0 0-9.363 7.705Z" fill="currentColor"/></svg></div>
                    <h3>Wedding Centre</h3>
                    <p>Wujudkan pernikahan impian di {{ config('app.name', 'Laravel') }} dengan lebih mudah bersama vendor berpengalaman.</p>
                    <a href="{{ route('vendors.index') }}" class="btn btn-block btn-primary">Temukan Vendor</a>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                <div class="card-facilty border rounded">
                    <div class="icon"><svg width="64" height="64" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8 24C8 10.745 18.745 0 32 0s24 10.745 24 24v27H8V24Zm33-5v4H23v-4h18Zm0 12v-4H23v4h18Zm0 4v4H23v-4h18Zm20 29V54H3v10h58Z" fill="currentColor"/></svg></div>
                    <h3>Pemulasaraan Jenazah</h3>
                    <p>Lebih mudah dengan sistem daring, kapanpun dimanapun {{ config('app.name', 'Laravel') }} cepat tanggap layani Ummat.</p>
                    <a href="{{ route('pemulasaraan') }}" class="btn btn-block btn-primary">Ajukan Permohonan</a>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                <div class="card-facilty border rounded">
                    <div class="icon"><svg width="64" height="64" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M34 5.5V38c5.6-4 15-6.667 19-7.5V3.01C53 .938 50.95-.51 48.998.183L34 5.5ZM1.423 7.164 7.5 10v30.5l24.207 7.41a1 1 0 0 0 .586 0L56.5 40.5V10l6.077-2.836A1 1 0 0 1 64 8.07V48l-31.702 9.907a1 1 0 0 1-.596 0L0 48V8.07a1 1 0 0 1 1.423-.906ZM7 54l18 5.348-15.378 4.568C8.308 64.306 7 63.281 7 61.86V54Zm32 5.348L57 54v7.86c0 1.42-1.308 2.447-2.622 2.056L39 59.348ZM34 44l19-6v-5c-.51.16-1.04.325-1.588.494C45.154 35.428 36.759 38.023 34 44ZM30 5.5V38c-5.6-4-15-6.667-19-7.5V3.01C11 .938 13.05-.51 15.002.183L30 5.5ZM30 44l-19-6v-5c.51.16 1.04.325 1.588.494C18.846 35.428 27.241 38.023 30 44Z" fill="currentColor"/></svg></div>
                    <h3>Kajian Rutin</h3>
                    <p>Tuntutlah ilmu hingga ke liang lahat, melalui kajian rutin di {{ config('app.name', 'Laravel') }} tingkatkan Iman & Taqwa.</p>
                    <a href="{{ route('event.index') }}" class="btn btn-block btn-primary">Lihat jadwal</a>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                <div class="card-facilty border rounded">
                    <div class="icon"><svg width="64" height="64" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#a)"><path fill-rule="evenodd" clip-rule="evenodd" d="M30.75 3.25 33 5.5l2.25-2.25c4.28-4.28 11.22-4.28 15.5 0 4.28 4.28 4.28 11.22 0 15.5L33 36.5 15.25 18.75c-4.28-4.28-4.28-11.22 0-15.5 4.28-4.28 11.22-4.28 15.5 0ZM0 43a6 6 0 0 1 12 0v15a6 6 0 0 1-12 0V43Zm15-3v22c.667.667 3.1 2 7.5 2h23c1 0 3.4-.4 5-2s9-11 12.5-15.5c.667-.833 1.82-3.68 0-5.5-2-2-4-1.5-5.5 0l-9.013 9.871a5 5 0 0 1-3.692 1.629H29.75a1.75 1.75 0 1 1 0-3.5h12a3.75 3.75 0 1 0 0-7.5h-7.093c-1.061 0-2.072-.433-2.935-1.05-1.525-1.092-3.855-2.358-6.222-2.95-4-1-8.5 0-10.5 2.5Z" fill="currentColor"/></g><defs><clipPath id="a"><path fill="#fff" d="M0 0h64v64H0z"/></clipPath></defs></svg></div>
                    <h3>Infaq & Sedekah</h3>
                    <p>Turut serta dalam memajukan dan memakmurkan {{ config('app.name', 'Laravel') }} dengan infaq & sedekah melalui daring.</p>
                    <a href="http://" class="btn btn-block btn-primary">Beramal Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container">
        <h2 class="section-heading text-center my-5">Acara <b>Terdekat</b></h2>
        <div class="row justify-content-center">
            @forelse ($events as $event)
            <div class="col-12 col-md-6 mb-4">
                <div class="card-event border rounded">
                    <div class="event-detail">
                        <div class="event-date text-center">
                            <div class="day">{{ date('d', strtotime($event->event_date)) }}</div>
                            <div class="month text-uppercase">{{ date('M', strtotime($event->event_date)) }}</div>
                            <div class="year">{{ date('Y', strtotime($event->event_date)) }}</div>
                        </div>
                        <div class="thumbnail rounded">
                            <img src="{{ $event->image_url }}" alt="{{ $event->name }}">
                        </div>
                    </div>
                    <div class="content">
                        <h2>{{ $event->name }}</h2>
                        <p>{{ \Illuminate\Support\Str::limit($event->body, 20, '...') }}</p>
                        <a href="{{ route('event.show', ['slug' => $event->slug]) }}" class="btn btn-primary">Detail Acara <svg xmlns="http://www.w3.org/2000/svg" style="height: 20px; width: 20px" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m17 8 4 4m0 0-4 4m4-4H3"></path></svg></a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 col-md-6 mb-4">
                <div class="card-event border rounded">
                    <div class="event-detail" style="padding-left: 20px">
                        <div class="thumbnail rounded" style="margin-right: 20px; width: 30%">
                            <div class="rounded" style="background-color: #00000025; height: 100%"></div>
                        </div>
                        <div class="thumbnail rounded" style="width: calc(100% - 30% - 20px)">
                            <div class="rounded" style="background-color: #00000025; height: 100%"></div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="bg-secondary rounded mb-3" style="height: 30px; width: 80%"></div>
                        <div class="bg-secondary rounded mb-3" style="height: 10px"></div>
                        <div class="bg-secondary rounded" style="height: 36px; width: 150px"></div>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<section class="py-5 bg-gray">
    <div class="container">
        <h2 class="section-heading text-center my-5">Berita <b>Terbaru</b></h2>
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
<link rel="stylesheet" href="{{ url('/plugins/splide/css/splide.min.css') }}">
@endpush

@push('scripts')
<script src="{{ url('/plugins/splide/js/splide.min.js') }}"></script>
<script>
    document.addEventListener( 'DOMContentLoaded', function() {
      var splide = new Splide( '.splide', {
          width: '100%',
          pagination: false
      } );
      splide.mount();
    } );
</script>
@endpush
