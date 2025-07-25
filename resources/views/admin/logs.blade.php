@extends('layouts.master')

@section('content')
    <div class="admin-container">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Activity Logs
            </h3>
        </div>

        {{-- Flash Success Message --}}
        @if(session('success'))
            <div class="alert success">{{ session('success') }}</div>
        @endif

        {{-- Clear Logs Button --}}
        <form id="clearLogsForm" method="POST" action="{{ route('admin.logs.clear') }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm" style="color: white; background-color: red">Clear All Logs</button>
        </form>


        @if($logs->isEmpty())
            <p class="note">No activity logs found.</p>
        @else
            <div class="table-wrapper" style="margin-top: 20px;">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Event</th>
                            <th>Description</th>
                            <th>User</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logs as $log)
                            <tr>
                                <td>{{ $log->description }}</td>
                                <td>{{ is_array($log->properties) && isset($log->properties['description']) ? $log->properties['description'] : '-' }}
                                </td>
                                <td>{{ $log->causer?->name ?? 'System' }}</td>
                                <td>{{ $log->created_at->format('M d, Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $logs->links() }}
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('clearLogsBtn')?.addEventListener('click', function () {
            Swal.fire({
                title: 'Delete All Logs?',
                text: "This will permanently delete all activity logs.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e11d48',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Yes, delete all!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('clearLogsForm').submit();
                }
            });
        });
    </script>
@endpush