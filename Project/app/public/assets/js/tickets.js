document.addEventListener('DOMContentLoaded', () => {
    //The events order is Jazz, Stories, History, Yummy
    const eventTypes = ['jazz', 'story', 'history', 'yummy'];
    const EventButtons =document.getElementsByClassName('eventbtn');
    const DayButtons =document.getElementsByClassName('daybtn');
    const displayList = document.getElementById('ticket-display');

    const urlParams = new URLSearchParams(window.location.search);
    var currentEvent =  urlParams.get('event') ?? '0';
    var currentDay = urlParams.get('day')?? '0';

    EventButtons[currentEvent].classList.add("active");
    DayButtons[currentDay].classList.add("active");


    Array.from(EventButtons).forEach((button, index) => {
        button.addEventListener('click', () => {
            EventButtons[currentEvent].classList.remove("active");
            currentEvent = index;
            EventButtons[currentEvent].classList.add("active");
            UpdateTicketList();
        });
    });

    Array.from(DayButtons).forEach((button, index) => {
        button.addEventListener('click', () => {
            DayButtons[currentDay].classList.remove("active");
            currentDay = index;
            DayButtons[currentDay].classList.add("active");
            UpdateTicketList();
        });
    });

    const getEventsAndTickets = async (type,day) => {
        const response = await fetch('/tickets/get-eventstickets', { // URL remains unchanged
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ type, day }),// Send the day and type in the request body
        });
        if (!response.ok) {
            throw new Error('Failed to fetch events');
        }
        return await response.json(); // Assuming the server returns JSON data
    };

    const UpdateTicketList = async () => {
        console.log(eventTypes[currentEvent]);
        var events  = await getEventsAndTickets(eventTypes[currentEvent],currentDay);
        //clear the lists
        displayList.innerHTML ='';
        //extra steps based on event type
        //display based on current event
        DisplayeventsTickets(events);
    }

    const DisplayeventsTickets =(events) =>{
        events.forEach(event => {
            var start = new Date(parseInt(event.startTime.$date.$numberLong));
            var end= new Date(parseInt(event.endTime.$date.$numberLong));
            switch(currentEvent) {
                case 0://Jazz
                if(typeof event.tickets[0] !== 'undefined'){
                    displayList.innerHTML += `<li><p class="h3 ">${event.title} 
                    ${start.getUTCHours()}:${String(start.getUTCMinutes()).padStart(2, '0')} - ${end.getUTCHours()}:${String(end.getUTCMinutes()).padStart(2, '0')} 
                    ${event.location} 
                    (${event.availableSeats} seats left): 
                    €${event.tickets[0].price}</p></li>`;
                }
                    break;
                case 1://story
                    
                    break;
                case 2://history
                    
                    break;
                case 3://yummy
                    
                    break;
                
            }
        });


    }


});