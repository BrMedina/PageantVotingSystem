<?php

$name = '';
$email = '';
$miss = '';
$mister = '';
$forces = '';
$miss1 = 0;
$miss2 = 0;
$miss3 = 0;
$miss4 = 0;
$mister1 = 0;
$mister2 = 0;
$mister3 = 0;
$mister4 = 0;
$pair1 = 0;
$pair2 = 0;
$pair3 = 0;
$pair4 = 0;

if (isset($_POST['sub'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $miss = $_POST['miss'];
    $mister = $_POST['mister'];
    $forces = $_POST['forces_of_nature'];

    // MISS SCORES
    $miss1 = (int)$_POST['miss_criteria1'];
    $miss2 = (int)$_POST['miss_criteria2'];
    $miss3 = (int)$_POST['miss_criteria3'];
    $miss4 = (int)$_POST['miss_criteria4'];

    // MISTER SCORES
    $mister1 = (int)$_POST['mister_criteria1'];
    $mister2 = (int)$_POST['mister_criteria2'];
    $mister3 = (int)$_POST['mister_criteria3'];
    $mister4 = (int)$_POST['mister_criteria4'];

    // PAIR SCORES
    $pair1 = (int)$_POST['pair_criteria1'];
    $pair2 = (int)$_POST['pair_criteria2'];
    $pair3 = (int)$_POST['pair_criteria3'];
    $pair4 = (int)$_POST['pair_criteria4'];
}

// TOTAL COMPUTATIONS
$missTotal = $miss1 + $miss2 + $miss3 + $miss4;

$misterTotal = $mister1 + $mister2 + $mister3 + $mister4;

$pairTotal = $pair1 + $pair2 + $pair3 + $pair4;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrownVote | Vote Summary</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

    .bg-main {
        background-color: #212325;
    }

    .bg-form {
        background-color: #f8f9fa;
    }

    .cover-navbar {
        background-color: #23255d;
    }

    .hero-section {
        height: 40vh;
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
    }

    .hero-content h1 {
        text-shadow: 2px 2px 10px rgba(0,0,0,0.7);
    }

    .main-footer {
        background-color: #23255d;
        padding-top: 50px;
    }

    .footer-link {
        color: white;
        text-decoration: none;
        display: block;
        margin-bottom: 8px;
    }

    .footer-link:hover {
        color: #c1984f;
    }

    .footer-header {
        color: #c1984f;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .footer-logo {
        max-width: 150px;
        margin-bottom: 20px;
    }

    .bg-card {
        background-color: #212325;
    }

    </style>
</head>

<body class="bg-main">
<form action="summary.php" method="POST">
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg cover-navbar sticky-top shadow-lg">
    <div class="container-fluid">

        <a class="navbar-brand text-light" href="pageant_home.php">
            CrownVote
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                data-bs-theme="dark">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link text-light" href="pageant_home.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-light" href="pageant_categories.php">Categories</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-light" href="pageant_contestants.php">Contestants</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-light active" href="pageant_vote.php">Vote</a>
                </li>

            </ul>

        </div>

    </div>
</nav>

<!-- HERO -->
<header class="hero-section mb-5">

    <img src="imagespvs/vote.jpg" alt="Vote Banner">

    <div class="hero-content">

        <h1 class="display-3 fw-bold">Vote Summary</h1>

        <p class="lead">Thank you for voting!</p>

    </div>

</header>

<!-- SUMMARY -->
<div class="container bg-form p-5 text-dark border border-light border-5 rounded-4 shadow mb-5">

    <h1 class="text-center fw-bold mb-4">Official Vote Summary</h1>

    <div class="lead">

        <p>
            <b>Name:</b>
            <?php echo $name; ?>
        </p>

        <p>
            <b>Email:</b>
            <?php echo $email; ?>
        </p>

        <hr>

        <h3>Miss Evening Gown</h3>

        <p>
            <b>Contestant:</b>
            <?php echo $miss; ?>
        </p>

        <p>
            <b>Total Score:</b>
            <?php echo $missTotal; ?>
        </p>

        <hr>

        <h3>Mister Urban Professional</h3>

        <p>
            <b>Contestant:</b>
            <?php echo $mister; ?>
        </p>

        <p>
            <b>Total Score:</b>
            <?php echo $misterTotal; ?>
        </p>

        <hr>

        <h3>Forces of Nature</h3>

        <p>
            <b>Pair:</b>
            <?php echo $forces; ?>
        </p>

        <p>
            <b>Total Score:</b>
            <?php echo $pairTotal; ?>
        </p>

    </div>

</div>

<!-- FOOTER -->
<footer class="main-footer text-light">

    <div class="container pb-4">

        <div class="row">

            <div class="col-md-4 mb-4">

                <img src="imagespvs/footer_logo.jpg"
                     alt="footer logo"
                     class="footer-logo">

                <p class="small opacity-75">
                    Lead the Way to the Throne.
                </p>

            </div>

            <div class="col-md-4 mb-4">

                <h5 class="footer-header">Navigation</h5>

                <a href="pageant_home.php" class="footer-link">Home</a>

                <a href="pageant_categories.php" class="footer-link">Categories</a>

                <a href="pageant_contestants.php" class="footer-link">Contestants</a>

                <a href="pageant_vote.php" class="footer-link">Vote Now</a>

            </div>

            <div class="col-md-4">

                <h5 class="footer-header">Follow Us</h5>

                <a href="#" class="footer-link">Facebook</a>

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