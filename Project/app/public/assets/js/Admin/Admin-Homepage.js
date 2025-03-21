

// Collect page data from editable fields
function collectPageData() {
  return {
    "info-cards": {
      "first-card": {
        title: document.getElementById("firstCardTitle").textContent,
        content: document.getElementById("firstCardContent").textContent,
      },
      "second-card": {
        title: document.getElementById("secondCardTitle").textContent,
        content: document.getElementById("secondCardContent").textContent,
      },
      "third-card": {
        title: document.getElementById("thirdCardTitle").textContent,
        content: document.getElementById("thirdCardContent").textContent,
      },
    },
    faq: {
      "first-faq": {
        question: document.getElementById("firstFaqQuestion").textContent,
        answer: document.getElementById("firstFaqAnswer").textContent,
      },
      "second-faq": {
        question: document.getElementById("secondFaqQuestion").textContent,
        answer: document.getElementById("secondFaqAnswer").textContent,
      },
      "third-faq": {
        question: document.getElementById("thirdFaqQuestion").textContent,
        answer: document.getElementById("thirdFaqAnswer").textContent,
      },
      "fourth-faq": {
        question: document.getElementById("fourthFaqQuestion").textContent,
        answer: document.getElementById("fourthFaqAnswer").textContent,
      },
      "fifth-faq": {
        question: document.getElementById("fifthFaqQuestion").textContent,
        answer: document.getElementById("fifthFaqAnswer").textContent,
      },
    },
  };
}
// Display information cards data on the page that retrieved from getPageContent function.
function displayCards(cards) {
  if (typeof cards === "object" && cards !== null) {
    // First Card
    if (cards["first-card"]) {
      document.getElementById("firstCardTitle").textContent =
        cards["first-card"].title || "";
      document.getElementById("firstCardContent").textContent =
        cards["first-card"].content || "";
    }
    // Second Card
    if (cards["second-card"]) {
      document.getElementById("secondCardTitle").textContent =
        cards["second-card"].title || "";
      document.getElementById("secondCardContent").textContent =
        cards["second-card"].content || "";
    }
    // Third Card
    if (cards["third-card"]) {
      document.getElementById("thirdCardTitle").textContent =
        cards["third-card"].title || "";
      document.getElementById("thirdCardContent").textContent =
        cards["third-card"].content || "";
    }
  } else {
    console.error("No card data found.");
  }
}
// Display FAQ data on the page
function displayFaqs(faqs) {
  if (typeof faqs === "object" && faqs !== null) {
    // First FAQ
    if (faqs["first-faq"]) {
      document.getElementById("firstFaqQuestion").textContent =
        faqs["first-faq"].question || "";
      document.getElementById("firstFaqAnswer").textContent =
        faqs["first-faq"].answer || "";
    }

    // Second FAQ
    if (faqs["second-faq"]) {
      document.getElementById("secondFaqQuestion").textContent =
        faqs["second-faq"].question || "";
      document.getElementById("secondFaqAnswer").textContent =
        faqs["second-faq"].answer || "";
    }

    // Third FAQ
    if (faqs["third-faq"]) {
      document.getElementById("thirdFaqQuestion").textContent =
        faqs["third-faq"].question || "";
      document.getElementById("thirdFaqAnswer").textContent =
        faqs["third-faq"].answer || "";
    }

    // Fourth FAQ
    if (faqs["fourth-faq"]) {
      document.getElementById("fourthFaqQuestion").textContent =
        faqs["fourth-faq"].question || "";
      document.getElementById("fourthFaqAnswer").textContent =
        faqs["fourth-faq"].answer || "";
    }

    // Fifth FAQ
    if (faqs["fifth-faq"]) {
      document.getElementById("fifthFaqQuestion").textContent =
        faqs["fifth-faq"].question || "";
      document.getElementById("fifthFaqAnswer").textContent =
        faqs["fifth-faq"].answer || "";
    }
  } else {
    console.error("No FAQ data found.");
  }
}

// ---Load Page and Autosave ---

document.addEventListener("DOMContentLoaded", async function () {
  // Hard-coded page ID
  const pageId = "67ceba162690121d83ed224a";
  try {
    // Fetch page data
    const data = await getPageContent(pageId);

    if (data && data.length > 0) {
      const pageData = data[0];

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
    } else {
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
