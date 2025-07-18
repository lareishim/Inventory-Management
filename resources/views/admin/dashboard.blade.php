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

        <div class="row">
            <!-- Product Count -->
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{ asset('assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                            alt="circle" />
                        <h4 class="font-weight-normal mb-3">
                            Total Products <i class="mdi mdi-cube-outline mdi-24px float-end"></i>
                        </h4>
                        <h2 class="mb-5">{{ $productCount }}</h2>
                        <h6 class="card-text">Inventory in system</h6>
                    </div>
                </div>
            </div>

            <!-- User Count -->
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{ asset('assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                            alt="circle" />
                        <h4 class="font-weight-normal mb-3">
                            Registered Users <i class="mdi mdi-account-multiple mdi-24px float-end"></i>
                        </h4>
                        <h2 class="mb-5">{{ $userCount }}</h2>
                        <h6 class="card-text">Total system users</h6>
                    </div>
                </div>
            </div>

            <!-- Activity Logs Count -->
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                    <div class="card-body">
                        <img src="{{ asset('assets/images/dashboard/circle.svg') }}" class="card-img-absolute"
                            alt="circle" />
                        <h4 class="font-weight-normal mb-3">
                            Activity Logs <i class="mdi mdi-file-document-box-outline mdi-24px float-end"></i>
                        </h4>
                        <h2 class="mb-5">{{ $logCount }}</h2>
                        <h6 class="card-text">Recorded user actions</h6>
                    </div>
                </div>
            </div>
        </div>

        {{-- <h1 class="text-3xl font-bold mb-2">Welcome {{ Auth::user()->name }}</h1>
        <p class="text-gray-400 mb-8">You have full access: manage users, products, logs, and settings.</p>

        <h2>User Management</h2>
        <p>View and manage registered users.</p>
        <h2>Product Management</h2>
        <p>Create, update, or delete products.</p>
        <h2>Activity Logs</h2>
        <p>Track user actions and system events.</p> --}}
    </div>

@endsection