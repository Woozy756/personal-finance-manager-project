@extends('layouts.main')

@section('content')

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
            <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill me-2"></i>
                <div>{{ session('success') }}</div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Transactions</h1>
            <p class="text-muted small mb-0">A complete history of your income and expenses</p>
        </div>
        <a href="{{route("transactions.create")}}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus"></i> + Add Transaction
        </a>
    </div>

    <form action="{{ route('transactions.index') }}" method="GET">
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-body py-2">
                <div class="row align-items-center g-2">
                    <div class="col-md-3">
                        <select name="category_id" class="form-select form-select-sm border-0 bg-light"
                            onchange="this.form.submit()">
                            <option value="">All Categories</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="month" name="month" class="form-control form-control-sm border-0 bg-light"
                            value="{{ request('month', date('Y-m')) }}" onchange="this.form.submit()">
                    </div>
                    <div class="col-md-6 text-md-end text-muted small">
                        Total Transactions: {{ $transactions->count() }}
                    </div>
                </div>
            </div>
        </div>
    </form>

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
                        @forelse($transactions as $transaction)
                            <tr>
                                <td class="ps-4 text-muted">
                                    {{ \Carbon\Carbon::parse($transaction->date)->format('M d, Y') }}
                                </td>
                                <td>
                                    <span class="badge {{ $transaction->category->type == 'income' ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }} px-3">
                                        <i class="fa-solid {{ $transaction->category->icon }} me-1"></i>
                                        {{ $transaction->category->name }}
                                    </span>
                                </td>
                                <td class="text-dark">{{ $transaction->description }}</td>
                                <td
                                    class="text-end fw-bold {{ $transaction->category->type == 'income' ? 'text-success' : 'text-danger' }}">
                                    {{ $transaction->category->type == 'income' ? '+' : '-' }}${{ number_format($transaction->amount, 2) }}
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-1">

                                        <a href="{{ route('transactions.edit', $transaction->id) }}"
                                            class="btn btn-sm btn-light border">
                                            Edit
                                        </a>

                                        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST"
                                            class="m-0" onsubmit="return confirm('Are you sure you want to delete this?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-light border text-danger">
                                                Delete
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    No transactions found. <a href="{{ route('transactions.create') }}">Add your first one!</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection