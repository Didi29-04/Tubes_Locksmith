@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="h3 mb-4">Outlet Detail</h1>

    <div class="row">
        <!-- Outlet Detail -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $outlet->name }}</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th>Address</th>
                            <td>{{ $outlet->address }}</td>
                        </tr>
                        <tr>
                            <th>Latitude</th>
                            <td>{{ $outlet->latitude }}</td>
                        </tr>
                        <tr>
                            <th>Longitude</th>
                            <td>{{ $outlet->longitude }}</td>
                        </tr>
                    </table>
                    <a href="{{ route('map') }}" class="btn btn-secondary mt-3">Back to Map</a>
                </div>
            </div>
        </div>

        <!-- Location on Map -->
        <div class="col-md-6">
            <div id="map" style="height: 400px;" class="mb-4"></div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Initialize the map
        var map = L.map('map').setView([{{ $outlet->latitude }}, {{ $outlet->longitude }}], 13);

        // Add the base map layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Add marker for the outlet
        L.marker([{{ $outlet->latitude }}, {{ $outlet->longitude }}])
            .addTo(map)
            .bindPopup("<b>{{ $outlet->name }}</b><br>{{ $outlet->address }}")
            .openPopup();
    });
</script>
@endsection
