<!-- UPDATED -->
<!-- Pageant REGISTER page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>

    /* bg left column for REGISTER */
      .register-bg {
        background-image: url('imagespvs/crown2.jpg'); 
        background-size: cover;
        background-position: center;
        min-height: 100%;
        border: 10px solid #212325; 
        border-radius: 10px 0 0 10px; 
        
    }

    .register-cover {
        background-image: url('imagespvs/cover-register.png'); 
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed; 
        min-height: 100vh;
    }

    .cover-dark {
        background-color: #212325;
    }

    body, html { height: 100%; }
    .center-container { min-height: 100vh; display: flex; align-items: center; }


    </style>

</head>
<body class="register-cover">

<div class="container center-container">
    <form action="pageant_register.php" method="post" class="w-100"> <!-- insert output -->

    <div class="row g-0">
        <!-- LEFT COLUMN / image-->
        <div class="col-md-7 p-4 mt-5 mb-5 register-bg rounded-start shadow-lg d-none d-md-block">

        <!-- END left column -->
        </div>

        <!-- RIGHT COLUMN / form -->
        <div class="col-md-5 p-4 mt-5 mb-5 rounded-end shadow-lg cover-dark text-light">

            <!-- LOGO -->
             <div class="d-flex justify-content-center mb-3"> 
                <img src="imagespvs/logo-login.png" alt="Logo" width="90" height="90" class="rounded-4">
             </div>

            <!-- DISPLAY -->
            <div class="text-center mb-5"> 
                <h1 class="display-6 mb-0">Register</h1>
                <small class="text-light">Create an account to get started</small>
            </div>
            
                <!-- Fullname -->

                <div class="mb-3 px-3"> 
                    <label class="form-label">Full Name</label>  
                    <input type="text" class="form-control shadow-sm" name="name">
                </div>

                <!-- Email -->
                <div class="mb-3 px-3"> 
                    <label class="form-label">Email</label>  
                    <input type="email" class="form-control shadow-sm" name="email">
                </div>

                <!-- Username -->
                <div class="mb-3 px-3"> 
                    <label class="form-label">Username</label>  
                    <input type="text" class="form-control shadow-sm" name="username">
                </div>


                <!-- Password -->
                <div class="mb-5 px-3"> 
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control shadow-sm" name="password">
                </div>
                

                <!-- Button -->
                <div class="d-grid px-3 mb-4"> 
                    <input type="submit" value="Register" name="submit" class="btn btn-secondary py-2 shadow">
                </div>

                <!-- LINK to Login -->
                 <hr>
                 <div class="text-center">
                    <p class="mb-0">Already have an account? <a class="text-decoration-none" href="pageant_login.php">Login Here</a></p>
                 </div>

            
        </div>

        <!-- END right column -->
        </div>


    <!-- END row  -->
    </div>

    </form>
</div>
    
<?php
require_once "dbaseconnection.php";
require_once "verifyotpemail.php";

if (isset($_POST['submit'])) {

    $fullname = $_POST['name'];
    $email = $_POST['email'];
    $username= $_POST['username'];
    $password = md5($_POST['password']);
    $otp = rand(000000,999999);
    
    $insertsql = "INSERT INTO tbl_users 
    (fullname, email, password, username, otp, status, role)
    VALUES 
    ('$fullname', '$email','$password', '$username', $otp, 'Pending', 'judge')";

    $result = $conn->query($insertsql);
if ($result) {
    send_verification($fullname, $email, $otp);
?>

<script>
    Swal.fire({
      title: 'Good job!',
      text: 'Account Created!',
      icon: 'success'
    }). then(() => {
        window.location.href = "otpverification.php";
    });
</script>
<?php
} else {
    echo $conn->error;
}
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>



</body>
</html>