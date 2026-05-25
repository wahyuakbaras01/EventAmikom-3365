<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - AmikomEventHub</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --primary: #6c63ff;
            --primary-dark: #5548e0;
            --secondary: #ff6584;
            --bg-dark: #0f0e17;
            --bg-card: #1a1a2e;
            --bg-sidebar: #16213e;
            --border: #2a2a4a;
            --text-primary: #e8e8f0;
            --text-muted: #8888aa;
            --success: #4ade80;
            --danger: #f87171;
            --warning: #fbbf24;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-dark);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: var(--bg-sidebar);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; left: 0; bottom: 0;
            z-index: 100;
        }

        .sidebar-brand {
            padding: 1.5rem 1.5rem 1rem;
            border-bottom: 1px solid var(--border);
        }

        .sidebar-brand h2 {
            font-size: 1.1rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .sidebar-brand p {
            font-size: 0.7rem;
            color: var(--text-muted);
            margin-top: 2px;
        }

        .sidebar-nav {
            padding: 1rem 0.75rem;
            flex: 1;
        }

        .nav-label {
            font-size: 0.65rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--text-muted);
            padding: 0 0.75rem;
            margin: 1rem 0 0.5rem;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.65rem 0.75rem;
            border-radius: 8px;
            text-decoration: none;
            color: var(--text-muted);
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s;
            margin-bottom: 2px;
        }

        .nav-item:hover, .nav-item.active {
            background: rgba(108, 99, 255, 0.15);
            color: var(--primary);
        }

        .nav-item .icon {
            width: 20px;
            text-align: center;
            font-size: 1rem;
        }

        /* Main content */
        .main-wrapper {
            margin-left: 260px;
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .topbar {
            background: var(--bg-card);
            border-bottom: 1px solid var(--border);
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .topbar h1 {
            font-size: 1.1rem;
            font-weight: 600;
        }

        .main-content {
            padding: 1.5rem;
            flex: 1;
        }

        /* Cards */
        .card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.25rem;
            flex-wrap: wrap;
            gap: 0.75rem;
        }

        .card-title {
            font-size: 1rem;
            font-weight: 600;
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            font-family: 'Inter', sans-serif;
        }

        .btn-primary {
            background: var(--primary);
            color: #fff;
        }

        .btn-primary:hover { background: var(--primary-dark); transform: translateY(-1px); }

        .btn-success {
            background: #16a34a;
            color: #fff;
        }

        .btn-success:hover { background: #15803d; }

        .btn-danger {
            background: #dc2626;
            color: #fff;
        }

        .btn-danger:hover { background: #b91c1c; }

        .btn-warning {
            background: #d97706;
            color: #fff;
        }

        .btn-warning:hover { background: #b45309; }

        .btn-secondary {
            background: var(--border);
            color: var(--text-primary);
        }

        .btn-secondary:hover { background: #3a3a5a; }

        .btn-sm {
            padding: 0.3rem 0.65rem;
            font-size: 0.75rem;
        }

        /* Table */
        .table-wrapper {
            overflow-x: auto;
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: rgba(108, 99, 255, 0.1);
            padding: 0.75rem 1rem;
            text-align: left;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--primary);
            border-bottom: 1px solid var(--border);
        }

        td {
            padding: 0.85rem 1rem;
            font-size: 0.875rem;
            border-bottom: 1px solid rgba(42, 42, 74, 0.5);
            vertical-align: middle;
        }

        tr:last-child td { border-bottom: none; }
        tr:hover td { background: rgba(108, 99, 255, 0.04); }

        /* Forms */
        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 0.4rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .form-control {
            width: 100%;
            padding: 0.65rem 0.9rem;
            background: rgba(255,255,255,0.05);
            border: 1px solid var(--border);
            border-radius: 8px;
            color: var(--text-primary);
            font-size: 0.875rem;
            font-family: 'Inter', sans-serif;
            transition: all 0.2s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(108, 99, 255, 0.15);
        }

        .form-control::placeholder { color: var(--text-muted); }

        /* Alerts */
        .alert {
            padding: 0.85rem 1rem;
            border-radius: 8px;
            margin-bottom: 1.25rem;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .alert-success {
            background: rgba(74, 222, 128, 0.12);
            border: 1px solid rgba(74, 222, 128, 0.3);
            color: var(--success);
        }

        .alert-danger {
            background: rgba(248, 113, 113, 0.12);
            border: 1px solid rgba(248, 113, 113, 0.3);
            color: var(--danger);
        }

        /* Search */
        .search-form {
            display: flex;
            gap: 0.5rem;
        }

        .search-form .form-control {
            width: 260px;
        }

        /* Empty state */
        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: var(--text-muted);
        }

        .empty-state .icon { font-size: 3rem; margin-bottom: 0.5rem; }

        /* Badge */
        .badge {
            display: inline-block;
            padding: 0.2rem 0.6rem;
            border-radius: 100px;
            font-size: 0.7rem;
            font-weight: 600;
        }

        .badge-primary {
            background: rgba(108, 99, 255, 0.2);
            color: var(--primary);
        }

        /* Form actions */
        .form-actions {
            display: flex;
            gap: 0.75rem;
            align-items: center;
            margin-top: 1.5rem;
        }

        .text-danger { color: var(--danger); font-size: 0.75rem; margin-top: 0.25rem; }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <h2>⚡ AmikomEventHub</h2>
            <p>Admin Panel</p>
        </div>
        <nav class="sidebar-nav">
            <div class="nav-label">Menu Utama</div>
            <a href="/" class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                <span class="icon">🏠</span> Halaman Depan
            </a>
            <div class="nav-label">Manajemen</div>
            <a href="{{ route('admin.categories.index') }}" class="nav-item {{ request()->is('admin/categories*') ? 'active' : '' }}">
                <span class="icon">🏷️</span> Kategori
            </a>
            <a href="{{ route('admin.partners.index') }}" class="nav-item {{ request()->is('admin/partners*') ? 'active' : '' }}">
                <span class="icon">🤝</span> Partner
            </a>
        </nav>
    </aside>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <div class="topbar">
            <h1>@yield('page-title', 'Dashboard')</h1>
            <span style="font-size:0.8rem; color:var(--text-muted);">AmikomEventHub Admin</span>
        </div>

        <div class="main-content">
            @if(session('success'))
                <div class="alert alert-success">✅ {{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">❌ {{ session('error') }}</div>
            @endif

            @yield('content')
        </div>
    </div>
</body>
</html>
