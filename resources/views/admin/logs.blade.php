@extends('layouts.app')

@section('content')
    <div class="admin-container">
        <h2 class="admin-title">Activity Logs</h2>

        {{-- Flash Success Message --}}
        @if(session('success'))
            <div class="alert success">{{ session('success') }}</div>
        @endif

        {{-- Clear Logs Button --}}
        <form id="clearLogsForm" method="POST" action="{{ route('admin.logs.clear') }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-danger">Clear All Logs</button>
        </form>


        @if($logs->isEmpty())
            <p class="note">No activity logs found.</p>
        @else
            <div class="table-wrapper">
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