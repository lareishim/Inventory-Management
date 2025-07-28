@extends('layouts.master')

@section('content')
    <div class="admin-user-page">
        <div class="admin-container">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span> Manage Users
                </h3>
            </div>

            {{-- Flash Messages --}}
            @if(session('success'))
                <div class="alert success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert error">{{ session('error') }}</div>
            @endif

            @if(auth()->user()->hasRole('super-admin'))
                <!-- Add User Button -->
                <button onclick="openAddUserModal()" class="btn btn-gradient-primary mb-3">Add User</button>

                <!-- Add User Modal -->
                <div id="addUserModal" class="modal">
                    <div class="modal-content">
                        <span class="close" onclick="closeAddUserModal()">&times;</span>
                        <h3>Add New User</h3>
                        <form action="{{ route('admin.users.store') }}" method="POST">
                            @csrf
                            <input type="text" name="name" placeholder="Full Name" required>
                            <input type="email" name="email" placeholder="Email Address" required>
                            <input type="password" name="password" placeholder="Password" required>

                            <select name="role" required>
                                <option value="">Select Role</option>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                                <option value="super-admin">Super Admin</option>
                            </select>

                            <button type="submit">Add User</button>
                        </form>
                    </div>
                </div>

                <script>
                    function openAddUserModal() {
                        document.getElementById('addUserModal').classList.add('show');
                    }

                    function closeAddUserModal() {
                        document.getElementById('addUserModal').classList.remove('show');
                    }

                    window.onclick = function (event) {
                        const modal = document.getElementById('addUserModal');
                        if (event.target === modal) {
                            closeAddUserModal();
                        }
                    };
                </script>
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
                                        @php
                                            $isSuperAdmin = $user->hasRole('super-admin');
                                            $viewerIsAdmin = auth()->user()->hasRole('admin');
                                        @endphp

                                        @if($viewerIsAdmin && $isSuperAdmin)
                                            <span class="text-muted">Restricted</span>
                                        @else
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                                class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Are you sure?')" class="btn btn-sm"
                                                    style="background-color: red; color: white; text-decoration: none;">Delete</button>
                                            </form>
                                        @endif
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
    </div>
@endsection