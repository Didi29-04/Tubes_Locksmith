@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="h3 mb-4">Locations List</h1>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($outlets as $index => $outlet)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $outlet->name }}</td>
                    <td>{{ $outlet->address }}</td>
                    <td>{{ $outlet->latitude }}</td>
                    <td>{{ $outlet->longitude }}</td>
                    <td>
                        <a href="{{ route('locations.show', $outlet->id) }}" class="btn btn-sm btn-info">
                            View Detail
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
