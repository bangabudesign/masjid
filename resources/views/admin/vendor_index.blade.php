@extends('layouts.admin')

@section('content')
@if (session('successMessage'))
    <div class="alert alert-success">
        {{ session('successMessage') }}
    </div>
@endif
<div class="d-md-flex align-items-center justify-content-between mb-4">
  <h2 class="h4">{{ $page_title }}</h2>
</div>

<div class="card border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderless table-striped">
                <thead>
                    <tr class="text-left">
                        <th>#</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Kota</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($vendors as $vendor)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $vendor->name }}</td>
                        <td>{{ $vendor->category }}</td>
                        <td>{{ $vendor->city }}</td>
                        <td>{!! $vendor->status_formatted !!}</td>
                        <td>
                            <a href="{{ route('admin.vendors.edit', ['id' => $vendor->id]) }}" class="btn btn-sm btn-secondary">Edit</a>
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