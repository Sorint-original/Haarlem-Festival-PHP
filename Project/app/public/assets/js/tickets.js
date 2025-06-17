document.addEventListener('DOMContentLoaded', () => {
    //The events order is Jazz, Stories, History, Yummy
    const eventTypes = ['jazz', 'story', 'history', 'yummy'];
    const EventButtons =document.getElementsByClassName('eventbtn');
    const DayButtons =document.getElementsByClassName('daybtn');
    const displayList = document.getElementById('ticket-display');

    const urlParams = new URLSearchParams(window.location.search);
    var currentEvent = Number(urlParams.get('event')) ?? 0;  // Force number conversion
    var currentDay = Number(urlParams.get('day')) ?? 0;

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

    const getSpecialJazzPasses = async () => {
        const response = await fetch('/tickets/jazzPasses', { // URL remains unchanged
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            }
        });
        if (!response.ok) {
            throw new Error('Failed to fetch events');
        }
        return await response.json(); // Assuming the server returns JSON data
    };
    const JazzExtraStep = async ()=>{
        var passes = await getSpecialJazzPasses();
        displayList.innerHTML += `<li><p class="h3 "> All-Access pass for a day - €35 <button class ="h4 jazz-btn  p-2 ms-5" onclick="addtoCart('${passes['daypass']._id.$oid}')">Buy Tickets</button></p></li>`;
        displayList.innerHTML += `<li><p class="h3 "> All-Access pass for 4 days - €35 <button class ="h4 jazz-btn  p-2 ms-5" onclick="addtoCart('${passes['weekpass']._id.$oid}')">Buy Tickets</button></p></li>`;
    };

    const UpdateTicketList = async () => {
        displayList.innerHTML ='';
        var events  = await getEventsAndTickets(eventTypes[currentEvent],currentDay);
        //extra steps based on event type
        switch(currentEvent) {
            case 0://Jazz
                await JazzExtraStep();
                break;
        }
        //display based on current event
        await DisplayeventsTickets(events);
    };

    const DisplayeventsTickets =(events) =>{
        events.forEach(event => {
            var start = new Date(parseInt(event.startTime.$date.$numberLong));
            var end= new Date(parseInt(event.endTime.$date.$numberLong));
            switch(currentEvent) {
                case 0://Jazz
                    if(typeof event.tickets[0] != 'undefined'){
                        displayList.innerHTML += `<li><p class="h3 ">${event.title} 
                        ${start.getUTCHours()}:${String(start.getUTCMinutes()).padStart(2, '0')} - ${end.getUTCHours()}:${String(end.getUTCMinutes()).padStart(2, '0')} 
                        ${event.location} 
                        (${event.availableSeats} seats left): 
                        €${event.tickets[0].price}
                        <button class ="h4 jazz-btn  p-2 ms-5" onclick="addtoCart('${event.tickets[0]._id.$oid}')">Buy Tickets</button></p></li>`;
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

    const createListItem = async (ticket_id) => {
        console.log(ticket_id);
        const response = await fetch("/tickets/addInCart", { // URL remains unchanged
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ ticket_id })// Send the day and type in the request body
        });
        if (!response.ok) {
            throw new Error('Failed to fetch events');
        }
        return  response.json(); // Assuming the server returns JSON data
    };

    const getCart = async ()=>{
        const response = await fetch("/tickets/cart", { // URL remains unchanged
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            }
        });
        if (!response.ok) {
            throw new Error('Failed to fetch events');
        }
        return  response.json(); // Assuming the server returns JSON data
    }
    

    window.addtoCart = function(ticketId) {
        createListItem(ticketId);
        //Update Cart
    }

    
    getCart();
    UpdateTicketList();
});