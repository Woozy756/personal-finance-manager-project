@extends('layouts.main')

@section('content')
    <style>
        .icon-picker input {
            display: none;
        }

        .icon-picker label {
            cursor: pointer;
            border: 2px solid #f8f9fa;
            border-radius: 10px;
            padding: 12px;
            transition: all 0.2s;
            display: flex;
            flex-direction: column;
            align-items: center;
            background: #f8f9fa;
        }

        .icon-picker label:hover {
            background: #e9ecef;
        }

        .icon-picker input:checked+label {
            border-color: #0d6efd;
            background: #e7f1ff;
            color: #0d6efd;
        }

        .icon-picker i {
            font-size: 1.25rem;
        }
    </style>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold">Edit Category: {{ $category->name }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-md-8">
                                <label class="form-label fw-bold">Category Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                    value="{{ old('name', $category->name) }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Type</label>
                                <select name="type" class="form-select">
                                    <option value="expense" {{ $category->type == 'expense' ? 'selected' : '' }}>Expense</option>
                                    <option value="income" {{ $category->type == 'income' ? 'selected' : '' }}>Income</option>
                                </select>
                            </div>
                        </div>

                        <label class="form-label fw-bold mb-2">Choose an Icon</label>
                        <div class="row g-2 icon-picker">
                            @php
                                $icons = [
                                    'fa-tag' => 'General',
                                    'fa-cart-shopping' => 'Shop',
                                    'fa-house' => 'Home',
                                    'fa-car' => 'Travel',
                                    'fa-utensils' => 'Food',
                                    'fa-heartbeat' => 'Health',
                                    'fa-gamepad' => 'Fun',
                                    'fa-money-bill-wave' => 'Salary',
                                    'fa-file-invoice-dollar' => 'Bills',
                                    'fa-bus' => 'Transport',
                                    'fa-graduation-cap' => 'Education',
                                    'fa-dumbbell' => 'Gym'
                                ];
                            @endphp

                            @foreach($icons as $iconName => $label)
                                <div class="col-3 col-md-2">
                                    <input type="radio" name="icon" id="{{ $iconName }}" value="{{ $iconName }}" 
                                        {{ old('icon', $category->icon) == $iconName ? 'checked' : '' }}>
                                    <label for="{{ $iconName }}" class="text-center w-100">
                                        <i class="fa-solid {{ $iconName }} fa-2x mb-1"></i>
                                        <span class="small" style="font-size: 0.7rem;">{{ $label }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">Update Category</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-link text-muted">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection