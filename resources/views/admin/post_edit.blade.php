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
        <form action="{{ route('admin.posts.update',  ['id' => $post->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <div x-data="imageViewer('{{ $post->image_url }}')">
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
                    <input type="hidden" name="old_image" value="{{ $post->image }}">
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Judul Berita</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $post->title) }}">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Link</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug', $post->slug) }}">
                @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Body</label>
                <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="editor" rows="10">{{ old('body', $post->body) }}</textarea>
                @error('body')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="row g-3">
                <div class="col-12 col-md-4 form-group">
                    <label class="form-label">Tanggal Terbit</label>
                    <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror" name="published_at" value="{{ old('published_at', date('Y-m-d\TH:i', strtotime($post->published_at))) }}">
                    @error('published_at')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-2 form-group">
                    <label class="form-label">Status</label>
                    <select class="form-control @error('status') is-invalid @enderror" name="status">
                        <option {{ old('status', $post->status) == 1 ? 'selected' : '' }} value="1">Publish</option>
                        <option {{ old('status', $post->status) == 0 ? 'selected' : '' }} value="0">Draft</option>
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