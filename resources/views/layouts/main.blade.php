<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"></head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('welcome') }}">
                    <i class="fas fa-home me-1"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('transactions.index') }}">
                    <i class="fas fa-exchange-alt me-1"></i> Transactions
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categories.index') }}">
                    <i class="fas fa-tags me-1"></i> Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('budgets.index') }}">
                    <i class="fas fa-piggy-bank me-1"></i> Budgets
                </a>
            </li>
        </ul>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>