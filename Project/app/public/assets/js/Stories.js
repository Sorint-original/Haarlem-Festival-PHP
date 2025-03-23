console.log("Stories.js loaded");
document.addEventListener("DOMContentLoaded", function () {
    const storiesIntroPageId = "67dd353e7391ffc81f8dbfc1";
    const introApiUrl = `/get-stories-content?id=${storiesIntroPageId}`;

    const pricingPageId = "67dd37e77391ffc81f8dbfd3";
    const pricingApiUrl = `/get-stories-content?id=${pricingPageId}`;

    const donationCardPageId = "67dd38197391ffc81f8dbfd8"; // Donation card için ID
    const donationApiUrl = `/get-stories-content?id=${donationCardPageId}`;
 

    // STORIES INTRO Bölümünü Güncelle
    fetchPageContent(introApiUrl, "stories-intro");

    // PRICING Bölümünü Güncelle
    fetchPageContent(pricingApiUrl, "pricing");

    // DONATION CARD Bölümünü Güncelle
    fetchPageContent(donationApiUrl, "donation-card");

    // STORY CARDS Bölümünü Güncelle
    fetchStoriesContent(storiesApiUrl);


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

            // JSON bir dizi olarak döndüğü için ilk elemanı alıyoruz
            const pageContent = data[0]; 

            if(section === "stories-intro"){
                document.getElementById("pageTitle").textContent = pageContent.pageTitle || "No Title";
                document.getElementById("pageDescription").textContent = pageContent.pageDescription || "";
                document.getElementById("pageInformation").textContent = pageContent.pageInformation || "";
                document.getElementById("pageSlogan").textContent = pageContent.pageSlogan || "";
            }
            else if(section === "pricing"){
                
                    document.getElementById("pricingTitle").textContent = pageContent.pricingTitle || "No Title";
                    document.getElementById("pricingDescription").textContent = pageContent.pricingDescription || "";
                    document.getElementById("pricingInfo").textContent = pageContent.pricingInfo || "";
                
            }
            else if (section === "donation-card") {
                document.getElementById("donationTitle").textContent = pageContent.donationTitle || "No Title";
                document.getElementById("donationInfo").textContent = pageContent.donationInfo || "";
            }

        })
        .catch(error => {
            console.error(`Error fetching content for ${section}:`, error);
            
            // Sadece ilgili bölümü hata mesajıyla güncelle
            if (section === "stories-intro") {
                document.getElementById("pageTitle").textContent = "Error loading conten intro";
            } 
            else if (section === "pricing") {
                document.getElementById("pricingTitle").textContent = "Error loading content pricing";
            }
            else if (section === "donation-card") {
                document.getElementById("donationTitle").textContent = "Error loading content donatie";
            }
        });

    }

    
});
