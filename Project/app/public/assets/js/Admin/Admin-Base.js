// Admin Base File manages the base functionality of the admin panel.

// Get page content
async function getPageContent(pageId) {
    try {
      const response = await fetch(`/admin/get-page?id=${pageId}`);
      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }
      const data = await response.json();
      return data;
    } catch (error) {
      console.error("Error fetching page content:", error);
      throw error;
    }
  }

  // Update page content
  async function updatePageContent(pageId, pageData) {
    try {
      const saveIndicator = document.getElementById("saveIndicator");
      saveIndicator.style.display = "block";
  
      const response = await fetch("/admin/update-page", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          id: pageId,
          pageData: pageData,
        }),
      });
      saveIndicator.style.display = "none";
      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }
      return await response.json();
    } catch (error) {
      console.error("Error updating page content:", error);
      showResponse("Error updating content: " + error.message, "error");
      throw error;
    }
  }

  // Helper function to show response messages
function showResponse(message, type) {
    const responseMessage = document.getElementById("responseMessage");
    responseMessage.textContent = message;
    responseMessage.className = "response " + type;
    responseMessage.style.display = "block";
  
    setTimeout(() => {
      responseMessage.style.display = "none";
    }, 9000);
  }