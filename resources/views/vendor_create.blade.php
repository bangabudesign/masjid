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
            <form action="{{ route('vendors.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Logo Usaha / Brand</label>
                    <div x-data="imageViewer('')">
                        <div class="mb-2">
                            <div class="image-placeholder">
                                <div class="inner-placeholder">
                                    <template x-if="imageUrl">
                                        <img :src="imageUrl">
                                    </template>
                                    <template x-if="!imageUrl">
                                        <div class="text-muted">Klik Untuk Upload Gambar</div>
                                    </template>
                                    <input class="file-upload @error('logo') is-invalid @enderror" name="logo" type="file" accept="image/*" x-on:change="fileChosen">
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
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}">
                            @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Kategori</label>
                    <select class="form-control @error('category') is-invalid @enderror" name="category">
                        <option {{ old('category') == '' ? 'selected' : '' }} value="">Pilih...</option>
                        <option {{ old('category') == 'Catering' ? 'selected' : '' }} value="Catering">Catering</option>
                        <option {{ old('category') == 'MakeUp Artist' ? 'selected' : '' }} value="MakeUp Artist">MakeUp Artist</option>
                        <option {{ old('category') == 'Dekorasi' ? 'selected' : '' }} value="Dekorasi">Dekorasi</option>
                        <option {{ old('category') == 'Video & Foto Grafi' ? 'selected' : '' }} value="Video & Foto Grafi">Video & Foto Grafi</option>
                        <option {{ old('category') == 'Undangan' ? 'selected' : '' }} value="Undangan">Undangan</option>
                    </select>
                    @error('customer_phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Profil</label>
                    <textarea class="form-control @error('about') is-invalid @enderror" name="about" cols="" rows="4">{{ old('about') }}</textarea>
                    @error('about')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Alamat</label>
                    <textarea class="form-control @error('address') is-invalid @enderror" name="address" cols="" rows="2">{{ old('address') }}</textarea>
                    @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Kota</label>
                    <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}">
                    @error('city')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Website (Opsional)</label>
                    <input type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') }}">
                    @error('website')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Instagram (Opsional)</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">@</span>
                        </div>
                        <input type="text" class="form-control @error('instagram') is-invalid @enderror" name="instagram" value="{{ old('instagram') }}">
                      </div>
                    @error('instagram')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">WhatsApp (Opsional)</label>
                    <input type="number" class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp" value="{{ old('whatsapp') }}">
                    @error('whatsapp')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" x-on:click="submit" class="btn btn-primary btn-block btn-lg mt-4">Ajukan Permohonan</button>
            </form>
        </div>
    </div>
</section>
@endsection

@push('styles')
@endpush

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