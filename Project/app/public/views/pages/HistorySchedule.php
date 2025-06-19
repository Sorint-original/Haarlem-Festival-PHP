<?php
$page_type = "history";
require(__DIR__ . "/../partials/header.php");
require_once(__DIR__ . "/../../models/EventModel.php");
require_once(__DIR__ . "/../../models/PageModel.php");
$pageModel = new PageModel();
$tourInfo = $pageModel->getPageByIdentifier("history-tour-info");
$model = new EventModel();
$schedules = $model->getAllHistoryEvents();


// Group by title and format timeslots
$grouped = [];

foreach ($schedules as $event) {
    $title = $event->title;
    if (!isset($grouped[$title])) {
        $grouped[$title] = [
            "title" => $title,
            "timeslots" => []
        ];
    }

    $grouped[$title]["timeslots"][] = [
        "time" => date("H:i", strtotime($event->startTime->toDateTime()->format("c"))) . ' - ' .
                 date("H:i", strtotime($event->endTime->toDateTime()->format("c"))),
        "language" => $event->language,
        "seatsLeft" => $event->availableSeats,
        "price" => $event->price
    ];
}
?>

<style>
  .go-back-btn {
  font-weight: bold;
  font-size: 1rem;
  border-radius: 0.5rem;
  padding: 0.4rem 1rem;
  background-color: white;
  border: 2px solid #aaa;
  transition: all 0.2s ease-in-out;
  display: inline-block;
}

.go-back-btn:hover {
  background-color: #eee;
  color: black;
  border-color: #888;
  text-decoration: none;
}

body {
  background: linear-gradient(to bottom, #ffe0f0, #f0d6ff);
  font-family: 'Segoe UI', sans-serif;
  color: #222;
}
/* Banner Section */
.schedule-banner {
  position: relative;
  text-align: center;
}
.schedule-banner img {
  width: 100%;
  height: 300px;
  object-fit: cover;
  filter: brightness(0.7);
}
.schedule-title {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size: 4rem;
  font-weight: bold;
  background: linear-gradient(to right, #ff00c8, #6a00ff);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
/* Content Styling */
.container {
  padding: 2rem;
  max-width: 1200px;
  margin: auto;
}
h2 {
  font-size: 2rem;
  margin-bottom: 1rem;
}
/* Table Styling */
.table {
  background: white;
  border-radius: 1rem;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.table th {
  background: #f7eaff;
  font-size: 1.2rem;
  padding: 1rem;
}
.table td {
  padding: 1rem;
  font-size: 1.05rem;
  vertical-align: middle;
}
/* Navigation Arrows */
#schedule-date-header {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-bottom: 1rem;
}
.arrow-btn {
  background: linear-gradient(to right, #a100ff, #ff0080);
  color: white;
  border: none;
  border-radius: 50%;
  font-size: 1.5rem;
  width: 2.5rem;
  height: 2.5rem;
  margin: 0 1rem;
  box-shadow: 0 0 10px rgba(255, 0, 132, 0.4);
}
#schedule-date {
  font-size: 1.5rem;
  font-weight: bold;
}
/* Book Now Button */
.btn-primary {
  background: linear-gradient(to right, #ff6ec4, #7873f5);
  border: none;
  padding: 0.5rem 1rem;
  font-weight: bold;
  color: white;
  border-radius: 0.5rem;
  transition: all 0.3s ease;
}
.btn-primary:hover {
  background: linear-gradient(to right, #ff80dc, #6f63f6);
  transform: scale(1.05);
}
</style>

<section class="history-schedule">
  <div class="container">
    <div class="d-flex align-items-center justify-content-between mb-4 flex-wrap">
      <a href="/history" class="btn btn-outline-dark go-back-btn">← Back to History</a>
      <h2 class="text-center flex-grow-1 m-0">Schedule and Tour Details</h2>
      <div style="width: 130px;"></div> <!-- symmetrical spacing -->
    </div>

    <div class="row gx">
      <div class="col-md-5">
      <p><strong>Important Notes:</strong><br>
        <?php foreach ($tourInfo->importantNotes as $note): ?>
          <?= $note ?><br>
        <?php endforeach; ?>
        Languages: <?= implode(", ", $tourInfo->languages) ?>
      </p>  
      
      
      <ul>
            <li><strong>Dates:</strong> <?= $tourInfo->dateRange->start ?> – <?= $tourInfo->dateRange->end ?></li>
            <li><strong>Duration:</strong> <?= $tourInfo->duration ?></li>
            <li><strong>Starting Point:</strong> <?= $tourInfo->startingPoint ?></li>
            <li><strong>Group Size:</strong> <?= $tourInfo->groupSize ?></li>
            <li><strong>Prices:</strong><br>
              &nbsp;&nbsp;Regular: €<?= number_format($tourInfo->prices->regular, 2) ?><br>
              &nbsp;&nbsp;Family (<?= $tourInfo->prices->family->people ?> people):
              €<?= number_format($tourInfo->prices->family->price, 2) ?> <?= $tourInfo->prices->family->note ?>
            </li>
        </ul>
      </div>

      <div class="col-md-7">
        <div id="schedule-date-header" class="text-center mb-3">
          <button id="prevDate" class="arrow-btn">&#8592;</button>
          <span id="schedule-date" class="px-3 py-2 rounded bg-gradient">Date</span>
          <button id="nextDate" class="arrow-btn">&#8594;</button>
        </div>

        <table class="table text-center">
          <thead>
            <tr>
              <th>Time</th>
              <th>Tour Language</th>
              <th>Seats Left</th>
              <th>Price</th>
              <th></th>
            </tr>
          </thead>
          <tbody id="schedule-rows">
            <!-- JavaScript will populate rows here -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<script>
const schedules = <?php echo json_encode(array_values($grouped)); ?>;
let currentIndex = 0;

const dateDisplay = document.getElementById('schedule-date');
const rowsContainer = document.getElementById('schedule-rows');

document.getElementById('prevDate').onclick = () => {
  currentIndex = (currentIndex - 1 + schedules.length) % schedules.length;
  renderSchedule();
};
document.getElementById('nextDate').onclick = () => {
  currentIndex = (currentIndex + 1) % schedules.length;
  renderSchedule();
};

function renderSchedule() {
  const schedule = schedules[currentIndex];
  dateDisplay.textContent = schedule.title;
  rowsContainer.innerHTML = '';

  schedule.timeslots.forEach(slot => {
    const tr = document.createElement('tr');
    tr.innerHTML = `
      <td>${slot.time}</td>
      <td>${slot.language}</td>
      <td>${slot.seatsLeft}</td>
      <td>€${slot.price.toFixed(2)}</td>
      <a href="/tickets" class="btn btn-sm btn-primary">Book now</a>
    `;
    rowsContainer.appendChild(tr);
  });
}

renderSchedule();
</script>

<?php
require(__DIR__ . "/../partials/footer.php");
?>
