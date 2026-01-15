@extends('layouts.main')

<style>
    .category-card {
        transition: all 0.3s ease;
        /* Smooth transition */
        cursor: pointer;
    }

    .category-card:hover {
        transform: translateY(-8px);
        /* Lifts the card up */
    }

    /* Optional: Make the icon pulse slightly on hover */
    .category-card:hover .rounded-circle {
        background-color: var(--bs-primary) !important;
        color: white !important;
        transition: 0.3s;
    }
</style>

@section('content')
    <div class="container-fluid px-0">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0">Categories</h1>
            <p class="text-muted">Manage your income and expense groups</p>
        </div>
        <a href="{{route("categories.create")}}" class="btn btn-primary">
            + Add Category
        </a>
    </div>

    <div class="row g-4"> @foreach($categories as $category)
        <div class="col-md-3 col-sm-6">
            <div class="card category-card shadow border-0 h-100 py-3">
                <div class="card-body text-center d-flex flex-column justify-content-center">

                    <div class="rounded-circle bg-primary-subtle text-primary d-inline-flex align-items-center justify-content-center mb-3 mx-auto"
                        style="width: 70px; height: 70px;">
                        <i class="fa-solid {{ $category->icon }} fa-2x"></i>
                    </div>

                    <h5 class="fw-bold mb-1">{{ $category->name }}</h5>

                    <div class="mb-3">
                        <span
                            class="badge {{ $category->type == 'income' ? 'bg-success' : 'bg-danger' }} rounded-pill px-3">
                            {{ ucfirst($category->type) }}
                        </span>
                    </div>

                    <p class="text-muted small mb-0 px-2">
                        {{ $category->description ?? 'No description provided.' }}
                    </p>
                </div>

                <div class="card-footer bg-transparent border-0 text-center pb-3">
                    <a href="{{ route('categories.edit', $category->id) }}"
                        class="btn btn-sm btn-outline-secondary border-0">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Are you sure you want to delete this?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger border-0">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    </div>
@endsection