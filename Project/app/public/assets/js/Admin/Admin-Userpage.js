// Get users from the API and put them in the table
async function fetchUsers() {
    try {
        const response = await fetch('/admin/users-getAllUsers'); // API URL
        const users = await response.json();
        
        const tableBody = document.getElementById('userTableBody');
        tableBody.innerHTML = ''; // Clean the table before adding new rows

        users.forEach(user => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${user.full_name}</td>
                <td>${user.username}</td>
                <td>${user.email}</td>
                <td>${user.role}</td>
                <td>${user.created_at}</td>
                <td class="actions">
                    <button class="edit-btn" onclick="editUser('${user._id}')">Edit</button>
                    <button class="delete-btn" onclick="deleteUser('${user._id}')">Delete</button>
                </td>
            `;
            tableBody.appendChild(row);
        });

    } catch (error) {
        console.error('Error fetching users:', error);
    }
}

// Edit user function
async function editUser(userId) {
    try {
        const response = await fetch(`/admin/getUserById?id=${userId}`);
        
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const user = await response.json();
        if (user.error) {
            console.error('Error fetching user data:', user.error);
            return;
        }
        // Debugging: log the user data
        console.log(user);
        // Check if the _id exists
        if (!user._id) {
            console.error('User ID is missing or incorrectly formatted');
            return;
        }

        // Fill in the form with user data
        const fullNameInput = document.getElementById('updateFullName');
        const usernameInput = document.getElementById('updateUsername');
        const emailInput = document.getElementById('updateEmail');
        const roleInput = document.getElementById('updateRole');
        const userIdInput = document.getElementById('updateUserId');

        userIdInput.value = user._id; // Directly use the ID if no $oid
        fullNameInput.value = user.full_name;
        usernameInput.value = user.username;
        emailInput.value = user.email;
        roleInput.value = user.role;

        // Show the update form
        const updateForm = document.getElementById('updateForm');
        updateForm.style.display = 'block'; // Make the form visible

    } catch (error) {
        console.error('Error fetching user data:', error);
    }
}


// Update user
document.getElementById('updateUserForm').addEventListener('submit', async (event) => {
    event.preventDefault();

    const userId = document.getElementById('updateUserId').value;
    const updatedData = {
        full_name: document.getElementById('updateFullName').value,
        username: document.getElementById('updateUsername').value,
        email: document.getElementById('updateEmail').value,
        role: document.getElementById('updateRole').value,
    };

    try {
        const response = await fetch('/admin/updateUser', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: userId, userData: updatedData })
        });

        const result = await response.json();

        if (result.success) {
            alert('User updated successfully');
            fetchUsers(); // Refresh the user list after update
            document.querySelector('.update-form-container').style.display = 'none'; // Hide the form
        } else {
            alert('Error updating user');
        }

    } catch (error) {
        console.error('Error updating user:', error);
    }
});

// Delete user
async function deleteUser(userId) {
    if (confirm("Are you sure you want to delete this user?")) {
        try {
            const response = await fetch('/admin/deleteUser', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: userId })
            });

            const result = await response.json();

            if (result.success) {
                alert('User deleted successfully');
                fetchUsers(); // Refresh the user list after deletion
            } else {
                alert('Error deleting user');
            }

        } catch (error) {
            console.error('Error deleting user:', error);
            alert('Error deleting user');
        }
    }
}

document.addEventListener('DOMContentLoaded', fetchUsers);
