function display(pageData){
    document.getElementById("pageHeader").textContent = pageData.header;
    document.getElementById("pageText").textContent = pageData.text;
}

function collectPageData(){
    return{
        header: document.getElementById("pageHeader").textContent,
        text: document.getElementById("pageText").textContent,
    }   
}

document.addEventListener("DOMContentLoaded", async function () {
    // Hard-coded page ID
    const pageId = "67dbf703ed593eb7a526a613";
    try {
      // Fetch page data
      const data = await getPageContent(pageId);
  
      if (data && data.length > 0) {
        const pageData = data[0];
  
        // Display
        display(pageData);
      } 
      else {
        console.error("No data found for the page.");
      }
    } catch (error) {
      console.error("Error initializing page:", error);
      showResponse("Error loading content: " + error.message, "error");
    }
    // Setup autosave functionality
    let updateTimeout;
    const editableFields = document.querySelectorAll('[contenteditable="true"]');
    editableFields.forEach((field) => {
      field.addEventListener("input", function () {
        // Clear previous timeout
        if (updateTimeout) {
          clearTimeout(updateTimeout);
        }
        // Set new timeout (autosave after 2 seconds of inactivity)
        updateTimeout = setTimeout(async function () {
          try {
            const pageData = collectPageData();
            const result = await updatePageContent(pageId, pageData);
            if (result.success) {
              showResponse("Content updated successfully", "success");
            } else if (result.error) {
              showResponse(result.error, "error");
            }
          } catch (error) {
            console.error("Failed to autosave:", error);
          }
        }, 2000);
      });
    });
  });
  