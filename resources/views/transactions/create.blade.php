@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold">Add New Transaction</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('transactions.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="description" class="form-label fw-bold">Description</label>
                            <textarea name="description" id="description" rows="3"
                                class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-4">
                            <label for="amount" class="form-label fw-bold">Amount</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">$</span>
                                <input type="number" name="amount" id="amount" step="0.01"
                                    class="form-control form-control-lg @error('amount') is-invalid @enderror"
                                    value="{{ old('amount') }}" placeholder="0.00">
                                @error('amount') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label fw-bold">Category</label>
                            <select name="category_id" id="category_id"
                                class="form-select @error('category_id') is-invalid @enderror">
                                <option value="" selected disabled>Select a category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }} ({{ ucfirst($category->type) }})
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="transaction_date" class="form-label fw-bold">Date</label>
                            <input type="date" name="transaction_date" id="transaction_date"
                                class="form-control @error('transaction_date') is-invalid @enderror"
                                value="{{ old('transaction_date', date('Y-m-d')) }}">
                            @error('transaction_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">Save Transaction</button>
                            <a href="{{ route('transactions.index') }}"
                                class="btn btn-link text-decoration-none text-muted">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const descInput = document.querySelector('textarea[name="description"]');
        const catSelect = document.querySelector('select[name="category_id"]');

        descInput.addEventListener('blur', function() {
            let description = this.value;

            if (description.length < 3) return;

            // thinking visual cue
            descInput.style.opacity = "0.5";

            fetch('/api/suggest-category', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ description: description })
            })
            .then(response => response.json())
            .then(data => {
                // restore opacity
                descInput.style.opacity = "1";

                if (data.success && data.category_id) {
                    catSelect.value = data.category_id;
                    
                    // green symbol to show it worked
                    catSelect.classList.add('is-valid'); 
                    setTimeout(() => catSelect.classList.remove('is-valid'), 2000);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                descInput.style.opacity = "1";
            });
        });
    });
</script>