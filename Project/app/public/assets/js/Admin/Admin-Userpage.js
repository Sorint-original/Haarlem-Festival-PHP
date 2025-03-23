// Fetch users from the API and populate the table
async function fetchUsers() {
  try {
    const response = await fetch("/admin/users-getAllUsers");
    const users = await response.json();

    const tableBody = document.getElementById("userTableBody");
    tableBody.innerHTML = "";

    users.forEach((user) => {
      const userId = user._id.$oid ? user._id.$oid : user._id;
      const row = document.createElement("tr");
      row.innerHTML = `
                <td>${user.full_name || user.name || "N/A"}</td>
                <td>${user.username || "N/A"}</td>
                <td>${user.email || "N/A"}</td>
                <td>${user.role || "N/A"}</td>
                <td>${
                  user.created_at
                    ? new Date(
                        user.created_at.$date || user.created_at
                      ).toLocaleString()
                    : "N/A"
                }</td>
                <td class="actions">
                    <button class="edit-btn" onclick="editUser('${userId}')">Edit</button>
                    <button class="delete-btn" onclick="deleteUser('${userId}')">Delete</button>
                </td>`;
      tableBody.appendChild(row);
    });
  } catch (error) {
    console.error("Error fetching users:", error);
  }
}
// Filter users by role
document.getElementById("filterRole").addEventListener("change", function () {
  const selectedRole = this.value;
  const tableRows = document
    .getElementById("userTableBody")
    .getElementsByTagName("tr");

  Array.from(tableRows).forEach((row) => {
    const roleCell = row.getElementsByTagName("td")[3]; // Assuming role is the 4th column
    const role = roleCell.textContent.trim().toLowerCase(); // Get role and normalize

    if (selectedRole === "" || role === selectedRole) {
      row.style.display = ""; // Show row if selected role matches or All is selected
    } else {
      row.style.display = "none"; // Hide row if role doesn't match selected role
    }
  });
});
// Search by username
document.getElementById("searchUser").addEventListener("input", function () {
  const searchText = this.value.toLowerCase();
  const tableRows = document
    .getElementById("userTableBody")
    .getElementsByTagName("tr");

  Array.from(tableRows).forEach((row) => {
    const nameCell = row.getElementsByTagName("td")[0];
    const name = nameCell.textContent.trim().toLowerCase();
    if (name.includes(searchText)) {
      row.style.display = "";
    } else {
      row.style.display = "none";
    }
  });
});

// Create user
async function createUser(event) {
  event.preventDefault();

  const newUserData = {
    full_name: document.getElementById("createFullName").value,
    username: document.getElementById("createUsername").value,
    email: document.getElementById("createEmail").value,
    password: document.getElementById("createPassword").value,
    role: document.getElementById("createRole").value,
  };

  try {
    const submitButton = event.target.querySelector('button[type="submit"]');
    submitButton.textContent = "Creating...";
    submitButton.disabled = true;

    const response = await fetch("/admin/addUser", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(newUserData),
    });

    submitButton.textContent = "Create User";
    submitButton.disabled = false;

    if (!response.ok) {
      console.error("Error creating user:", response.statusText);
      return;
    }

    closeCreateModal(); // Close the modal after successful creation
    await fetchUsers(); // Refresh the user list
  } catch (error) {
    console.error("Error creating user:", error);
  }
}

// Edit user opens modal with selected person/user when edit button is triggered/clicked.
async function editUser(userId) {
  try {
    const response = await fetch(`/admin/getUserById?id=${userId}`);
    if (!response.ok) return;
    let user = await response.json();
    if (Array.isArray(user)) user = user[0];
    const id = user._id.$oid ? user._id.$oid : user._id;

    document.getElementById("updateUserId").value = id;
    document.getElementById("updateFullName").value =
      user.full_name || user.name || "";
    document.getElementById("updateUsername").value = user.username || "";
    document.getElementById("updateEmail").value = user.email || "";
    document.getElementById("updateRole").value = user.role || "";
    openModal();
  } catch (error) {
    console.error("Error fetching user data:", error);
  }
}

// Update user
async function updateUser(event) {
  event.preventDefault();
  const userId = document.getElementById("updateUserId").value;
  const updatedData = {
    full_name: document.getElementById("updateFullName").value,
    username: document.getElementById("updateUsername").value,
    email: document.getElementById("updateEmail").value,
    role: document.getElementById("updateRole").value,
  };

  try {
    const submitButton = event.target.querySelector('button[type="submit"]');
    submitButton.textContent = "Updating...";
    submitButton.disabled = true;

    const response = await fetch("/admin/updateUser", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ id: userId, userData: updatedData }),
    });

    submitButton.textContent = "Update";
    submitButton.disabled = false;
    if (!response.ok) return;

    closeModal();
    await fetchUsers();
  } catch (error) {
    console.error("Error updating user:", error);
  }
}

// Delete user
async function deleteUser(userId) {
  const confirmation = confirm("Are you sure you want to delete this user?");
  if (!confirmation) return;

  try {
    const response = await fetch(`/admin/deleteUser?id=${userId}`, {
      method: "DELETE",
    });

    if (!response.ok) {
      console.error("Error deleting user:", response.statusText);
      return;
    }
    await fetchUsers();
  } catch (error) {
    console.error("Error deleting user:", error);
  }
}

// Modal operations
const modal = document.getElementById("updateModal");
const modalContent = document.querySelector(".modal-content");
const cancelButton = document.getElementById("cancelButton");

// Create User Modal
const createModal = document.getElementById("createModal");
const cancelCreateButton = document.getElementById("cancelCreateButton");

// Open and close modal for updating user
function closeModal() {
  modal.style.display = "none";
}

function openModal() {
  modal.style.display = "block";
}

// Open Create User Modal
function openCreateModal() {
  createModal.style.display = "block";
}

// Close Create User Modal
function closeCreateModal() {
  createModal.style.display = "none";
}

// Close modal when clicking outside of it
window.addEventListener("click", (event) => {
  if (event.target === modal) closeModal();
  if (event.target === createModal) closeCreateModal();
});

// Close modal on Cancel button click
cancelButton.addEventListener("click", closeModal);
cancelCreateButton.addEventListener("click", closeCreateModal);

// Add event listener to Create New User button
document
  .getElementById("createUserBtn")
  .addEventListener("click", openCreateModal);

document
  .getElementById("createUserForm")
  .addEventListener("submit", createUser);
document
  .getElementById("updateUserForm")
  .addEventListener("submit", updateUser);
document.addEventListener("DOMContentLoaded", fetchUsers);
