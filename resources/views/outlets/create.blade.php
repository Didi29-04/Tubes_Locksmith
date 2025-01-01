@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <!-- Header -->
        <h1 class="h3 mb-4">Create New Outlet</h1>

        <!-- Flash Message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('outlets.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Outlet Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Outlet Address</label>
                <textarea name="address" id="address" class="form-control" rows="3" required>{{ old('address') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="text" name="latitude" id="latitude" class="form-control" value="{{ old('latitude') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="text" name="longitude" id="longitude" class="form-control" value="{{ old('longitude') }}"
                    required>
            </div>

            <!-- Buttons -->
            <div class="d-flex gap-2">
                <a href="{{ route('outlets.index') }}" class="btn btn-secondary">Back to List</a>
                <button type="submit" class="btn btn-success">Create Outlet</button>
            </div>
        </form>
    </div>
@endsection
