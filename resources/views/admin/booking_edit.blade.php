@extends('layouts.admin')

@section('content')
@if (session('successMessage'))
    <div class="alert alert-success">
        {{ session('successMessage') }}
    </div>
@endif
@if (session('errorMessage'))
    <div class="alert alert-danger">
        {{ session('errorMessage') }}
    </div>
@endif
<div class="mb-4">
    <h2 class="h4">{{ $page_title }}</h2>
    <p>{{ $sub_title }}</p>
 </div>

<div class="card border-0">
    <div class="card-body">
        <form action="{{ route('admin.bookings.update', ['id' => $booking->id]) }}" method="post" x-data="{ daycount: {{ old('daily_booking_count', $booking->daily_booking_count) }}, hourcount: {{ old('hourly_booking_count', $booking->hourly_booking_count) }}, dayrate: {{ $booking->daily_booking_rate }}, hourrate: {{ $booking->hourly_booking_rate }} }">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Nama Customer</label>
                        <input type="text" class="form-control @error('customer_name') is-invalid @enderror" name="customer_name" value="{{ old('customer_name', $booking->customer_name) }}">
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
                        <input type="text" class="form-control @error('customer_email') is-invalid @enderror" name="customer_email" value="{{ old('customer_email', $booking->customer_email) }}">
                        @error('customer_email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">No Hp</label>
                        <input type="number" class="form-control @error('customer_phone') is-invalid @enderror" name="customer_phone" value="{{ old('customer_phone', $booking->customer_phone) }}">
                        @error('customer_phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">Nama Event</label>
                <input type="text" class="form-control @error('event_name') is-invalid @enderror" name="event_name" value="{{ old('event_name', $booking->event_name) }}">
                @error('event_name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="row">                    
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Dari Tanggal</label>
                        <input type="datetime-local" class="form-control @error('start_at') is-invalid @enderror" name="start_at" value="{{ old('start_at', date('Y-m-d\TH:i', strtotime($booking->start_at))) }}">
                        @error('start_at')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>                    
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Sampai Tanggal</label>
                        <input type="datetime-local" class="form-control @error('end_at') is-invalid @enderror" name="end_at" value="{{ old('end_at', date('Y-m-d\TH:i', strtotime($booking->end_at))) }}">
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
                <textarea class="form-control" name="notes" rows="3">{{ old('notes', $booking->notes) }}</textarea>
                @error('notes')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="row g-3">
                <div class="col-12 col-md-6 form-group">
                    <label class="form-label">Status Booking</label>
                    <select class="form-control @error('status') is-invalid @enderror" name="status">
                        <option {{ old('status', $booking->status) == 0 ? 'selected' : '' }} value="0">Waiting</option>
                        <option {{ old('status', $booking->status) == 1 ? 'selected' : '' }} value="1">Booked</option>
                        <option {{ old('status', $booking->status) == -1 ? 'selected' : '' }} value="-1">Cancel</option>
                    </select>
                    @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between">
                <h4 class="font-weight-bold">Total</h4>
                <h4 class="font-weight-bold">Rp <span x-text="((daycount*dayrate)+(hourcount*hourrate)).toLocaleString()"></span></h4>
            </div>
            <div class="mt-4">
                <button class="btn btn-block btn-primary" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection