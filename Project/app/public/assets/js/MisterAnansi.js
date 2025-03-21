console.log("Mister Anansi is here!");
document.addEventListener("DOMContentLoaded", function () {
    const anansiIntroPageId = "67dcb472cbdf5d8951e31afd";
    const anansiIntroApiUrl = `/get-stories-content?id=${anansiIntroPageId}`;

    fetchPageContent(anansiIntroApiUrl, "intro-anansi");

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

            })
            .catch(error => {
                console.error(`Error fetching content for ${section}:`, error);
            });
    }


});
