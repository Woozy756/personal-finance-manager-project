@extends('layouts.main')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Monthly Budgets</h1>
            <p class="text-muted small mb-0">Track your spending limits for January 2026</p>
        </div>
        <a href="{{ route('budgets.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus-circle me-1"></i> Set new budget
        </a>
    </div>

    <div class="row g-4">
        @foreach($budgets as $budget)
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h5 class="fw-bold mb-0">
                                    <i class="fa-solid {{ $budget->category->icon }} me-2 text-primary"></i>
                                    {{ $budget->category->name }}
                                </h5>
                                <span class="text-muted small">Target: ${{ number_format($budget->amount, 2) }}</span>
                            </div>
                            <div class="text-end">
                                @if($budget->percentage >= 100)
                                    <span class="badge bg-danger">Over Budget</span>
                                @else
                                    <span class="badge bg-primary">{{ round($budget->percentage) }}% Used</span>
                                @endif
                            </div>
                        </div>

                        <div class="progress mb-3" style="height: 10px;">
                            <div class="progress-bar {{ $budget->percentage >= 100 ? 'bg-danger' : ($budget->percentage > 80 ? 'bg-warning' : 'bg-success') }}"
                                role="progressbar" style="width: {{ min($budget->percentage, 100) }}%">
                            </div>
                        </div>

                        <div class="d-flex justify-content-between small">
                            <span>Spent: <strong>${{ number_format($budget->spent, 2) }}</strong></span>
                            <span>Remaining:
                                <strong class="{{ $budget->remaining < 0 ? 'text-danger' : 'text-success' }}">
                                    ${{ number_format($budget->remaining, 2) }}
                                </strong>
                            </span>
                        </div>

                        <hr>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('budgets.edit', $budget->id) }}"
                                class="btn btn-sm btn-link text-decoration-none p-0 me-3">Edit Limit</a>
                            <form action="{{ route('budgets.destroy', $budget->id) }}" method="POST"
                                onsubmit="return confirm('Remove this budget limit?')">
                                @csrf @method('DELETE')
                                <button type="submit"
                                    class="btn btn-sm btn-link text-danger text-decoration-none p-0">Remove</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection