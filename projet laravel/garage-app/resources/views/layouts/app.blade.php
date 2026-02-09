<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mécanique Plus - Gestion de Garage</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        :root {
            --color-primary: #1a237e;
            --color-accent: #ff6f00;
            --color-success: #4caf50;
            --color-danger: #f44336;
            --color-light: #f5f5f5;
            --color-dark: #212121;
            --shadow-sm: 0 2px 8px rgba(0,0,0,0.08);
            --shadow-md: 0 4px 16px rgba(0,0,0,0.12);
            --shadow-lg: 0 8px 32px rgba(0,0,0,0.16);
            --shadow-xl: 0 12px 48px rgba(0,0,0,0.15);
            --transition-smooth: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        body { 
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #fafafa 0%, #f0f2f5 100%);
            color: #424242;
            overflow-x: hidden;
            padding-top: 0;
            scroll-behavior: smooth;
        }

        /* Navbar Professionnelle */
        .navbar {
            background: white !important;
            border-bottom: 2px solid var(--color-primary);
            padding: 0.75rem 0;
            box-shadow: var(--shadow-sm);
            transition: var(--transition-smooth);
            backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
            z-index: 999;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.6rem;
            background: linear-gradient(135deg, var(--color-primary) 0%, #0d1b6d 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.5px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition-smooth);
        }
        
        .navbar-brand:hover {
            transform: scale(1.05);
        }
        
        .navbar-brand i {
            font-size: 1.8rem;
            color: var(--color-accent);
            animation: pulse 2s infinite;
        }
        
        .nav-link {
            color: var(--color-dark) !important;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 0.6rem 1.2rem !important;
            margin: 0 0.25rem;
            border-radius: 8px;
            transition: var(--transition-smooth);
            position: relative;
            display: flex;
            align-items: center;
            gap: 6px;
            overflow: hidden;
        }
        
        .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: -100%;
            width: 100%;
            height: 3px;
            background: var(--color-accent);
            transition: left 0.3s ease;
        }
        
        .nav-link i {
            font-size: 1.1rem;
            transition: var(--transition-smooth);
        }
        
        .nav-link:hover {
            color: var(--color-primary) !important;
            transform: translateY(-2px);
        }
        
        .nav-link:hover::before {
            left: 0;
        }
        
        .nav-link.active {
            color: white !important;
            background: linear-gradient(135deg, var(--color-primary) 0%, #0d1b6d 100%);
            box-shadow: 0 4px 12px rgba(26, 35, 126, 0.3);
        }

        /* Cards Professionnelles */
        .card {
            border: none;
            border-radius: 16px;
            background: white;
            box-shadow: var(--shadow-sm);
            transition: var(--transition-smooth);
            overflow: hidden;
            border-top: 4px solid var(--color-accent);
            position: relative;
        }
        
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.6s ease;
            z-index: 1;
        }
        
        .card:hover::before {
            left: 100%;
        }
        
        .card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: var(--shadow-lg);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--color-primary) 0%, #0d1b6d 100%);
            color: white;
            border: none;
            padding: 1.2rem;
            font-weight: 600;
            position: relative;
            overflow: hidden;
        }
        
        .card-header::after {
            content: '';
            position: absolute;
            top: 0;
            right: -50%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            transform: skewX(-20deg);
        }
        
        .card-body {
            padding: 1.5rem;
            position: relative;
            z-index: 2;
        }

        /* Animations Boutons */
        .btn {
            border-radius: 10px;
            padding: 0.65rem 1.5rem;
            font-weight: 600;
            font-size: 0.9rem;
            border: none;
            transition: var(--transition-smooth);
            letter-spacing: 0.3px;
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
        }
        
        .btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
            z-index: 0;
        }
        
        .btn:hover::before {
            width: 300px;
            height: 300px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--color-primary) 0%, #0d1b6d 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(26, 35, 126, 0.3);
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, var(--color-accent) 0%, #e65100 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 111, 0, 0.4);
        }
        
        .btn-success {
            background: linear-gradient(135deg, var(--color-success) 0%, #45a049 100%);
            box-shadow: 0 4px 15px rgba(76, 175, 80, 0.3);
        }
        
        .btn-success:hover {
            background: linear-gradient(135deg, #45a049 0%, #2e7d32 100%);
            transform: translateY(-2px);
        }
        
        .btn-outline-primary {
            border: 2px solid var(--color-primary);
            color: var(--color-primary);
            background: transparent;
        }
        
        .btn-outline-primary:hover {
            background: var(--color-primary);
            color: white;
            border-color: var(--color-primary);
        }
        
        .btn-outline-light {
            border: 2px solid white;
            color: white;
            background: transparent;
        }
        
        .btn-outline-light:hover {
            background: white;
            color: var(--color-primary);
            border-color: white;
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            height: 100vh;
            overflow: hidden;
            margin-bottom: 0;
            background: linear-gradient(135deg, var(--color-primary) 0%, #0d1b6d 100%);
        }
        
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="white" opacity="0.1"/><circle cx="80" cy="60" r="2" fill="white" opacity="0.1"/><circle cx="40" cy="80" r="3" fill="white" opacity="0.05"/></svg>');
            opacity: 0.3;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }
        
        .hero-title {
            font-size: 3.2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            letter-spacing: -1px;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
        }
        
        .hero-subtitle {
            font-size: 1.2rem;
            font-weight: 300;
            opacity: 0.95;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.4);
        }

        /* Carousel Hero */
        #heroCarousel {
            margin-bottom: 0;
            border: none;
            margin-top: -70px;
        }
        
        #heroCarousel .carousel-item {
            height: 100vh;
        }
        
        #heroCarousel .hero-section {
            height: 100%;
            margin-bottom: 0;
            background-size: cover !important;
            background-position: center !important;
        }
        
        .carousel-indicators {
            bottom: 30px;
            z-index: 10;
        }
        
        .carousel-indicators [data-bs-target] {
            background-color: rgba(255, 255, 255, 0.6);
            border: 2px solid white;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            transition: all 0.3s ease;
        }
        
        .carousel-indicators [data-bs-target]:hover {
            background-color: rgba(255, 255, 255, 0.8);
        }
        
        .carousel-indicators .active {
            background-color: white;
            border-color: white;
        }
        
        .carousel-control-prev,
        .carousel-control-next {
            width: 60px;
            background: rgba(0, 0, 0, 0.3);
            z-index: 9;
        }
        
        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background: rgba(0, 0, 0, 0.5);
        }

        /* Stat Cards */
        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
            border-left: 5px solid var(--color-accent);
            box-shadow: var(--shadow-sm);
            transition: var(--transition-smooth);
            background: linear-gradient(135deg, #ffffff 0%, #f8f9ff 100%);
        }
        
        .stat-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255, 111, 0, 0.1) 0%, transparent 70%);
            transition: var(--transition-smooth);
        }
        
        .stat-card:hover::before {
            top: -25%;
            right: -25%;
        }
        
        .stat-card:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: var(--shadow-lg);
        }
        
        .stat-icon {
            width: 70px;
            height: 70px;
            border-radius: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            font-size: 2rem;
            background: linear-gradient(135deg, var(--color-primary) 0%, #0d1b6d 100%);
            color: var(--color-accent);
            box-shadow: 0 4px 15px rgba(26, 35, 126, 0.3);
            transition: var(--transition-smooth);
            position: relative;
            z-index: 2;
        }
        
        .stat-card:hover .stat-icon {
            transform: scale(1.15);
        }
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            font-size: 2rem;
            background: linear-gradient(135deg, var(--color-primary) 0%, #0d1b6d 100%);
            color: var(--color-accent);
        }
        
        .stat-number {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--color-primary);
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            color: #757575;
            font-weight: 500;
            font-size: 0.95rem;
        }
        
        .stat-card.primary {
            border-left-color: #1a237e;
        }
        
        .stat-card.primary .stat-icon {
            background: linear-gradient(135deg, #1a237e 0%, #0d1b6d 100%);
            color: #ff6f00;
        }
        
        .stat-card.success {
            border-left-color: #4caf50;
        }
        
        .stat-card.success .stat-icon {
            background: linear-gradient(135deg, #4caf50 0%, #45a049 100%);
            color: white;
        }
        
        .stat-card.secondary {
            border-left-color: #2196F3;
        }
        
        .stat-card.secondary .stat-icon {
            background: linear-gradient(135deg, #2196F3 0%, #1976D2 100%);
            color: white;
        }

        /* Table Moderne */
        .table {
            margin-bottom: 0;
        }
        
        .table thead th {
            background: var(--color-primary);
            color: white;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
            padding: 1rem 1.2rem;
        }
        
        .table tbody tr {
            transition: all 0.2s ease;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .table tbody tr:hover {
            background: #f5f5f5;
        }
        
        .table tbody td {
            padding: 1rem 1.2rem;
            vertical-align: middle;
        }
        
        .table-container {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        /* Carousel Moderne */
        .carousel {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow-md);
        }
        
        .carousel-item img {
            height: 450px;
            object-fit: cover;
            filter: brightness(0.7) saturate(1.2);
        }
        
        .carousel-caption {
            bottom: 40%;
            transform: translateY(50%);
            text-align: center;
        }
        
        .carousel-caption h2 {
            font-size: 2.8rem;
            font-weight: 700;
            text-shadow: 0 4px 20px rgba(0,0,0,0.4);
            margin-bottom: 1rem;
        }
        
        .carousel-caption p {
            font-size: 1.1rem;
            font-weight: 300;
            text-shadow: 0 2px 10px rgba(0,0,0,0.3);
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-in {
            animation: fadeInUp 0.6s ease-out;
        }

        /* Alert Moderne */
        .alert {
            border: none;
            border-radius: 8px;
            padding: 1rem 1.5rem;
            box-shadow: var(--shadow-sm);
            border-left: 4px solid var(--color-success);
        }
        
        .alert-success {
            background: #f1f8e9;
            color: #2e7d32;
        }
        
        .alert-danger {
            background: #ffebee;
            border-left-color: var(--color-danger);
            color: #c62828;
        }
        
        .alert-warning {
            background: #fff3e0;
            border-left-color: #ff6f00;
            color: #e65100;
        }

        /* Section Titles */
        .section-title {
            color: var(--color-primary);
            font-weight: 700;
            font-size: 2rem;
            margin-bottom: 2rem;
            position: relative;
            padding-bottom: 1rem;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background: var(--color-accent);
            border-radius: 2px;
        }
        
        /* Card Gradient */
        .card-gradient {
            background: white;
            border: none;
        }
        
        .card {
            border-radius: 12px;
            border: none;
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
        }
        
        .card:hover {
            box-shadow: var(--shadow-md);
        }
        
        /* Footer */
        .footer {
            background: linear-gradient(135deg, var(--color-primary) 0%, #0d1b6d 100%);
            color: white;
            padding: 3rem 0 1rem;
            margin-top: 4rem;
            text-align: center;
            border-top: 3px solid var(--color-accent);
        }
        
        .footer p {
            margin: 0;
            transition: var(--transition-smooth);
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.6;
            }
        }
        
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        .animate-in {
            animation: fadeInUp 0.8s ease-out forwards;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="bi bi-tools"></i>
                <span>Mécanique Plus</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ url('/') }}">
                            <i class="bi bi-house-fill"></i>Accueil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('vehicules.*') ? 'active' : '' }}" href="{{ route('vehicules.index') }}">
                            <i class="bi bi-car-front-fill"></i>Véhicules
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('techniciens.*') ? 'active' : '' }}" href="{{ route('techniciens.index') }}">
                            <i class="bi bi-person-badge-fill"></i>Techniciens
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('reparations.*') ? 'active' : '' }}" href="{{ route('reparations.index') }}">
                            <i class="bi bi-wrench-adjustable-circle-fill"></i>Réparations
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid px-0">
        @if(session('success'))
            <div class="container mt-4">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i><strong>Succès !</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif

        @yield('content')
    </div>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2026 <strong>Mécanique Plus</strong> - Système de gestion de garage automobile</p>
            <p class="small mt-2">Conception professionnelle pour votre activité</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>