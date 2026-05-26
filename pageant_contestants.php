

<?php
$fullname = isset($_SESSION['fullname']) ? $_SESSION['fullname'] : 'Judge';
$role = isset($_SESSION['role']) ? $_SESSION['role'] : 'judge';

$profile_icon = ($role === 'admin')
    ? 'imagespvs/crown.png'
    : (($role === 'user')
        ? 'imagespvs/user.png'
        : 'imagespvs/judge.png');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrownVote | Contestants</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .cover-navbar { background-color: #23255d; }

        .navbar-nav .nav-link {
            transition: all 0.3s ease;
            position: relative;
        }

        .navbar-nav .nav-link:hover { color: #c1984f !important; }

        .navbar-nav .nav-link.active {
            color: #c1984f !important;
            border-bottom: 2px solid #c1984f;
            font-weight: bold;
        }

        .navbar-nav .nav-link:active { transform: scale(0.95); }

        .hero-section {
            height: 60vh;
            min-height: 300px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-section img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .hero-content {
            text-align: center;
            color: white;
            padding: 20px;
        }

        .hero-content h1 { text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7); }
        .hero-content p { text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5); }

        .main-dark {
            background-color: #212325;
            color: white;
            padding: 50px 0;
        }

        .main-light {
            background-color: #f8f9fa;
            color: #212325;
            padding: 50px 0;
        }

        .contestant-card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.2s;
            max-width: 220px;
            margin: auto;
        }

        .contestant-card:hover { transform: scale(1.05); }

        .contestant-card .card-body {
            padding: 1rem;
            text-align: center;
        }

        .contestant-card .card-title {
            font-size: 1rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .contestant-card .card-text {
            font-size: 0.85rem;
            color: #6c757d;
        }

        .main-footer {
            background-color: #23255d;
            padding-top: 50px;
        }

        .footer-link {
            color: #ffffff;
            text-decoration: none;
            transition: color 0.3s ease;
            font-size: 0.9rem;
            display: block;
            margin-bottom: 8px;
        }

        .footer-link:hover { color: #c1984f; }

        .footer-header {
            color: #c1984f;
            text-transform: uppercase;
            font-weight: bold;
            margin-bottom: 20px;
            font-size: 1rem;
            letter-spacing: 1px;
        }

        .footer-logo {
            max-width: 150px;
            height: auto;
            margin-bottom: 20px;
        }

        .bg-card { background-color: #212325; }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg cover-navbar sticky-top shadow-lg">
    <div class="container-fluid">

        <a class="navbar-brand" href="#">
            <img src="imagespvs/logo2.png" alt="logo" width="35" height="25">
        </a>

        <a class="navbar-brand text-light" href="#">
            CrownVote
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            data-bs-theme="dark">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mx-auto">

                <li class="nav-item">
                    <a class="nav-link text-light" href="pageant_home.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-light" href="pageant_categories.php">Categories</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-light active" href="pageant_contestants.php">Contestants</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-light" href="pageant_vote.php">Vote</a>
                </li>

            </ul>

            <div class="dropdown">

                <a
                    href="#"
                    class="d-flex align-items-center text-white text-decoration-none dropdown-toggle ms-lg-3"
                    data-bs-toggle="dropdown">

                    <img
                        src="<?php echo $profile_icon; ?>"
                        class="rounded-circle me-2"
                        width="40"
                        height="40"
                        alt="Profile">

                    <strong><?php echo $fullname; ?></strong>

                </a>

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark shadow">

                    <li>
                        <a class="dropdown-item text-light" href="pageant_login.php">
                            Sign Out
                        </a>
                    </li>

                </ul>

            </div>

        </div>

    </div>
</nav>

<header class="hero-section">

    <img src="imagespvs/contestant.png" alt="Contestants">

    <div class="hero-content">

        <h1 class="display-2 fw-bold">
            Official 2026 Roster
        </h1>

        <p class="lead">
            <strong>View the full line-up of talented contestants.</strong>
        </p>

    </div>

</header>

<!-- Miss Contestants -->
<section class="main-dark">

    <div class="container">

        <h2 class="display-6 fw-bold text-uppercase text-center mb-5">
            Miss "Evening Gown" Contestants
        </h2>

        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-3 g-4 justify-content-center">

            <?php
            require "pageant_array.php";

            foreach ($miss as $index => $name):
            ?>

                <div class="col">

                    <div class="card contestant-card text-dark shadow-sm">

                        <img
                            src="imagespvs/ms_contestant<?php echo ($index + 1); ?>.png"
                            class="card-img-top"
                            alt="<?php echo $name; ?>"
                            style="height: 300px; object-fit: cover;">

                        <div class="card-body">

                            <h5 class="card-title">
                                <?php echo $name; ?>
                            </h5>

                            <p class="card-text text-muted small">
                                <?php echo $miss_locations[$index]; ?>
                            </p>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>

<!-- Mister Contestants -->
<section class="main-light">

    <div class="container">

        <h2 class="display-6 fw-bold text-uppercase text-center mb-5">
            Mister "Urban Professional" Contestants
        </h2>

        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-3 g-4 justify-content-center">

            <?php foreach ($mister as $index => $name): ?>

                <div class="col">

                    <div class="card contestant-card bg-card text-light shadow-sm">

                        <img
                            src="imagespvs/mr_contestant<?php echo ($index + 1); ?>.png"
                            class="card-img-top"
                            alt="<?php echo $name; ?>"
                            style="height: 300px; object-fit: cover;">

                        <div class="card-body">

                            <h5 class="card-title">
                                <?php echo $name; ?>
                            </h5>

                            <p class="card-text text-light small">
                                <?php echo $mister_locations[$index]; ?>
                            </p>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>

<!-- Forces of Nature -->
<section class="main-dark">

    <div class="container">

        <h2 class="display-6 fw-bold text-uppercase text-center mb-5">
            Mr. &amp; Ms. "Forces of Nature" Contestants
        </h2>

        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-3 g-4 justify-content-center">

            <?php foreach ($forcesOfNature as $index => $pair): ?>

                <div class="col">

                    <div class="card contestant-card text-dark shadow-sm">

                        <img
                            src="imagespvs/nature_contestant<?php echo ($index + 1); ?>.png"
                            class="card-img-top"
                            alt="<?php echo $pair['mister'] . ' & ' . $pair['miss']; ?>"
                            style="height: 300px; object-fit: cover;">

                        <div class="card-body">

                            <h5 class="card-title">
                                <?php echo $pair['mister']; ?> &amp; <?php echo $pair['miss']; ?>
                            </h5>

                            <p class="card-text text-muted small">
                                <?php echo $nature_locations[$index]; ?>
                            </p>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>

<footer class="main-footer text-light">

    <div class="container pb-4">

        <div class="row">

            <div class="col-md-4 text-center text-md-start mb-4 mb-md-0">

                <img
                    src="imagespvs/footer_logo.png"
                    alt="footer logo"
                    class="footer-logo">

                <p class="small opacity-75 pe-md-4">
                    Lead the Way to the Throne.
                </p>

            </div>

            <div class="col-6 col-md-4 text-center text-md-start mb-4 mb-md-0">

                <h5 class="footer-header">Navigation</h5>

                <a href="pageant_home.php" class="footer-link">Home</a>
                <a href="pageant_categories.php" class="footer-link">Categories</a>
                <a href="pageant_contestants.php" class="footer-link">Contestants</a>
                <a href="pageant_vote.php" class="footer-link">Vote Now</a>

            </div>

            <div class="col-6 col-md-4 text-center text-md-start">

                <h5 class="footer-header">Follow Us</h5>

                <a href="https://www.facebook.com/share/18pCwBpNmu/?mibextid=wwXIfr" class="footer-link">
                    Facebook
                </a>

                <a href="#" class="footer-link">Instagram</a>
                <a href="#" class="footer-link">Twitter</a>

            </div>

        </div>

    </div>

    <div class="container-fluid bg-card text-light py-3 border-top border-secondary border-opacity-25">

        <div class="text-center small opacity-50">
            &copy; 2026 CrownVote. All rights reserved.
        </div>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>