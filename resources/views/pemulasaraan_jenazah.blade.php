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
            <div action="#" x-data="formSubmit()">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Nama Pemohon / Ahli Waris</label>
                            <input type="text" class="form-control @error('customer_name') is-invalid @enderror" name="customer_name" value="{{ old('customer_name') }}" x-model="customer_name">
                            @error('customer_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">No WA / Hp</label>
                            <input type="number" class="form-control @error('customer_phone') is-invalid @enderror" name="customer_phone" value="{{ old('customer_phone') }}" x-model="customer_phone">
                            @error('customer_phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Alamat Pemohon / Ahli Waris</label>
                    <textarea class="form-control @error('customer_address') is-invalid @enderror" name="customer_address" cols="" rows="2" x-model="customer_address">{{ old('customer_address') }}</textarea>
                    @error('customer_address')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Kelurahan</label>
                    <input type="text" class="form-control @error('district') is-invalid @enderror" name="district" value="{{ old('district') }}" x-model="district">
                    @error('district')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Kecamatan</label>
                    <input type="text" class="form-control @error('sub_district') is-invalid @enderror" name="sub_district" value="{{ old('sub_district') }}" x-model="sub_district">
                    @error('sub_district')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Nama Jenazah</label>
                    <input type="text" class="form-control @error('nama_jenazah') is-invalid @enderror" name="nama_jenazah" value="{{ old('nama_jenazah') }}" x-model="nama_jenazah">
                    @error('nama_jenazah')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">TPU</label>
                    <input type="text" class="form-control @error('tpu') is-invalid @enderror" name="tpu" value="{{ old('tpu') }}" x-model="tpu">
                    @error('tpu')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Catatan Tambahan (Opsional)</label>
                    <textarea class="form-control" name="notes" rows="3" x-model="notes">{{ old('notes') }}</textarea>
                    @error('notes')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <hr>
                <button type="submit" x-on:click="submit" class="btn btn-primary btn-block btn-lg mt-4">Ajukan Permohonan</button>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
@endpush

@push('scripts')
<script>
    function formSubmit() {
    return {
        customer_name: '',
        customer_phone: '',
        customer_address: '',
        district: '',
        sub_district: '',
        nama_jenazah: '',
        tpu: '',
        notes: '',

        submit(event) {
            let msg = '';
            let num = 628999901222;
            
            msg += 'Nama Pemohon:+'+String(this.customer_name)+'%0A';
            msg += 'Nomor WA:+'+String(this.customer_phone)+'%0A';
            msg += 'Alamat Pemohon:+'+String(this.customer_address)+'%0A';
            msg += 'Kelurahan:+'+String(this.district)+'%0A';
            msg += 'Kecamatan:+'+String(this.sub_district)+'%0A';
            msg += 'Nama Jenazah:+'+String(this.nama_jenazah)+'%0A';
            msg += 'TPU:+'+String(this.tpu)+'%0A';
            msg += 'Catatan+Tambahan:+'+String(this.notes)+'%0A';
            
            var win = window.open(`https://wa.me/${num}?text=Assalamu'alaikum%0AAdmin+Sabilal+Muhtadin%0A%0ASaya+ingin+menggunakan+jasa+Pemulasaraan+Jeanazah+%0A%0A${msg}`, '_blank');
        },
    }
    }
</script>
@endpush