@extends('layouts.admin')

@section('content')
@if (session('successMessage'))
    <div class="alert alert-success">
        {{ session('successMessage') }}
    </div>
@endif
<div class="d-md-flex align-items-center justify-content-between mb-4">
  <h2 class="h4">{{ $page_title }}</h2>
  <a href="{{ route('admin.bookings.create') }}" class="btn btn-primary">Tambah Baru</a>
</div>

<div class="card border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderless table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Customer</th>
                    <th scope="col">Nomor HP</th>
                    <th scope="col">Dari</th>
                    <th scope="col">Sampai</th>
                    <th scope="col">Total Tagihan</th>
                    <th scope="col">Sisa Tagihan</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($bookings as $booking)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $booking->customer_name }}</td>
                    <td>{{ $booking->customer_phone }}</td>
                    <td>{{ $booking->start_at }}</td>
                    <td>{{ $booking->end_at }}</td>
                    <td>{{ 'Rp '.$booking->total_formatted }}</td>
                    <td>{{ $booking->total_unpaid > 0 ? ('Rp '.number_format($booking->total_unpaid)) : 'LUNAS' }}</td>
                    <td>{!! $booking->status_formatted !!}</td>
                    <td>
                      <a href="{{ route('admin.bookings.edit', ['id' => $booking->id]) }}" class="btn btn-sm btn-secondary">Edit</a>
                      <a href="{{ route('admin.bookings.show', ['id' => $booking->id]) }}" class="btn btn-sm btn-secondary">
                        Datail&nbsp;
                        @if ($booking->payments->where('status', 0)->count() > 0)
                        <span class="badge badge-danger">{{$booking->payments->where('status', 0)->count()}}</span>
                        @endif
                      </a>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="9" class="text-center">Belum Ada Data</td>
                  </tr>
                  @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection