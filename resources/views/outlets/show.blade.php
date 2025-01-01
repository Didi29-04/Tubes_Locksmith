@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Outlet Detail</h1>
    <table class="table table-bordered">
        <tr>
            <th>Outlet Name</th>
            <td>{{ $outlet->name }}</td>
        </tr>
        <tr>
            <th>Outlet Address</th>
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

    <h3>Location</h3>
    <div id="map" style="height: 400px; width: 100%;"></div>
    <a href="{{ route('outlets.index') }}" class="btn btn-secondary mt-3">Back to Outlet List</a>
</div>

<script>
    // Inisialisasi Peta
    var map = L.map('map').setView([{{ $outlet->latitude }}, {{ $outlet->longitude }}], 13);

    // Tambahkan Tile Layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Tambahkan Marker
    L.marker([{{ $outlet->latitude }}, {{ $outlet->longitude }}]).addTo(map);
</script>
@endsection
