<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Apartment & Tenant Management API</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: radial-gradient(circle at top, #0f172a, #020617);
            color: #e5e7eb;
        }

        /* HERO */
        .hero {
            position: relative;
            background:
                linear-gradient(to bottom right, rgba(2,6,23,.9), rgba(15,23,42,.85)),
                url('{{ asset('images/apartment.jpg') }}') center/cover no-repeat;
            border-radius: 20px;
            padding: 100px 30px;
        }

        .hero h1 {
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        /* GLASS CARD */
        .glass-card {
            background: rgba(15, 23, 42, 0.75);
            backdrop-filter: blur(12px);
            border-radius: 16px;
            border: 1px solid rgba(148, 163, 184, 0.1);
            transition: all 0.3s ease;
        }

        .glass-card:hover {
            transform: translateY(-6px);
            border-color: rgba(56, 189, 248, 0.4);
        }

        code {
            color: #38bdf8;
            font-size: 0.9rem;
        }

        .section-title {
            font-weight: 600;
            letter-spacing: -0.3px;
        }

        .badge-api {
            background: linear-gradient(135deg, #22d3ee, #6366f1);
        }

        footer {
            color: #94a3b8;
        }
    </style>
</head>
<body>

<div class="container py-5">

    <!-- HERO -->
    <section class="hero text-center mb-5">
        <span class="badge badge-api mb-3 px-3 py-2">Laravel {{ app()->version() }} REST API</span>
        <h1 class="display-6 mt-3">
            Apartment & Tenant<br>Management API
        </h1>
        <p class="mt-3 text-secondary fs-5">
            A scalable, secure backend system for managing apartments, tenants, and bookings.
        </p>
    </section>

    <!-- FEATURES -->
    <section class="mb-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="glass-card p-4 h-100">
                    <h5 class="section-title">🏠 Apartment Management</h5>
                    <p class="text-secondary mt-2">
                        Full CRUD operations for apartments with clean REST endpoints.
                    </p>
                    <code>GET /api/v1/apartments</code>
                </div>
            </div>

            <div class="col-md-4">
                <div class="glass-card p-4 h-100">
                    <h5 class="section-title">👤 Tenant Management</h5>
                    <p class="text-secondary mt-2">
                        Manage tenant profiles, assignments, and relationships.
                    </p>
                    <code>GET /api/v1/tenants</code>
                </div>
            </div>

            <div class="col-md-4">
                <div class="glass-card p-4 h-100">
                    <h5 class="section-title">📅 Booking System</h5>
                    <p class="text-secondary mt-2">
                        Track apartment bookings with proper foreign key integrity.
                    </p>
                    <code>GET /api/v1/bookings</code>
                </div>
            </div>
        </div>
    </section>

    <!-- ENDPOINTS -->
    <section class="glass-card p-4 mb-5">
        <h4 class="section-title mb-3">📌 Core API Endpoints</h4>
        <ul class="list-unstyled text-secondary mb-0">
            <li><code>POST</code> /api/v1/apartments</li>
            <li><code>POST</code> /api/v1/tenants</li>
            <li><code>POST</code> /api/v1/bookings</li>
            <li><code>GET</code> /api/v1/apartments/{id}</li>
            <li><code>DELETE</code> /api/v1/tenants/{id}</li>
        </ul>
    </section>

    <!-- FOOTER -->
    <footer class="text-center">
        <small>
            © {{ date('Y') }} Apartment & Tenant Management API
            <br>
            Developed by <strong>Jabed Hosen</strong>
        </small>
    </footer>

</div>

</body>
</html>
