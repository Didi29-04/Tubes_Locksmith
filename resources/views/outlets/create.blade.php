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
            <input type="text" name="latitude" id="latitude" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="longitude" class="form-label">Longitude</label>
            <input type="text" name="longitude" id="longitude" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Create Outlet</button>
        <a href="{{ route('outlets.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
