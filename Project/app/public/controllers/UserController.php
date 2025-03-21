<?php

require_once(__DIR__ . '/../models/UserModel.php');

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        // Ensure session is started (if not already)
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    public function register()
    {
        // Grab form fields
        $fullName        = $_POST['full_name'] ?? '';
        $username        = $_POST['username'] ?? '';
        $email           = $_POST['email'] ?? '';
        $password        = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';

        // Basic validation
        if (empty($fullName) || empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
            echo "Please fill in all fields.";
            return;
        }

        if ($password !== $confirmPassword) {
            echo "Passwords do not match.";
            return;
        }

        // Check if user already exists by email
        $existingUser = $this->userModel->getUserByEmail($email);
        if ($existingUser) {
            echo "A user with this email already exists.";
            return;
        }

        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare data for model
        $userData = [
            'full_name' => $fullName,
            'username'  => $username,
            'email'     => $email,
            'password'  => $hashedPassword,
        ];

        // Create user in DB
        $created = $this->userModel->createUser($userData);
        if ($created) {
            echo "Registration successful! .";

        } else {
            echo "Registration failed. Please try again.";
        }
    }

    public function login()
    {
        // Grab login fields
        $email    = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            echo "Please fill in all fields.";
            return;
        }

        // Check if user exists
        $user = $this->userModel->getUserByEmail($email);
        if (!$user) {
            echo "No user found with that email.";
            return;
        }

        // Verify password
        if (password_verify($password, $user->password)) {
            $_SESSION['user_id'] = (string) $user->_id; 
            $_SESSION['role']    = $user->role;

            echo "Login successful! Welcome, {$user->full_name} ({$user->role}).";

        } else {
            echo "Incorrect password.";
        }
    }
}