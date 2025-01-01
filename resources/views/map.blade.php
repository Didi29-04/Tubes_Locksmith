@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Outlet Location</h1>
    <div id="map" style="height: 500px; width: 100%;"></div>
</div>

<script>
    // Inisialisasi Peta
    var map = L.map('map').setView([-8.4095, 115.1889], 10); // Koordinat Bali

    // Tambahkan Tile Layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Tambahkan Marker dari Data Backend
    var outlets = {!! json_encode($outlets) !!}; // Data Outlet dari Controller
    outlets.forEach(function(outlet) {
        L.marker([outlet.latitude, outlet.longitude])
            .addTo(map)
            .bindPopup(<b>${outlet.name}</b><br>${outlet.address});
    });
</script>
@endsection
