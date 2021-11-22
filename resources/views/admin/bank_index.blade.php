@extends('layouts.admin')

@section('content')
@if (session('successMessage'))
    <div class="alert alert-success">
        {{ session('successMessage') }}
    </div>
@endif
<div class="d-md-flex align-items-center justify-content-between mb-4">
  <h2 class="h4">{{ $page_title }}</h2>
  <a href="{{ route('admin.banks.create') }}" class="btn btn-primary">Tambah Akun Bank</a>
</div>

<div class="card border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderless table-striped">
                <thead>
                    <tr class="text-left">
                        <th>#</th>
                        <th>Nama Bank</th>
                        <th>No. Rekening</th>
                        <th>a/n Rekening</th>
                        <th>Cabang Bank</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($banks as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->bank_name }}</td>
                        <td>{{ $item->account_number }}</td>
                        <td>{{ $item->account_name }}</td>
                        <td>{{ $item->branch }}</td>
                        <td>
                            <a href="{{ route('admin.banks.edit', ['id' => $item->id]) }}" class="btn btn-sm btn-secondary">Edit</a>
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