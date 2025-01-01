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

@push('scripts')
    <script type="module">
        $(document).ready(function() {


            $(".datatable").on("click", ".btn-delete", function (e) {
                e.preventDefault();

                var form = $(this).closest("form");
                var name = $(this).data("name");

                Swal.fire({
                    title: "Are you sure want to delete\n" + name + "?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "bg-primary",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }


                });
            });
        });
    </script>
@endpush

{{-- <script>
    $(document).ready(function() {
        $('#outletsTable').DataTable({
            responsive: true,
            language: {
                search: "Search:",
                lengthMenu: "Show MENU entries",
                info: "Showing START to END of TOTAL entries",
                paginate: {
                    first: "First",
                    last: "Last",
                    next: "Next",
                    previous: "Previous"
                }
            }
        });
    });
</script> --}}
@endsection
