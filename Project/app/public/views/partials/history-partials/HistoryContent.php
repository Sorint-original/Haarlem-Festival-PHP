
<button class ="align-self-center h3 history-btn p-2"><?php echo $page->Buttons->scroll;?></button>
<section class= "history-intro py-5 history-background">
  <div class="container">
    <div class="row text-center">
      <div class="col-lg-12">
        <h2 class= "text-black"> <?php echo $page->header1;?></h2>
        <p class="text-black lead">
        <?php echo $page->HistoryIntro;?>
        </p>
      </div>
    </div>
  </div> 
</section>

<div class="d-flex flex-row w-100">
    <info class="d-flex flex-column w-50">
        <div>
            <h1><?php echo $page->StoryHaarlem->header;?></h1>
            <p>
            <?php echo $page->StoryHaarlem->text;?>
            </p>
        </div>
        <div>
            <h2><?php echo $page->GrowthTimeline->header;?></h2>
            <ul>
                <li><?php echo $page->GrowthTimeline->l1;?></li>
                <li><?php echo $page->GrowthTimeline->l2;?></li>
                <li><?php echo $page->GrowthTimeline->l3;?></li>
                <li><?php echo $page->GrowthTimeline->l4;?></li>
                <li><?php echo $page->GrowthTimeline->l5;?></li>
                <li><?php echo $page->GrowthTimeline->l6;?></li>
            </ul>
        </div>
        

  
        <div>   
                <h1><?php echo $page->CityInovation->header1;?></h1>
                <h2><?php echo $page->CityInovation->header2;?></h2>                    
                    <ul>
                        <li><?php echo $page->CityInovation->l1;?></li>
                        <li><?php echo $page->CityInovation->l2;?></li>
                        <li><?php echo $page->CityInovation->l3;?></li>
                    </ul>
            </div>
            <div>
                <div>
                <h1><?php echo $page->HistoricalSignificance->header;?></h1>
                <p><?php echo $page->HistoricalSignificance->info;?></p>                  
                    <ul>
                        <li><?php echo $page->HistoricalSignificance->l1;?></li> 
                        <li><?php echo $page->HistoricalSignificance->l2;?></li> 
                        <li><?php echo $page->HistoricalSignificance->l3;?></li>
                        <li><?php echo $page->HistoricalSignificance->l4;?></li> 
                        <li><?php echo $page->HistoricalSignificance->l5;?></li>
                    </ul>
                </div>
            </div>
    </info>
    <div class="d-flex flex-column align-items-center w-50">
    <img class="w-75 py-1" src= "assets/images/history/History map 1.jpg">
    <img class="w-75 py-5" src= "assets/images/history/Old haarlem.jpg">
    </div>
</div> 

          <section class= "history-intro py-5 history-background">
  <div class="container">
    <div class="row text-center">
      <div class="col-lg-12">
        <h2 class= "text-black"> <?php echo $page->HaarlemTour->header;?></h2>
            <p class="text-black lead">
            <?php echo $page->HaarlemTour->paragraph;?>
            </p>
      </div>
    </div>
  </div> 
</section>






<div class="landmarks-container">
              <div class="landmark-wrapper">
                  <div class="landmark-item">
                      <a href="images/st_bavokerk.jpg">
                          <img src="images/st_bavokerk.jpg" class="landmark-img" alt="St Bavokerk">
                      </a>
                      <p class="landmark-title">St Bavokerk</p>
                      <p class="landmark-text">A Gothic masterpiece since the 13th century.</p>
                  </div>
                  <div class="landmark-item">
                      <a href="images/jopenkerk.jpg">
                          <img src="images/jopenkerk.jpg" class="landmark-img" alt="Jopenkerk">
                      </a>
                      <p class="landmark-title">Jopenkerk</p>
                      <p class="landmark-text">A former church turned brewery.</p>
                  </div>
                  <div class="landmark-item">
                      <a href="images/molen_adriaan.jpg">
                          <img src="images/molen_adriaan.jpg" class="landmark-img" alt="Molen De Adriaan">
                      </a>
                      <p class="landmark-title">Molen De Adriaan</p>
                      <p class="landmark-text">A historic windmill offering breathtaking views.</p>
                  </div>
              </div>
          </div>



          <div class="d-flex flex-row w-100">
    
    <div class="d-flex flex-column align-items-center w-50">
    
    </div>
        
</div> 
<info class="w-75">
        <div>
            <h1><?php echo $page->HeartOfHaarlem->header;?></h1>
                <p>
                <?php echo $page->HeartOfHaarlem->paragraph;?>
                </p>
        </div>
        <div>
            <h2><?php echo $page->TourChoice->header;?></h2>
            <ul>   
                <li>
                <?php echo $page->TourChoice->l1;?>
                </li>
                <li>
                <?php echo $page->TourChoice->l2;?>
                </li>
                <li>
                <?php echo $page->TourChoice->l3;?>
                </li>
            </ul>
        </div>
            <div>   
                <h2><?php echo $page->AwaitsYou->header;?></h2>                    
                    <ul>
                        <li><?php echo $page->AwaitsYou->l1;?></li>
                        <li><?php echo $page->AwaitsYou->l2;?></li>
                        <li><?php echo $page->AwaitsYou->l3;?></li>
                    </ul>
            </div>
                            
</info>
    <p class="text-center text-black lead py-5 px-5 mx-5">
        <?php echo $page->StoryHaarlem->outro;?>   
    </p>
<div class="d-flex justify-content-around">
<button class ="h3 history-btn p-2"><?php echo $page->Buttons->view;?></button>
<button class ="h3 history-btn p-2"><?php echo $page->Buttons->buy;?></button>
</div>
