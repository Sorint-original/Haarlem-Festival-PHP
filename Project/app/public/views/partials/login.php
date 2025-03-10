<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    
    <!-- MDB Bootstrap CSS  -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet">

        <!-- MDB Bootstrap JS  -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js" defer></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body class="login-page">

<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="row w-100">
        <div class="col-lg-4 col-md-6 col-sm-8 mx-auto">
            <div class="login-container p-4">
                <!-- Logo -->
                <div class="logo-container text-center mb-4">
                    <img src="/assets/images/logo.png" alt="Logo" class="logo-image">
                </div>

                <form class="login-form" action="/routes/login.php" method="POST">
                    <h3 class="login-title text-white text-center mb-4">Sign in</h3>

                    <!-- Email Input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="email" id="form2Example18" name="email" class="form-control form-control-lg input-custom" required />
                        <label class="form-label" for="form2Example18">Email address</label>
                    </div>

                    <!-- Password Input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="password" id="form2Example28" name="password" class="form-control form-control-lg input-custom" required />
                        <label class="form-label" for="form2Example28">Password</label>
                    </div>

                    <button class="btn btn-login w-100 mt-3" type="submit">LOGIN</button>

                    <!-- Forgot Password  -->
                    <div class="form-group forgot-password text-center mt-3">
                        <a href="/routes/reset_password.php" class="text-white">Forgot password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>