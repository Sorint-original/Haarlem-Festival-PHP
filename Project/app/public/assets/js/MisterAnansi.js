console.log("Mister Anansi is here!");
document.addEventListener("DOMContentLoaded", function () {
    const anansiIntroPageId = "67de87948536692707c4dba1";
    const anansiIntroApiUrl = `/get-stories-content?id=${anansiIntroPageId}`;

    const spiderStoryPageId = "67df24210b36b053e5193c1c";
    const spiderStoryApiUrl = `/get-stories-content?id=${spiderStoryPageId}`;

    fetchPageContent(anansiIntroApiUrl, "intro-anansi");
    fetchPageContent(spiderStoryApiUrl, "spider-story");

    function fetchPageContent(apiUrl, section) {
        console.log("Fetching data from:", apiUrl);

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                console.log(`Fetched data for ${section}:`, data);

                if (!data || data.length === 0) {
                    console.error(`No content found for ${section}:`, apiUrl);
                    return;
                }

                const pageContent = data[0];

                if (section === "intro-anansi") {
                    document.getElementById("anansiTitle").textContent = pageContent.anansiTitle || "No Title";
                    document.getElementById("anansiDescription").textContent = pageContent.anansiDescription || "";
                    document.getElementById("anansiInfo").textContent = pageContent.anansiInfo || "";
                    document.getElementById("anansiDetailed").textContent = pageContent.anansiDetailed || "";
                }
                else if (section === "spider-story") {
                    document.getElementById("spiderTitle").textContent = pageContent.spiderTitle || "No Title";
                    document.getElementById("spiderInfo").textContent = pageContent.spiderInfo || "";
                    document.getElementById("callToAction").textContent = pageContent.callToAction || "";
                    document.getElementById("spiderInfo2").textContent = pageContent.spiderInfo2 || "";
                }

            })
            .catch(error => {
                console.error(`Error fetching content for ${section}:`, error);
            });
    }


});
