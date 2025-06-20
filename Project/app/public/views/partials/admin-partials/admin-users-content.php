<div class="container">
    <h2>User List</h2>
    <div id="action-container">
        <button id="createUserBtn" class="action-btn create-btn">Create New User</button>
        <div>
            <label for="filterRole">Filter by Role:</label>
            <select id="filterRole">
                <option value="">All</option>
                <option value="customer">Customer</option>
                <option value="admin">Admin</option>
                <option value="employee">Employee</option>
            </select>
        </div>
        <div>
            <label for="searchUser">Search by Full Name:</label>
            <input type="text" id="searchUser" placeholder="Enter name..." />
        </div>
    </div>

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

<!-- Modal structure for Create User -->
<div id="createModal" class="modal">
    <div class="modal-content">
        <h3>Create User</h3>
        <form id="createUserForm">
            <div class="form-group">
                <label for="createFullName">Full Name:</label>
                <input type="text" id="createFullName" required>
            </div>

            <div class="form-group">
                <label for="createUsername">Username:</label>
                <input type="text" id="createUsername" required>
            </div>

            <div class="form-group">
                <label for="createEmail">Email:</label>
                <input type="email" id="createEmail" required>
            </div>

            <div class="form-group">
                <label for="createPassword">Password:</label>
                <input type="password" id="createPassword" required>
            </div>

            <div class="form-group">
                <label for="createRole">Role:</label>
                <select id="createRole" required>
                    <option value="customer">Customer</option>
                    <option value="admin">Admin</option>
                    <option value="employee">Employee</option>
                </select>
            </div>

            <div class="form-actions">
                <button type="submit">Create User</button>
                <button type="button" id="cancelCreateButton">Cancel</button>
            </div>
        </form>
    </div>
</div>


<!-- Modal structure for update form -->
<div id="updateModal" class="modal">
    <div class="modal-content">
        <h3>Update User</h3>
        <form id="updateUserForm">
            <div class="form-group">
                <label for="updateFullName">Full Name:</label>
                <input type="text" id="updateFullName" required>
            </div>

            <div class="form-group">
                <label for="updateUsername">Username:</label>
                <input type="text" id="updateUsername" required>
            </div>

            <div class="form-group">
                <label for="updateEmail">Email:</label>
                <input type="email" id="updateEmail" required>
            </div>

            <div class="form-group">
                <label for="updateRole">Role:</label>
                <input type="text" id="updateRole" required>
            </div>

            <!-- Hidden User ID field -->
            <input type="hidden" id="updateUserId">

            <div class="form-actions">
                <button type="submit">Update User</button>
                <button type="button" id="cancelButton">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script src="/assets/js/Admin/Admin-Userpage.js"></script>

<style>
    #createUserBtn,
    #filterRole,
    #searchUser {
        margin-right: 55px;
    }

    .create-btn {
        background-color: rgb(198, 99, 13);
    }

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

    th,
    td {
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

    /* Modal styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        background-color: white;
        margin: 15% auto;
        padding: 20px;
        border-radius: 8px;
        width: 50%;
        max-width: 500px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        position: relative;
    }

    .close-button {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 24px;
        font-weight: bold;
        color: #aaa;
        cursor: pointer;
    }

    .close-button:hover {
        color: #333;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-group input {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .form-actions {
        margin-top: 20px;
        text-align: right;
    }

    .form-actions button {
        padding: 8px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        margin-left: 10px;
    }

    .form-actions button[type="submit"] {
        background-color: #007BFF;
        color: white;
    }

    .form-actions button[type="button"] {
        background-color: #6c757d;
        color: white;
    }

    .form-actions button:hover {
        opacity: 0.8;
    }

    #action-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    #filterRole,
    #searchUser {
        margin-right: 20px;
    }
</style>