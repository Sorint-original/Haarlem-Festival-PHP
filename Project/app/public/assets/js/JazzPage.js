document.addEventListener('DOMContentLoaded', () => {
    const DaySection = document.getElementById('jazz-day');
    const Cday = document.getElementById('CurrentDay');
    //Arrow buttons
    const PrevButton =document.getElementById('PrevDay');
    const NextButton =document.getElementById('NextDay');
    //Display collumns
    const BandList =document.getElementById('BandList');
    const TimeList =document.getElementById('TimeList');
    const LocationList =document.getElementById('LocationList');


    const dayBackgrounds = ['D0','D1','D2','D3',];
    const days = ['THURSDAY JUL 24', 'FRIDAY JUL 25','SATURDAY JUL 26','SUNDAY JUL 27'];
    var CurrentDay = 0;


    const SetDay = async() =>{
        DaySection.style.backgroundImage = `url(assets/images/jazz/${dayBackgrounds[CurrentDay]}.png)`;
        Cday.innerHTML =  days[CurrentDay];
        const events = await getDayEvents(CurrentDay);
        DisplayShows(events);
    }

    const DisplayShows =(events) =>{
        //clear the lists
        BandList.innerHTML = '<b class="h1 mb-3">Bands</b>'
        TimeList.innerHTML = '<b class="h1 mb-3">Time</b>'
        LocationList.innerHTML = '<b class="h1 mb-3">Location</b>'
        console.log(events);
        events.forEach(event => {
            const start = new Date(parseInt(event.startTime.$date.$numberLong));
            const end= new Date(parseInt(event.endTime.$date.$numberLong));
            BandList.innerHTML += `<a class="h3" href="/jazz/band/${event.band.$oid}">${event.title}</a>`
            TimeList.innerHTML += `<p class="h3 ">${start.getUTCHours()}:${String(start.getUTCMinutes()).padStart(2, '0')} - ${end.getUTCHours()}:${String(end.getUTCMinutes()).padStart(2, '0')}</p>`
            LocationList.innerHTML += `<p class="h3 ">${event.location}</p>`
        });
    }

    const getDayEvents = async (day) => {
        const response = await fetch('/jazz/get-events', { // URL remains unchanged
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

    const NextDay =() =>{
        CurrentDay += 1;
        if(CurrentDay == 4){
            CurrentDay=0;
        }
        SetDay();
    }

    const PrevDay =() =>{
        CurrentDay -= 1;
        if(CurrentDay == -1){
            CurrentDay=3;
        }
        SetDay();
    }

    PrevButton.addEventListener('click',  () => PrevDay());
    NextButton.addEventListener('click',  () => NextDay());
    
    SetDay();
});