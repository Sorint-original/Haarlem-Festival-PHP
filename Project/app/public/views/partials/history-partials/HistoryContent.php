<?php
require_once(__DIR__ . "/../../../models/LocationModel.php");
$locationModel = new LocationModel();
$locations = $locationModel->getAllLocations();
?>

<button class="align-self-center h3 history-btn p-2"><?php echo $page->Buttons->scroll; ?></button>

<section class="history-intro py-5 history-background">
  <div class="container">
    <div class="row text-center">
      <div class="col-lg-12">
        <h2 class="text-black"><?php echo $page->header1; ?></h2>
        <p class="text-black lead"><?php echo $page->HistoryIntro; ?></p>
      </div>
    </div>
  </div>
</section>

<div class="d-flex flex-row w-100">
  <info class="d-flex flex-column w-50">
    <div>
      <h1><?php echo $page->StoryHaarlem->header; ?></h1>
      <p><?php echo $page->StoryHaarlem->text; ?></p>
    </div>

    <div>
      <h2><?php echo $page->GrowthTimeline->header; ?></h2>
      <ul>
        <li><?php echo $page->GrowthTimeline->l1; ?></li>
        <li><?php echo $page->GrowthTimeline->l2; ?></li>
        <li><?php echo $page->GrowthTimeline->l3; ?></li>
        <li><?php echo $page->GrowthTimeline->l4; ?></li>
        <li><?php echo $page->GrowthTimeline->l5; ?></li>
        <li><?php echo $page->GrowthTimeline->l6; ?></li>
      </ul>
    </div>

    <div>
      <h1><?php echo $page->CityInovation->header1; ?></h1>
      <h2><?php echo $page->CityInovation->header2; ?></h2>
      <ul>
        <li><?php echo $page->CityInovation->l1; ?></li>
        <li><?php echo $page->CityInovation->l2; ?></li>
        <li><?php echo $page->CityInovation->l3; ?></li>
      </ul>
    </div>

    <div>
      <h1><?php echo $page->HistoricalSignificance->header; ?></h1>
      <p><?php echo $page->HistoricalSignificance->info; ?></p>
      <ul>
        <li><?php echo $page->HistoricalSignificance->l1; ?></li>
        <li><?php echo $page->HistoricalSignificance->l2; ?></li>
        <li><?php echo $page->HistoricalSignificance->l3; ?></li>
        <li><?php echo $page->HistoricalSignificance->l4; ?></li>
        <li><?php echo $page->HistoricalSignificance->l5; ?></li>
      </ul>
    </div>
  </info>

  <div class="d-flex flex-column align-items-center w-50">
    <img class="w-75 py-1" src="assets/images/history/History map 1.jpg">
    <img class="w-75 py-5" src="assets/images/history/Old haarlem.jpg">
  </div>
</div>

<section class="history-intro py-5 history-background">
  <div class="container">
    <div class="row text-center">
      <div class="col-lg-12">
        <h2 class="text-black"><?php echo $page->HaarlemTour->header; ?></h2>
        <p class="text-black lead"><?php echo $page->HaarlemTour->paragraph; ?></p>
      </div>
    </div>
  </div>
</section>

<!-- DYNAMIC LANDMARK CARD LAYOUT -->
<section class="container py-5">
  <div class="row justify-content-center text-center">
    <?php foreach ($locations as $loc): ?>
      <div class="col-md-4 mb-4">
        <a href="/history/location/<?php echo htmlspecialchars($loc->slug); ?>" class="text-decoration-none text-dark">
          <div class="card h-100 shadow-sm border-warning border-3">
            <div class="card-body">
              <h5 class="card-title fw-bold"><?php echo htmlspecialchars($loc->title); ?></h5>
              <p class="card-text"><?php echo htmlspecialchars($loc->description); ?></p>
            </div>
          </div>
        </a>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<div class="d-flex flex-row w-100">
  <div class="d-flex flex-column align-items-center w-50">
    <!-- Add anything here if needed -->
  </div>
</div>

<info class="w-75">
  <div>
    <h1><?php echo $page->HeartOfHaarlem->header; ?></h1>
    <p><?php echo $page->HeartOfHaarlem->paragraph; ?></p>
  </div>

  <div>
    <h2><?php echo $page->TourChoice->header; ?></h2>
    <ul>
      <li><?php echo $page->TourChoice->l1; ?></li>
      <li><?php echo $page->TourChoice->l2; ?></li>
      <li><?php echo $page->TourChoice->l3; ?></li>
    </ul>
  </div>

  <div>
    <h2><?php echo $page->AwaitsYou->header; ?></h2>
    <ul>
      <li><?php echo $page->AwaitsYou->l1; ?></li>
      <li><?php echo $page->AwaitsYou->l2; ?></li>
      <li><?php echo $page->AwaitsYou->l3; ?></li>
    </ul>
  </div>
</info>

<p class="text-center text-black lead py-5 px-5 mx-5">
  <?php echo $page->StoryHaarlem->outro; ?>
</p>

<div class="d-flex justify-content-around">
 <a href="/history/schedule" class="btn btn-outline-dark history-btn p-2 h3">View Schedule</a>
  <button class="h3 history-btn p-2"><?php echo $page->Buttons->buy; ?></button>
</div>
