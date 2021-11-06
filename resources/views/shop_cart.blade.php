@extends('layouts.main')

@section('content')

<x-page-header-secondary :page-title="$page_title" />

<section class="py-5">
    <div class="container">
        <div class="card card-body p-md-5">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-container" style="height: 100%">
                        <div class="cart-items mb-3">
                            <div class="thumbnail rounded">
                                <div class="bg-secondary rounded" style="height: 100%"></div>
                            </div>
                            <div class="product-detail">
                                <div class="bg-secondary rounded-sm mb-2" style="height: 15px; width: 200px; max-width: 100%"></div>
                                <div class="bg-secondary rounded-sm" style="height: 15px; width: 150px; max-width: 80%"></div>
                            </div>
                            <div class="product-qty">
                                <div class="bg-secondary rounded mr-4" style="height: 20px; width: 20px;"></div>
                                <div class="bg-secondary rounded" style="height: 20px; width: 20px;"></div>
                                <div class="bg-secondary rounded mx-4" style="height: 20px; width: 20px;"></div>
                                <div class="bg-secondary rounded" style="height: 20px; width: 20px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="card card-body">
                        <p class="mb-2">Total Belanja</p>
                        <h4 class="mb-4 font-weight-bold cart-cost">Rp 300,000</h4>
                        <button id="process-order" class="btn btn-primary btn-block">Proses Pesanan</button>
                        <a href="{{ route('product.index') }}" class="btn btn-secondary btn-block">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 16-4-4m0 0 4-4m-4 4h18"/></svg>
                            Lanjut Belanja
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush
