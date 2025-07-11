@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="admin-dashboard">
    <h1 class="text-3xl font-bold mb-2">Welcome {{ Auth::user()->name }}</h1>
    <p class="text-gray-400 mb-8">You have full access: manage users, products, logs, and settings.</p>

    <div class="admin-grid">
        <!-- User Management -->
        <div class="admin-card">
            <h2>User Management</h2>
            <p>View and manage registered users.</p>
            <a href="{{ route('admin.users') }}">View all users</a>
        </div>

        <!-- Product Management -->
        <div class="admin-card">
            <h2>Product Management</h2>
            <p>Create, update, or delete products.</p>
            <a href="{{ route('admin.products') }}">Manage Products</a>
        </div>

        <!-- Activity Log -->
        <div class="admin-card">
            <h2>Activity Logs</h2>
            <p>Track user actions and system events.</p>
            <a href="{{ route('admin.logs') }}">View Logs</a>
        </div>
    </div>
</div>
@endsection
