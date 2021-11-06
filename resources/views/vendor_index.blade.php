@extends('layouts.main')

@section('content')

<x-page-header :page-title="$page_title" />

<section class="py-5">
    <div class="container">
        <div class="card mb-5 mx-auto bg-primary" style="max-width: 500px">
            <div class="card-body d-sm-flex align-items-center">
                <div class="thumbnail rounded" style="height: 120px; width: 120px; min-width: 120px; overflow: hidden">
                    <img src="/images/vendor.jpg" alt="Vendor" style="height: 100%; width: 100%; object-fit: cover">
                </div>
                <div class="mt-4 mt-sm-0 pl-0 pl-sm-4">
                    <p class="text-white">Gabung menjadi vendor di {{ config('app.name', 'Laravel') }} dan dapatkan client dengan lebih mudah.</p>
                    <a href="{{ route('vendors.create') }}" class="btn btn-warning">Gabung Menjadi Vendor</a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @forelse ($vendors as $vendor)
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                <div class="card-vendors bg-white border rounded">
                    <div class="thumbnail">
                        <img src="{{ $vendor->logo_url }}" alt="{{ $vendor->name }}">
                    </div>
                    <div class="content text-center">
                        <h2>{{ $vendor->name }}</h2>
                        <div class="d-flex align-items-center justify-content-center mb-4">
                            <div class="d-flex align-items-center px-3">
                                <div class="icon text-primary mr-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M17.707 9.293a1 1 0 0 1 0 1.414l-7 7a1 1 0 0 1-1.414 0l-7-7A.997.997 0 0 1 2 10V5a3 3 0 0 1 3-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" clip-rule="evenodd"/></svg>
                                </div>
                                <span>{{ $vendor->category }}</span>
                            </div>
                            <div class="d-flex align-items-center px-3">
                                <div class="icon text-primary mr-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 1 1 9.9 9.9L10 18.9l-4.95-4.95a7 7 0 0 1 0-9.9zM10 11a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" clip-rule="evenodd"/></svg>
                                </div>
                                <span>{{ $vendor->city }}</span>
                            </div>
                        </div>
                        <a href="{{ route('vendors.show', ['username' => $vendor->username]) }}" class="btn btn-outline-primary btn-block d-flex align-items-center justify-content-center"><svg xmlns="http://www.w3.org/2000/svg" class="mr-1" height="20px" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4 4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2V6h10a2 2 0 0 0-2-2H4zm2 6a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-4zm6 4a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" clip-rule="evenodd"/></svg> <span>Daftar Harga</span></a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                <div class="card-vendors bg-white border rounded">
                    <div class="thumbnail">
                        <div class="bg-secondary rounded" style="height: 100%"></div>
                    </div>
                    <div class="content">
                        <div class="bg-secondary rounded mb-3" style="height: 30px"></div>
                        <div class="bg-secondary rounded mb-3" style="height: 10px"></div>
                        <div class="bg-secondary rounded" style="height: 34px"></div>
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
