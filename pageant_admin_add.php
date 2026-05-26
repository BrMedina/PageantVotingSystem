<?php
require_once "auth.php";
require_role(['admin']);
require_once "dbaseconnection.php";

$addError = '';
$addSuccess = '';

if (isset($_POST['sub'])) {
  $fullname = $_POST['fullname'];
  $location = $_POST['location'];
  $categoryId = (int)$_POST['categories'];

  $imageFile = 'contestant.png';
  if (isset($_FILES['upload_img']) && $_FILES['upload_img']['error'] == 0) {
    $uploadName = basename($_FILES['upload_img']['name']);
    $targetPath = "imagespvs/".$uploadName;
    if (move_uploaded_file($_FILES['upload_img']['tmp_name'], $targetPath)) {
      $imageFile = $uploadName;
    }
  }

  if ($categoryId <= 0) {
    $addError = 'Category not found.';
  } else {
    $insertSql = "INSERT INTO tbl_contestants (category_id, contestant_name, contestant_image, contestant_location)
                      VALUES ('".$categoryId."', '".$fullname."', '".$imageFile."', '".$location."')";

    if ($conn->query($insertSql)) {
      $addSuccess = 'Contestant added.';
    } else {
      $addError = $conn->error;
    }
  }
}
?>

<!-- Pageant ADMIN > Add Contestants page -->
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

    .btn-color {
      background-color: #c1984f;
    }

    .btn-color:hover {
        background-color: #8c703e;
        color: #f8f9fa;
    }

  </style>
</head>
<body>


  <!-- Top Navbar -->
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark sticky-top shadow-lg">
    <div class="container-fluid">

      <!-- logo pic -->
        <a class="navbar-brand" href="#">
        <img src="imagespvs/logo3.png" alt="logo" width="35" height="25">
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
          <li class="nav-item"><a href="pageant_admin_contestant.php" class="nav-link text-white">
            <img src="imagespvs/contestant.png" alt="" width="20" height="20" class="me-2">Contestant Roster</a></li>

            <!-- Add New Contestant -->
          <li><a href="pageant_admin_add.php" class="nav-link text-white active">
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
    <h1 class="display-5 fw-bold">Add New Contestant</h1>
     <p class="lead">Enter the following information to register a new contestant</p>
    </div>  
  <br>
  
  <!-- FORM to add new contestant ==== -->

    <div class="row justify-content-center mt-3">
      <div class="col-lg-8 col-xl-7">
          
            <form action="pageant_admin_add.php" method="post" enctype="multipart/form-data" class="card shadow-lg p-4 p-md-5 bg-dark text-white rounded-4 border-0">

              <?php if ($addSuccess != '') { ?>
                <div class="alert alert-success">
                  <?php echo $addSuccess; ?>
                </div>
              <?php } ?>

              <?php if ($addError != '') { ?>
                <div class="alert alert-danger">
                  <?php echo $addError; ?>
                </div>
              <?php } ?>
              
              <!-- header -->
              <h5 class="fw-bold mb-4 text-light text-uppercase border-bottom border-secondary pb-2">Contestant Information</h5>

              <!-- Fullname -->
              <div class="mb-4"> 
                  <label class="form-label fw-semibold text-white">Full Name</label>
                  <input type="text" name="fullname" placeholder="Fullname" class="form-control form-control-lg text-dark border-0" required>
              </div>

              <!-- Location -->
              <div class="mb-4">
                  <label class="form-label fw-semibold text-white">Location / Representation</label>
                  <input type="text" name="location" placeholder="City/Region" class="form-control form-control-lg text-dark border-0" required>
              </div>

              <!-- Category -->
              <div class="mb-4">
                  <label class="form-label fw-semibold text-white">Pageant Category</label>
                    <select name="categories" class="form-select form-select-lg border-0" required>
                      <option disabled selected value="">-- Choose Category --</option>
                      <?php
                        $categorySql = "SELECT category_id, category_name FROM tbl_category ORDER BY category_name";
                        $categoryResult = $conn->query($categorySql);
                        if ($categoryResult && $categoryResult->num_rows > 0) {
                          while ($categoryRow = $categoryResult->fetch_assoc()) {
                            echo "<option value='".$categoryRow['category_id']."'>".$categoryRow['category_name']."</option>";
                          }
                        }
                      ?>
                  </select>
              </div>

              <!-- Description -->
              <div class="mb-5">
                  <label class="form-label fw-semibold text-white">Description</label>
                  <textarea name="desc" rows="3" placeholder="Brief background overview..." class="form-control border-0"></textarea>
              </div>

              <!-- Header-->
              <h5 class="fw-bold mb-4 text-light text-uppercase border-bottom border-secondary pb-2">Contestant Profile</h5>

              <!-- CONTESTANT PICTURE / IMAGE -->
                <div class="mb-5 card p-4 border-dashed align-items-center">
                  <img src="imagespvs/contestant.png" alt="Contestant Profile" width="180" height="180" class="mb-3 rounded-3 img-thumbnail bg-dark border-0 shadow-sm" id="preview" style="object-fit: cover;"> 
                  <div class="w-100 px-md-4">
                    <input type="file" name="upload_img" accept="image/*" class="form-control shadow-lg bg-dark text-white border-0" onchange="previewimg(event);">
                  </div>
                </div> 

              <!-- Button -->
              <div class="d-grid mt-4"> 
                  <input type="submit" value="Register Contestant" name="sub" class="btn btn-color btn-lg text-white py-3 fw-bold shadow-sm">
              </div>
  </form>

      <!-- ==== PHP SECTION ==== -->
      <!-- PHP Display Table Ends Here -->

    </main>
  </div>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function previewimg(event) {
      var input = event.target;
      var preview = document.getElementById('preview');
      if (!preview) {
        return;
      }
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          preview.src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
      } else {
        preview.src = 'imagespvs/contestant.png';
      }
    }
  </script>
</body>
</html>