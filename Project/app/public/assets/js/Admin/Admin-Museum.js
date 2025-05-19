// Museum page id in the database
const pageId = '67df2e743c854e2a5df0566a';

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

// Display function for intro data
function displayIntroContent(intro) {
  if (typeof intro === "object" && intro !== null) {
    try {
      if (tinymce.get("introTitle1")) {
        tinymce.get("introTitle1").setContent(intro.title1 || "");
      }
      if (tinymce.get("introTitle2")) {
        tinymce.get("introTitle2").setContent(intro.title2 || "");
      }
      if (tinymce.get("introTitle3")) {
        tinymce.get("introTitle3").setContent(intro.title3 || "");
      }
      if (tinymce.get("introText")) {
        tinymce.get("introText").setContent(intro.text || "");
      }
    } catch (e) {
      console.error("Error setting intro content:", e);
    }
  } else {
    console.error("No intro data found or data is in invalid format.");
  }
}

// Display function for teyler section data
function displayTeylerSection(section) {
  if (typeof section === "object" && section !== null) {
    try {
      if (tinymce.get("teylerTitle")) {
        tinymce.get("teylerTitle").setContent(section.title || "");
      }
      if (tinymce.get("teylerDescription1")) {
        tinymce.get("teylerDescription1").setContent(section.description1 || "");
      }
      if (tinymce.get("teylerDescription2")) {
        tinymce.get("teylerDescription2").setContent(section.description2 || "");
      }
      
      // Display FAQ items
      if (section.faq && Array.isArray(section.faq)) {
        displayFAQItems(section.faq, "teylerFAQ");
      } else {
        console.warn("No FAQ data found for teyler section or data is not an array");
      }
    } catch (e) {
      console.error("Error setting teyler section content:", e);
    }
  } else {
    console.error("No teyler section data found or data is in invalid format.");
  }
}

// Display function for lorentz section data
function displayLorentzSection(section) {
  if (typeof section === "object" && section !== null) {
    try {
      if (tinymce.get("lorentzTitle")) {
        tinymce.get("lorentzTitle").setContent(section.title || "");
      }
      if (tinymce.get("lorentzDescription1")) {
        tinymce.get("lorentzDescription1").setContent(section.description1 || "");
      }
      if (tinymce.get("lorentzDescription2")) {
        tinymce.get("lorentzDescription2").setContent(section.description2 || "");
      }
      
      // Display FAQ items
      if (section.faq && Array.isArray(section.faq)) {
        displayFAQItems(section.faq, "lorentzFAQ");
      } else {
        console.warn("No FAQ data found for lorentz section or data is not an array");
      }
    } catch (e) {
      console.error("Error setting lorentz section content:", e);
    }
  } else {
    console.error("No lorentz section data found or data is in invalid format.");
  }
}

// Display FAQ items for a section
function displayFAQItems(faqArray, sectionPrefix) {
  if (Array.isArray(faqArray)) {
    faqArray.forEach((faq, index) => {
      const questionId = `${sectionPrefix}Question${index+1}`;
      const answerId = `${sectionPrefix}Answer${index+1}`;
      
      try {
        if (tinymce.get(questionId)) {
          tinymce.get(questionId).setContent(faq.question || "");
        }
        if (tinymce.get(answerId)) {
          tinymce.get(answerId).setContent(faq.answer || "");
        }
      } catch (e) {
        console.error(`Error setting FAQ content for ${questionId}/${answerId}:`, e);
      }
    });
  } else {
    console.error(`No FAQ data found for ${sectionPrefix} or data is not an array`);
  }
}

// Collect page data from TinyMCE editors
function collectPageData() {
  try {
    return {
      intro: {
        title1: tinymce.get("introTitle1") ? tinymce.get("introTitle1").getContent() : "",
        title2: tinymce.get("introTitle2") ? tinymce.get("introTitle2").getContent() : "",
        title3: tinymce.get("introTitle3") ? tinymce.get("introTitle3").getContent() : "",
        text: tinymce.get("introText") ? tinymce.get("introText").getContent() : ""
      },
      teylerSection: {
        title: tinymce.get("teylerTitle") ? tinymce.get("teylerTitle").getContent() : "",
        description1: tinymce.get("teylerDescription1") ? tinymce.get("teylerDescription1").getContent() : "",
        description2: tinymce.get("teylerDescription2") ? tinymce.get("teylerDescription2").getContent() : "",
        faq: [
          {
            question: tinymce.get("teylerFAQQuestion1") ? tinymce.get("teylerFAQQuestion1").getContent() : "",
            answer: tinymce.get("teylerFAQAnswer1") ? tinymce.get("teylerFAQAnswer1").getContent() : ""
          },
          {
            question: tinymce.get("teylerFAQQuestion2") ? tinymce.get("teylerFAQQuestion2").getContent() : "",
            answer: tinymce.get("teylerFAQAnswer2") ? tinymce.get("teylerFAQAnswer2").getContent() : ""
          },
          {
            question: tinymce.get("teylerFAQQuestion3") ? tinymce.get("teylerFAQQuestion3").getContent() : "",
            answer: tinymce.get("teylerFAQAnswer3") ? tinymce.get("teylerFAQAnswer3").getContent() : ""
          },
          {
            question: tinymce.get("teylerFAQQuestion4") ? tinymce.get("teylerFAQQuestion4").getContent() : "",
            answer: tinymce.get("teylerFAQAnswer4") ? tinymce.get("teylerFAQAnswer4").getContent() : ""
          },
          {
            question: tinymce.get("teylerFAQQuestion5") ? tinymce.get("teylerFAQQuestion5").getContent() : "",
            answer: tinymce.get("teylerFAQAnswer5") ? tinymce.get("teylerFAQAnswer5").getContent() : ""
          }
        ]
      },
      lorentzSection: {
        title: tinymce.get("lorentzTitle") ? tinymce.get("lorentzTitle").getContent() : "",
        description1: tinymce.get("lorentzDescription1") ? tinymce.get("lorentzDescription1").getContent() : "",
        description2: tinymce.get("lorentzDescription2") ? tinymce.get("lorentzDescription2").getContent() : "",
        faq: [
          {
            question: tinymce.get("lorentzFAQQuestion1") ? tinymce.get("lorentzFAQQuestion1").getContent() : "",
            answer: tinymce.get("lorentzFAQAnswer1") ? tinymce.get("lorentzFAQAnswer1").getContent() : ""
          },
          {
            question: tinymce.get("lorentzFAQQuestion2") ? tinymce.get("lorentzFAQQuestion2").getContent() : "",
            answer: tinymce.get("lorentzFAQAnswer2") ? tinymce.get("lorentzFAQAnswer2").getContent() : ""
          },
          {
            question: tinymce.get("lorentzFAQQuestion3") ? tinymce.get("lorentzFAQQuestion3").getContent() : "",
            answer: tinymce.get("lorentzFAQAnswer3") ? tinymce.get("lorentzFAQAnswer3").getContent() : ""
          },
          {
            question: tinymce.get("lorentzFAQQuestion4") ? tinymce.get("lorentzFAQQuestion4").getContent() : "",
            answer: tinymce.get("lorentzFAQAnswer4") ? tinymce.get("lorentzFAQAnswer4").getContent() : ""
          },
          {
            question: tinymce.get("lorentzFAQQuestion5") ? tinymce.get("lorentzFAQQuestion5").getContent() : "",
            answer: tinymce.get("lorentzFAQAnswer5") ? tinymce.get("lorentzFAQAnswer5").getContent() : ""
          }
        ]
      }
    };
  } catch (e) {
    console.error("Error collecting page data:", e);
    return {};
  }
}

// Function to check if TinyMCE editors are ready
function areTinyMCEEditorsReady() {
  const expectedEditors = [
    "introTitle1", "introTitle2", "introTitle3", "introText",
    "teylerTitle", "teylerDescription1", "teylerDescription2"
  ];
  
  // Check if at least the main editors are initialized
  return expectedEditors.every(id => tinymce.get(id) !== null);
}

// Function to wait for TinyMCE editors to be ready
function waitForTinyMCE(callback, maxAttempts = 20) {
  let attempts = 0;
  
  const checkEditors = setInterval(() => {
    attempts++;
    
    if (areTinyMCEEditorsReady()) {
      clearInterval(checkEditors);
      callback();
    } else if (attempts >= maxAttempts) {
      clearInterval(checkEditors);
      console.error("TinyMCE editors not initialized after maximum attempts");
    }
  }, 500);
}

// Auto-save functionality
let updateTimeout;
function triggerAutosave() {
  // Clear previous timeout
  if (updateTimeout) {
    clearTimeout(updateTimeout);
  }
  
  // Show saving indicator if present
  const saveIndicator = document.getElementById("saveIndicator");
  if (saveIndicator) {
    saveIndicator.style.display = "block";
  }
  
  // Set new timeout (autosave after 2 seconds of inactivity)
  updateTimeout = setTimeout(async function () {
    try {
      const pageData = collectPageData();
      const result = await updatePageContent(pageId, pageData);
      
      // Hide saving indicator
      if (saveIndicator) {
        saveIndicator.style.display = "none";
      }
      
      if (result.success) {
        showResponse("Content updated successfully", "success");
      } else if (result.error) {
        showResponse(result.error, "error");
      }
    } catch (error) {
      console.error("Failed to autosave:", error);
      
      // Hide saving indicator
      if (saveIndicator) {
        saveIndicator.style.display = "none";
      }
      
      showResponse("Error updating content: " + error.message, "error");
    }
  }, 2000);
}

// Initialize everything when DOM is loaded
document.addEventListener("DOMContentLoaded", async function () {
  console.log("DOM loaded, initializing Museum Admin page");
  
  // First initialize TinyMCE
  initTinyMCE();

  try {
    console.log("Fetching page data for ID:", pageId);
    
    // Fetch page data
    const data = await getPageContent(pageId);
    console.log("Received data:", data);

    if (data && data.length > 0) {
      const pageData = data[0];
      console.log("Page data found:", pageData);
      
      // Wait for TinyMCE to be fully initialized before populating content
      waitForTinyMCE(() => {
        console.log("TinyMCE editors are ready, populating content");
        
        // Display intro content
        if (pageData.intro) {
          console.log("Found intro data:", pageData.intro);
          displayIntroContent(pageData.intro);
        } else {
          console.warn("No intro data found.");
        }
        
        // Display teyler section
        if (pageData.teylerSection) {
          console.log("Found teyler section data:", pageData.teylerSection);
          displayTeylerSection(pageData.teylerSection);
        } else {
          console.warn("No teyler section data found.");
        }
        
        // Display lorentz section
        if (pageData.lorentzSection) {
          console.log("Found lorentz section data:", pageData.lorentzSection);
          displayLorentzSection(pageData.lorentzSection);
        } else {
          console.warn("No lorentz section data found.");
        }
      });
    } else {
      console.error("No data found for the page.");
      showResponse("No data found for the museum page", "error");
    }
  } catch (error) {
    console.error("Error initializing page:", error);
    showResponse("Error loading content: " + error.message, "error");
  }
});