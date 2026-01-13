@extends('layouts.main')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Categories</h1>
            <p class="text-muted">Manage your income and expense groups</p>
        </div>
        <a href="{{route("categories.create")}}" class="btn btn-primary">
            + Add Category
        </a>
    </div>

    <div class="row g-4">
        <div class="col-md-4 col-lg-3">
            <div class="card h-100 shadow-sm border-start border-success border-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="card-title fw-bold mb-0">Salary</h5>
                        <span class="badge bg-success-subtle text-success border border-success-subtle">Income</span>
                    </div>
                    <p class="text-muted small">Main monthly income and bonuses.</p>
                    <hr>
                    <div class="d-flex justify-content-end">
                        <a href="#" class="btn btn-sm btn-outline-secondary me-2">Edit</a>
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-3">
            <div class="card h-100 shadow-sm border-start border-danger border-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="card-title fw-bold mb-0">Food</h5>
                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle">Expense</span>
                    </div>
                    <p class="text-muted small">Groceries, restaurants, and snacks.</p>
                    <hr>
                    <div class="d-flex justify-content-end">
                        <a href="#" class="btn btn-sm btn-outline-secondary me-2">Edit</a>
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-3">
            <div class="card h-100 shadow-sm border-start border-danger border-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="card-title fw-bold mb-0">Rent</h5>
                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle">Expense</span>
                    </div>
                    <p class="text-muted small">Monthly apartment or house payments.</p>
                    <hr>
                    <div class="d-flex justify-content-end">
                        <a href="#" class="btn btn-sm btn-outline-secondary me-2">Edit</a>
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-3">
            <div class="card h-100 shadow-sm border-start border-danger border-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <h5 class="card-title fw-bold mb-0">Utilities</h5>
                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle">Expense</span>
                    </div>
                    <p class="text-muted small">Water, electricity, and internet bills.</p>
                    <hr>
                    <div class="d-flex justify-content-end">
                        <a href="#" class="btn btn-sm btn-outline-secondary me-2">Edit</a>
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection