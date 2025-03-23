document.addEventListener('DOMContentLoaded', () => {
const DateButtons = document.getElementsByClassName('eventDate');
const DateSection = document.getElementById('eventDates');
const eventContainers = document.getElementsByClassName('eventlist');

//MAP Setting up
//Setting the Icons
const jazzPin = L.icon({
    iconUrl: '/../assets/images/complexLayouts/jazzPin.png', // URL to your custom icon
    iconSize: [40, 40], // Size of the icon
    iconAnchor: [20, 40], // Point of the icon which will correspond to the marker's location
    popupAnchor: [1, -34] // Point from which the popup should open relative to the iconAnchor
});
const yummyPin = L.icon({
    iconUrl: '/../assets/images/complexLayouts/yummyPin.png', // URL to your custom icon
    iconSize: [40, 40], // Size of the icon
    iconAnchor: [20, 40], // Point of the icon which will correspond to the marker's location
    popupAnchor: [1, -34] // Point from which the popup should open relative to the iconAnchor
});
const historyPin = L.icon({
    iconUrl: '/../assets/images/complexLayouts/historyPin.png', // URL to your custom icon
    iconSize: [40, 40], // Size of the icon
    iconAnchor: [20, 40], // Point of the icon which will correspond to the marker's location
    popupAnchor: [1, -34] // Point from which the popup should open relative to the iconAnchor
});
const museumPin = L.icon({
    iconUrl: '/../assets/images/complexLayouts/museumPin.png', // URL to your custom icon
    iconSize: [40, 40], // Size of the icon
    iconAnchor: [20, 40], // Point of the icon which will correspond to the marker's location
    popupAnchor: [1, -34] // Point from which the popup should open relative to the iconAnchor
});
const storyPin = L.icon({
    iconUrl: '/../assets/images/complexLayouts/storiePin.png', // URL to your custom icon
    iconSize: [40, 40], // Size of the icon
    iconAnchor: [20, 40], // Point of the icon which will correspond to the marker's location
    popupAnchor: [1, -34] // Point from which the popup should open relative to the iconAnchor
});



// Coordinates for Haarlem, Netherlands
const haarlemCoords = [52.3874, 4.6462];
markers =[];

// Create the map and set the view to Haarlem
var map = L.map('map', {
    center: haarlemCoords,
    zoom: 13,
    minZoom: 12, // Restrict minimum zoom level
    maxZoom: 18  // Optional: Restrict maximum zoom level
});

// Add the tile layer
L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {    
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// Set the maximum bounds to restrict the map to Haarlem and surrounding area
const southWest = L.latLng(52.35, 4.60);
const northEast = L.latLng(52.42, 4.70);
const bounds = L.latLngBounds(southWest, northEast);

map.setMaxBounds(bounds);
map.on('drag', function() {
    map.panInsideBounds(bounds, { animate: false });
});


const changeeventDates  = async (image,clickedButton) => {
    //removee current from previous
    Array.from(DateButtons).forEach(button => {
        button.classList.remove('current');
    });
    //add current to clicked button and change to respective image
    clickedButton.classList.add('current');
    DateSection.style.backgroundImage = `url(assets/images/complexLayouts/${image}.png)`;
    day = Array.from(DateButtons).indexOf(clickedButton);
    //get events of that day

    const events = await getDayEvents(day);
    populateEvents(events); // Populate the event containers
};

// Function to fetch events for a specific day using AJAX (POST request)
const getDayEvents = async (day) => {
    const response = await fetch('/get-events', { // URL remains unchanged
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({day : day}), // Send the day in the request body
    });
    if (!response.ok) {
        throw new Error('Failed to fetch events');
    }
    return await response.json(); // Assuming the server returns JSON data
};

function removeAllMarkers() {
    markers.forEach(marker => map.removeLayer(marker));
    markers.length = 0; // Clear the array
}

const populateEvents = (events) => {
    const eventType =['jazz', 'history', 'yummy', 'museum', 'story'];
    const Pins =[jazzPin,historyPin,yummyPin,museumPin,storyPin];
    const addedCoordinates = new Set();
    removeAllMarkers();
    for (let i = 0; i < 5; i++) {
        //empty content
        eventContainers[i].innerHTML ="";
        //add current events 
        events[eventType[i]].forEach((event) => {
            const start = new Date(parseInt(event.startTime.$date.$numberLong));
            const end= new Date(parseInt(event.endTime.$date.$numberLong));
            //add event to scheduale card
            eventContainers[i].innerHTML += `
                <b class= "EventTitle">${event.title}</b>
                <p>${start.getUTCHours()}:${String(start.getUTCMinutes()).padStart(2, '0')} - ${end.getUTCHours()}:${String(end.getUTCMinutes()).padStart(2, '0')}</p>
            `;
            //check if i has marker already

            //add marker in array
            
            if (typeof event.coordinates !== 'undefined' ) {
                
            
                // Convert coordinates from strings to numbers
                const lat = parseFloat(event.coordinates[0]);
                const lng = parseFloat(event.coordinates[1]);
                const coordKey = `${lat},${lng}`;

                //check if marker already added
                if(!addedCoordinates.has(coordKey)){
                    addedCoordinates.add(coordKey);
                     // Create and add the marker to the map
                    const marker = L.marker([lat, lng], { icon: Pins[i] }).addTo(map);
                    markers.push(marker); // Store the marker in the array
                }

            } 


        });
    }
    markers.forEach((mark) =>{
        mark.addTo(map);
    } );
};
const specificParameters = ['SchedualeDay1', 'SchedualeDay2', 'SchedualeDay3', 'SchedualeDay4'];
//add the functions to te buttons
Array.from(DateButtons).forEach(button => {
    const img = specificParameters[Array.from(DateButtons).indexOf(button)];
    button.addEventListener('click',  () => changeeventDates(img,button));
});

//Trigger first button
DateButtons[0].click();

});








function displayCards(cards) {
    const cardsContainer = document.getElementById("cards-container");
    cardsContainer.innerHTML = '';
    if (typeof cards === 'object' && cards !== null) {
        Object.entries(cards).forEach(([key, card]) => {
            if (card && card.title && card.content) {
                const cardHTML = `
                <div class="col-md-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h3 class="card-title">${card.title}</h3>
                            <p class="card-text">${card.content}</p>
                        </div>
                    </div>
                </div>
            `;
                cardsContainer.innerHTML += cardHTML;
            }
        });
    } else {
        console.error("error", cards);
    }
}
const getPageContent = async (pageId) => {
const response = await fetch(`/get-page-content?id=${pageId}`, {
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

document.addEventListener('DOMContentLoaded', async function() {
try {
    const pageId = '67ceba162690121d83ed224a';
    const data = await getPageContent(pageId);

    if (data && data.length > 0) {
        const pageData = data[0];
        if (pageData['info-cards']) {
            displayCards(pageData['info-cards']);
        }
    } else {
        console.error("no data");
    }
} catch (error) {
    console.error('error:', error);
}
});

function displayFaq(faqs) {
    const accordionContainer = document.getElementById("modernAccordion");
    accordionContainer.innerHTML = '';

    if (typeof faqs === 'object' && faqs !== null) {
        Object.entries(faqs).forEach(([key, faq], index) => {
            const faqHTML = `
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading${index}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${index}" aria-expanded="false" aria-controls="collapse${index}">
                        ${faq.question}
                    </button>
                </h2>
                <div id="collapse${index}" class="accordion-collapse collapse" data-bs-parent="#modernAccordion">
                    <div class="accordion-body">
                        ${faq.answer}
                    </div>
                </div>
            </div>`;
            accordionContainer.innerHTML += faqHTML;
        });
    } else {
        console.error('No FAQs found.');
    }
}

document.addEventListener('DOMContentLoaded', async function() {
    try {
        const pageId = '67ceba162690121d83ed224a'; 
        const data = await getPageContent(pageId);
        if (data && data.length > 0) {
            const pageData = data[0]; 
            if (pageData['faq']) {
                displayFaq(pageData['faq']); 
            } else {
                console.error('no faq data.');
            }
        } else {
            console.error("No data found for the page.");
        }
    } catch (error) {
        console.error('Error:', error);
    }
});




