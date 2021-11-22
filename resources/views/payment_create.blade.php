@extends('layouts.member')

@section('content')
@if (session('successMessage'))
    <div class="alert alert-success">
        {{ session('successMessage') }}
    </div>
@endif
<div class="mb-4">
    <h2 class="h4">{{ $page_title }}</h2>
    <p>{{ $sub_title }}</p>
 </div>

<div class="card border-0">
    <div class="card-body">
        <form action="{{ route('member.payments.store', ['paymentable_type' => $paymentable_type, 'paymentable_id' => $paymentable_id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card mb-5 alert-primary text-dark" style="max-width: 320px">
                <div class="card-body">
                    @forelse ($banks as $bank)
                    <div class="d-flex justify-content-between mb-2 pb-2 border-bottom border-primary">
                        <div>
                            <div>{{ $bank->bank_name }}</div>
                            <div>{{ $bank->branch }}</div>
                        </div>
                        <div class="text-right">
                            <div class="font-weight-bold">{{ $bank->account_number }}</div>
                            <div>{{ $bank->account_name }}</div>
                        </div>
                    </div>
                    @empty
                    <div class="d-flex justify-content-between mb-2 pb-2 border-bottom border-warning">
                        Belum ada rekening bank
                    </div>
                    @endforelse
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Metode Pembayaran</label>
                <select class="form-control @error('method') is-invalid @enderror" name="method">
                    <option {{ old('method') == 'Tunai' ? 'selected' : '' }} value="1">Tunai</option>
                    <option {{ old('method') == 'Transfer' ? 'selected' : '' }} value="0">Transfer</option>
                </select>
                @error('method')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label class="form-label">Nominal Pembayaran</label>
                <input type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount', $model->total_unpaid) }}">
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
            <div class="form-group">
                <label class="form-label">Bukti Pembayaran</label>
                <div x-data="imageViewer()">
                    <div class="mb-2">
                        <div class="image-placeholder">
                            <div class="inner-placeholder">
                                <template x-if="imageUrl">
                                    <img :src="imageUrl">
                                </template>
                                <template x-if="!imageUrl">
                                    <div class="text-muted">Upload Bukti Pembayaran</div>
                                </template>
                                <input class="file-upload @error('receipt') is-invalid @enderror" name="receipt" type="file" accept="image/*" x-on:change="fileChosen">
                            </div>
                        </div>
                        @error('receipt')
                        <div class="small text-danger">{{ $message }}</div>
                        @enderror   
                    </div>
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
    function imageViewer() {
    return {
        imageUrl: '',

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