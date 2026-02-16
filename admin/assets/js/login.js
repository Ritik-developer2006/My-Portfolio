// toastr initialize
toastr.options = {
    "closeButton": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "timeOut": "3000",
    "extendedTimeOut": "1000",
    "showDuration": "300",
    "hideDuration": "300",
    "showEasing": "swing",
    "hideEasing": "linear"
};

// Password Visibility Toggle
const toggle = document.getElementById('togglePassword');
const password = document.getElementById('password');

if (toggle && password) {
    toggle.addEventListener('click', () => {
        const type = password.type === 'password' ? 'text' : 'password';
        password.type = type;

        // Toggle between open eye and slashed eye icons
        toggle.classList.toggle('fa-eye-slash');
        toggle.classList.toggle('fa-eye');
    });
}

// Password Visibility Toggle
const toggleConfirm = document.getElementById('toggleConfirmPassword');
const confirmPassword = document.getElementById('confirmPassword');

if (toggleConfirm && confirmPassword) {
    toggleConfirm.addEventListener('click', () => {
        const type = confirmPassword.type === 'password' ? 'text' : 'password';
        confirmPassword.type = type;

        // Toggle between open eye and slashed eye icons
        toggleConfirm.classList.toggle('fa-eye-slash');
        toggleConfirm.classList.toggle('fa-eye');
    });
}

$(function () {

    if (typeof $.fn.ripples !== 'function') {
        console.error('Ripples plugin still not available');
        return;
    }

    const $body = $('body');

    $body.ripples({
        resolution: 600,
        dropRadius: 25,
        perturbance: 0.02
    });

    // Auto waves
    setInterval(() => {
        $body.ripples(
            'drop',
            Math.random() * window.innerWidth,
            Math.random() * window.innerHeight,
            30,
            0.03
        );
    }, 2500);

    // Click waves
    $body.on('click', e => {
        $body.ripples('drop', e.pageX, e.pageY, 40, 0.04);
    });

});

$(document).ready(function () {
    $("#logIn").on("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("method", "logIn");
        $.ajax({
            type: 'POST',
            url: '/API/adminApi.php',
            dataType: 'JSON',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $(".preloader").show();
            },
            complete: function () {
                $(".preloader").hide();
            },
            success: function (response) {
                console.log(response);
                let status = response.status;
                if (status == 1) {
                    toastr.success("Log in successfully.");
                    setTimeout(() => {
                        window.location.href = "graphical-dashboard.php";
                    }, 500);
                } else {
                    toastr.error("Incorrect Username or Password!");
                }
            },
            error: function () {
                toastr.error("Something went wrong, Try again!");
            }
        });
    });

    $("#forgotPassword").on("submit", function (e) {
        $(".forgot-btn").html("Please wait...");
        $(".forgot-btn").prop("disabled", true);
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("method", "forgotPassword");
        $.ajax({
            type: 'POST',
            url: '/API/adminApi.php',
            dataType: 'JSON',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $(".preloader").show();
            },
            complete: function () {
                $(".preloader").hide();
            },
            success: function (response) {
                // console.log(response);
                let status = response.status;
                if (status == 1) {
                    toastr.success("Otp sent in your email.");
                    setTimeout(() => {
                        window.location.href = "verify-otp.php";
                    }, 500);
                } else {
                    $(".forgot-btn").html("Submit");
                    $(".forgot-btn").prop("disabled", false);
                    toastr.error("No such email exists!");
                }
            },
            error: function () {
                $(".forgot-btn").html("Submit");
                $(".forgot-btn").prop("disabled", false);
                toastr.error("Something went wrong!");
            }
        });
    });

    $('.input-otp-glass').on('input', function () {
        // allow only numbers
        this.value = this.value.replace(/[^0-9]/g, '');
        if (this.value.length === 1) {
            $(this).next('.input-otp-glass').focus();
        }
    });

    $('.input-otp-glass').on('keydown', function (e) {
        if (e.key === 'Backspace') {
            if (this.value === '') {
                $(this).prev('.input-otp-glass').focus();
            } else {
                this.value = '';
            }
        }
    });

    $("#verifyOtp").on("submit", function (e) {
        $(".verify-btn").html("Please wait...");
        $(".verify-btn").prop("disabled", true);
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("method", "verifyOtp");
        $.ajax({
            type: 'POST',
            url: '/API/adminApi.php',
            dataType: 'JSON',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $(".preloader").show();
            },
            complete: function () {
                $(".preloader").hide();
            },
            success: function (response) {
                // console.log(response);
                let status = response.status;
                if (status == 1) {
                    toastr.success("Otp verified successfully.");
                    setTimeout(() => {
                        window.location.href = "reset-password.php";
                    }, 500);
                } else {
                    $(".verify-btn").html("Verify OTP");
                    $(".verify-btn").prop("disabled", false);
                    toastr.error("Invalid OTP!");
                }
            },
            error: function () {
               $(".verify-btn").html("Verify OTP");
                $(".verify-btn").prop("disabled", false);
                toastr.error("Something went wrong!");
            }
        });
    });

    $("#resetPassword").on("submit", function (e) {
        $(".reset-btn").html("Please wait...");
        $(".reset-btn").prop("disabled", true);

        let password = $("#password").val().trim();
        let confirmPassword = $("#confirmPassword").val().trim();
        if (password !== confirmPassword) {
            $(".reset-btn").html("Reset Password");
            $(".reset-btn").prop("disabled", false);
            toastr.warning("Password and Confirm Password do not match!");
            return false;
        }
        
        if (password.length < 6) {
            $(".reset-btn").html("Reset Password");
            $(".reset-btn").prop("disabled", false);
            toastr.warning("Password too short!");
            return false;
        }

        e.preventDefault();
        var formData = new FormData(this);
        formData.append("method", "resetPassword");
        $.ajax({
            type: 'POST',
            url: '/API/adminApi.php',
            dataType: 'JSON',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $(".preloader").show();
            },
            complete: function () {
                $(".preloader").hide();
            },
            success: function (response) {
                // console.log(response);
                let status = response.status;
                if (status == 1) {
                    toastr.success("Password reset successfully.");
                    setTimeout(() => {
                        window.location.href = "index.php";
                    }, 500);
                } else {
                    $(".reset-btn").html("Reset Password");
                    $(".reset-btn").prop("disabled", false);
                    toastr.error(response.msg);
                }
            },
            error: function () {
                $(".reset-btn").html("Reset Password");
                $(".reset-btn").prop("disabled", false);
                toastr.error("Something went wrong!");
            }
        });
    });

    setTimeout(() => {
        $(".preloader").hide();
    }, 500);
});