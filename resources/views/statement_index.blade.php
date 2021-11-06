@extends('layouts.main')

@section('content')

<x-page-header-secondary page-title="Detail" />

<section class="py-5">
    <div class="container">
        <div class="table-responsive">
            <table class="table table-borderless table-striped">
                <thead>
                    <tr class="text-left">
                        <th>#</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Uang Masuk</th>
                        <th>Uang Keluar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($statements as $statement)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $statement->title }}</td>
                        <td>{{ $statement->recording_at->isoFormat('dddd, DD - MMMM - Y') }}</td>
                        <td class="text-success">{{ 'Rp '.number_format($statement->income) }}</td>
                        <td class="text-danger">{{ 'Rp '.number_format($statement->outcome) }}</td>
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
</section>
@endsection