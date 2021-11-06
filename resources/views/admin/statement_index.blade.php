@extends('layouts.admin')

@section('content')
@if (session('successMessage'))
    <div class="alert alert-success">
        {{ session('successMessage') }}
    </div>
@endif
<div class="d-md-flex align-items-center justify-content-between mb-4">
  <h2 class="h4">{{ $page_title }}</h2>
  <a href="{{ route('admin.statements.create') }}" class="btn btn-primary">Tambah Data</a>
</div>

<div class="card border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderless table-striped">
                <thead>
                    <tr class="text-left">
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Judul</th>
                        <th>Uang Masuk</th>
                        <th>Uang Keluar</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($statements as $statement)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $statement->recording_at->isoFormat('dddd, DD - MMMM - Y') }}</td>
                        <td>{{ $statement->title }}</td>
                        <td class="text-success">{{ 'Rp '.number_format($statement->income) }}</td>
                        <td class="text-danger">{{ 'Rp '.number_format($statement->outcome) }}</td>
                        <td>
                            <a href="{{ route('admin.statements.edit', ['id' => $statement->id]) }}" class="btn btn-sm btn-secondary">Edit</a>
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