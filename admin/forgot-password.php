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
    <title>Forgot Password</title>
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
    <div class="m-auto d-flex justify-content-center">
        <div class="forgot-password-box">
            <h5 class="mb-2">FORGOT PASSWORD</h5>
            <h6 class="mb-4">Fill Required Details</h6>
            <form action="#" id="forgotPassword" method="POST">
                <input type="email" class="input-glass" placeholder="Your Email Address" name="email" required>

                <button class="btn-signin forgot-btn" type="submit" id="submit">Submit</button>

                <div class="options d-flex justify-content-end">
                    <a href="index.php" class="text-decoration-underline">Back to Login?</a>
                </div>
            </form>

            <div class="divider">Or Connect With</div>

            <div class="social-buttons d-sm-flex flex-column flex-sm-row">
                <button><i class="fab fa-facebook me-2"></i>Facebook</button>
                <button><i class="fab fa-google me-2"></i>Google</button>
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