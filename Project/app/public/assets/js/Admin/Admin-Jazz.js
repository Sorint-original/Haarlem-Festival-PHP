// Initialize TinyMCE for all elements with class tinymce-editor
function initTinyMCE() {
  tinymce.init({
    selector: '.tinymce-editor[data-tinymce="true"]',
    height: 300,
    menubar: false,
    plugins: [
      'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
      'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
      'insertdatetime', 'media', 'table', 'help', 'wordcount'
    ],
    toolbar: 'undo redo | formatselect | ' +
      'bold italic backcolor | alignleft aligncenter ' +
      'alignright alignjustify | bullist numlist outdent indent | ' +
      'removeformat | help',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
    setup: function(editor) {
      editor.on('change', function() {
        editor.save(); // This will update the original textarea/div with the content
        triggerAutosave();
      });
    }
  });
}

// Display function for TinyMCE
function display(pageData) {
  if (typeof pageData === "object" && pageData !== null) {
    // Set content after TinyMCE is initialized
    setTimeout(() => {
      tinymce.get("pageHeader").setContent(pageData.header || "");
      tinymce.get("pageText").setContent(pageData.text || "");
    }, 100);
  } else {
    console.error("No page data found.");
  }
}

// Collect page data from TinyMCE editors
function collectPageData() {
  return {
    header: tinymce.get("pageHeader").getContent(),
    text: tinymce.get("pageText").getContent(),
  };
}

// Auto-save functionality
let updateTimeout;
function triggerAutosave() {
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
}

// Page ID for jazz page
const pageId = "67dbf703ed593eb7a526a613";

// Initialize everything when DOM is loaded
document.addEventListener("DOMContentLoaded", async function () {
  // First initialize TinyMCE
  initTinyMCE();

  try {
    // Fetch page data
    const data = await getPageContent(pageId);

    if (data && data.length > 0) {
      const pageData = data[0];

      // Wait until TinyMCE is fully initialized
      setTimeout(() => {
        display(pageData);
      }, 1000); // Short delay to ensure TinyMCE is ready
    } else {
      console.error("No data found for the page.");
    }
  } catch (error) {
    console.error("Error initializing page:", error);
    showResponse("Error loading content: " + error.message, "error");
  }
});