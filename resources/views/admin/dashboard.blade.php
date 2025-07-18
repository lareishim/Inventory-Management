@extends('layouts.master')

@section('content')
    <div class="admin-dashboard">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Dashboard
            </h3>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                </ul>
            </nav>
        </div>

        <h1 class="text-3xl font-bold mb-2">Welcome {{ Auth::user()->name }}</h1>
        <p class="text-gray-400 mb-8">You have full access: manage users, products, logs, and settings.</p>

        <h2>User Management</h2>
        <p>View and manage registered users.</p>
        <h2>Product Management</h2>
        <p>Create, update, or delete products.</p>
        <h2>Activity Logs</h2>
        <p>Track user actions and system events.</p>
    </div>

@endsection