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

// Collect page data from TinyMCE editors
function collectPageData() {
  return {
    "info-cards": {
      "first-card": {
        title: tinymce.get("firstCardTitle").getContent(),
        content: tinymce.get("firstCardContent").getContent(),
      },
      "second-card": {
        title: tinymce.get("secondCardTitle").getContent(),
        content: tinymce.get("secondCardContent").getContent(),
      },
      "third-card": {
        title: tinymce.get("thirdCardTitle").getContent(),
        content: tinymce.get("thirdCardContent").getContent(),
      },
    },
    faq: {
      "first-faq": {
        question: tinymce.get("firstFaqQuestion").getContent(),
        answer: tinymce.get("firstFaqAnswer").getContent(),
      },
      "second-faq": {
        question: tinymce.get("secondFaqQuestion").getContent(),
        answer: tinymce.get("secondFaqAnswer").getContent(),
      },
      "third-faq": {
        question: tinymce.get("thirdFaqQuestion").getContent(),
        answer: tinymce.get("thirdFaqAnswer").getContent(),
      },
      "fourth-faq": {
        question: tinymce.get("fourthFaqQuestion").getContent(),
        answer: tinymce.get("fourthFaqAnswer").getContent(),
      },
      "fifth-faq": {
        question: tinymce.get("fifthFaqQuestion").getContent(),
        answer: tinymce.get("fifthFaqAnswer").getContent(),
      },
    },
  };
}

// Display information cards data in the TinyMCE editors
function displayCards(cards) {
  if (typeof cards === "object" && cards !== null) {
    // Set content after TinyMCE is initialized
    if (cards["first-card"]) {
      tinymce.get("firstCardTitle").setContent(cards["first-card"].title || "");
      tinymce.get("firstCardContent").setContent(cards["first-card"].content || "");
    }
    if (cards["second-card"]) {
      tinymce.get("secondCardTitle").setContent(cards["second-card"].title || "");
      tinymce.get("secondCardContent").setContent(cards["second-card"].content || "");
    }
    if (cards["third-card"]) {
      tinymce.get("thirdCardTitle").setContent(cards["third-card"].title || "");
      tinymce.get("thirdCardContent").setContent(cards["third-card"].content || "");
    }
  } else {
    console.error("No card data found.");
  }
}

// Display FAQ data in the TinyMCE editors
function displayFaqs(faqs) {
  if (typeof faqs === "object" && faqs !== null) {
    if (faqs["first-faq"]) {
      tinymce.get("firstFaqQuestion").setContent(faqs["first-faq"].question || "");
      tinymce.get("firstFaqAnswer").setContent(faqs["first-faq"].answer || "");
    }
    if (faqs["second-faq"]) {
      tinymce.get("secondFaqQuestion").setContent(faqs["second-faq"].question || "");
      tinymce.get("secondFaqAnswer").setContent(faqs["second-faq"].answer || "");
    }
    if (faqs["third-faq"]) {
      tinymce.get("thirdFaqQuestion").setContent(faqs["third-faq"].question || "");
      tinymce.get("thirdFaqAnswer").setContent(faqs["third-faq"].answer || "");
    }
    if (faqs["fourth-faq"]) {
      tinymce.get("fourthFaqQuestion").setContent(faqs["fourth-faq"].question || "");
      tinymce.get("fourthFaqAnswer").setContent(faqs["fourth-faq"].answer || "");
    }
    if (faqs["fifth-faq"]) {
      tinymce.get("fifthFaqQuestion").setContent(faqs["fifth-faq"].question || "");
      tinymce.get("fifthFaqAnswer").setContent(faqs["fifth-faq"].answer || "");
    }
  } else {
    console.error("No FAQ data found.");
  }
}

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

// Page ID for homepage
const pageId = "67ceba162690121d83ed224a";

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
        // Display info cards
        if (pageData["info-cards"]) {
          displayCards(pageData["info-cards"]);
        } else {
          console.error("No info cards data found.");
        }
        
        // Display FAQs
        if (pageData["faq"]) {
          displayFaqs(pageData["faq"]);
        } else {
          console.error("No FAQ data found.");
        }
      }, 1000); // Short delay to ensure TinyMCE is ready
    } else {
      console.error("No data found for the page.");
    }
  } catch (error) {
    console.error("Error initializing page:", error);
    showResponse("Error loading content: " + error.message, "error");
  }
});