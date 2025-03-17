<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-- Top Navbar -->
    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/admin">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Jazz</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Yummy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Stories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Museum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/users">Users</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<style>
    body {
        font-family: Arial, sans-serif;
    }

    #navbar {
        background: linear-gradient(to right, #004b73, #0078a6);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .navbar-brand {
        font-size: 1.6rem;
        font-weight: bold;
        color: white !important;
    }

    .nav-link {
        color: white !important;
        padding: 12px 16px;
        font-size: 1.1rem;
        transition: background-color 0.3s ease;
    }

    .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 5px;
    }

    .navbar-toggler-icon {
        background-color: white;
    }

    .main {
        padding: 20px;
        background: #f4f4f4;
        min-height: 100vh;
    }

    /* Responsive menu */
    @media (max-width: 768px) {
        .navbar-nav {
            text-align: center;
        }

        .nav-link {
            padding: 12px 20px;
            font-size: 1.2rem;
        }
    }
</style>