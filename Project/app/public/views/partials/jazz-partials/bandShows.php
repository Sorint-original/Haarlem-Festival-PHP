<section class="jazz-Section py-5 w-75 align-self-center d-flex flex-column">
    <header class="h1 align-self-left ps-5 py-3">Festival Schedule</header>
    <?php foreach($shows as $show){ ?>
        <div class="d-flex flex-row w-100 justify-content-around align-items-center flex-wrap">
            <p class="h2 px-1"><?php echo date('M l d H:i-',((int) (string) $show->startTime)/ 1000).date('H:i',((int) (string) $show->endTime)/ 1000); ?></p>
            <p class="h2 px-1"><?php echo $show->location." (".$show->availableSeats." seats left)" ; ?></p>
            <p class="h2 px-1">
                <?php 
                if(isset($show->tickets[0])){echo "Ticket price: ".$show->tickets[0]->price."€"  ;}
                else{echo "Free Entry";}
                  ?>
            </p>
            <button class ="h4 jazz-btn  p-2">Buy Tickets</button>
        </div>
    <?php }?>
</section>