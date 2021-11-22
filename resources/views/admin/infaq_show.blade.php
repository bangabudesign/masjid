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
            <table class="table table-bordered">
                <thead>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Total</th>
                    <th scope="col">Catatan</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </thead>
                <tbody>
                    @forelse ($infaq->payments as $payment)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $payment->created_at }}</td>
                        <td>{{ 'Rp '.$payment->amount_formatted }}</td>
                        <td>{{ $payment->notes ?? '-' }}</td>
                        <td>{!! $payment->status_formatted !!}</td>
                        <td>
                            <a href="{{ route('admin.payments.edit', ['paymentable_type' => 'infaq', 'paymentable_id' => $infaq->id, 'id' => $payment->id]) }}" class="btn btn-sm btn-secondary">Edit</a>
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