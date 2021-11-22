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
        <form action="{{ route('admin.banks.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="form-label">Nama Bank</label>
                <input type="text" class="form-control @error('bank_name') is-invalid @enderror" name="bank_name" value="{{ old('bank_name') }}" required>
                @error('bank_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">No. Rekening</label>
                <input type="text" class="form-control @error('account_number') is-invalid @enderror" name="account_number" value="{{ old('account_number') }}" required>
                @error('account_number')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Atas Nama Rekening</label>
                <input type="text" class="form-control @error('account_name') is-invalid @enderror" name="account_name" value="{{ old('account_name') }}" required>
                @error('account_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Cabank Bank (Opsional)</label>
                <input type="text" class="form-control @error('branch') is-invalid @enderror" name="branch" value="{{ old('branch') }}">
                @error('branch')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-4">
                <button class="btn btn-block btn-primary" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
@endpush