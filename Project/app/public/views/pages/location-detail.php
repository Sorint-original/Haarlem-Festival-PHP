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
        <img src="/assets/images/history/Saint%20Bravo%201.jpg" class="img-sixty-right mb-4" alt="St Bavo 1">
        <img src="/assets/images/history/Saint%20Bravo%202.jpg" class="img-sixty-right mb-4" alt="St Bavo 2">
        <img src="/assets/images/history/Saint%20Bravo%203.jpg" class="img-sixty-right mb-4" alt="St Bavo 3">
        <img src="/assets/images/history/Saint%20Bravo%204.png" class="img-sixty-right mb-4" alt="St Bavo 4">
      <?php elseif ($location->slug === 'jopenkerk'): ?>
        <img src="/assets/images/jopenkerk_1.jpg" class="img-sixty-right mb-4" alt="Jopenkerk 1">
        <img src="/assets/images/jopenkerk_2.jpg" class="img-sixty-right mb-4" alt="Jopenkerk 2">
      <?php elseif ($location->slug === 'molen-adriaan'): ?>
        <img src="/assets/images/molen_adriaan_1.jpg" class="img-sixty-right mb-4" alt="Molen Adriaan 1">
        <img src="/assets/images/molen_adriaan_2.jpg" class="img-sixty-right mb-4" alt="Molen Adriaan 2">
        <?php elseif ($location->slug === 'grote-markt'): ?>
        <img src="/assets/images/history/grote_markt_1.jpg" class="img-sixty-right mb-4" alt="Grote Markt">
      <?php elseif ($location->slug === 'de-hallen'): ?>
        <img src="/assets/images/history/de_hallen_1.jpg" class="img-sixty-right mb-4" alt="De Hallen">
      <?php elseif ($location->slug === 'proveniershof'): ?>
        <img src="/assets/images/history/proveniershof_1.jpg" class="img-sixty-right mb-4" alt="Proveniershof">
      <?php elseif ($location->slug === 'waalse-kerk'): ?>
        <img src="/assets/images/history/waalse_kerk_1.jpg" class="img-sixty-right mb-4" alt="Waalse Kerk Haarlem">
      <?php elseif ($location->slug === 'amsterdamse-poort'): ?>
        <img src="/assets/images/history/amsterdamse_poort_1.jpg" class="img-sixty-right mb-4" alt="Amsterdamse Poort">
      <?php elseif ($location->slug === 'hof-van-bakenes'): ?>
        <img src="/assets/images/history/hof_van_bakenes_1.jpg" class="img-sixty-right mb-4" alt="Hof van Bakenes">
      <?php else: ?>
        <p><em>No images available for this location.</em></p>
      <?php endif; ?>
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
