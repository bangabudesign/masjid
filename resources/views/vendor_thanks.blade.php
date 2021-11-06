@extends('layouts.state')

@section('content')
<section class="py-5">
    <div class="container" style="max-width: 500px;min-height: 67vh">
        <div class="card border-0 p-4 p-md-5 d-flex flex-column align-items-center">
            <div class="state-icon bg-success text-white">
                <svg xmlns="http://www.w3.org/2000/svg" height="40px" width="40px" viewBox="0 0 20 20" fill="currentColor"><path d="M9 2a1 1 0 0 0 0 2h2a1 1 0 1 0 0-2H9z"></path><path fill-rule="evenodd" d="M4 5a2 2 0 0 1 2-2 3 3 0 0 0 3 3h2a3 3 0 0 0 3-3 2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5zm3 4a1 1 0 0 0 0 2h.01a1 1 0 1 0 0-2H7zm3 0a1 1 0 0 0 0 2h3a1 1 0 1 0 0-2h-3zm-3 4a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H7zm3 0a1 1 0 1 0 0 2h3a1 1 0 1 0 0-2h-3z" clip-rule="evenodd"></path></svg>
            </div>
            <div class="text-center mt-3">
                <h1 class="h3 font-weight-bold text-success">Success</h1>
                <p>Pengajuan Anda sebagai vendor telah terkirim mohon tunggu 3x24 jam untuk proses verifikasi.</p>
                <a href="{{ route('home') }}" class="btn btn-primary btn-lg">Kembali Ke beranda</a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
@endpush

@push('scripts')
<script>
    
</script>
@endpush