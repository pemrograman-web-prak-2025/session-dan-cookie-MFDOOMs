<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Tugas Rumah</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f8f9fa;
            color: #333;
        }

        .navbar {
            background: #343a40;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
        }

        .nav-links {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .nav-link {
            color: white;
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 4px;
            transition: background 0.2s;
        }

        .nav-link:hover {
            background: rgba(255,255,255,0.1);
        }

        .user-info {
            color: #ccc;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-info strong {
            color: white;
        }

        .btn-logout {
            color: #ffc107;
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 4px;
            font-weight: bold;
        }

        .btn-logout:hover {
            background: rgba(255,193,7,0.1);
        }

        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            padding: 12px;
            margin: 15px 0;
            border-radius: 6px;
            border-left: 4px solid #155724;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            padding: 12px;
            margin: 15px 0;
            border-radius: 6px;
            border-left: 4px solid #721c24;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background: #f1f3f5;
            font-weight: bold;
        }

        .status-completed {
            color: #28a745;
            font-weight: bold;
        }

        .status-pending {
            color: #dc3545;
            font-weight: bold;
        }

        .actions {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }

        .btn-success {
            background: #28a745;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-warning {
            background: #ffc107;
            color: #212529;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-danger {
            background: #dc3545;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="nav-links">
            <a href="{{ route('tasks.index') }}" class="nav-link">Dashboard</a>
            <a href="{{ route('tasks.create') }}" class="nav-link">Tambah Tugas</a>
        </div>

        @if(Auth::check())
            <div class="user-info">
                Halo, <strong>{{ Auth::user()->name }}</strong> |
                <a href="{{ route('logout') }}" class="btn-logout"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        @endif
    </nav>

    <div class="container">

        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert-error">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')

    </div>

</body>
</html>