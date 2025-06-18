


<section class="jazz-Section my-5">
    <div class ="d-flex flex-row justify-content-center py-3">
        <div class="pe-5">
            <p class ="h1">All-Access pass for a day - €<?php echo $JazzPasses['daypass']->price; ?></p>
            <p class ="h1">All-Access pass for 4 days - €<?php echo $JazzPasses['weekpass']->price; ?></p>
        </div>
        <button class ="h1 jazz-btn ms-5 p-4" href="/tickets">Buy Tickets</button>
    </div>
    <menu id= "jazz-day" class = " w-100 p-0 m-0 d-flex flex-row justify-content-between align-items-center"> 
        <button type="button"  id="PrevDay"><img src = "/assets/images/jazz/Prev.png"></button>
        <header type="button"  id = "CurrentDay" class ="display-1 text-center"></header>
        <button type="button"  id="NextDay"><img src = "/assets/images/jazz/Next.png"></button>
    </menu>
    <div class ="d-flex flex-row d-flex justify-content-evenly w-100 py-3">
        <ul id="BandList" class = "d-flex flex-column  align-items-center container-fluid "> </ul>
        <ul id="TimeList" class = "d-flex flex-column  align-items-center container-fluid "> </ul>
        <ul id="LocationList" class = "d-flex flex-column  align-items-center container-fluid "> </ul>
        <ul id="SeatsList" class = "d-flex flex-column  align-items-center container-fluid "> </ul>
        <ul id="PriceList" class = "d-flex flex-column  align-items-center container-fluid "> </ul>
    </div>

</section>

<script src="/assets/js/JazzPage.js"></script>