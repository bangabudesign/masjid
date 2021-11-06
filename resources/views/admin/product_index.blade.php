@extends('layouts.admin')

@section('content')
@if (session('successMessage'))
    <div class="alert alert-success">
        {{ session('successMessage') }}
    </div>
@endif
<div class="d-md-flex align-items-center justify-content-between mb-4">
  <h2 class="h4">{{ $page_title }}</h2>
  <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Tambah Baru</a>
</div>

<div class="card border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderless table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($products as $product)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ 'Rp '.number_format($product->price) }}</td>
                    <td>{!! $product->status_formatted !!}</td>
                    <td>
                        <a href="{{ route('admin.products.edit', ['id' => $product->id]) }}" class="btn btn-sm btn-secondary">Edit</a>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="5" class="text-center">Belum Ada Data</td>
                  </tr>
                  @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection