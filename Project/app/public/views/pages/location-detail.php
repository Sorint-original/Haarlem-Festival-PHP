<?php
$page_type = "history";
$fontColoring = 'fontCdark';
$title = $location ? $location->title : "Location Not Found";

require(__DIR__ . "/../partials/header.php");
?>

<style>
  .img-sixty-right {
    width: 60%;
    height: auto;
    display: block;
    margin-left: auto;
    margin-right: 0;
  }
  .paragraph-spacing p {
    margin-bottom: 1.5rem;
  }
</style>

<?php if ($location): ?>
<section class="history-intro py-5 history-background">
  <div class="container text-center">
    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap">
      <a href="/history" class="btn btn-outline-dark go-back-btn">← Back to History</a>
    </div>
    <h2 class="text-black"><?php echo htmlspecialchars($location->title); ?></h2>
    <p class="text-black lead"><?php echo htmlspecialchars($location->description); ?></p>
  </div>
</section>

<div class="container my-5">
  <div class="row">
    <div class="col-md-6 paragraph-spacing">
      <h4><strong>📜 History</strong></h4>
      <p><?php echo nl2br(htmlspecialchars($location->history)); ?></p>

      <h4><strong>🏛️ Relevance</strong></h4>
      <p><?php echo nl2br(htmlspecialchars($location->relevance)); ?></p>

      <h4><strong>📍 Location</strong></h4>
      <p><?php echo nl2br(htmlspecialchars($location->locationIntro)); ?></p>
    </div>

    <div class="col-md-6">
  <?php if ($location->slug === 'st-bavo'): ?>
    <img src="/assets/images/history/Saint Bravo 1.jpg" class="img-sixty-right mb-4" alt="St Bavo 1">
    <img src="/assets/images/history/Saint Bravo 2.jpg" class="img-sixty-right mb-4" alt="St Bavo 2">
    <img src="/assets/images/history/Saint Bravo 3.jpg" class="img-sixty-right mb-4" alt="St Bavo 3">
    <img src="/assets/images/history/Saint Bravo 4.png" class="img-sixty-right mb-4" alt="St Bavo 4">

  <?php elseif ($location->slug === 'jopenkerk'): ?>
    <img src="/assets/images/history/Jopenkerk 1.jpg" class="img-sixty-right mb-4" alt="Jopenkerk 1">
    <img src="/assets/images/history/Jopenkerk 2.jpg" class="img-sixty-right mb-4" alt="Jopenkerk 2">

  <?php elseif ($location->slug === 'molen-adriaan'): ?>
    <img src="/assets/images/history/Molen de Adriaan 1.jpg" class="img-sixty-right mb-4" alt="Molen de Adriaan 1">
    <img src="/assets/images/history/Molen de Adriaan 2.jpg" class="img-sixty-right mb-4" alt="Molen de Adriaan 2">

  <?php elseif ($location->slug === 'grote-markt'): ?>
    <img src="/assets/images/history/Grote Markt 1.jpg" class="img-sixty-right mb-4" alt="Grote Markt 1">
    <img src="/assets/images/history/Grote Markt 2.jpg" class="img-sixty-right mb-4" alt="Grote Markt 2">
    <img src="/assets/images/history/Grote Markt 3.jpg" class="img-sixty-right mb-4" alt="Grote Markt 3">

  <?php elseif ($location->slug === 'de-hallen'): ?>
    <img src="/assets/images/history/De Hallen 1.jpg" class="img-sixty-right mb-4" alt="De Hallen 1">
    <img src="/assets/images/history/De Hallen 2.jpg" class="img-sixty-right mb-4" alt="De Hallen 2">

  <?php elseif ($location->slug === 'proveniershof'): ?>
    <img src="/assets/images/history/Proveniershof 1.jpg" class="img-sixty-right mb-4" alt="Proveniershof 1">
    <img src="/assets/images/history/Proveniershof 2.jpg" class="img-sixty-right mb-4" alt="Proveniershof 2">
    <img src="/assets/images/history/Proveniershof 3.jpg" class="img-sixty-right mb-4" alt="Proveniershof 3">

  <?php elseif ($location->slug === 'waalse-kerk'): ?>
    <img src="/assets/images/history/Waalse kerk 1.jpg" class="img-sixty-right mb-4" alt="Waalse Kerk 1">
    <img src="/assets/images/history/Waalse kerk 2.jpg" class="img-sixty-right mb-4" alt="Waalse Kerk 2">

  <?php elseif ($location->slug === 'amsterdamse-poort'): ?>
    <img src="/assets/images/history/Amsterdamse Poort 1.jpg" class="img-sixty-right mb-4" alt="Amsterdamse Poort">

  <?php elseif ($location->slug === 'hof-van-bakenes'): ?>
    <img src="/assets/images/history/Hof van Bakens 1.jpg" class="img-sixty-right mb-4" alt="Hof van Bakenes 1">
    <img src="/assets/images/history/Hof van Bakens 2.jpg" class="img-sixty-right mb-4" alt="Hof van Bakenes 2">

  <?php else: ?>
    <p><em>No images available for this location.</em></p>
  <?php endif; ?>
</div>

    </div>
  </div>
</div>

<?php else: ?>
<div class="container text-center py-5">
  <h2 class="text-danger">❌ Location not found</h2>
  <p>We couldn't find the location you're looking for.</p>
</div>
<?php endif; ?>

<?php require(__DIR__ . "/../partials/footer.php"); ?>
