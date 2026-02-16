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

    // toastr.success("Welcome to Digiboard Admin Panel!");

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
                    toastr.success("Logout successfully!");
                    setTimeout(() => {
                        window.location.href = "index.php";
                    }, 500);
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
        var conn = new WebSocket('ws://localhost:8080');

        conn.onopen = function() {
            console.log("Connected to WebSocket server");
        };

        conn.onmessage = function(e) {
            // Parse JSON message
            let data = JSON.parse(e.data);
            if (data.type === 'new_mail') {
                toastr.info(`${data.name} sent a mail`, "New Mail");
            } else if (data.type === 'new_feedback') {
                toastr.info(`${data.name} submitted feedback`, "New Feedback");
            }
        };
    });
</script>

</body>

</html>