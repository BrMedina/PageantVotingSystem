<?php
session_start();
require_once "dbaseconnection.php";


$fullname = $_SESSION['fullname'] ?? 'Guest User';
$role     = $_SESSION['role']     ?? 'guest';


if ($role === 'admin') {
    $profile_icon = 'imagespvs/admin.png';
} elseif ($role === 'judge') {
    $profile_icon = 'imagespvs/judge.png';
} else {
    $profile_icon = 'imagespvs/user.png';
}

function h($v) { return htmlspecialchars((string) $v, ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrownVote | Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
     
        :root {
            --primary : #23255d;
            --gold    : #c1984f;
            --gold-dk : #a07d3a;
            --dark    : #212325;
        }
        body            { overflow-x: hidden; background: #f8f9fa; }
        .cover-navbar,
        .main-footer    { background: var(--primary); }
        .bg-card        { background: var(--dark); }

        .navbar-nav .nav-link {
            transition: .3s ease;
            position: relative;
            padding: 10px 14px !important;
        }
        .navbar-nav .nav-link:hover          { color: var(--gold) !important; }
        .navbar-nav .nav-link.active         { color: var(--gold) !important; font-weight: 700; }
        .navbar-nav .nav-link.active::after  {
            content: '';
            position: absolute;
            left: 12px; right: 12px; bottom: 0;
            height: 2px;
            background: var(--gold);
            border-radius: 10px;
        }
        
        .hero-section {
            position: relative;
            height: 60vh;
            min-height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .hero-section img {
            position: absolute;
            inset: 0;
            width: 100%; height: 100%;
            object-fit: cover;
            z-index: -1;
        }
        .hero-content       { text-align: center; color: white; padding: 20px; }
        .hero-content h1,
        .hero-content p     { text-shadow: 2px 2px 10px rgba(0,0,0,.7); }

        .box-height {
            height: 60vh;
            min-height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .box-height img     { width: 100%; height: 100%; object-fit: cover; }
        .category-info      { padding: 40px; text-align: center; }
        .gold-divider       { width: 60px; height: 3px; background: var(--gold); margin: 15px auto; }
        .category-desc      { max-width: 80%; margin: auto; font-size: .95rem; color: #d1d1d1; }

        .main-footer        { padding-top: 50px; }
        .footer-header      { color: var(--gold); text-transform: uppercase; font-weight: 700; margin-bottom: 20px; font-size: 1rem; letter-spacing: 1px; }
        .footer-link        { display: block; margin-bottom: 8px; color: #fff; text-decoration: none; font-size: .9rem; transition: .3s; }
        .footer-link:hover  { color: var(--gold); }
        .footer-logo        { max-width: 150px; height: auto; margin-bottom: 20px; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg cover-navbar sticky-top shadow-lg">
    <div class="container-fluid px-4">

        <a class="navbar-brand d-flex align-items-center" href="pageant_home.php">
            <img src="imagespvs/logo2.png" alt="logo" width="35" height="25" class="me-2">
            <span class="text-light fw-bold fs-4">CrownVote</span>
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarMain" data-bs-theme="dark">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav mx-auto gap-lg-2">
                <li class="nav-item"><a class="nav-link text-light"        href="pageant_home.php">Home</a></li>
                <li class="nav-item"><a class="nav-link text-light active" href="pageant_categories.php">Categories</a></li>
                <li class="nav-item"><a class="nav-link text-light"        href="pageant_contestants.php">Contestants</a></li>
                <li class="nav-item"><a class="nav-link text-light"        href="pageant_vote.php">Vote</a></li>
                <li class="nav-item"><a class="nav-link text-light"        href="pageant_vote_summary.php">Results</a></li>
            </ul>

            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                   data-bs-toggle="dropdown">
                    <img src="<?= h($profile_icon) ?>" class="rounded-circle me-2"
                         width="40" height="40" alt="Profile" style="object-fit:cover;">
                    <strong><?= h($fullname) ?></strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark shadow">
                    <li><a class="dropdown-item" href="pageant_login.php?logout=1">Sign Out</a></li>
                </ul>
            </div>
        </div>

    </div>
</nav>

<header class="hero-section">
    <img src="imagespvs/category3.png" alt="Pageant Categories">
    <div class="hero-content">
        <h1 class="display-2 fw-bold">Pageant Categories</h1>
        <p class="lead">
            <strong>
                From intelligence to evening elegance,
                explore the distinct segments that define our next titleholder.
            </strong>
        </p>
    </div>
</header>

<div class="container-fluid px-0">

    <!-- CATEGORY 1 — Ms. Evening Gown -->
    <div class="row g-0">
        <div class="col-md-6 box-height">
            <img src="imagespvs/category4.png" alt="Evening Gown">
        </div>
        <div class="col-md-6 bg-dark text-light box-height">
            <div class="category-info">
                <h2 class="display-6 fw-bold text-uppercase">Ms. Evening Gown</h2>
                <div class="gold-divider"></div>
                <p class="category-desc">
                    A display of high-fashion elegance where the focus
                    is on the silhouette of the gown and the contestant's signature walk.
                </p>
            </div>
        </div>
    </div>

    <div class="row g-0">
        <div class="col-md-6 bg-dark text-light box-height order-2 order-md-1">
            <div class="category-info">
                <h2 class="display-6 fw-bold text-uppercase">Mr. Urban Professional</h2>
                <div class="gold-divider"></div>
                <p class="category-desc">
                    Highlighting the modern man through smart and professional styling
                    that reflects leadership and confidence.
                </p>
            </div>
        </div>
        <div class="col-md-6 box-height order-1 order-md-2">
            <img src="imagespvs/category5.png" alt="Urban Professional">
        </div>
    </div>

    <!-- CATEGORY 3 — Forces of Nature -->
    <div class="row g-0">
        <div class="col-md-6 box-height">
            <img src="imagespvs/category6.png" alt="Forces of Nature">
        </div>
        <div class="col-md-6 bg-dark text-light box-height">
            <div class="category-info">
                <h6 class="display-6 fw-bold text-uppercase">Mr. &amp; Ms.</h6>
                <h2 class="display-6 fw-bold text-uppercase">Forces of Nature</h2>
                <div class="gold-divider"></div>
                <p class="category-desc">
                    Contestants embody Earth, Air, Fire, and Water
                    through avant-garde styling and artistic fashion concepts.
                </p>
            </div>
        </div>
    </div>

</div>


<footer class="main-footer text-light">
    <div class="container pb-4">
        <div class="row">
            <div class="col-md-4 text-center text-md-start mb-4">
                <img src="imagespvs/footer_logo.png" alt="footer logo" class="footer-logo">
                <p class="small opacity-75">Lead the Way to the Throne.</p>
            </div>
            <div class="col-6 col-md-4 text-center text-md-start mb-4">
                <h5 class="footer-header">Navigation</h5>
                <a href="pageant_home.php"         class="footer-link">Home</a>
                <a href="pageant_categories.php"   class="footer-link">Categories</a>
                <a href="pageant_contestants.php"  class="footer-link">Contestants</a>
                <a href="pageant_vote.php"         class="footer-link">Vote Now</a>
                <a href="pageant_vote_summary.php" class="footer-link">Results</a>
            </div>
            <div class="col-6 col-md-4 text-center text-md-start">
                <h5 class="footer-header">Follow Us</h5>
                <a href="https://www.facebook.com/share/18pCwBpNmu/?mibextid=wwXIfr" class="footer-link">Facebook</a>
                <a href="#" class="footer-link">Instagram</a>
                <a href="#" class="footer-link">Twitter</a>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-card py-3 border-top border-secondary border-opacity-25">
        <div class="text-center small opacity-50">&copy; 2026 CrownVote. All rights reserved.</div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>