<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - Event Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <!-- Left side: Logo -->
        <a class="navbar-brand" href="{{ route('user.events.index') }}">
        <img src="{{ asset('storage/events/logo.png') }}" alt="Logo" height="40">

        </a>

        <!-- Right side: About and Contact -->
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="https://www.nexevo.in/services">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://www.nexevo.in/contact-us">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navbar End -->

<div class="container py-4">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
