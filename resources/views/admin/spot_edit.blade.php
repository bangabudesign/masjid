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
        <form action="{{ route('admin.spots.update', ['id' => $spot->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <div x-data="imageViewer('{{ $spot->image_url }}')">
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
                    <input type="hidden" name="old_image" value="{{ $spot->image }}">
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Nama Spot</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $spot->name) }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Link</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug', $spot->slug) }}">
                @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="editor" rows="10">{{ old('description', $spot->description) }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="row g-3">
                <div class="col-12 col-md-4 form-group">
                    <label class="form-label">Harga / Hari</label>
                    <input type="number" class="form-control @error('daily_booking_rate') is-invalid @enderror" name="daily_booking_rate" value="{{ old('daily_booking_rate', $spot->daily_booking_rate) }}">
                    @error('daily_booking_rate')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-2 form-group">
                    <label class="form-label">Kapasitas</label>
                    <input type="number" class="form-control @error('capacity') is-invalid @enderror" name="capacity" value="{{ old('capacity', $spot->capacity) }}">
                    @error('capacity')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-2 form-group">
                    <label class="form-label">Status</label>
                    <select class="form-control @error('is_active') is-invalid @enderror" name="is_active">
                        <option {{ old('is_active', $spot->is_active) == 1 ? 'selected' : '' }} value="1">Aktif</option>
                        <option {{ old('is_active', $spot->is_active) == 0 ? 'selected' : '' }} value="0">Tidak Aktif</option>
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
        
        {{-- gallery --}}
        <hr>
        <h3 class="mb-3">Galeri Foto</h3>
        <div class="row">
            @foreach ($spot->images as $image)
            <div class="col-md-3">
                <div x-data="imageViewer('{{ $image->image_url }}')">
                    <div class="mb-2">
                        <div class="image-placeholder">
                            <div class="inner-placeholder">
                                <template x-if="imageUrl">
                                    <img :src="imageUrl">
                                </template>
                            </div>
                            <form action="{{ route('admin.images.destroy', ['id' => $image->id]) }}" method="post" onsubmit = "if (! confirm('Hapus foto ini?')) { return false; }">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9 2a1 1 0 0 0-.894.553L7.382 4H4a1 1 0 0 0 0 2v10a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V6a1 1 0 1 0 0-2h-3.382l-.724-1.447A1 1 0 0 0 11 2H9zM7 8a1 1 0 0 1 2 0v6a1 1 0 1 1-2 0V8zm5-1a1 1 0 0 0-1 1v6a1 1 0 1 0 2 0V8a1 1 0 0 0-1-1z" clip-rule="evenodd"/></svg></button>
                            </form>
                        </div> 
                    </div>
                    <input type="hidden" name="old_image" value="{{ $spot->image }}">
                </div>
                <p>{{ $image->title }}</p>
            </div>
            @endforeach
        </div>
        <form action="{{ route('admin.images.store') }}" method="post" enctype="multipart/form-data">
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
                    <input type="hidden" name="spot_id" value="{{ $spot->id }}">
                </div>
            </div>
            <div class="form-group" style="max-width: 300px;">
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Judul Foto">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-4" style="max-width: 300px;">
                <button class="btn btn-block btn-primary" type="submit">Upload</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor
    .create( document.querySelector( '#editor' ), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
            ]
        }
    } )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );

    // image preview
    const fileReader = new FileReader();
    const fileInput = document.getElementById("fileInput");
    const imgPreview = document.getElementById("imgPreview");
    let file;

    fileReader.onload = e => {
    imgPreview.src = e.target.result;
    }

    fileInput.addEventListener('change', e => {
    const f = e.target.files[0];
    file = f;
    fileReader.readAsDataURL(f);
    })
</script>

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