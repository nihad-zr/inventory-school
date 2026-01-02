<!-- resources/views/admin/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>
    <link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="top">
            <img src="{{ asset('images/logo.png') }}" alt="Admin">
            <div class="email">{{ Auth::guard('admin')->user()->email }}</div>
            <hr class="top-hr">
            <a href="/admin/dashboard">Tableau de bord</a>
            <a href="{{route ('products.index')}}">Produits</a>
            <a href="{{ route('items.index') }}">Articles</a>
<a href="{{ route('admin.scan.page') }}">Scan Products</a>
            <a href="{{ route('employees.index') }}">Gestion du Personnel</a>


            <hr class="bottom-hr">
        </div>
        <div class="bottom">
            <a href="/admin/logout" class="logout">Se Déconnecter</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        @yield('content')
    </div>

    @yield('scripts')
</body>
</html>
