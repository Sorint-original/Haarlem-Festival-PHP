document.addEventListener('DOMContentLoaded', async () => {
    //The events order is Jazz, Stories, History, Yummy
    const eventTypes = ['jazz', 'story', 'history', 'yummy'];
    const EventButtons =document.getElementsByClassName('eventbtn');
    const DayButtons =document.getElementsByClassName('daybtn');
    const displayList = document.getElementById('ticket-display');
    const cartList = document.getElementById('cart-display');
    const cartTotal = document.getElementById('CartTotal');
    const EmptyButton = document.getElementById('EmptyCart');

    const urlParams = new URLSearchParams(window.location.search);
    var currentEvent = Number(urlParams.get('event')) ?? 0;  // Force number conversion
    var currentDay = Number(urlParams.get('day')) ?? 0;
    var cart;

    EventButtons[currentEvent].classList.add("active");
    DayButtons[currentDay].classList.add("active");

    EmptyButton.addEventListener('click', () => {
            emptyCart();
            cart.CartItems = [];
            cartList.innerHTML = '';
            UpdateTotalSum();
        });


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
        DisplayeventsTickets(events);
    };

    function DisplayeventsTickets(events){
        events.forEach(event => {
            var start = new Date(parseInt(event.startTime.$date.$numberLong));
            var end= new Date(parseInt(event.endTime.$date.$numberLong));
            switch(currentEvent) {
                case 0://Jazz
                    if(typeof event.tickets[0] != 'undefined' && event.availableSeats > 0){//My events with no ticket are free entry and you don't need to buy anything
                        displayList.innerHTML += `<li><p class="h3 ">${event.title} 
                        ${start.getUTCHours()}:${String(start.getUTCMinutes()).padStart(2, '0')} - ${end.getUTCHours()}:${String(end.getUTCMinutes()).padStart(2, '0')} 
                        ${event.location} 
                        (${event.availableSeats} seats left): 
                        €${event.tickets[0].price}
                        <button class ="h4 jazz-btn  p-2 ms-5" onclick="addtoCart('${event.tickets[0]._id.$oid}')">Buy Tickets</button></p></li>`;
                    }
                    break;
                case 1://story
                     if(typeof event.tickets[0] != 'undefined' && event.availableSeats > 0){//My events with no ticket are free entry and you don't need to buy anything
                        displayList.innerHTML += `<li><p class="h3 ">${event.title} 
                        ${start.getUTCHours()}:${String(start.getUTCMinutes()).padStart(2, '0')} - ${end.getUTCHours()}:${String(end.getUTCMinutes()).padStart(2, '0')} 
                        ${event.location} 
                        (${event.availableSeats} seats left): 
                        €${event.tickets[0].price}
                        <button class ="h4 jazz-btn  p-2 ms-5" onclick="addtoCart('${event.tickets[0]._id.$oid}')">Buy Tickets</button></p></li>`;
                    }
                    break;
                case 2://history
                     if(typeof event.tickets[0] != 'undefined' && event.availableSeats > 0){//My events with no ticket are free entry and you don't need to buy anything
                        displayList.innerHTML += `<li><p class="h3 ">${event.title} 
                        ${start.getUTCHours()}:${String(start.getUTCMinutes()).padStart(2, '0')} - ${end.getUTCHours()}:${String(end.getUTCMinutes()).padStart(2, '0')} 
                        ${event.location} 
                        (${event.availableSeats} seats left): 
                        €${event.tickets[0].price}
                        <button class ="h4 jazz-btn  p-2 ms-5" onclick="addtoCart('${event.tickets[0]._id.$oid}')">Buy Tickets</button></p></li>`;
                    }
                    break;
                case 3://yummy
                     if(typeof event.tickets[0] != 'undefined' && event.availableSeats > 0){//My events with no ticket are free entry and you don't need to buy anything
                        displayList.innerHTML += `<li><p class="h3 ">${event.title} 
                        ${start.getUTCHours()}:${String(start.getUTCMinutes()).padStart(2, '0')} - ${end.getUTCHours()}:${String(end.getUTCMinutes()).padStart(2, '0')} 
                        ${event.location} 
                        (${event.availableSeats} seats left): 
                        €${event.tickets[0].price}
                        <button class ="h4 jazz-btn  p-2 ms-5" onclick="addtoCart('${event.tickets[0]._id.$oid}')">Buy Tickets</button></p></li>`;
                    }
                    break;
                
            }
        });


    }

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
        return  response.json(); 
    }

    const emptyCart = async()=>{
        const response = await fetch("/tickets/emptyCart", { // URL remains unchanged
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
            }
        });
        if (!response.ok) {
            throw new Error('Failed to fetch events');
        }
    }

    const createListItem = async (ticket_id) => {
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
        return  response.json(); 
    };

    const RemoveListItem = async (lItem_id) => {
        const response = await fetch("/tickets/removeFromCart", { // URL remains unchanged
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ lItem_id })// Send the day and type in the request body
        });
        if (!response.ok) {
            throw new Error('Failed to fetch events');
        }
    };

    const UpdateAmount = async (lItem_id,increment) => {
        console.log(lItem_id);
        const response = await fetch("/tickets/UpdateAmount", { // URL remains unchanged
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ lItem_id, increment })// Send the day and type in the request body
        });
        if (!response.ok) {
            throw new Error('Failed to fetch events');
        }

        return response.json(); //falls or true
    };

    window.addtoCart = async function(ticketId) {
        respons = await createListItem(ticketId);
        //Update Cart
        console.log(respons);
        if(respons != 'unchanged'){
            cart.CartItems.push(respons);
            DisplayIteminCart(respons);
            UpdateTotalSum();
        }
    }

    async function  DisplayCart(){
        cartList.innerHTML = '';
        //displayCart
        //each cart Item is a listItem but it also contains, Item.ticket, Item.event
        cart.CartItems.forEach(Item =>{
            DisplayIteminCart(Item)
        })
        UpdateTotalSum();
    }

    function DisplayIteminCart(Item){
        if(Item.event){
                var start = new Date(parseInt(Item.event.startTime.$date.$numberLong));
                var end= new Date(parseInt(Item.event.endTime.$date.$numberLong));
                const startDate = `${String(start.getUTCMonth() + 1).padStart(2, '0')}-${String(start.getUTCDate()).padStart(2, '0')}`;
                cartList.innerHTML += `<li class="d-flex flex-row justify-content-between py-1" data-item-id="${Item._id.$oid}"><p class="h3 m-0" >${Item.event.title} 
                    ${startDate}
                    ${start.getUTCHours()}:${String(start.getUTCMinutes()).padStart(2, '0')} - ${end.getUTCHours()}:${String(end.getUTCMinutes()).padStart(2, '0')} 
                    ${Item.event.location} </p>
                    <div class="d-flex flex-row  align-items-center"><p class="h3 m-0 pe-1 item-price">€${Item.ticket.price * Item.amount}</p>
                    <button class="btn btn-danger bi bi-dash-lg" data-action="decrease"></button>
                    <p class="h3 m-0 px-1 item-amount">${Item.amount}</p>
                    <button class="btn btn-success bi bi-plus-lg" data-action="increase"></button>
                    <button class ="h4 btn btn-danger p-2 m-0 ms-1" data-action="remove">Remove from cart</button></div></li>`;
            }
            else{ /// for tickets that are not designeted for specific events like jazz week pass
                cartList.innerHTML += `<li class="d-flex flex-row justify-content-between py-1" data-item-id="${Item._id.$oid}"><p class="h3 m-0">${Item.ticket.EventId}</p>
                    <div class="d-flex flex-row  align-items-center"><p class="h3 m-0 pe-1 item-price">€${Item.ticket.price * Item.amount}</p>
                    <button class="btn btn-danger bi bi-dash-lg" data-action="decrease"></button>
                    <p class="h3 m-0 px-1 item-amount">${Item.amount}</p>
                    <button class="btn btn-success bi bi-plus-lg" data-action="increase"></button>
                    <button class ="h4 btn btn-danger p-2 m-0 ms-1" data-action="remove">Remove from cart</button></div></li>`;
            }
    }

    function UpdateTotalSum(){
        TotalPrice=0;
        cart.CartItems.forEach(Item =>{
            TotalPrice += Item.ticket.price * Item.amount;
        })
        cartTotal.innerHTML = `Total : €${TotalPrice}`;
    }

    // Add this outside your UpdateCart function
    cartList.addEventListener('click', async (e) => {
        const button = e.target.closest('[data-action]');
        if (!button) return;
        
        const listItem = button.closest('li');
        const itemId = listItem.dataset.itemId;
        const action = button.dataset.action;
        const index = cart.CartItems.findIndex(item => item._id.$oid.toString() === itemId);
        

        if (action === 'remove' || (action === 'decrease' && cart.CartItems[index].amount==1)) {
            await RemoveListItem(itemId);

            listItem.remove();
            console.log(index);
            cart.CartItems.splice(index, 1); // Remove 1 item at the found index
            console.log(cart.CartItems);
        } else {
            if(action === 'increase'){
                if(await UpdateAmount(itemId, 1)){
                    cart.CartItems[index].amount +=1;
                }
            }
            else{
                await UpdateAmount(itemId,-1)
                cart.CartItems[index].amount -=1;
            }
            // Update the amount display
            const amountElement = listItem.querySelector('.item-amount');
            amountElement.textContent = cart.CartItems[index].amount;
            
            // Update the price display
            const priceElement = listItem.querySelector('.item-price');
            priceElement.textContent = `€${cart.CartItems[index].ticket.price * cart.CartItems[index].amount}`;
        }
        
        // Recalculate and update the total
        UpdateTotalSum();
        
    });

    cart = await getCart();
    DisplayCart();
    UpdateTicketList();
});