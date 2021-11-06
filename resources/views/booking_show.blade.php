@extends('layouts.member')

@section('content')
@if (session('successMessage'))
    <div class="alert alert-success">
        {{ session('successMessage') }}
    </div>
@endif
<div class="d-md-flex align-items-center justify-content-between mb-4">
    <h2 class="h4">{{ $page_title }}</h2>
</div>

<div class="card border-0 mb-3" x-data="{ show: false }">
    <div class="card-body d-flex align-items-center justify-content-between" x-on:click="show = !show" style="cursor: pointer">
        <h5 class="mb-0">Detail Pesanan</h5>
        <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" style="height: 20px; width: 20px" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/></svg>
        </div>
    </div>
    <div class="card-body border-top" x-show="show" x-transition>
        <div class="table-responsive">
            <table class="table table-borderless table-striped">
                <tbody>
                    <tr>
                        <th scope="row" style="width: 200px; white-space:nowrap;">Tanggal Booking</th>
                        <td style="white-space:nowrap;">{{ $booking->created_at }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 200px">Nama Customer</th>
                        <td>{{ $booking->customer_name }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 200px">Nomor HP</th>
                        <td>{{ $booking->customer_phone }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 200px">Email</th>
                        <td>{{ $booking->custoemr_email ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 200px">Dari</th>
                        <td>{{ $booking->start_at }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 200px">Sampai</th>
                        <td>{{ $booking->end_at }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 200px">Harga Per Hari</th>
                        <td>{{ 'Rp '.number_format($booking->daily_booking_rate) }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 200px">Harga Per Jam</th>
                        <td>{{ 'Rp '.number_format($booking->hourly_booking_rate) }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 200px">Jumlah</th>
                        <td>{{ number_format($booking->daily_booking_count) }} Hari {{ number_format($booking->hourly_booking_count) }} Jam</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 200px">Booking Carge</th>
                        <td>{{ 'Rp '.number_format($booking->booking_charge) }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 200px">Total Tagihan</th>
                        <td>{{ 'Rp '.$booking->total_formatted }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 200px">Sudah Dibayar</th>
                        <td>{{ 'Rp '.number_format($booking->total_paid) }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 200px">Sisa Tagihan</th>
                        <td>{{ $booking->total_unpaid > 0 ? ('Rp '.number_format($booking->total_unpaid)) : 'LUNAS' }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 200px">Catatan</th>
                        <td>{{ $booking->notes ?? 'Tidak ada catatan' }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="width: 200px">Status</th>
                        <td>{!! $booking->status_formatted !!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="card border-0">
    <div class="card-body">
        <h5 class="mb-4">Pembayaran</h5>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Total</th>
                    <th scope="col">Catatan</th>
                    <th scope="col">Status</th>
                </thead>
                <tbody>
                    @forelse ($booking->payments as $payment)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $payment->created_at }}</td>
                        <td>{{ 'Rp '.$payment->amount_formatted }}</td>
                        <td>{{ $payment->notes ?? '-' }}</td>
                        <td>{!! $payment->status_formatted !!}</td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="5" class="text-center">Belum Ada Data</td>
                    </tr>                        
                    @endforelse
                </tbody>
            </table>
        </div>
        <a href="{{ route('member.payments.create', ['paymentable_type' => 'booking', 'paymentable_id' => $booking->id]) }}" class="btn btn-primary btn-block">Input Pembayaran</a>
    </div>
</div>
@endsection