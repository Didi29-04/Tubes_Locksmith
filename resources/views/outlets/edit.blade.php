@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="h3 mb-4">Edit Outlet</h1>

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

    <!-- Edit Form -->
    <form id="editForm" method="POST" action="{{ route('outlets.update', $outlet->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Outlet Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $outlet->name }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Outlet Address</label>
            <textarea name="address" id="address" class="form-control" rows="3" required>{{ $outlet->address }}</textarea>
        </div>

        <div class="mb-3">
            <label for="latitude" class="form-label">Latitude</label>
            <input type="text" name="latitude" id="latitude" class="form-control" value="{{ $outlet->latitude }}" required>
        </div>

        <div class="mb-3">
            <label for="longitude" class="form-label">Longitude</label>
            <input type="text" name="longitude" id="longitude" class="form-control" value="{{ $outlet->longitude }}" required>
        </div>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
            Save Changes
        </button>
        <a href="{{ route('outlets.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Confirm Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to save these changes?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="submitEditForm()">Yes, Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    function submitEditForm() {
        document.getElementById('editForm').submit();
    }
</script>
@endsection
