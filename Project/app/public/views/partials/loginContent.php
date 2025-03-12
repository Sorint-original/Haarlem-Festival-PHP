<div class="container vh-100 justify-content-center align-items-start mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="logincard p-4 shadow-lg">
                <!-- Tab Navigation -->
                <ul class="nav nav-pills nav-justified mb-3">
                    <li class="nav-item">
                        <a class="nav-link active" id="login-tab" data-bs-toggle="pill" href="#login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="register-tab" data-bs-toggle="pill" href="#register">Register</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <!-- Login Form -->
                    <div id="login" class="tab-pane fade show active">
                        <form action="/login" method="POST">
                            <div class="text-center mb-3">
                                <p>Sign in with:</p>
                                <div class="d-flex justify-content-center gap-2">
                                    <button type="button" class="btn btn-social btn-sm mx-1"><i class="fab fa-facebook-f"></i></button>
                                    <button type="button" class="btn btn-social btn-sm mx-1"><i class="fab fa-google"></i></button>
                                    <button type="button" class="btn btn-social btn-sm mx-1"><i class="fab fa-twitter"></i></button>
                                    <button type="button" class="btn btn-social btn-sm mx-1"><i class="fab fa-github"></i></button>
                                </div>
                            </div>

                            <p class="text-center">or:</p>

                            <div class="mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email or username" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>

                            <div class="d-flex justify-content-between">
                                <div>
                                    <input type="checkbox" id="rememberMe">
                                    <label for="rememberMe">Remember me</label>
                                </div>
                                <a href="#">Forgot password?</a>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mt-3">Sign In</button>

                            <div class="text-center mt-3">
                                <p>Not a member? <a href="#" id="switchToRegister">Register</a></p>
                            </div>
                        </form>
                    </div>

                    <!-- Registration Form -->
                    <div id="register" class="tab-pane fade">
                        <form action="/register" method="POST">
                            <div class="text-center mb-3">
                                <p>Sign up with:</p>
                                <button type="button" class="btn btn btn-social btn-sm mx-1"><i class="fab fa-facebook-f"></i></button>
                                <button type="button" class="btn btn btn-social btn-sm mx-1"><i class="fab fa-google"></i></button>
                                <button type="button" class="btn btn btn-social btn-sm mx-1"><i class="fab fa-twitter"></i></button>
                                <button type="button" class="btn btn btn-social btn-sm mx-1"><i class="fab fa-github"></i></button>
                            </div>

                            <p class="text-center">or:</p>

                            <div class="mb-3">
                                <input type="text" name="full_name" class="form-control" placeholder="Full Name" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="confirm_password" class="form-control" placeholder="Repeat Password" required>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="termsCheck" required>
                                <label class="form-check-label" for="termsCheck">I agree to the terms &amp; conditions</label>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mt-3">Sign Up</button>

                            <div class="text-center mt-3">
                                <p>Already a member? <a href="#" id="switchToLogin">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById("switchToRegister").addEventListener("click", function() {
        document.getElementById("register-tab").click();
    });
    document.getElementById("switchToLogin").addEventListener("click", function() {
        document.getElementById("login-tab").click();
    });
</script>