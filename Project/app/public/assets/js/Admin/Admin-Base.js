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

  function initTinyMCE() {
  tinymce.init({
    selector: '.tinymce-editor[data-tinymce="true"]',
    height: 300,
    menubar: false,
    plugins:
      "advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table paste help wordcount fontfamily fontsize",
    toolbar:
      "undo redo | formatselect | fontfamily fontsize | " +
      "bold italic underline strikethrough | forecolor backcolor | alignleft aligncenter " +
      "alignright alignjustify | bullist numlist outdent indent | " +
      "removeformat | help",
    // Font family options
    font_family_formats:
      "Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Merienda=Merienda,cursive; Merienda One=Merienda One,cursive; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva;",
    // Font size options
    font_size_formats: "8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt",
    // Content style to preserve fonts and colors
    content_style: `
      body { font-family: Arial, sans-serif; font-size: 14pt; }
      .merienda { font-family: "Merienda", cursive; }
      .merienda-one { font-family: "Merienda One", cursive; }
      h1, h2, h3, h4, h5, h6 { font-family: "Merienda One", cursive; }
    `,
    setup: function (editor) {
      editor.on("change", function () {
        editor.save(); // This will update the original textarea/div with the content
        triggerAutosave();
      });
    },
  });
}