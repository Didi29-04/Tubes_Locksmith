@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h1 class="h3 mb-4">Detail Location</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $outlet->name }}</h5>
                <p class="card-text">
                    <strong>Address:</strong> {{ $outlet->address }}<br>
                    <strong>Latitude:</strong> {{ $outlet->latitude }}<br>
                    <strong>Longitude:</strong> {{ $outlet->longitude }}
                </p>
                <a href="{{ route('map') }}" class="btn btn-secondary">Back to Map</a>
            </div>
        </div>
    </div>
@endsection
