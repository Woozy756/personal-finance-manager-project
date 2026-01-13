@extends('layouts.main')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Transactions</h1>
            <p class="text-muted small mb-0">A complete history of your income and expenses</p>
        </div>
        <a href="{{route("transactions.create")}}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus"></i> + Add Transaction
        </a>
    </div>

    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body py-2">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <select class="form-select form-select-sm border-0 bg-light">
                        <option>All Categories</option>
                        <option>Food</option>
                        <option>Salary</option>
                        <option>Rent</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="month" class="form-control form-control-sm border-0 bg-light" value="2026-01">
                </div>
                <div class="col-md-6 text-md-end text-muted small">
                    Showing 4 transactions
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4" style="width: 15%">Date</th>
                            <th style="width: 20%">Category</th>
                            <th style="width: 35%">Description</th>
                            <th style="width: 15%" class="text-end">Amount</th>
                            <th style="width: 15%" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="ps-4 text-muted">Jan 12, 2026</td>
                            <td>
                                <span class="badge bg-success-subtle text-success px-3">Salary</span>
                            </td>
                            <td class="text-dark">Monthly Salary Payment</td>
                            <td class="text-end fw-bold text-success">+$5,000.00</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn-light border">Edit</a>
                                    <button class="btn btn-sm btn-light border text-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-4 text-muted">Jan 10, 2026</td>
                            <td>
                                <span class="badge bg-danger-subtle text-danger px-3">Food</span>
                            </td>
                            <td class="text-dark">Whole Foods Grocery Run</td>
                            <td class="text-end fw-bold text-danger">-$150.00</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn-light border">Edit</a>
                                    <button class="btn btn-sm btn-light border text-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-4 text-muted">Jan 08, 2026</td>
                            <td>
                                <span class="badge bg-danger-subtle text-danger px-3">Utilities</span>
                            </td>
                            <td class="text-dark">Electricity Bill</td>
                            <td class="text-end fw-bold text-danger">-$100.50</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn-light border">Edit</a>
                                    <button class="btn btn-sm btn-light border text-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white py-3">
            <nav>
                <ul class="pagination pagination-sm mb-0 justify-content-center">
                    <li class="page-item disabled"><span class="page-link">Previous</span></li>
                    <li class="page-item active"><span class="page-link">1</span></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
@endsection