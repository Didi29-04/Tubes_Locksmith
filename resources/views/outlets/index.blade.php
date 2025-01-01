@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Outlet List (Total: {{ $outlets->count() }})</h1>
    <a href="{{ route('outlets.create') }}" class="btn btn-primary mb-3">Create New Outlet</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Outlet Name</th>
                <th>Outlet Address</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($outlets as $outlet)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $outlet->name }}</td>
                <td>{{ $outlet->address }}</td>
                <td>{{ $outlet->latitude }}</td>
                <td>{{ $outlet->longitude }}</td>
                <td><a href="{{ route('outlets.show', $outlet) }}">View Detail</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
