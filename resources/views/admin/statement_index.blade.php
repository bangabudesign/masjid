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
                        <td class="d-flex">
                            <form action="{{ route('admin.statements.destroy', ['id' => $statement->id]) }}" method="post" onsubmit = "if (! confirm('Hapus data ini?')) { return false; }">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger"><svg xmlns="http://www.w3.org/2000/svg" height="16px" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9 2a1 1 0 0 0-.894.553L7.382 4H4a1 1 0 0 0 0 2v10a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V6a1 1 0 1 0 0-2h-3.382l-.724-1.447A1 1 0 0 0 11 2H9zM7 8a1 1 0 0 1 2 0v6a1 1 0 1 1-2 0V8zm5-1a1 1 0 0 0-1 1v6a1 1 0 1 0 2 0V8a1 1 0 0 0-1-1z" clip-rule="evenodd"/></svg></button>
                            </form>
                            <a href="{{ route('admin.statements.edit', ['id' => $statement->id]) }}" class="btn btn-sm btn-secondary ml-2">Edit</a>
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