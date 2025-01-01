@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Outlet</h1>
    <form action="{{ route('outlets.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Outlet Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Outlet Address</label>
            <textarea name="address" id="address" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="latitude" class="form-label">Latitude</label>
            <input type="text" name="latitude" id="latitude" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="longitude" class="form-label">Longitude</label>
            <input type="text" name="longitude" id="longitude" class="form-control" readonly>
        </div>
        <div class="mb-3">
            <label for="map" class="form-label">Select Location</label>
            <div id="map" style="height: 400px; width: 100%;"></div>
        </div>
        <button type="submit" class="btn btn-success">Create Outlet</button>
        <a href="{{ route('outlets.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script>
    // Inisialisasi Peta
    var map = L.map('map').setView([-8.4095, 115.1889], 13); // Koordinat default (Bali)

    // Tambahkan Tile Layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Marker untuk Lokasi yang Dipilih
    var marker = L.marker([-8.4095, 115.1889], {draggable: true}).addTo(map);

    // Event: Update Latitude dan Longitude Saat Marker Dipindahkan
    marker.on('move', function (e) {
        document.getElementById('latitude').value = e.latlng.lat;
        document.getElementById('longitude').value = e.latlng.lng;
    });
</script>
@endsection
