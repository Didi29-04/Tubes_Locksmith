@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Outlet List</h1>
        <a href="{{ route('outlets.create') }}" class="btn btn-success">Create New Location</a>
    </div>

    <!-- Tabel Data -->
    <table id="outletsTable" class="table table-striped table-bordered responsive nowrap">
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
            @foreach ($outlets as $index => $outlet)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $outlet->name }}</td>
                    <td>{{ $outlet->address }}</td>
                    <td>{{ $outlet->latitude }}</td>
                    <td>{{ $outlet->longitude }}</td>
                    <td>
                        <a href="{{ route('outlets.show', $outlet->id) }}" class="btn btn-sm btn-info">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('outlets.edit', $outlet->id) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('outlets.destroy', $outlet->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                            data-name="{{ $outlet->name.' '.$outlet->address }}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
