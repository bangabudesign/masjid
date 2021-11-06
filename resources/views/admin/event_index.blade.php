@extends('layouts.admin')

@section('content')
@if (session('successMessage'))
    <div class="alert alert-success">
        {{ session('successMessage') }}
    </div>
@endif
<div class="d-md-flex align-items-center justify-content-between mb-4">
  <h2 class="h4">{{ $page_title }}</h2>
  <a href="{{ route('admin.events.create') }}" class="btn btn-primary">Tambah Agenda</a>
</div>

<div class="card border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderless table-striped">
                <thead>
                    <tr class="text-left">
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Nama Acara</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($events as $event)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $event->event_date }}</td>
                        <td>{{ $event->name }}</td>
                        <td>{!! $event->status_formatted !!}</td>
                        <td>
                            <a href="{{ route('admin.events.edit', ['id' => $event->id]) }}" class="btn btn-sm btn-secondary">Edit</a>
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