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

//assign the elements in HTML to the data in the given intro object.
const populateIntroContent = (intro) => {
    document.querySelector('.intro1').textContent = intro.title ;
    document.querySelector('.intro2').textContent = intro.subtitle;
    document.querySelector('.intro3').textContent = intro.heading;
    document.querySelector('.info').textContent = intro.description;
};
const populateFAQ = (faqContainer, faqData) => {
    faqContainer.innerHTML = '';  
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

// teyler section 
const populateTeylerSection = (section) => {
    document.querySelector('.teyler-section .intro').textContent = section.title;
    document.querySelector('.teyler-section .info-text p:nth-of-type(1)').textContent = section.description1;
    document.querySelector('.teyler-section .info-text p:nth-of-type(2)').textContent = section.description2;
    
    const faqContainer = document.querySelector('.teyler-section .faq-container');
    populateFAQ(faqContainer, section.faq);
  
    
};
// Lorentz section
const populateLorentzSection = (section) => {
   
    document.querySelector('.lorentz-section .intro').textContent = section.title;
    document.querySelector('.lorentz-section .info-text p:nth-of-type(1)').textContent = section.description1;
    document.querySelector('.lorentz-section .info-text p:nth-of-type(2)').textContent = section.description2;

    const faqContainer = document.querySelector('.lorentz-section .faq-container');
    populateFAQ(faqContainer, section.faq);


};
// Event listener for DOMContentLoaded
// This ensures the script runs after the DOM is fully loaded

document.addEventListener('DOMContentLoaded', async function() {
    try {
        const pageId = '67df2e743c854e2a5df0566a';
        const data = await getPageContent(pageId);

        const intro = data[0].intro;
        const section = data[0]["teyler-section"];
        const lorentzSection = data[0]["lorentz-section"];
        populateIntroContent(intro);
        populateTeylerSection(section);
        populateLorentzSection(lorentzSection);
    }
    catch (error) {
        console.error('Error:', error);
    }
});
