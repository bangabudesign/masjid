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
        <form action="{{ route('admin.spots.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div x-data="imageViewer()">
                    <div class="mb-2">
                        <div class="image-placeholder">
                            <div class="inner-placeholder">
                                <template x-if="imageUrl">
                                    <img :src="imageUrl">
                                </template>
                                <template x-if="!imageUrl">
                                    <div class="text-muted">Klik Untuk Upload Gambar</div>
                                </template>
                                <input class="file-upload @error('image') is-invalid @enderror" name="image" type="file" accept="image/*" x-on:change="fileChosen">
                            </div>
                        </div>
                        @error('image')
                        <div class="small text-danger">{{ $message }}</div>
                        @enderror   
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Nama Spot</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Link</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}">
                @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="editor" rows="10">{{ old('description') }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="row g-3">
                <div class="col-12 col-md-4 form-group">
                    <label class="form-label">Harga / Hari</label>
                    <input type="number" class="form-control @error('daily_booking_rate') is-invalid @enderror" name="daily_booking_rate" value="{{ old('daily_booking_rate', 0) }}">
                    @error('daily_booking_rate')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-4 form-group">
                    <label class="form-label">Harga / Jam</label>
                    <input type="number" class="form-control @error('hourly_booking_rate') is-invalid @enderror" name="hourly_booking_rate" value="{{ old('hourly_booking_rate', 0) }}">
                    @error('hourly_booking_rate')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-2 form-group">
                    <label class="form-label">Kapasitas</label>
                    <input type="number" class="form-control @error('capacity') is-invalid @enderror" name="capacity" value="{{ old('capacity') }}">
                    @error('capacity')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-2 form-group">
                    <label class="form-label">Status</label>
                    <select class="form-control @error('is_active') is-invalid @enderror" name="is_active">
                        <option {{ old('is_active') == 1 ? 'selected' : '' }} value="1">Aktif</option>
                        <option {{ old('is_active') == 0 ? 'selected' : '' }} value="0">Tidak Aktif</option>
                    </select>
                    @error('is_active')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mt-4">
                <button class="btn btn-block btn-primary" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function imageViewer(src = '') {
    return {
        imageUrl: src,

        fileChosen(event) {
        this.fileToDataUrl(event, src => this.imageUrl = src)
        },

        fileToDataUrl(event, callback) {
        if (! event.target.files.length) return

        let file = event.target.files[0],
            reader = new FileReader()

        reader.readAsDataURL(file)
        reader.onload = e => callback(e.target.result)
        },
    }
    }
</script>
@endpush