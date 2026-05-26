<?php
require_once "auth.php";
require_role(['organizer']);
require_once "dbaseconnection.php";

$activeTab = $_GET['tab'] ?? 'categories';
$searchInput = trim($_POST['searchinput'] ?? '');

/* =========================================================
   CATEGORIES
========================================================= */
if ($searchInput !== '' && $activeTab == 'categories') {
    $stmt = $conn->prepare("SELECT * FROM category WHERE category_id LIKE ? OR category_name LIKE ? ORDER BY category_id");
    $like = "%$searchInput%";
    $stmt->bind_param("ss", $like, $like);
    $stmt->execute();
    $categories = $stmt->get_result();
} else {
    $categories = $conn->query("SELECT * FROM category ORDER BY category_id");
}

/* =========================================================
   CONTESTANTS
========================================================= */
if ($searchInput !== '' && $activeTab == 'contestants') {
    $stmt = $conn->prepare("
        SELECT c.*, cat.category_name
        FROM contestants c
        JOIN category cat ON c.category_id = cat.category_id
        WHERE c.contestant_id LIKE ? OR c.contestant_name LIKE ? OR cat.category_name LIKE ? OR c.contestant_location LIKE ?
        ORDER BY cat.category_id, c.contestant_id
    ");
    $like = "%$searchInput%";
    $stmt->bind_param("ssss", $like, $like, $like, $like);
    $stmt->execute();
    $contestants = $stmt->get_result();
} else {
    $contestants = $conn->query("
        SELECT c.*, cat.category_name
        FROM contestants c
        JOIN category cat ON c.category_id = cat.category_id
        ORDER BY cat.category_id, c.contestant_id
    ");
}

/* =========================================================
   CRITERIA
========================================================= */
if ($searchInput !== '' && $activeTab == 'criteria') {
    $stmt = $conn->prepare("SELECT * FROM criteria WHERE criteria_id LIKE ? OR criteria_name LIKE ? OR criteria_weight LIKE ? ORDER BY criteria_id");
    $like = "%$searchInput%";
    $stmt->bind_param("sss", $like, $like, $like);
    $stmt->execute();
    $criteria = $stmt->get_result();
} else {
    $criteria = $conn->query("SELECT * FROM criteria ORDER BY criteria_id");
}

/* =========================================================
   SCORES
========================================================= */
if ($searchInput !== '' && $activeTab == 'scores') {
    $stmt = $conn->prepare("
        SELECT c.contestant_id, c.contestant_name, c.contestant_image, cat.category_name,
            ROUND(COALESCE(SUM(s.score_value * cr.criteria_weight / 100), 0), 2) AS total_score,
            COUNT(DISTINCT s.judge_id) AS vote_count
        FROM contestants c
        JOIN category cat ON c.category_id = cat.category_id
        LEFT JOIN scores s ON s.contestant_id = c.contestant_id
        LEFT JOIN criteria cr ON s.criteria_id = cr.criteria_id
        WHERE c.contestant_name LIKE ? OR cat.category_name LIKE ?
        GROUP BY c.contestant_id
        ORDER BY cat.category_id, total_score DESC
    ");
    $like = "%$searchInput%";
    $stmt->bind_param("ss", $like, $like);
    $stmt->execute();
    $scores = $stmt->get_result();
} else {
    $scores = $conn->query("
        SELECT c.contestant_id, c.contestant_name, c.contestant_image, cat.category_name,
            ROUND(COALESCE(SUM(s.score_value * cr.criteria_weight / 100), 0), 2) AS total_score,
            COUNT(DISTINCT s.judge_id) AS vote_count
        FROM contestants c
        JOIN category cat ON c.category_id = cat.category_id
        LEFT JOIN scores s ON s.contestant_id = c.contestant_id
        LEFT JOIN criteria cr ON s.criteria_id = cr.criteria_id
        GROUP BY c.contestant_id
        ORDER BY cat.category_id, total_score DESC
    ");
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CrownVote Organizer Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    :root { --gold:#c1984f; --navy:#23255d; --sidebar:#212325; }
    body { background:#1a1a2e; }
    .navbar.bg-dark { background-color:var(--navy) !important; }
    aside.bg-dark { background-color:var(--sidebar) !important; }
    .content-wrapper { flex-grow:1; height:100vh; overflow-y:auto; background:#1a1a2e; }
    .nav-pills .nav-link:hover { background-color:rgba(255,255,255,.1); color:#f8f9fa !important; }
    .nav-link.active { background-color:var(--gold) !important; }
    .bg-yellow { background-color:var(--gold); }
    .progress-bar { background:var(--gold); }
    .contestant-img { width:100%; height:260px; object-fit:cover; }
    .card.bg-secondary { background:#2c2f33 !important; }
  </style>
</head>
<body>

<!-- NAVBAR — same as admin -->
<nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top shadow-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="imagespvs/logo2.png" alt="logo" width="35" height="25"></a>
    <a class="navbar-brand fw-bold" href="#">CrownVote</a>
  </div>
</nav>

<div class="d-flex">

<!-- SIDEBAR -->
<aside class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width:280px;height:100vh;overflow-y:auto;">
  <div class="d-flex align-items-center mb-3 me-md-auto text-white text-decoration-none">
    <img src="imagespvs/admin.png" width="40" height="40" class="rounded-circle me-2">
    <div class="dropdown">
      <a href="#" class="text-white text-decoration-none dropdown-toggle fs-4" data-bs-toggle="dropdown">Organizer</a>
      <ul class="dropdown-menu shadow">
        <li><a class="dropdown-item" href="pageant_login.php?logout=1">Sign out</a></li>
      </ul>
    </div>
  </div>
  <hr>
  <h6 class="px-3 mt-2 mb-1 text-light text-uppercase small">Event Configuration</h6>
  <ul class="nav nav-pills flex-column mb-auto">
    <li>
      <a href="?tab=categories" class="nav-link text-white <?= $activeTab == 'categories' ? 'active' : '' ?>">
        <img src="imagespvs/category.png" width="20" height="20" class="me-2">Categories
      </a>
    </li>
    <li>
      <a href="?tab=contestants" class="nav-link text-white <?= $activeTab == 'contestants' ? 'active' : '' ?>">
        <img src="imagespvs/contestant.png" width="20" height="20" class="me-2">Contestants
      </a>
    </li>
    <li>
      <a href="?tab=criteria" class="nav-link text-white <?= $activeTab == 'criteria' ? 'active' : '' ?>">
        <img src="imagespvs/criteria.png" width="20" height="20" class="me-2">Criteria
      </a>
    </li>
    <li>
      <a href="?tab=scores" class="nav-link text-white <?= $activeTab == 'scores' ? 'active' : '' ?>">
        <img src="imagespvs/score.png" width="20" height="20" class="me-2">Scores
      </a>
    </li>
  </ul>
</aside>

<!-- MAIN CONTENT -->
<main class="content-wrapper p-4">
  <div class="p-4 bg-yellow shadow text-white mb-4 rounded">
    <h1 class="display-5 fw-normal mb-0">Organizer Dashboard</h1>
    <p class="lead mb-0 opacity-75">CrownVote Management System</p>
  </div>

  <!-- SEARCH FORM -->
  <form method="post" action="?tab=<?= $activeTab ?>" class="mb-4">
    <div class="row g-2">
      <div class="col-md-10">
        <input type="search" name="searchinput" class="form-control" placeholder="Search here..." value="<?= htmlspecialchars($searchInput) ?>">
      </div>
      <div class="col-md-2">
        <button class="btn btn-dark w-100">Search</button>
      </div>
    </div>
  </form>

  <!-- CATEGORIES -->
  <?php if($activeTab == 'categories'): ?>
  <h2 class="mb-4 text-white">Pageant Categories</h2>
  <div class="row g-4">
    <?php if($categories->num_rows > 0): ?>
      <?php foreach($categories as $row): ?>
      <div class="col-md-4">
        <div class="card bg-secondary text-white shadow h-100">
          <div class="card-body">
            <span class="badge bg-warning text-dark mb-2">ID: <?= $row['category_id'] ?></span>
            <h5><?= htmlspecialchars($row['category_name']) ?></h5>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="alert alert-warning">No categories found.</div>
    <?php endif; ?>
  </div>
  <?php endif; ?>

  <!-- CONTESTANTS -->
  <?php if($activeTab == 'contestants'): ?>
  <h2 class="mb-4 text-white">Contestants</h2>
  <div class="row g-4">
    <?php if($contestants->num_rows > 0): ?>
      <?php foreach($contestants as $row): ?>
      <div class="col-md-4">
        <div class="card bg-secondary text-white shadow h-100">
          <img src="imagespvs/<?= htmlspecialchars($row['contestant_image']) ?>" class="contestant-img card-img-top">
          <div class="card-body">
            <span class="badge bg-warning text-dark mb-2">#<?= $row['contestant_id'] ?></span>
            <h5><?= htmlspecialchars($row['contestant_name']) ?></h5>
            <p class="mb-1"><small>Category:</small> <?= htmlspecialchars($row['category_name']) ?></p>
            <p><small>Location:</small> <?= htmlspecialchars($row['contestant_location']) ?></p>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="alert alert-warning">No contestants found.</div>
    <?php endif; ?>
  </div>
  <?php endif; ?>

  <!-- CRITERIA -->
  <?php if($activeTab == 'criteria'): ?>
  <h2 class="mb-4 text-white">Criteria</h2>
  <div class="row g-4">
    <?php if($criteria->num_rows > 0): ?>
      <?php foreach($criteria as $row): ?>
      <div class="col-md-6">
        <div class="card bg-secondary text-white shadow h-100">
          <div class="card-body">
            <span class="badge bg-warning text-dark mb-2">Criteria #<?= $row['criteria_id'] ?></span>
            <h5><?= htmlspecialchars($row['criteria_name']) ?></h5>
            <p>Weight: <strong><?= $row['criteria_weight'] ?>%</strong></p>
            <div class="progress" style="height:10px;">
              <div class="progress-bar" style="width:<?= $row['criteria_weight'] ?>%"></div>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="alert alert-warning">No criteria found.</div>
    <?php endif; ?>
  </div>
  <?php endif; ?>

  <!-- SCORES -->
  <?php if($activeTab == 'scores'): ?>
  <h2 class="mb-4 text-white">Contestant Scores</h2>
  <div class="table-responsive">
    <table class="table table-striped table-bordered align-middle">
      <thead class="table-dark">
        <tr>
          <th>Photo</th>
          <th>Contestant</th>
          <th>Category</th>
          <th>Total Score</th>
          <th>Total Votes</th>
        </tr>
      </thead>
      <tbody>
        <?php if($scores->num_rows > 0): ?>
          <?php foreach($scores as $row): ?>
          <tr>
            <td width="120">
              <img src="imagespvs/<?= htmlspecialchars($row['contestant_image']) ?>" style="width:100px;height:100px;object-fit:cover;" class="rounded">
            </td>
            <td><?= htmlspecialchars($row['contestant_name']) ?></td>
            <td><?= htmlspecialchars($row['category_name']) ?></td>
            <td><?= number_format($row['total_score'], 2) ?></td>
            <td><?= $row['vote_count'] ?></td>
          </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr><td colspan="5" class="text-center">No scores found.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
  <?php endif; ?>

</main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>