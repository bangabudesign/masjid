@extends('layouts.main')

@section('content')

<x-page-header :page-title="$page_title" />

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            @forelse ($events as $event)
            <div class="col-12 col-md-6 mb-4">
                <div class="card-event border rounded">
                    <div class="event-detail">
                        <div class="event-date text-center">
                            <div class="day">{{ date('d', strtotime($event->event_date)) }}</div>
                            <div class="month text-uppercase">{{ date('M', strtotime($event->event_date)) }}</div>
                            <div class="year">{{ date('Y', strtotime($event->event_date)) }}</div>
                        </div>
                        <div class="thumbnail rounded">
                            <img src="{{ $event->image_url }}" alt="{{ $event->name }}">
                        </div>
                    </div>
                    <div class="content">
                        <h2>{{ $event->name }}</h2>
                        <p>{{ \Illuminate\Support\Str::limit($event->body, 20, '...') }}</p>
                        <a href="{{ route('event.show', ['slug' => $event->slug]) }}" class="btn btn-primary">Detail Acara <svg xmlns="http://www.w3.org/2000/svg" style="height: 20px; width: 20px" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m17 8 4 4m0 0-4 4m4-4H3"></path></svg></a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 col-md-6 mb-4">
                <div class="card-event border rounded">
                    <div class="event-detail" style="padding-left: 20px">
                        <div class="thumbnail rounded" style="margin-right: 20px; width: 30%">
                            <div class="rounded" style="background-color: #00000025; height: 100%"></div>
                        </div>
                        <div class="thumbnail rounded" style="width: calc(100% - 30% - 20px)">
                            <div class="rounded" style="background-color: #00000025; height: 100%"></div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="bg-secondary rounded mb-3" style="height: 30px; width: 80%"></div>
                        <div class="bg-secondary rounded mb-3" style="height: 10px"></div>
                        <div class="bg-secondary rounded" style="height: 36px; width: 150px"></div>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection

@push('styles')
@endpush

@push('scripts')

@endpush
