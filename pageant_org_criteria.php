<?php
require_once "auth.php";
require_role(['organizer']);
?>
<!-- Pageant ORGANIZER > Criteria page -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sidebar Component</title>
  
  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <style>

    /* table title */
    .bg-yellow {
        background-color: #c1984f;
        
    }


      /* navbar */
    .navbar.bg-dark {
        background-color: #23255d !important;
    }

    /* sidebar */
    aside.bg-dark {
        background-color: #212325 !important;
    }

    /* main content */
    .content-wrapper {
        flex-grow: 1;
        height: 100vh;
        overflow-y: auto;
        background-color: #f8f9fa; /* keep tje table area light for readability */
    }

    /* sidebar link hover*/
    .nav-pills .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
        color: #f8f9fa !important;
    }

  </style>
</head>
<body>


  <!-- Top Navbar -->
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top shadow-lg">
    <div class="container-fluid">

      <!-- logo pic -->
        <a class="navbar-brand" href="#">
        <img src="imagespvs/logo2.png" alt="logo" width="35" height="25">
        </a>

      <a class="navbar-brand" href="#">CrownVote</a>

      <!-- mobile responsiveness -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>


      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        

      </div>
    </div>
  </nav>

  <div class="d-flex">

    <!-- Sidebar -->
  
    <aside class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px; height: 100vh;">
  
    <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
    
    <img src="imagespvs/user.png" alt="Logo" width="40" height="40" class="rounded-circle me-2">

    <!-- Organizer Dropdown -->
    <div class="dropdown">
      <a href="#" class="text-white text-decoration-none dropdown-toggle fs-4" id="organizerDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        Organizer
      </a>

      <!-- Sign out -->
      <ul class="dropdown-menu shadow" aria-labelledby="organizerDropdown">
        <li><a class="dropdown-item" href="pageant_login.php?logout=1">Sign out</a></li>
      </ul>
    </div>

  </div>
  
  <hr>

        <!-- Group Heading -->
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-light text-uppercase">
        <span>Event Configuration</span>
        </h6>

        <ul class="nav nav-pills flex-column mb-auto">

            <!-- Contestants -->
          <li class="nav-item"><a href="pageant_org_contestant.php" class="nav-link text-white">
            <img src="imagespvs/contestant.png" alt="" width="20" height="20" class="me-2">Contestant</a></li>

            <!-- Category -->
          <li><a href="pageant_org_category.php" class="nav-link text-white">
            <img src="imagespvs/category.png" alt="" width="20" height="20" class="me-2">Pageant Categories</a></li>

            <!-- Criteria -->
          <li><a href="pageant_org_criteria.php" class="nav-link text-white active">
            <img src="imagespvs/criteria.png" alt="" width="20" height="20" class="me-2">Criteria</a></li>

            <!-- Score -->
          <li><a href="pageant_org_score.php" class="nav-link text-white">
            <img src="imagespvs/score.png" alt="" width="20" height="20" class="me-2">Score</a></li>

        
        </ul>

      </aside>

      <!-- MAIN CONTENT Wrapper -->
      <main class="content-wrapper p-5 bg-light">
        <!-- TABLE TITLE -->
        <div class="p-4 bg-yellow shadow text-white justify-content-center align-items-center">
          <h1 class="display-3">Criteria</h1>
           <p class="lead">Judging Criteria & Weightage</p>
         
        </div>
        <br>
        
        <!-- Display Table ==== INSERT TABLE BELOW ==== -->
        <form action="pageant_org_criteria.php" method="post">
            <div class="row g-3">
                <div class="col">
                    <input type="search" name="searchinput" placeholder="Search" class="form-control">
                </div>
                <div class="col">
                    <input type="submit" name="btnsearch" value="Search" class="btn btn-primary">
                </div>
            </div>
        </form>

   <!-- CHANGED DISPLAY TABLE -->
<?php

require_once "dbaseconnection.php";


$displaysql = "SELECT * FROM tbl_criteria";

$result = $conn->query($displaysql);

//check if the table is empty or not
if ($result->num_rows > 0) { 

    //row of records inside the table
    echo "<div class='container mt-4'>";
    echo "<div class='table-responsive shadow-sm'>";
    echo "<table class='table table-bordered align-middle mb-0'>";
    echo "<thead class='table-dark'>";
    echo "<tr>";
    echo "<th style='width: 10%;'>ID</th>";
    echo "<th style='width: 60%;'>Criteria</th>";
    echo "<th style='width: 20%;'>Weight (%)</th>";
    echo "<th style='width: 10%;'>Action</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    foreach ($result as $index => $fieldname) {
      $criteriaId = isset($fieldname['criteria_id']) ? $fieldname['criteria_id'] : '';
      $criteriaName = isset($fieldname['criteria_name']) ? $fieldname['criteria_name'] : '';
      $criteriaWeight = isset($fieldname['criteria_weight']) ? $fieldname['criteria_weight'] : '';
      echo "<tr>";
      echo "<td>".$criteriaId."</td>";
      echo "<td>".$criteriaName."</td>";
      echo "<td>".$criteriaWeight."</td>";  
      echo "<td><a href='' class='btn btn-success btn-sm'>View</a></td>";
      echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</div>";
    echo "</div>";


} else {

    echo "<div class='alert alert-warning mt-4'>No record found</div>";

}

?>
        <!-- PHP Display Table Ends Here -->

    </main>
  </div>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>