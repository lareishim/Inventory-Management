@extends('layouts.app')

@section('content')
    <div class="admin-container">
        <h2 class="admin-title">User Management</h2>

        {{-- Flash Messages --}}
        @if(session('success'))
            <div class="alert success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert error">{{ session('error') }}</div>
        @endif

        <div class="table-wrapper">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        use App\Models\User;
                        $users = User::all();
                    @endphp

                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="px-4 py-3">
                                @foreach ($user->getRoleNames() as $role)
                                    <span
                                        class="inline-block bg-purple-100 text-purple-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                        {{ $role }}
                                    </span>
                                @endforeach
                            </td>

                            <td class="text-right">
                                @if(auth()->id() !== $user->id)
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Are you sure?')" class="btn-danger">Delete</button>
                                    </form>
                                @else
                                    <span class="note">This is you</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection