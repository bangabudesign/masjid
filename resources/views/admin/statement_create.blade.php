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
        <form action="{{ route('admin.statements.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="form-label">Judul</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="row g-3">
                <div class="col-12 col-md-4 form-group">
                    <label class="form-label">Tanggal Pencatatan</label>
                    <input type="datetime-local" class="form-control @error('recording_at') is-invalid @enderror" name="recording_at" value="{{ old('recording_at') }}">
                    @error('recording_at')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-4 form-group">
                    <label class="form-label">Uang Masuk</label>
                    <input type="number" class="form-control @error('income') is-invalid @enderror" name="income" value="{{ old('income', 0) }}">
                    @error('income')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-4 form-group">
                    <label class="form-label">Uang Keluar</label>
                    <input type="number" class="form-control @error('outcome') is-invalid @enderror" name="outcome" value="{{ old('outcome', 0) }}">
                    @error('outcome')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Body (Opsional)</label>
                <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="editor" rows="10">{{ old('body') }}</textarea>
                @error('body')
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