@extends('layouts.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-primary">
                    <i class="fas fa-piggy-bank me-2"></i>Set Monthly Budget
                </h5>
            </div>
            <div class="card-body">
                <form action="/budgets" method="POST">
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold small text-uppercase">Select Category</label>
                        <select class="form-select border-light-subtle">
                            <option value="" selected disabled>Choose a category...</option>
                            <option>Food & Dining</option>
                            <option>Rent</option>
                            <option>Utilities</option>
                            <option>Entertainment</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold small text-uppercase">Monthly Limit</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-light-subtle">$</span>
                            <input type="number" class="form-control border-light-subtle" placeholder="0.00">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold small text-uppercase">Effective Month</label>
                        <input type="month" class="form-control border-light-subtle" value="2026-01">
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-check-circle me-1"></i> Save Budget
                        </button>
                        
                        <a href="{{ route("budgets.index") }}" class="btn btn-light text-muted">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection