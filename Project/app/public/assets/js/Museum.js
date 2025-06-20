const getPageContent = async (pageId) => {
    const response = await fetch(`/museum/get-page?id=${pageId}`, {
        method: 'GET',
        headers: {
            'Accept': 'application/json',
        }
    });
    if (!response.ok) {
        throw new Error('Failed to fetch page content');
    }
    return await response.json();
};

const populateIntroContent = (intro) => {
    document.querySelector('.intro1').innerHTML = intro.title1 || '';
    document.querySelector('.intro2').innerHTML = intro.title2 || '';
    document.querySelector('.intro3').innerHTML = intro.title3 || '';
    document.querySelector('.info').innerHTML = intro.text || '';
};

// Populate FAQ accordion with the provided FAQ data
const populateFAQ = (faqContainer, faqData) => {
    if (!faqContainer) return;
    faqContainer.innerHTML = '';
    
    // Check if faqData exists and is an array
    if (!faqData || !Array.isArray(faqData)) {
        console.warn('No FAQ data available or data is not in expected format');
        return;
    }
    
    // Accordion container
    const accordionDiv = document.createElement('div');
    accordionDiv.classList.add('accordion');
    accordionDiv.setAttribute('id', 'faqAccordion');
    
    // FAQ items are added dynamically
    faqData.forEach((faq, index) => {
        const faqId = `faqItem${index}`;

        const faqItemDiv = document.createElement('div');
        faqItemDiv.classList.add('accordion-item');
        
        faqItemDiv.innerHTML = `
            <h2 class="accordion-header" id="heading${faqId}">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${faqId}" aria-expanded="false" aria-controls="collapse${faqId}">
                    ${faq.question}
                </button>
            </h2>
            <div id="collapse${faqId}" class="accordion-collapse collapse" aria-labelledby="heading${faqId}" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    ${faq.answer}
                </div>
            </div>
        `;
        accordionDiv.appendChild(faqItemDiv);
    });

    faqContainer.appendChild(accordionDiv);
};

// Populate the Teyler section with content from the database
const populateTeylerSection = (section) => {
    
document.querySelector('.teyler-section .intro').innerHTML = section.title || '';
document.querySelector('.teyler-section .desc1').innerHTML = section.description1 || '';
document.querySelector('.teyler-section .desc2').innerHTML = section.description2 || '';


    const faqContainer = document.querySelector('.teyler-section .faq-container');
    if (faqContainer && section.faq && Array.isArray(section.faq)) {
        populateFAQ(faqContainer, section.faq);
    } else if (faqContainer) {
        console.warn('No valid FAQ data found for Teyler section');
    }
};

// Populate the Lorentz section with content from the database
const populateLorentzSection = (section) => {
    document.querySelector('.lorentz-section .intro').innerHTML = section.title || '';
    document.querySelector('.lorentz-section .desc1').innerHTML = section.description1 || '';
    document.querySelector('.lorentz-section .desc2').innerHTML = section.description2 || '';

    const faqContainer = document.querySelector('.lorentz-section .faq-container');
    if (faqContainer && section.faq && Array.isArray(section.faq)) {
        populateFAQ(faqContainer, section.faq);
    } else if (faqContainer) {
        console.warn('No valid FAQ data found for Lorentz section');
    }
};

// Event listener for DOMContentLoaded
// This ensures the script runs after the DOM is fully loaded
document.addEventListener('DOMContentLoaded', async function() {
    try {
        const pageId = '67df2e743c854e2a5df0566a';
        const data = await getPageContent(pageId);
        console.log("Received data:", data); // For debugging

        if (data && data.length > 0) {
            const pageData = data[0];
            
            // Use intro data
            if (pageData.intro) {
                populateIntroContent(pageData.intro);
            } else {
                console.warn('Intro data not found');
            }
            
            // Use teylerSection data
            if (pageData.teylerSection) {
                populateTeylerSection(pageData.teylerSection);
            } else {
                console.warn('Teyler section data not found');
            }
            
            // Use lorentzSection data
            if (pageData.lorentzSection) {
                populateLorentzSection(pageData.lorentzSection);
            } else {
                console.warn('Lorentz section data not found');
            }
        } else {
            console.error('No data returned from API');
        }
    } catch (error) {
        console.error('Error:', error);
    }
});