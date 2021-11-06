@extends('layouts.main')

@section('content')

<x-page-header-secondary page-title="Detail Acara" />

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center event-details">
            <div class="col-8 mb-4">
                <div class="card border-0 rounded">
                    <div class="card-news rounded-top">
                        <div>
                            <img src="{{ $event->image_url }}" alt="{{ $event->name }}" style="width: 100%">
                        </div>
                    </div>
                    <div class="card-body">
                        <h1 class="h2">{{ $event->name }}</h1>
                        <h3 class="text-primary">{{ $event->event_date }}</h3>
                        <div>{!! $event->body !!}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection