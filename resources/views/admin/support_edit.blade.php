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
        <form action="{{ route('admin.supports.update',  ['id' => $support->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <div x-data="imageViewer('{{ $support->image_url }}')">
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
                    <input type="hidden" name="old_image" value="{{ $support->image }}">
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $support->name) }}" required>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Jabatan</label>
                <input type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title" value="{{ old('job_title', $support->job_title) }}" required>
                @error('job_title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">WhatsApp</label>
                <input type="number" class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp" value="{{ old('whatsapp', $support->whatsapp) }}" required>
                @error('whatsapp')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="row g-3">
                <div class="col-12 col-md-2 form-group">
                    <label class="form-label">Status</label>
                    <select class="form-control @error('status') is-invalid @enderror" name="status">
                        <option {{ old('status', $support->status) == 1 ? 'selected' : '' }} value="1">Aktif</option>
                        <option {{ old('status', $support->status) == 0 ? 'selected' : '' }} value="0">Off</option>
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