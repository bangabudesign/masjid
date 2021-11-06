@extends('layouts.admin')

@section('content')
<div class="d-md-flex align-items-center justify-content-between mb-4">
    <h2 class="h4">Statistik</h2>
</div>

    <div class="row">
        <div class="col-md-4 mb-4 mb-md-0">
            <div class="card p-4 bg-success text-white border-0">
                <p>Saldo Kas Masjid</p>
                <h3>{{ 'Rp '.number_format($total_saldo) }}</h3>
            </div>
        </div>
        <div class="col-md-4 mb-4 mb-md-0">
            <div class="card p-4 bg-danger text-white border-0">
                <p>Total Product</p>
                <h3>{{ number_format($total_product) }}</h3>
            </div>
        </div>
        <div class="col-md-4 mb-4 mb-md-0">
            <div class="card p-4 bg-primary text-white border-0">
                <p>Total Vendor</p>
                <h3>{{ number_format($total_vendor) }}</h3>
            </div>
        </div>
    </div>
@endsection