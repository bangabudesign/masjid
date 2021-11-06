@extends('layouts.admin')

@section('content')
@if (session('successMessage'))
    <div class="alert alert-success">
        {{ session('successMessage') }}
    </div>
@endif
<div class="d-md-flex align-items-center justify-content-between mb-4">
  <h2 class="h4">{{ $page_title }}</h2>
  <a href="{{ route('admin.spots.create') }}" class="btn btn-primary">Tambah Baru</a>
</div>

<div class="card border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderless table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga / Hari</th>
                    <th scope="col">Harga / Jam</th>
                    <th scope="col">Kapasitas</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($spots as $spot)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $spot->name }}</td>
                    <td>{{ 'Rp '.number_format($spot->daily_booking_rate) }}</td>
                    <td>{{ 'Rp '.number_format($spot->hourly_booking_rate) }}</td>
                    <td>{{ number_format($spot->capacity) }} Orang</td>
                    <td>
                        <a href="{{ route('admin.spots.edit', ['id' => $spot->id]) }}" class="btn btn-sm btn-secondary">Edit</a>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="6" class="text-center">Belum Ada Data</td>
                  </tr>
                  @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection