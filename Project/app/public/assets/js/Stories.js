console.log("Stories.js loaded");

document.addEventListener("DOMContentLoaded", function () {
    const storiesIntroPageId = "67e159dded0d09faa083aae7";
    const introApiUrl = `/get-stories-content?id=${storiesIntroPageId}`;

 
    fetchPageContent(introApiUrl);

    function fetchPageContent(apiUrl) {
        console.log("Fetching data from:", apiUrl);

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                console.log("Fetched data:", data);

                if (!data || data.length === 0) {
                   console.error("No content found:", apiUrl);
                    return;
                }

         
                const pageContent = data[0];

                updateElementText("pageTitle", pageContent.pageTitle, "No Title");
                updateElementText("pageDescription", pageContent.pageDescription, "");
                updateElementText("pageInformation", pageContent.pageInformation, "");
                updateElementText("pageSlogan", pageContent.pageSlogan, "");
                updateElementText("pricingTitle", pageContent.pricingTitle, "No Title");
                updateElementText("pricingDescription", pageContent.pricingDescription, "");
                updateElementText("pricingInfo", pageContent.pricingInfo, "");
                updateElementText("donationTitle", pageContent.donationTitle, "No Title");
                updateElementText("donationInfo", pageContent.donationInfo, "");
            })
            .catch(error => {
                console.error("Error fetching content:", error);
            });
    }


    function updateElementText(elementId, text, defaultText) {
        const element = document.getElementById(elementId);
        if (element) {
            element.textContent = text || defaultText;
        } else {
            console.warn(`Element with ID '${elementId}' not found.`);
        }
    }
});
