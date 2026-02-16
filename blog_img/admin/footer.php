<!-- footer start -->
<div class="footer border shadow">
    <p>© <script>
            document.write(new Date().getFullYear())
        </script> RITIK KUMAR | All Rights Reserved | Personal Portfolio Website - Web Hosting By - <a href="https://trendtech.in/" target="_blank" style="color: #009e66; font-weight: 700;">Trend Tech</a></p>
</div>
<!-- footer end -->
</div>
<!-- main content end -->

<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/js/jquery.overlayScrollbars.min.js"></script>
<script src="assets/js/apexcharts.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/daterangepicker.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/dashboard.js"></script>
<script src="assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- for demo purpose -->
<script>
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

    var rtlReady = $('html').attr('dir', 'ltr');
    if (rtlReady !== undefined) {
        localStorage.setItem('layoutDirection', 'ltr');
    }
    setTimeout(() => {
        $(".preloader").hide();
    }, 500);

    $(".logOut").on("click", function(e) {
        $.ajax({
            type: 'POST',
            url: '/API/adminApi.php',
            dataType: 'JSON',
            data: JSON.stringify({
                method: 'logOut'
            }),
            contentType: "application/json",
            beforeSend: function() {
                $(".preloader").show();
            },
            complete: function() {
                $(".preloader").hide();
            },
            success: function(response) {
                console.log(response);
                let status = response.status;
                if (status == 1) {
                    alert("LogOut successfully!");
                    window.location.href = "index.php";
                } else {
                    alert("Something went wrong!");
                }
            },
            error: function() {
                alert("Something went wrong!");
            }
        });
    });

    $("#navClose").click(function() {
        $(this).find("i").toggleClass("rotate-180");
    });

    // For dark-light mode theme icon toggle
    $("#darkTheme, #lightTheme").click(function() {
        $("#darkTheme").toggleClass("d-none");
        $("#lightTheme").toggleClass("d-none");
    });
</script>

<!-- for web socket -->
<script>
    $(document).ready(function() {

        let ws = new WebSocket("ws://localhost:8080");

        ws.onopen = function() {
            console.log("WebSocket connected");
        };

        ws.onmessage = function(event) {
            let data = JSON.parse(event.data);

            if (data.type === "new_mail") {
                toastr.success("New Message from " + data.name);
                increaseNotification();
            }

            if (data.type === "new_feedback") {
                toastr.success("New Feedback from " + data.name);
                increaseNotification();
            }
        };

        ws.onerror = function() {
            console.log("WebSocket error");
        };

        function increaseNotification() {
            let count = parseInt($("#notiCount").text()) || 0;
            $("#notiCount").text(count + 1);
        }

    });
</script>

<!-- for demo purpose -->
</body>

<!-- Mirrored from digiboard-html.codebasket.xyz/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 17 Dec 2025 15:46:47 GMT -->

</html>