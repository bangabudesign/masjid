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
            <form  id="form" action="{{ route('booking.store', ['spot_id' => $spot->id]) }}" method="post" data-arrdate='{!! json_encode($booked) !!}'  autocomplete="off">
                @csrf
                <input id="daily-booking-count" type="hidden" name="daily_booking_count">
                <input id="daily-booking-rate" type="hidden" name="daily_booking_rate" value="{{ $spot->daily_booking_rate }}">
                <input id="start-at" type="hidden" class="form-control" name="start_at" value="{{ old('start_at') }}">
                <input id="end-at" type="hidden" class="form-control" name="end_at" value="{{ old('end_at') }}">
                <div class="form-group">
                    <label class="form-label">Tentukan Tanggal</label>
                    <input type="text" id="litepicker" class="form-control">
                </div>
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
                    <h4 id="total-price" class="font-weight-bold">Rp {{ number_format($spot->daily_booking_rate) }}</h4>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-lg mt-4">Ajukan Peminjaman</button>
            </form>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css"/>
<style>
    .litepicker .container__days .day-item.is-locked,.litepicker .container__days .day-item.is-locked:hover {
        border-radius: 0;
        background: #ffe2e2;
        color: red;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/litepicker-polyfills-ie11/dist/index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/litepicker/dist/litepicker.js"></script>
<script src="https://cdn.jsdelivr.net/npm/litepicker/dist/plugins/mobilefriendly.js"></script>
<script>
var disableDate = document.getElementById('form').dataset.arrdate;
disableDate = JSON.parse(disableDate);
new Litepicker({
  element: document.getElementById('litepicker'),
  plugins: ['mobilefriendly'],
  lockDays: disableDate,
  lang: "id-ID",
  numberOfColumns: 2,
  numberOfMonths: 2,
  format: "YYYY/MM/DD",
  tooltipText: {"one":"hari","other":"hari"},
  autoApply: true,
  singleMode: false,
  allowRepick: false,
  setup: (picker) => {
    picker.on('selected', (date1, date2) => {
        document.getElementById('start-at').value = date1.format('YYYY-MM-DD');
        document.getElementById('end-at').value = date2.format('YYYY-MM-DD');
        var ndays;
        var date1 = parseInt(date1.getTime());
        var date2 = parseInt(date2.getTime());

        ndays = (date2 - date1);
        ndays = ndays / (1000 * 3600 * 24);
        ndays = ndays + 1;
        
        var rate = document.getElementById('daily-booking-rate').value;
        rate = parseInt(rate);
        document.getElementById('total-price').innerHTML = (ndays*rate).toLocaleString();
        document.getElementById('daily-booking-count').value = ndays;
    });
    },
})
</script>
@endpush