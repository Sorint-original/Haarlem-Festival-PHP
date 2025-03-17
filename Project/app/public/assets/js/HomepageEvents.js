
document.addEventListener('DOMContentLoaded', () => {
const DateButtons = document.getElementsByClassName('eventDate');
const DateSection = document.getElementById('eventDates');
const eventContainers = document.getElementsByClassName('eventlist');

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
    const eventType =['jazz', 'history', 'yummy', 'museum', 'story'];
    for (let i = 0; i < 5; i++) {
        //empty content
        eventContainers[i].innerHTML ="";
        //add current events
        events[eventType[i]].forEach((event) => {
            const start = new Date(parseInt(event.startTime.$date.$numberLong));
            const end= new Date(parseInt(event.endTime.$date.$numberLong));
            eventContainers[i].innerHTML += `
                <b class= "EventTitle">${event.title}</b>
                <p>${start.getUTCHours()}:${String(start.getUTCMinutes()).padStart(2, '0')} - ${end.getUTCHours()}:${String(end.getUTCMinutes()).padStart(2, '0')}</p>
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

//Trigger first button
DateButtons[0].click();

});