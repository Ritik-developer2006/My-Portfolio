<?php
session_start();

if (!isset($_SESSION['forgot_password']) || !isset($_SESSION['forgot_password_time'])) {
    header("Location: index.php");
    exit;
}
if (time() - $_SESSION['forgot_password_time'] > 300) {
    session_destroy();
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Verify OTP</title>
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
            <h5 class="mb-2">OTP VERIFICATION</h5>
            <h6 class="mb-4">Fill Required Details</h6>
            <form action="#" id="verifyOtp" method="POST">
                <div class="otp-container d-flex gap-3 justify-content-center">
                    <input type="text" maxlength="1" class="input-otp-glass" name='otp1' required />
                    <input type="text" maxlength="1" class="input-otp-glass" name='otp2' required />
                    <input type="text" maxlength="1" class="input-otp-glass" name='otp3' required />
                    <input type="text" maxlength="1" class="input-otp-glass" name='otp4' required />
                </div>

                <button class="btn-signin" type="submit" id="submit">Verify OTP</button>

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