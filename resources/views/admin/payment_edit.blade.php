@extends('layouts.admin')

@section('content')
@if (session('successMessage'))
    <div class="alert alert-success">
        {{ session('successMessage') }}
    </div>
@endif
<div class="mb-4">
    <h2 class="h4">{{ $page_title }}</h2>
    <p>{{ $sub_title }}</p>
 </div>

<div class="card border-0">
    <div class="card-body">
        <form action="{{ route('admin.payments.update', ['paymentable_type' => $paymentable_type, 'paymentable_id' => $paymentable_id, 'id' => $payment->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label class="form-label">Metode Pembayaran</label>
                <select class="form-control @error('method') is-invalid @enderror" name="method">
                    <option {{ old('method', $payment->method) == 'Tunai' ? 'selected' : '' }} value="1">Tunai</option>
                    <option {{ old('method', $payment->method) == 'Transfer' ? 'selected' : '' }} value="0">Transfer</option>
                </select>
                @error('method')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Nominal Pembayaran</label>
                <input type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount', $payment->amount) }}">
                @error('amount')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Catatan (Opsional)</label>
                <textarea class="form-control @error('notes') is-invalid @enderror" name="notes" id="editor" rows="3">{{ old('notes', $payment->notes) }}</textarea>
                @error('notes')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="row g-3">
                <div class="col-12 col-md-4 form-group">
                    <label class="form-label">Status Pembayaran</label>
                    <select class="form-control @error('status') is-invalid @enderror" name="status">
                        <option {{ old('status', $payment->status) == 0 ? 'selected' : '' }} value="0">Unpaid</option>
                        <option {{ old('status', $payment->status) == 1 ? 'selected' : '' }} value="1">Paid</option>
                        <option {{ old('status', $payment->status) == -1 ? 'selected' : '' }} value="-1">Cancel</option>
                    </select>
                    @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-4 form-group">
                    <label class="form-label">Tanggal Konfirmasi</label>
                    <input type="datetime-local" class="form-control @error('confirm_at') is-invalid @enderror" name="confirm_at" value="{{ old('confirm_at', date('Y-m-d\TH:i', strtotime($payment->confirm_at))) }}">
                    @error('confirm_at')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Bukti Pembayaran</label>
                <div>
                    <img src="{{ $payment->receipt_url }}" alt="Bukti Pembayaran" style="max-width: 300px">
                </div>
            </div>
            <div class="mt-4">
                <button class="btn btn-block btn-primary" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection