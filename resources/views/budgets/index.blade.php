@extends('layouts.main')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-0">Monthly Budgets</h1>
        <p class="text-muted small mb-0">Track your spending limits for January 2026</p>
    </div>
    <a href="{{ route('budgets.create') }}" class="btn btn-primary shadow-sm">
        + Set New Budget
    </a>
</div>

<div class="row g-4">
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h5 class="fw-bold mb-0">Food & Dining</h5>
                        <span class="text-muted small">Target: $500.00</span>
                    </div>
                    <div class="text-end">
                        <span class="badge bg-warning text-dark">80% Used</span>
                    </div>
                </div>

                <div class="progress mb-3" style="height: 10px;">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <div class="d-flex justify-content-between small">
                    <span>Spent: <strong>$400.00</strong></span>
                    <span>Remaining: <strong class="text-success">$100.00</strong></span>
                </div>
                
                <hr>
                <div class="d-flex justify-content-end">
                    <a href="#" class="btn btn-sm btn-link text-decoration-none p-0 me-3">Edit Limit</a>
                    <button class="btn btn-sm btn-link text-danger text-decoration-none p-0">Remove</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h5 class="fw-bold mb-0">Utilities</h5>
                        <span class="text-muted small">Target: $150.00</span>
                    </div>
                    <div class="text-end">
                        <span class="badge bg-danger">Over Budget</span>
                    </div>
                </div>

                <div class="progress mb-3" style="height: 10px;">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <div class="d-flex justify-content-between small">
                    <span>Spent: <strong>$175.00</strong></span>
                    <span>Remaining: <strong class="text-danger">-$25.00</strong></span>
                </div>

                <hr>
                <div class="d-flex justify-content-end">
                    <a href="#" class="btn btn-sm btn-link text-decoration-none p-0 me-3">Edit Limit</a>
                    <button class="btn btn-sm btn-link text-danger text-decoration-none p-0">Remove</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection