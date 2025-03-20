<div class="container">
    <h2>User List</h2>
    <table>
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="userTableBody">
            <!-- dynamically loaded here -->
        </tbody>
    </table>
</div>

<div class="update-form-container" style="display:none;">
    <h3>Update User</h3>
    <form id="updateUserForm">
        <label for="full_name">Full Name:</label>
        <input type="text" id="updateFullName" required><br><br>

        <label for="username">Username:</label>
        <input type="text" id="updateUsername" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="updateEmail" required><br><br>

        <label for="role">Role:</label>
        <input type="text" id="updateRole" required><br><br>

        <!-- Hidden User ID field -->
        <input type="hidden" id="updateUserId">
        
        <button type="submit">Update User</button>
    </form>
</div>


<script src="/assets/js/Admin/Admin-Userpage.js"></script>


<style>

.container {
    max-width: 900px;
    margin: 50px auto;
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}
h2 {
    text-align: center;
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
}

th {
    background-color: #007BFF;
    color: white;
}

.action-btn {
    padding: 6px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
}

.edit-btn {
    background-color: #28a745;
    color: white;
}

.delete-btn {
    background-color: #dc3545;
    color: white;
}

.action-btn:hover {
    opacity: 0.8;
}
</style>
