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
    <!-- Sidebar -->
    <aside id="sidebar">
        <div class="sidebar-logo">
            <h2>Admin Panel</h2>
        </div>
        <nav>
            <!-- Sidebar Menu -->
            <a href="#" class="sidebar-item" data-page="admin-homepage">Homepage</a>
            <a href="#" class="sidebar-item" data-page="admin-museum">Museum</a>
        </nav>
    </aside>

    <!-- Main Content Area -->
    <div class="main">
        <div id="dynamic-content">
            <!-- Dynamic content will be here. -->
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // defaul admin homepage
            loadPage('admin-homepage');

            document.querySelectorAll('.sidebar-item').forEach(function(link) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    var page = this.getAttribute('data-page');
                    loadPage(page);
                });
            });
            function loadPage(page) {
                fetch('/admin/' + page)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('dynamic-content').innerHTML = data;
                    })
                    .catch(error => console.error('Error loading page:', error));
            }
        });
    </script>
</body>

</html>
<style>
    body {
        display: flex;
        font-family: Arial, sans-serif;
    }

    #sidebar {
        width: 260px;
        background-color: #0e2238;
        color: white;
        height: 100vh;
        padding: 20px;
    }

    .sidebar-item {
        padding: 10px;
        color: white;
        display: block;
        text-decoration: none;
    }

    .sidebar-item:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .main {
        flex-grow: 1;
        padding: 20px;
        background: #f4f4f4;
    }
</style>