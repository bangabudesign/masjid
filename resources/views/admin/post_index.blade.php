@extends('layouts.admin')

@section('content')
@if (session('successMessage'))
    <div class="alert alert-success">
        {{ session('successMessage') }}
    </div>
@endif
<div class="d-md-flex align-items-center justify-content-between mb-4">
  <h2 class="h4">{{ $page_title }}</h2>
  <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Buat Berita Baru</a>
</div>

<div class="card border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-borderless table-striped">
                <thead>
                    <tr class="text-left">
                        <th>#</th>
                        <th>Judul Berita</th>
                        <th>Penulis</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>{!! $post->status_formatted !!}</td>
                        <td>
                            <a href="{{ route('admin.posts.edit', ['id' => $post->id]) }}" class="btn btn-sm btn-secondary">Edit</a>
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