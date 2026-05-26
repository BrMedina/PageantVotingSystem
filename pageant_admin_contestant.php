<?php
require_once "auth.php";
require_role(['admin']);
?>
<!-- Pageant ADMIN > Contestant page -->
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
        /* background-color: #23255d; */
        
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
        Admin
      </a>

      <!-- Sign out -->
      <ul class="dropdown-menu shadow" aria-labelledby="organizerDropdown">
        <li><a class="dropdown-item" href="pageant_login.php?logout=1">Sign out</a></li>
      </ul>
    </div>

  </div>
  
  <hr>

        <!-- Group Heading / USERS -->
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 p-3 text-light text-uppercase">
        <span>Access Control</span>
        </h6>

        <ul class="nav nav-pills flex-column mb-auto">
          
            <!-- Judge -->
          <li class="nav-item"><a href="pageant_judge.php" class="nav-link text-white">
            <img src="imagespvs/judge.png" alt="" width="20" height="20" class="me-2">Judge Accounts</a></li>

            <!-- Admin -->
          <li><a href="pageant_admin.php" class="nav-link text-white">
            <img src="imagespvs/admin.png" alt="" width="20" height="20" class="me-2">Admin Accounts</a></li>



        <!-- ====Group Heading / Pageant Setup -->
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-light text-uppercase">
        <span>Pageant Setup</span>
        </h6>

            <!-- Category -->
          <li><a href="pageant_admin_category.php" class="nav-link text-white">
            <img src="imagespvs/category.png" alt="" width="20" height="20" class="me-2">Pageant Categories</a></li>

            <!-- Criteria -->
          <li><a href="pageant_admin_criteria.php" class="nav-link text-white">
            <img src="imagespvs/criteria.png" alt="" width="20" height="20" class="me-2">Criteria</a></li>

            <!-- Contestants -->
          <li class="nav-item"><a href="pageant_admin_contestant.php" class="nav-link text-white active">
            <img src="imagespvs/contestant.png" alt="" width="20" height="20" class="me-2">Contestant Roster</a></li>

            <!-- Add New Contestant -->
          <li><a href="pageant_admin_add.php" class="nav-link text-white">
            <img src="imagespvs/contestant_add.png" alt="" width="20" height="20" class="me-2">Add Contestant</a></li>


            <!-- ====Group Heading / Live Tally & Results -->

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-light text-uppercase">
            <span>Live Tally & Results</span>
            </h6>      
          
            <!-- Total Votes -->
          <li class="nav-item"><a href="pageant_admin_total.php" class="nav-link text-white">
            <img src="imagespvs/total_vote.png" alt="" width="20" height="20" class="me-2">Total Votes</a></li>

            <!-- Score -->
          <li><a href="pageant_admin_score.php" class="nav-link text-white">
            <img src="imagespvs/score.png" alt="" width="20" height="20" class="me-2">Score</a></li>
        
        </ul>

        

        
        

    </aside>

    <!-- MAIN CONTENT Wrapper -->
    <main class="content-wrapper p-5 bg-light">
      <!-- TABLE TITLE -->
      <div class="p-4 bg-yellow shadow text-white justify-content-center align-items-center">
        <h1 class="display-3 fw-bold">Contestant</h1>
         <p class="lead">Register & Manage Contestants</p>

      </div>
      <br>
      
      <!-- Display Table ==== INSERT TABLE BELOW ==== -->
      <form action="pageant_admin_contestant.php" method="post">
          <div class="row g-3">
              <div class="col">
                  <input type="search" name="searchinput" placeholder="Search" class="form-control">
              </div>
              <div class="col">
                  <input type="submit" name="btnsearch" value="Search" class="btn btn-primary">
              </div>
          </div>
      </form>


 <!-- ==== SAMPLE PHP SECTION ==== -->
<?php
require_once "dbaseconnection.php";


if (isset($_POST['btnsearch'])) {

    //updated user search
    $searchinput = $_POST['searchinput']; 

    if ($searchinput != NULL) {

        $displaysql = "Select * from tbl_contestants WHERE 
        contestant_id LIKE '%".$searchinput."%'
        OR contestant_name LIKE '%".$searchinput."%'
        OR contestant_location LIKE '%".$searchinput."%'
        OR category_id LIKE '%".$searchinput."%'
        "; 

    } else {

        $displaysql = "Select * from tbl_contestants"; 

    }

} else {

    $displaysql = "Select * from tbl_contestants";

}

$result = $conn->query($displaysql);

?>

<!-- CHANGED DISPLAY TABLE -->
<?php

$displaysql = "SELECT * FROM tbl_contestants";

$result = $conn->query($displaysql);

//check if the table is empty or not
if ($result->num_rows > 0) { 

    //row of records inside the table
    echo "<div class=container align-items-center d-flex justify-content-center>";
    echo "<div class=row>";

    foreach ($result as $index => $fieldname) {
      $contestantImage = "imagespvs/contestant.png";
      $contestantNumber = '';
      $categoryId = '';
      $contestantLocation = '';
      if (isset($fieldname['contestant_image']) && $fieldname['contestant_image'] != '') {
        if (strpos($fieldname['contestant_image'], '/') !== false) {
          $contestantImage = $fieldname['contestant_image'];
        } else {
          $contestantImage = "imagespvs/".$fieldname['contestant_image'];
        }
      }
      if (isset($fieldname['contestant_number'])) {
        $contestantNumber = $fieldname['contestant_number'];
      }
      if (isset($fieldname['category_id'])) {
        $categoryId = $fieldname['category_id'];
      }
      if (isset($fieldname['contestant_location'])) {
        $contestantLocation = $fieldname['contestant_location'];
      }
?>
    
    <div class="col-4">
        <div class="container p-3 m-3 bg-secondary text-white rounded shadow">

            <div class="row">
              <div class="col text-center">
              <img src="<?php echo $contestantImage; ?>" alt="" width="200" height="150" class="img-fluid rounded">
            </div>
        </div>
        
            <div class="row">
                <div class="col">
                    <h5><?php echo $fieldname['contestant_id'] ?></h5>
                </div>
            </div>

            <div class="row">
                <div class="col">
                        <?php echo $fieldname['contestant_name'] ?>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <?php echo $contestantNumber; ?>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <?php echo $categoryId; ?>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <?php echo $contestantLocation; ?>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <a href="" class="btn btn-success">View</a>
                </div>
            </div>

        </div>
    </div>
<?php

    }

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

