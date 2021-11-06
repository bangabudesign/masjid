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
            <h1 class="h3 font-weight-bold mb-5">Booking {{ $spot->name }}</h1>
            <form action="{{ route('booking.store', ['spot_id' => $spot->id]) }}" method="post" x-data="{ daycount: {{ old('daily_booking_count', 1) }}, hourcount: {{ old('hourly_booking_count', 0) }}, dayrate: {{ $spot->daily_booking_rate }}, hourrate: {{ $spot->hourly_booking_rate }} }">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Nama Customer</label>
                            <input type="text" class="form-control @error('customer_name') is-invalid @enderror" name="customer_name" value="{{ old('customer_name', auth()->user()->name) }}">
                            @error('customer_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Nama Agency (Opsional)</label>
                            <input type="text" class="form-control @error('customer_agency') is-invalid @enderror" name="customer_agency" value="{{ old('customer_agency') }}">
                            @error('customer_agency')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control @error('customer_email') is-invalid @enderror" name="customer_email" value="{{ old('customer_email', auth()->user()->email) }}">
                            @error('customer_email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">No Hp</label>
                            <input type="number" class="form-control @error('customer_phone') is-invalid @enderror" name="customer_phone" value="{{ old('customer_phone') }}">
                            @error('customer_phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Nama Event</label>
                    <input type="text" class="form-control @error('event_name') is-invalid @enderror" name="event_name" value="{{ old('event_name') }}">
                    @error('event_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Dari Tanggal</label>
                            <input type="datetime-local" class="form-control @error('start_at') is-invalid @enderror" name="start_at" value="{{ old('start_at') }}">
                            @error('start_at')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Sampai Tanggal</label>
                            <input type="datetime-local" class="form-control @error('end_at') is-invalid @enderror" name="end_at" value="{{ old('end_at') }}">
                            @error('end_at')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Jumlah Hari</label>
                            <div class="d-flex">
                                <button x-on:click="daycount--" class="btn btn-danger d-flex align-items-center justify-content-center" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" width="20px" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6"/></svg>
                                </button>
                                <input type="number" class="mx-2 form-control @error('daily_booking_count') is-invalid @enderror" name="daily_booking_count" x-model="daycount">
                                <button x-on:click="daycount++" class="btn btn-success d-flex align-items-center justify-content-center" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" width="20px" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                                </button>
                            </div>
                            @error('daily_booking_count')
                            <div class="small text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Jumlah Jam</label>
                            <div class="d-flex">
                                <button x-on:click="hourcount--" class="btn btn-danger d-flex align-items-center justify-content-center" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" width="20px" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6"/></svg>
                                </button>
                                <input type="number" class="mx-2 form-control @error('hourly_booking_count') is-invalid @enderror" name="hourly_booking_count" x-model="hourcount">
                                <button x-on:click="hourcount++" class="btn btn-success d-flex align-items-center justify-content-center" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" width="20px" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                                </button>
                            </div>
                            @error('hourly_booking_count')
                            <div class="small text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Catatan Tambahan (Opsional)</label>
                    <textarea class="form-control" name="notes" rows="3">{{ old('notes') }}</textarea>
                    @error('notes')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <h4 class="font-weight-bold">Total</h4>
                    <h4 class="font-weight-bold">Rp <span x-text="((daycount*dayrate)+(hourcount*hourrate)).toLocaleString()"></span></h4>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-lg mt-4">Ajukan Peminjaman</button>
            </form>
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