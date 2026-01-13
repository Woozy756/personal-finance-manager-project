@extends('layouts.main')

@section('content')
<div class="row align-items-center mb-4">
    <div class="col-md-6">
        <h1 class="h3 mb-1 fw-bold">Financial Dashboard</h1>
        <p class="text-muted mb-0">Overview for January 2026</p>
    </div>
    <div class="col-md-6 text-md-end">
        <a href="{{ route('transactions.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus-circle me-1"></i> Add Transaction
        </a>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="bg-success-subtle text-success p-3 rounded-3 me-3">
                        <i class="fas fa-wallet fa-lg"></i>
                    </div>
                    <h6 class="text-muted mb-0 small text-uppercase fw-bold">Total Income</h6>
                </div>
                <h2 class="fw-bold mb-0">$5,000.00</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="bg-danger-subtle text-danger p-3 rounded-3 me-3">
                        <i class="fas fa-credit-card fa-lg"></i>
                    </div>
                    <h6 class="text-muted mb-0 small text-uppercase fw-bold">Total Expenses</h6>
                </div>
                <h2 class="fw-bold mb-0">$1,425.00</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="bg-primary-subtle text-primary p-3 rounded-3 me-3">
                        <i class="fas fa-chart-line fa-lg"></i>
                    </div>
                    <h6 class="text-muted mb-0 small text-uppercase fw-bold">Net Balance</h6>
                </div>
                <h2 class="fw-bold mb-0 text-primary">$3,575.00</h2>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold"><i class="fas fa-history me-2 text-primary"></i>Recent Transactions</h5>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">Date</th>
                            <th>Category</th>
                            <th class="text-end pe-4">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="ps-4">Today</td>
                            <td><span class="badge bg-danger-subtle text-danger"><i class="fas fa-utensils me-1"></i> Food</span></td>
                            <td class="text-end pe-4 fw-bold">-$45.00</td>
                        </tr>
                        <tr>
                            <td class="ps-4">Yesterday</td>
                            <td><span class="badge bg-success-subtle text-success"><i class="fas fa-money-bill-wave me-1"></i> Salary</span></td>
                            <td class="text-end pe-4 fw-bold text-success">+$5,000.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer bg-white border-0 text-center">
                <a href="{{ route('transactions.index') }}" class="text-decoration-none small">View All Activity <i class="fas fa-arrow-right ms-1"></i></a>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold"><i class="fas fa-bullseye me-2 text-primary"></i>Budget Pulse</h5>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="small fw-bold">Food</span>
                        <span class="small text-muted">$400 / $500</span>
                    </div>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-warning" style="width: 80%"></div>
                    </div>
                </div>
                <div class="mb-2">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="small fw-bold">Utilities</span>
                        <span class="small text-muted">$180 / $150</span>
                    </div>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-danger" style="width: 100%"></div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white border-0 text-center">
                <a href="{{ route('budgets.index') }}" class="text-decoration-none small">Manage Budgets <i class="fas fa-cog ms-1"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection