<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @if(app()->getLocale() == 'ar')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/css/bootstrap.rtl.min.css">
    <style>
        body {
            direction: rtl;
        }
    </style>
    @else
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/css/bootstrap.min.css">
    <style>
        body {
            direction: ltr;
        }
    </style>
    @endif

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        /* Sidebar */
        .sidebar {
            height: 100vh;
            position: fixed;
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            width: 240px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            transition: width 0.3s;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 10px 20px;
            transition: background-color 0.3s, padding-left 0.3s;
        }

        .sidebar a:hover {
            background-color: #495057;
            padding-left: 25px;
        }

        .sidebar a i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .sidebar h4 {
            padding: 10px 20px;
            border-bottom: 1px solid #495057;
            margin-bottom: 20px;
            text-align: center;
            font-size: 1.2rem;
            font-weight: bold;
        }

        /* Content Area */
        .content {
            margin-left: 240px;
            padding: 20px;
            transition: margin-left 0.3s;
        }

        /* Navbar */
        .navbar {
            margin-left: 240px;
            padding: 10px 20px;
            background-color: #ffffff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: margin-left 0.3s;
        }

        .navbar-brand {
            font-weight: bold;
            color: #343a40;
            font-size: 1.5rem;
        }

        .navbar-nav .nav-link {
            color: #343a40;
            transition: color 0.3s, transform 0.2s;
            padding: 8px 12px;
            margin: 0 5px;
            border-radius: 5px;
        }

        .navbar-nav .nav-link:hover {
            color: #007bff;
            background-color: rgba(0, 123, 255, 0.1);
            transform: translateY(-2px);
        }

        .navbar-nav .nav-link i {
            margin-right: 5px;
        }

        /* Dropdown Menu */
        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 10px 0;
        }

        .dropdown-item {
            padding: 8px 16px;
            transition: background-color 0.3s, transform 0.2s;
            color: #343a40;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
            transform: translateX(5px);
        }

        .dropdown-item i {
            margin-right: 8px;
        }

        /* Language Switcher */
        .language-switcher .nav-link {
            display: flex;
            align-items: center;
            padding: 8px 12px;
            border-radius: 5px;
            background-color: rgba(0, 123, 255, 0.1);
            color: #007bff;
            transition: background-color 0.3s, color 0.3s;
        }

        .language-switcher .nav-link:hover {
            background-color: #007bff;
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                width: 60px;
            }

            .sidebar h4 {
                display: none;
            }

            .sidebar a span {
                display: none;
            }

            .sidebar a i {
                margin-right: 0;
            }

            .content, .navbar {
                margin-left: 60px;
            }

            .navbar-brand {
                font-size: 1.2rem;
            }

            .navbar-nav .nav-link {
                padding: 6px 10px;
                margin: 0 3px;
            }
        }
    </style>
</head>
<body>

   <!-- Sidebar -->
<div class="sidebar">
    <h4>Admin Panel</h4>
    @role('admin')
        <!-- عرض جميع الروابط للإدمن -->
        <a href="{{ route('home') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a>
        <a href="{{ route('users.index') }}"><i class="fas fa-users"></i> <span>Users</span></a>
        <a href="{{ route('products.index') }}"><i class="fas fa-box"></i> <span>Products</span></a>
        <a href="{{ route('suppliers.index') }}"><i class="fas fa-truck"></i> <span>Suppliers</span></a>
        <a href="{{ route('purchases.index') }}"><i class="fas fa-shopping-basket"></i> <span>Purchases</span></a>
        <a href="{{ route('sales.index') }}"><i class="fas fa-shopping-cart"></i> <span>Sales</span></a>
        <a href="{{ route('customers.index') }}"><i class="fas fa-user-friends"></i> <span>Customers</span></a>
        <a href="{{ route('invoices.index') }}"><i class="fas fa-file-invoice"></i> <span>Invoices</span></a>
        <a href="{{ route('reports.sales') }}"><i class="fas fa-chart-line"></i> <span>Sales Reports</span></a>
        <a href="{{ route('reports.stock') }}"><i class="fas fa-boxes"></i> <span>Stock Reports</span></a>
        <a href="{{ route('reports.profits') }}"><i class="fas fa-coins"></i> <span>Profit Reports</span></a>
    @else
        <!-- عرض الروابط بناءً على الأدوار الأخرى -->
        @role('inventory_manager')
            <a href="{{ route('products.index') }}"><i class="fas fa-box"></i> <span>Products</span></a>
            <a href="{{ route('suppliers.index') }}"><i class="fas fa-truck"></i> <span>Suppliers</span></a>
            <a href="{{ route('purchases.index') }}"><i class="fas fa-shopping-basket"></i> <span>Purchases</span></a>
        @endrole
        @role('accountant')
            <a href="{{ route('sales.index') }}"><i class="fas fa-shopping-cart"></i> <span>Sales</span></a>
            <a href="{{ route('customers.index') }}"><i class="fas fa-user-friends"></i> <span>Customers</span></a>
            <a href="{{ route('invoices.index') }}"><i class="fas fa-file-invoice"></i> <span>Invoices</span></a>
            <a href="{{ route('reports.sales') }}"><i class="fas fa-chart-line"></i> <span>Sales Reports</span></a>
            <a href="{{ route('reports.stock') }}"><i class="fas fa-boxes"></i> <span>Stock Reports</span></a>
            <a href="{{ route('reports.profits') }}"><i class="fas fa-coins"></i> <span>Profit Reports</span></a>
        @endrole
    @endrole
</div>
    <!-- Content Area -->
    <div class="content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <span class="navbar-brand">Admin Panel</span>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <!-- User Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i> {{ Auth::user() ? Auth::user()->name : 'Guest' }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('profile') }}"><i class="fas fa-user-circle"></i> Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item logout-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Language Switcher -->
                        <li class="nav-item language-switcher">
                            <a class="nav-link" href="{{ route('locale', ['lang' => app()->getLocale() == 'en' ? 'ar' : 'en']) }}">
                                <i class="fas fa-language"></i> {{ app()->getLocale() == 'en' ? 'عربي' : 'English' }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="container-fluid mt-4">
            @yield('content')
        </div>
    </div>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>