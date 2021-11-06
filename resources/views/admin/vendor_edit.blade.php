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
        <form action="{{ route('admin.vendors.update', ['id' => $vendor->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Logo Usaha / Brand</label>
                <div x-data="imageViewer('{{ $vendor->logo_url }}')">
                    <div class="mb-2">
                        <div class="image-placeholder">
                            <div class="inner-placeholder">
                                <template x-if="imageUrl">
                                    <img :src="imageUrl">
                                </template>
                                <template x-if="!imageUrl">
                                    <div class="text-muted">Klik Untuk Upload Gambar</div>
                                </template>
                                <input class="file-upload @error('logo') is-invalid @enderror" name="logo" type="file" accept="image/*" x-on:change="fileChosen" disabled>
                            </div>
                        </div>
                        @error('logo')
                        <div class="small text-danger">{{ $message }}</div>
                        @enderror   
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Nama Usaha / Brand</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $vendor->name) }}" disabled>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username', $vendor->username) }}" disabled>
                        @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Kategori</label>
                <select class="form-control @error('category') is-invalid @enderror" name="category" disabled>
                    <option {{ old('category', $vendor->category) == '' ? 'selected' : '' }} value="">Pilih...</option>
                    <option {{ old('category', $vendor->category) == 'Catering' ? 'selected' : '' }} value="Catering">Catering</option>
                    <option {{ old('category', $vendor->category) == 'MakeUp Artist' ? 'selected' : '' }} value="MakeUp Artist">MakeUp Artist</option>
                    <option {{ old('category', $vendor->category) == 'Dekorasi' ? 'selected' : '' }} value="Dekorasi">Dekorasi</option>
                    <option {{ old('category', $vendor->category) == 'Video & Foto Grafi' ? 'selected' : '' }} value="Video & Foto Grafi">Video & Foto Grafi</option>
                    <option {{ old('category', $vendor->category) == 'Undangan' ? 'selected' : '' }} value="Undangan">Undangan</option>
                </select>
                @error('customer_phone')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Profil</label>
                <textarea class="form-control @error('about') is-invalid @enderror" name="about" cols="" rows="4" disabled>{{ old('about', $vendor->about) }}</textarea>
                @error('about')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Alamat</label>
                <textarea class="form-control @error('address') is-invalid @enderror" name="address" cols="" rows="2" disabled>{{ old('address', $vendor->address) }}</textarea>
                @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Kota</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city', $vendor->city) }}" disabled>
                @error('city')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Website (Opsional)</label>
                        <input type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website', $vendor->website) }}" disabled>
                        @error('website')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">Instagram (Opsional)</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">@</span>
                            </div>
                            <input type="text" class="form-control @error('instagram') is-invalid @enderror" name="instagram" value="{{ old('instagram', $vendor->instagram) }}" disabled>
                          </div>
                        @error('instagram')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label">WhatsApp (Opsional)</label>
                        <input type="number" class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp" value="{{ old('whatsapp', $vendor->whatsapp) }}" disabled>
                        @error('whatsapp')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div> 
            <div class="row g-3">
                <div class="col-12 col-md-4 form-group">
                    <label class="form-label">Tanggal Verifikasi</label>
                    <input type="datetime-local" class="form-control @error('verified_at') is-invalid @enderror" name="verified_at" value="{{ old('verified_at', date('Y-m-d\TH:i', strtotime($vendor->verified_at))) }}">
                    @error('verified_at')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-2 form-group">
                    <label class="form-label">Status</label>
                    <select class="form-control @error('status') is-invalid @enderror" name="status">
                        <option {{ old('status', $vendor->status) == 1 ? 'selected' : '' }} value="1">Verified</option>
                        <option {{ old('status', $vendor->status) == 0 ? 'selected' : '' }} value="0">Review</option>
                    </select>
                    @error('status')
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