@extends('layouts.admin')

@section('content')
@if (session('successMessage'))
    <div class="alert alert-success">
        {{ session('successMessage') }}
    </div>
@endif
<div class="d-md-flex align-items-center justify-content-between mb-4">
  <h2 class="h4">{{ $page_title }}</h2>
  <a href="{{ route('admin.infaq.create') }}" class="btn btn-primary">Tambah Kategori Infaq</a>
</div>

<div class="card border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderless table-striped">
                <thead>
                    <tr class="text-left">
                        <th>#</th>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($infaq as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->total_paid_formatted }}</td>
                        <td>
                            <a href="{{ route('admin.infaq.edit', ['id' => $item->id]) }}" class="btn btn-sm btn-secondary">Edit</a>
                            <a href="{{ route('admin.infaq.show', ['id' => $item->id]) }}" class="btn btn-sm btn-secondary">
                                Datail&nbsp;
                                @if ($item->payments->where('status', 0)->count() > 0)
                                <span class="badge badge-danger">{{$item->payments->where('status', 0)->count()}}</span>
                                @endif
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum Ada Data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection