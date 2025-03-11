
document.addEventListener('DOMContentLoaded', () => {
const DateButtons = document.getElementsByClassName('eventDate');
const DateSection = document.getElementById('eventDates');
const eventContainers = document.getElementsByClassName('eventContainers');

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

const populateEvents = (events) => {
    const eventType =['jazz', 'history', 'yummy', 'magic', 'storie'];
    // Clear existing event content
    for (let i = 0; i < 5; i++) {
        events[eventType[i]].forEach((event) => {
            eventContainers[i].innerHTML = `
                <h3>${event.title}</h3>
                <p>${event.startTime}</p>
            `;
        });
    }
};


const specificParameters = ['SchedualeDay1', 'SchedualeDay2', 'SchedualeDay3', 'SchedualeDay4'];
//add the functions to te buttons
Array.from(DateButtons).forEach(button => {
    const img = specificParameters[Array.from(DateButtons).indexOf(button)];
    button.addEventListener('click',  () => changeeventDates(img,button));
});
});