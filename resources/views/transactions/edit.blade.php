@extends('layouts.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold">Edit Transaction</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
                    @csrf
                    @method('PUT') <div class="mb-4">
                        <label class="form-label fw-bold">Amount</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light">$</span>
                            <input type="number" name="amount" step="0.01" 
                                   class="form-control form-control-lg @error('amount') is-invalid @enderror" 
                                   value="{{ old('amount', $transaction->amount) }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Category</label>
                        <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ old('category_id', $transaction->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Date</label>
                        <input type="date" name="transaction_date" 
                               class="form-control @error('transaction_date') is-invalid @enderror" 
                               value="{{ old('transaction_date', $transaction->transaction_date) }}">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Description</label>
                        <textarea name="description" rows="3" class="form-control">{{ old('description', $transaction->description) }}</textarea>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">Update Transaction</button>
                        <a href="{{ route('transactions.index') }}" class="btn btn-link text-muted">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection