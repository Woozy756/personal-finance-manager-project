@extends('layouts.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold">Edit Budget: {{ $budget->category->name }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('budgets.update', $budget->id) }}" method="POST">
                    @csrf
                    @method('PUT')


                    <div class="mb-4">
                        <label class="form-label fw-bold">Monthly Limit ($)</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" step="0.01" name="amount" 
                                   class="form-control @error('amount') is-invalid @enderror" 
                                   value="{{ old('amount', $budget->amount) }}">
                        </div>
                        @error('amount')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Update Budget</button>
                        <a href="{{ route('budgets.index') }}" class="btn btn-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection