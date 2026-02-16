<?php
session_start();

if (!empty($_SESSION['isLogin'])) {
    header("Location: graphical-dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login</title>
    <link rel="apple-touch-icon" sizes="180x180" href="../img/favicons/myLogo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicons/myLogo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicons/myLogo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body class="d-flex flex-column">
    <!-- preloader start -->
    <div class="preloader">
        <div class="preloader-block">
            <div class="preloader-icon">
                <span class="loading-dot loading-dot-1"></span>
                <span class="loading-dot loading-dot-2"></span>
                <span class="loading-dot loading-dot-3"></span>
            </div>
        </div>
    </div>
    <!-- preloader end -->
    <div class="m-auto">
        <div class="login-box">
            <h5 class="mb-2">ADMIN LOGIN</h5>
            <h6 class="mb-3">Fill Required Details</h6>
            <form action="#" id="logIn" method="POST">
                <input type="text" class="input-glass" placeholder="Username" name="username" required>

                <div class="password-wrap">
                    <input type="password" class="input-glass" name="password" id="password" placeholder="Password" required>
                    <i class="fa-solid fa-eye" id="togglePassword"></i>
                </div>

                <button class="btn-signin" type="submit" id="submit">LOG IN</button>

                <div class="options">
                    <label class="d-none d-sm-block"><input type="checkbox" name="remember">Remember Me</label>
                    <a href="forgot-password.php" class="text-decoration-underline">Forgot Password?</a>
                </div>
            </form>

            <div class="divider">Or Connect With</div>

            <div class="social-buttons d-sm-flex flex-column flex-sm-row">
                <button><i class="fab fa-facebook me-2"></i>Facebook</button>
                <button><i class="fab fa-google me-2"></i>Google</button>
            </div>
            <div class="options mb-0">
                <a href="../index.php" class="text-decoration-underline m-auto">Go back to website page?</a>
            </div>
        </div>
    </div>
    <div class="container text-center pb-1" style="
        position: sticky;
        bottom: 0px; color: #ffff;
        z-index: 1;">
        <?php
        $year = date("Y");
        ?>
        © <?php echo $year; ?> RITIK KUMAR | All Rights Reserved | Personal Portfolio Website - Web Hosting By - <a href="https://trendtech.in/" target="_blank" style="color: #009e66; font-weight: 700;">Trend Tech</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.ripples@0.6.3/dist/jquery.ripples.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="assets/js/login.js"></script>
</body>
</html>