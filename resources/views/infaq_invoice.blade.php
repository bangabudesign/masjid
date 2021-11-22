@extends('layouts.state')

@section('content')

<section class="py-5">
    <div class="container" style="max-width: 720px">
        @if (session('errorMessage'))
            <div class="alert alert-danger">
                {{ session('errorMessage') }}
            </div>
        @endif
        <div class="card border-0 p-4 p-md-5">
            @if ($payment->status == 0)
            <div class="alert alert-warning text-center">
                Menunggu Pembayaran
            </div>
            @elseif($payment->status == 1)
            <div class="alert alert-success text-center">
                Pembayaran Dikonfirmasi
            </div>
            @else
            <div class="alert alert-info text-center">
                Transaksi Dibatalkan
            </div>
            @endif
            <p class="">Yang Harus Dibayar</p>
            <h1 class="h3 font-weight-bold">{{ 'Rp '.number_format($payment->amount) }}</h1>
            <hr>
            <h5>Petunjuk Pembayaran</h5>
            <p>Segera lakukan pembayaran sejumlah <b>{{ 'Rp '.number_format($payment->amount) }}</b> melalui <b>Tunai</b> di pusat pelayanan {{ config('app.name', 'Laravel') }} atau melalui <b>Transfer</b> kepada rekening berkut:</p>
            @forelse ($banks as $bank)
            <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
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
            <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                Belum ada rekening bank
            </div>
            @endforelse
            <form action="{{ route('infaq.update', ['id' => $payment->id]) }}" method="post" enctype="multipart/form-data" class="mt-5">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="form-label">Bukti Pembayaran</label>
                    <div x-data="imageViewer('{{ $payment->receipt ? $payment->receipt_url : '' }}')">
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
                @if ($payment->receipt == null)
                <div class="mt-4">
                    <button class="btn btn-block btn-primary" type="submit">Konfirmasi Pembayaran</button>
                </div>
                @else
                <div class="mt-4">
                    <a class="btn btn-block btn-primary" href="/">Kembali Ke Beranda</a>
                </div>
                @endif
            </form>
        </div>
    </div>
</section>
@endsection

@push('styles')
@endpush

@push('scripts')
<script>
    function imageViewer(url) {
    return {
        imageUrl: url,

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