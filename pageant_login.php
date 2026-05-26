<?php
require_once "dbaseconnection.php";

session_start();

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: pageant_login.php");
    exit();
}

$loginError = false;

if (isset($_POST['sub'])) {

    // user input
    $username = $_POST['username'];
    $pass = md5($_POST['password']);

    $loginsql = "SELECT * FROM tbl_users
                   WHERE username = '".$username."' 
                   AND password = '".$pass."'
                   AND status = 'Active'";

    $result = $conn->query($loginsql);

    // check if valid login
    if ($result && $result->num_rows == 1) {

        $fieldname = $result->fetch_assoc();

        $role = $fieldname['role'];
        $fullname = $fieldname['fullname'];
        $email = $fieldname['email'];
        $id = $fieldname['user_id'];

        // session variables
        $_SESSION['role'] = $role;
        $_SESSION['fullname'] = $fullname;
        $_SESSION['id'] = $id;

        $logssql = "INSERT INTO tbl_logs (user_id, fullname, email, action)
                    VALUES ('".$_SESSION['id']."', '".$fullname."', '".$email."', 'logged in')";
        $conn->query($logssql);

        if ($role == "admin") {

            header("Location: pageant_admin.php");
            exit();

        } else if ($role == "judge") {

            header("Location: pageant_judge.php");
            exit();

        } else if ($role == "organizer") {

            header("Location: pageant_org_category.php");
            exit();

        }

    } else {
        $loginError = true;
    }
}
?>

<!-- UPDATED -->
<!-- Pageant LOGIN page UPDATED -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
    /* bg right column for LOGIN */
    .login-bg { 
        
        background-image: url('imagespvs/crown.jpg');
        background-size: cover;
        background-position: center;
        min-height: 100%;
        border: 10px solid #212325; 
        border-radius: 0 10px 10px 0; 
    
    }

    .login-cover {
        background-image: url('imagespvs/cover-login.png'); 
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

<body class="login-cover">

<div class="container center-container">
    <form action="pageant_login.php" method="post" class="w-100"> <!-- insert output -->

    <div class="row g-0">
        
        <!-- LEFT COLUMN / form-->
        <div class="col-md-5 p-5 cover-dark text-light rounded-start shadow-lg">

            <!-- LOGO -->
             <div class="d-flex justify-content-center mb-3"> 
                <img src="imagespvs/logo-login.png" alt="Logo" width="90" height="90" class="rounded-4">
             </div>

            <!-- DISPLAY -->
            <div class="text-center mb-5"> 
                <h1 class="display-6 mb-0">Login</h1>
                <small class="text-light">Please sign in to continue</small>
            </div>
                            
            <!-- Username -->
            <div class="mb-3 px-3"> 
                <label class="form-label">Username</label>  
                <input type="text" class="form-control shadow-sm" name="username" placeholder="Enter your username">
            </div>
            
            <!-- Password -->
            <div class="mb-4 px-3"> 
                <label class="form-label">Password</label>
                <input type="password" class="form-control shadow-sm" name="password" placeholder="Enter your password">
            </div>
            
            <!-- Button -->
            <div class="d-grid px-3 mb-4"> 
                <input type="submit" value="LOGIN" name="sub" class="btn btn-secondary py-2 shadow">
            </div>

            <!-- LINK to Register -->
             <hr>
             <div class="text-center">
                <p class="mb-0">Don't have an account? <a class="text-decoration-none" href="pageant_register.php">Register Here</a></p>
             </div>

        <!-- END left column -->
        </div>

        <!-- RIGHT COLUMN / image -->
        <div class="col-md-7 login-bg rounded-end shadow-lg d-none d-md-block">
            <!-- END right column -->
        </div>

    <!-- END row  -->
    </div>

    </form>
</div>

<?php
if ($loginError) {
?>
<script>
    Swal.fire({
        title: 'Login Failed!',
        text: 'Invalid Account!',
        icon: 'error'
    });
</script>
<?php
}
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>