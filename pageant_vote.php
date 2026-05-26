<!-- Pageant VOTE page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrownVote | Cast Your Ballot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    /* main bg color */
    .bg-main { background-color: #212325; }

    /* main bg color */
    .bg-form { background-color: #f8f9fa; }

    /* navbar color */
    .cover-navbar { background-color: #23255d; }

    /* nav link style */
    .navbar-nav .nav-link { transition: all 0.3s ease; position: relative; }

    /* nav hover */
    .navbar-nav .nav-link:hover { color: #c1984f !important; }

    /* nav current page */
    .navbar-nav .nav-link.active {
        color: #c1984f !important; 
        border-bottom: 2px solid #c1984f; 
        font-weight: bold;
    }

    /* nav clicked */
    .navbar-nav .nav-link:active { transform: scale(0.95); }

    /* hero size */
    .hero-section {
        height: 40vh; 
        min-height: 300px;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center; 
        justify-content: center;
    }

    /* hero img position */
    .hero-section img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: -1; 
        
    }

    /* hero text styling */
    .hero-content { text-align: center; color: white; padding: 20px; }
    .hero-content h1 { text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7); }
    .hero-content p { text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5); }

    /* candidate button */
    .bg-yellow { background-color: #c1984f; border: none; }
    .bg-yellow:hover {
        background-color: #a07d3a; 
        color: white;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* criteria box */
    .criteria-box {
        background: #ffffff;
        padding: 14px 16px;
        border-radius: 14px;
        margin-bottom: 14px;
        border: 1px solid #e3e6ea;
        text-align: left;
        box-shadow: 0 8px 18px rgba(16, 24, 40, 0.06);
    }

    .criteria-title {
        color: #23255d;
        font-weight: 600;
        font-size: 0.98rem;
        letter-spacing: 0.2px;
    }

    .criteria-scale {
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        gap: 8px;
        align-items: center;
    }

    .criteria-scale .btn-rating {
        width: 100%;
        border-radius: 10px;
        border: 1px solid #d0d5dd;
        background: #f7f7f9;
        color: #212325;
        padding: 8px 0;
        font-weight: 600;
        transition: all 0.2s ease;
    }

    .criteria-scale .btn-rating:hover {
        border-color: #c1984f;
        color: #c1984f;
        background: #fff8ec;
    }

    .btn-check:checked + .btn-rating {
        background: #c1984f;
        color: #ffffff;
        border-color: #c1984f;
        box-shadow: 0 0 0 3px rgba(193, 152, 79, 0.25);
    }

    /* footer style */
    .main-footer {
        background-color: #23255d;
        padding-top: 50px;
    }

    /* footer links */
    .footer-link {
        color: #ffffff;
        text-decoration: none;
        transition: color 0.3s ease;
        font-size: 0.9rem;
        display: block;
        margin-bottom: 8px;
    }

    /* footer link hover */
    .footer-link:hover {
        color: #c1984f;
    }

    /* footer header */
    .footer-header {
        color: #c1984f;
        text-transform: uppercase;
        font-weight: bold;
        margin-bottom: 20px;
        font-size: 1rem;
        letter-spacing: 1px;
    }

    /* footer logo */
    .footer-logo {
        max-width: 150px;
        height: auto;
        margin-bottom: 20px;
    }

    /* copyright color */
    .bg-card {
        background-color: #212325;
    }
    
    </style>
</head>

<body class="bg-main">

<!-- (UPDATED) Top Navbar -->
<nav class="navbar navbar-expand-lg cover-navbar sticky-top shadow-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="imagespvs/logo2.png" alt="logo" width="35" height="25"></a>
        <a class="navbar-brand text-light" href="pageant_home.php">CrownVote</a>

        <!-- mobile responsivness -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" data-bs-theme="dark">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">

                <!-- Home -->
                <li class="nav-item"><a class="nav-link text-light" href="pageant_home.php">Home</a></li>

                <!-- Categories -->
                <li class="nav-item"><a class="nav-link text-light" href="pageant_categories.php">Categories</a></li>

                <!-- Contestants -->
                <li class="nav-item"><a class="nav-link text-light" href="pageant_contestants.php">Contestants</a></li>

                <!-- Vote -->
                <li class="nav-item"><a class="nav-link text-light active" href="pageant_vote.php">Vote</a></li>
            </ul>
        </div>

        <!-- Profile Picture & Fullname-->
            <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle ms-lg-3"
                       data-bs-toggle="dropdown">

                        <img src= # <?php //echo $_SESSION['image']; ?> 
                             class="rounded-circle me-2"
                             width="40"
                             height="40">

                        <strong><?php //echo $_SESSION['fullname']; ?> FullName </strong>
                    </a>

                    <!-- Sign Out -->
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark shadow">
                        <li>
                            <a class="dropdown-item text-light" href="pageant_login.php">
                                <i class="bi me-2"></i>Sign Out
                            </a>
                        </li>
                    </ul>
            </div>
    </div>
</nav>

<!-- Hero -->
<header class="hero-section mb-5">
    <img src="imagespvs/vote.jpg" alt="Award Divisions">
    <div class="hero-content">
        <h1 class="display-3 fw-bold">Cast Your Vote</h1>
        <p class="lead">Every vote counts in the race for the crown.</p>
    </div>
</header>

<!-- Vote Form -->
<div class="container bg-form p-4 p-md-5 w-80 text-dark border border-light border-5 mt-n5 mb-5 rounded-4 shadow">
    <form action="pageant_vote_summary.php" method="post">

        <!-- Header Section -->
        <div class="p-2 text-center">
            <h1 class="display-5 fw-bold mb-3">Official Vote Form</h1>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <p class="lead fw-normal mb-1">Please provide your information and evaluate the candidates.</p>
                    <p class="small text-muted text-uppercase tracking-wider">Scoring: 1 (Least) to 5 (Excellent)</p>
                    <hr class="w-25 mx-auto mb-4 border-dark opacity-25">
                </div>
            </div>
        </div>

        
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8"> 

                <!-- Full name -->
                <div class="mb-4">
                    <label class="form-label fw-bold">Full Name</label>
                    <input type="text" class="form-control form-control-lg" name="name" placeholder="Enter your full name" required>
                </div>

                <!-- Email -->
                <div class="mb-5">
                    <label class="form-label fw-bold">Email Address</label>
                    <input type="email" class="form-control form-control-lg" name="email" placeholder="sample@gmail.com" required>
                </div>

                <hr class="mb-5">

                <!-- CATEGORY 1 -->
                <div class="text-center mb-5">
                    <h3 class="fw-bold text-uppercase" style="color: #23255d;">Miss "Evening Gown"</h3>
                    <select name="miss" class="form-select form-select-lg mb-4 text-center" required>
                        <option disabled selected>-- Choose Contestant --</option>
                        <?php
                            require_once "pageant_array.php";
                            foreach ($miss as $index => $missEvening) { 
                                echo "<option value='$missEvening'>" . ($index + 1) . " - $missEvening</option>";
                            }
                        ?>
                    </select>

                    <!-- Criteria 1 -->
                    <?php
                        foreach ($criteria as $index => $criterion) {
                          $criteriaIndex = $index + 1;
                    ?>
                    <div class="criteria-box">
                        <div class="criteria-title mb-2"><?= $criterion ?></div>
                        <div class="criteria-scale">
                            <?php
                                foreach ($ratings as $rating) {
                                  $ratingId = "miss_criteria".$criteriaIndex."_".$rating;
                            ?>
                              <input class="btn-check" type="radio" id="<?= $ratingId ?>" name="miss_criteria<?= $criteriaIndex ?>" value="<?= $rating ?>" required>
                              <label class="btn-rating" for="<?= $ratingId ?>"><?= $rating ?></label>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>

                <!-- CATEGORY 2 -->
                <div class="text-center mb-5 mt-5">
                    <h3 class="fw-bold text-uppercase" style="color: #23255d;">Mister "Urban Professional"</h3>
                    <select name="mister" class="form-select form-select-lg mb-4 text-center" required>
                        <option disabled selected>-- Choose Contestant --</option>
                        <?php
                            foreach ($mister as $index => $misterUrban) { 
                                echo "<option value='$misterUrban'>" . ($index + 1) . " - $misterUrban</option>";
                            }
                        ?>
                    </select>

                    <!-- Criteria 2 -->
                     <?php
                        foreach ($criteria as $index => $criterion) {
                          $criteriaIndex = $index + 1;
                    ?>
                    <div class="criteria-box">
                        <div class="criteria-title mb-2"><?= $criterion ?></div>
                        <div class="criteria-scale">
                            <?php
                                foreach ($ratings as $rating) {
                                  $ratingId = "mister_criteria".$criteriaIndex."_".$rating;
                            ?>
                              <input class="btn-check" type="radio" id="<?= $ratingId ?>" name="mister_criteria<?= $criteriaIndex ?>" value="<?= $rating ?>" required>
                              <label class="btn-rating" for="<?= $ratingId ?>"><?= $rating ?></label>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                    
                </div>

                <!-- CATEGORY 3 -->
                <div class="text-center mb-5 mt-5">
                    <h3 class="fw-bold text-uppercase" style="color: #23255d;">Mister & Miss Forces of Nature</h3>
                    <select name="forces_of_nature" class="form-select form-select-lg mb-4 text-center" required>
                        <option disabled selected>-- Choose Pair --</option>
                        <?php
                            foreach ($forcesOfNature as $index => $pair) {
                                $pairNames = $pair['mister'] . " & " . $pair['miss'];
                                echo "<option value='$pairNames'>Pair #" . ($index + 1) . ": $pairNames</option>";
                            }
                        ?>
                    </select>

                   

                    <!-- Criteria 3 -->

                    <?php
                        foreach ($criteria as $index => $criterion) {
                          $criteriaIndex = $index + 1;
                    ?>
                    <div class="criteria-box">
                        <div class="criteria-title mb-2"><?= $criterion ?></div>
                        <div class="criteria-scale">
                            <?php
                                foreach ($ratings as $rating) {
                                  $ratingId = "pair_criteria".$criteriaIndex."_".$rating;
                            ?>
                              <input class="btn-check" type="radio" id="<?= $ratingId ?>" name="pair_criteria<?= $criteriaIndex ?>" value="<?= $rating ?>" required>
                              <label class="btn-rating" for="<?= $ratingId ?>"><?= $rating ?></label>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>

                </div>

                    
                

                <!-- Note & Button -->
                <div class="text-center mt-5">
                    <hr>
                    <p class="text-muted small mb-4">Please review your scores carefully, votes cannot be edited after submission.</p>
                    <input type="submit" name="sub" value="Submit" class="btn bg-yellow btn-lg w-100 text-white py-3 fw-bold shadow">
                </div>

            </div> <!-- End column -->
        </div> <!-- End row -->

    </form>
</div>

<!-- footer -->
<footer class="main-footer text-light">
    <div class="container pb-4">
        <div class="row">

            <!-- Logo -->
            <div class="col-md-4 text-center text-md-start mb-4 mb-md-0">
                <img src="imagespvs/footer_logo.jpg" alt="footer logo" class="footer-logo">
                <p class="small opacity-75 pe-md-4">
                    Lead the Way to the Throne.
                </p>
            </div>

            <!-- Quick Links -->
            <div class="col-6 col-md-4 text-center text-md-start mb-4 mb-md-0">
                <h5 class="footer-header">Navigation</h5>
                <a href="pageant_home.php" class="footer-link">Home</a>
                <a href="pageant_categories.php" class="footer-link">Categories</a>
                <a href="pageant_contestants.php" class="footer-link">Contestants</a>
                <a href="pageant_vote.php" class="footer-link">Vote Now</a>
            </div>

            <!-- social -->
            <div class="col-6 col-md-4 text-center text-md-start">
                <h5 class="footer-header">Follow Us</h5>
                <a href="https://www.facebook.com/share/18pCwBpNmu/?mibextid=wwXIfr" class="footer-link">Facebook</a>
                <!-- ======== ADD UR SOCIALS HERE HEHEHE >:D ======== -->
                <a href="#" class="footer-link">Instagram</a>
                <a href="#" class="footer-link">Twitter</a>
            </div>

        </div>
    </div>

    <!-- copyright -->
    <div class="container-fluid bg-card text-light py-3 border-top border-secondary border-opacity-25">
        <div class="row text-center">
            <div class="col-12">
                <div class="small opacity-50">&copy; 2026 CrownVote. All rights reserved.</div>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php

require_once "dbaseconnection.php";

if (isset($_POST['sub'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];

    $miss = $_POST['miss'];
    $mister = $_POST['mister'];
    $forces = $_POST['forces_of_nature'];

    $miss1 = $_POST['miss_criteria1'];
    $miss2 = $_POST['miss_criteria2'];
    $miss3 = $_POST['miss_criteria3'];

    $mister1 = $_POST['mister_criteria1'];
    $mister2 = $_POST['mister_criteria2'];
    $mister3 = $_POST['mister_criteria3'];

    $pair1 = $_POST['pair_criteria1'];
    $pair2 = $_POST['pair_criteria2'];
    $pair3 = $_POST['pair_criteria3'];

    $missTotal = $miss1 + $miss2 + $miss3;
    $misterTotal = $mister1 + $mister2 + $mister3;
    $pairTotal = $pair1 + $pair2 + $pair3;

    $insertsql = "INSERT INTO tbl_score 
    (name, miss_name, mister_name, pair_name, missTotal, misterTotal, pairTotal)
    VALUES 
    ('$name,'$miss', '$mister','$forces', $missTotal, $misterTotal, $pairTotal)";
?>

    


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vote Summary</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="container bg-light p-5 rounded shadow">

                <h1 class="text-center mb-4">Vote Summary</h1>

                <div class="row">
                    <div class="col">
                        <b>Name:</b> <?php echo $name; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <b>Email:</b> <?php echo $email; ?>
                    </div>
                </div>

                <hr>

                <!-- MISS -->
                <div class="row">
                    <div class="col">
                        <h4>Miss Evening Gown</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        Contestant: <?php echo $miss; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        Total Score: <?php echo $missTotal; ?>
                    </div>
                </div>

                <hr>

                <!-- MISTER -->
                <div class="row">
                    <div class="col">
                        <h4>Mister Urban Professional</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        Contestant: <?php echo $mister; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        Total Score: <?php echo $misterTotal; ?>
                    </div>
                </div>

                <hr>

                <!-- PAIR -->
                <div class="row">
                    <div class="col">
                        <h4>Forces of Nature</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        Pair: <?php echo $forces; ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        Total Score: <?php echo $pairTotal; ?>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>

<?php
}
?>


