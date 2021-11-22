@extends('layouts.state')

@section('content')

<section class="py-5">
    <div class="container" style="max-width: 750px">
        @if (session('errorMessage'))
            <div class="alert alert-danger">
                {{ session('errorMessage') }}
            </div>
        @endif
        <div class="card border-0 p-4 p-md-5">
            <h1 class="h3 font-weight-bold">{{ $page_title }}</h1>
            <p class="mb-5">{{ $sub_title }}</p>
            <form action="{{ route('infaq.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $infaq->id }}">
                <div class="form-group">
                    <label class="form-label">Metode Pembayaran</label>
                    <select class="form-control @error('method') is-invalid @enderror" name="method">
                        <option {{ old('method') == 'Transfer' ? 'selected' : '' }} value="0">Transfer</option>
                        <option {{ old('method') == 'Tunai' ? 'selected' : '' }} value="1">Tunai</option>
                    </select>
                    @error('method')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Nominal Infaq</label>
                    <input type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount', 100000) }}">
                    @error('amount')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Catatan (Opsional)</label>
                    <textarea class="form-control @error('notes') is-invalid @enderror" name="notes" id="editor" rows="3">{{ old('notes') }}</textarea>
                    @error('notes')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-4">
                    <button class="btn btn-block btn-primary" type="submit">Lanjut Ke Pembayaran</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush