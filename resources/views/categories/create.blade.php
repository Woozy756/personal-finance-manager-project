@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold">Add New Transaction</h5>
                </div>
                <div class="card-body">
                    <form action="/transactions" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="amount" class="form-label fw-bold">Amount</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">$</span>
                                <input type="number" name="amount" id="amount" step="0.01"
                                    class="form-control form-control-lg" placeholder="0.00">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label fw-bold">Category</label>
                            <select name="category_id" id="category_id" class="form-select">
                                <option value="" selected disabled>Select a category</option>
                                <option value="1">Salary (Income)</option>
                                <option value="2">Food (Expense)</option>
                                <option value="3">Rent (Expense)</option>
                                <option value="4">Utilities (Expense)</option>
                                <option value="5">Freelance (Income)</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="transaction_date" class="form-label fw-bold">Date</label>
                            <input type="date" name="transaction_date" id="transaction_date" class="form-control"
                                value="2026-01-13">
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label fw-bold">Description</label>
                            <textarea name="description" id="description" rows="3" class="form-control"
                                placeholder="Optional notes..."></textarea>
                        </div>

                        <hr class="my-4">

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">Save Transaction</button>
                            <a href="{{ route("categories.index") }}" class="btn btn-link text-decoration-none text-muted">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection