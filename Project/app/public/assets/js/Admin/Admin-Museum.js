// museum page id in the
const pageId = '67df2e743c854e2a5df0566a'; 

const populateIntroContent = (intro) => {
    const intro1 = document.querySelector('#intro1');
    const intro2 = document.querySelector('#intro2');
    const intro3 = document.querySelector('#intro3');
    const info = document.querySelector('#info');

    intro1.textContent = intro.title ;
    intro2.textContent = intro.subtitle ;
    intro3.textContent = intro.heading ;
    info.textContent = intro.description ;
};
// teyler section
const populateTeylerSection = (teylerSection) => {
    document.querySelector('#teylerTitle').textContent = teylerSection.title;
    document.querySelector('#teylerDescription1').textContent = teylerSection.description1 ;
    document.querySelector('#teylerDescription2').textContent = teylerSection.description2 ;

    const faqContainer = document.querySelector('#teylerFAQContainer');
    populateFAQ(faqContainer, teylerSection.faq);

};
// Lorentz section
const populateLorentzSection = (lorentzSection) => {
    document.querySelector('#lorentzTitle').textContent = lorentzSection.title;
    document.querySelector('#lorentzDescription1').textContent = lorentzSection.description1;
    document.querySelector('#lorentzDescription2').textContent = lorentzSection.description2;

    const faqContainer = document.querySelector('#lorentzFAQContainer');
    populateFAQ(faqContainer, lorentzSection.faq);
}
//faq section
const populateFAQ = (faqContainer, faqData) => {
    faqContainer.innerHTML = '';  
    faqData.forEach((faq, index) => {
        const faqItemDiv = document.createElement('div');
        faqItemDiv.classList.add('faq-item');
        
        faqItemDiv.innerHTML = `
            <h3 class="editable-field" contenteditable="true">${faq.question}</h3>
            <p class="editable-field" contenteditable="true">${faq.answer}</p>
        `;
        faqContainer.appendChild(faqItemDiv);
    });
};
const collectPageData = () => {
    return {
      intro: {
        title: document.querySelector('#intro1').textContent,
        subtitle: document.querySelector('#intro2').textContent,
        heading: document.querySelector('#intro3').textContent,
        description: document.querySelector('#info').textContent,
      },
      "teyler-section": {
        title: document.querySelector('#teylerTitle').textContent,
        description1: document.querySelector('#teylerDescription1').textContent,
        description2: document.querySelector('#teylerDescription2').textContent,
        faq: Array.from(document.querySelectorAll('#teylerFAQContainer .faq-item')).map((item) => ({
          question: item.querySelector('h3').textContent,
          answer: item.querySelector('p').textContent,
        })),
      },
      "lorentz-section": {
        title: document.querySelector('#lorentzTitle').textContent,
        description1: document.querySelector('#lorentzDescription1').textContent,
        description2: document.querySelector('#lorentzDescription2').textContent,
        faq: Array.from(document.querySelectorAll('#lorentzFAQContainer .faq-item')).map((item) => ({
          question: item.querySelector('h3').textContent,
          answer: item.querySelector('p').textContent,
        })),
      },
    };
  };

  document.addEventListener('DOMContentLoaded', async function() {
    try {
        const data = await getPageContent(pageId);  
        
        const intro = data[0].intro;  
        const section = data[0]["teyler-section"];
        const lorentzSection = data[0]["lorentz-section"];
        
        populateIntroContent(intro);
        populateTeylerSection(section);
        populateLorentzSection(lorentzSection);
      
        
        let updateTimeout;
        const editableFields = document.querySelectorAll('[contenteditable="true"]');
        editableFields.forEach((field) => {
          field.addEventListener("input", function () {
            if (updateTimeout) {
              clearTimeout(updateTimeout);
            }
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
        
    } catch (error) {
        console.error('Error:', error);
    }
});