@extends('layouts.admin')

@section('content')
@if (session('successMessage'))
    <div class="alert alert-success">
        {{ session('successMessage') }}
    </div>
@endif
<div class="d-md-flex align-items-center justify-content-between mb-4">
  <h2 class="h4">{{ $page_title }}</h2>
  <a href="{{ route('admin.supports.create') }}" class="btn btn-primary">Tambah Data Baru</a>
</div>

<div class="card border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderless table-striped">
                <thead>
                    <tr class="text-left">
                        <th>#</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>No Wa</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($supports as $support)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $support->name }}</td>
                        <td>{{ $support->job_title }}</td>
                        <td><a href="https://wa.me/{{ $support->whatsapp }}" target="_blank" rel="noopener noreferrer">{{ $support->whatsapp }}</a></td>
                        <td>{!! $support->status_formatted !!}</td>
                        <td>
                            <a href="{{ route('admin.supports.edit', ['id' => $support->id]) }}" class="btn btn-sm btn-secondary">Edit</a>
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