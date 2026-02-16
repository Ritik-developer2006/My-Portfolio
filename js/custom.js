$(document).ready(function () {
    // console.log("Custom JS is running!");

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

    // ripples initialize
    if (typeof $.fn.ripples !== 'function') {
        console.error('Ripples plugin still not available');
        return;
    }

    const $body = $('body');

    $body.ripples({
        resolution: 600,
        dropRadius: 25,
        perturbance: 0.08
    });

    // auto waves
    setInterval(() => {
        $body.ripples(
            'drop',
            Math.random() * window.innerWidth,
            Math.random() * window.innerHeight,
            10,
            0.08
        );
    }, 2000);

    // Click waves
    $body.on('click', e => {
        $body.ripples('drop', e.pageX, e.pageY, 40, 0.04);
    });

    // ripples end

    // Image cropper start
    let cropper;
    $("#feedback-file").on("change", function (e) {
        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function (evt) {
            $("#imagePreview").attr("src", evt.target.result);
            $("#cropOverlay").show();

            if (cropper) cropper.destroy();

            cropper = new Cropper(document.getElementById("imagePreview"), {
                aspectRatio: 1,
                viewMode: 1,
                dragMode: 'move',
                cropBoxMovable: false,
                cropBoxResizable: false,
                zoomable: true
            });
        };
        reader.readAsDataURL(file);
    });

    $("#cropBtn").on("click", function () {
        const canvas = cropper.getCroppedCanvas({
            width: 300,
            height: 300
        });

        canvas.toBlob(function (blob) {
            const file = new File([blob], "cropped.png", {
                type: "image/png"
            });

            // Replace file input value with cropped image
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            document.getElementById("feedback-file").files = dataTransfer.files;

            $("#cropOverlay").hide();
            cropper.destroy();
            cropper = null;
        });
    });

    $("#closeCrop").on("click", function () {
        $("#cropOverlay").hide();
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
    });

    $("#closeCrop").on("click", function () {
        $("#cropOverlay").hide();
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
        // Clear file input
        $("#feedback-file").val("");
    });
    // Image cropper end

    // Download CV
    $('#download_cv').click(function () {
        var pdfUrl = "/Resume/cv.pdf";
        $.ajax({
            url: pdfUrl,
            type: 'HEAD',
            success: function () {
                var link = document.createElement('a');
                link.href = pdfUrl;
                link.download = 'cv.pdf';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                toastr.success("CV downloaded successfully!");
            },
            error: function () {
                toastr.error("File not found!");
            }
        });
    });

    // File input validation
    $("#contact-file").on("change", function () {
        var file = $(this).val();
        if (!file) return;

        var allowedExtensions = /(\.pdf|\.doc|\.docx|\.xls|\.xlsx|\.jpg|\.jpeg|\.png|\.gif)$/i;
        if (!allowedExtensions.exec(file)) {
            alert("Invalid file type. Please upload PDF, DOCX, Excel, or an image file.");
            $(this).val("");
            return false;
        }
    });

    // Contact form submit
    $("#contact-form").on("submit", function (e) {
        $("#contact-submit").html("Sending...");
        $("#contact-submit").prop("disabled", true);
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("method", "send_mail");
        $.ajax({
            type: 'POST',
            url: '/API/userApi.php',
            dataType: 'JSON',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $(".preloader, .preloader-icon").show();
            },
            complete: function () {
                $(".preloader, .preloader-icon").hide();
            },
            success: function (response) {
                let status = response.status;
                if (status == 1) {
                    toastr.success("Mail sent successfully!");
                    setTimeout(() => {
                        location.reload();
                    }, 500);
                } else {
                    $("#contact-submit").html("Send Message");
                    $("#contact-submit").prop("disabled", false);
                    toastr.error("Something went wrong, Try again!");
                }
            },
            error: function () {
                $("#contact-submit").html("Send Message");
                $("#contact-submit").prop("disabled", false);
                toastr.error("Something went wrong!");
            }
        });
    });

    // Feedback form Submit
    $("#feedback-form").on("submit", function (e) {
        $("#feedback-submit").html("Sending...");
        $("#feedback-submit").prop("disabled", true);
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("method", "send_feedback");
        $.ajax({
            type: 'POST',
            url: '/API/userApi.php',
            dataType: 'JSON',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $(".preloader, .preloader-icon").show();
            },
            complete: function () {
                $(".preloader, .preloader-icon").hide();
            },
            success: function (response) {
                let status = response.status;
                if (status == 1) {
                    toastr.success("Your feedback sent!");
                    setTimeout(() => {
                        location.reload();
                    }, 500);
                } else {
                    $("#feedback-submit").html("Submit");
                    $("#feedback-submit").prop("disabled", false);
                    toastr.error("Something went wrong, Try again!");
                }
            },
            error: function () {
                $("#feedback-submit").html("Submit");
                $("#feedback-submit").prop("disabled", false);
                toastr.error("Something went wrong, Try again!");
            }
        });
    });

    // Feedback modal
    $("#your_feeedback").on("click", function () {
        $("#myModal").modal("show");
    });

    // get All Projects
    function getAllProjects() {
        $.ajax({
            type: 'POST',
            url: '/API/adminApi.php',
            dataType: 'JSON',
            data: {
                method: 'getAllProject',
            },
            beforeSend: function () {
                $(".preloader, .preloader-icon").show();
            },
            complete: function () {
                $(".preloader, .preloader-icon").hide();
            },
            success: function (response) {
                let status = response.status;
                let html = '';
                if (status == 1) {
                    if (response.data.length > 0) {
                        $.each(response.data, function (index, item) {
                            html += `<div class="single-item col-6 col-lg-4 ${item.name} your_project" data-id="${item.id}">
                                        <a class="portfolio-item" href="#">
                                        <div class="portfolio-wrapper"><img class="img-fluid" alt="Item" src="img/${item.images}">
                                            <div class="item-content">
                                            <h6 class="content-title">${item.project_name}</h6>
                                            <span class="content-more your_project">More Info</span>
                                            </div>
                                        </div>
                                        </a>
                                    </div>`;
                        });
                    }
                    $("#portfolio-grid").html(html);
                    // alert("Message sent successfully!");
                    // location.reload();
                } else {
                    alert("Something went wrong, Try again!");
                }
            },
            error: function () {
                alert("Something went wrong!");
            }
        });
    }
    getAllProjects();

    // Single Project Detail modal
    $("body").on("click", ".your_project", function () {
        var id = $(this).data("id");
        $.ajax({
            type: 'POST',
            url: '/API/adminApi.php',
            dataType: 'JSON',
            data: {
                method: 'getSingleProject',
                id: id,
            },
            beforeSend: function () {
                $(".preloader, .preloader-icon").show();
            },
            complete: function () {
                $(".preloader, .preloader-icon").hide();
            },
            success: function (response) {
                let status = response.status;
                let html = "";
                if (status == 1) {
                    if (response.data.length > 0) {
                        let item = response.data[0];
                        html += `<div class="card single-post" style="background-color: transparent;">
                                    <a class="post-img" href="#">
                                        <img class="card-img-top" src="img/${item.images}" alt="Blog post">
                                        <span class="" style="display: flex; justify-content: end; font-weight: 700;">
                                            <a href="${item.link}" target="_blank" style="display: flex; justify-content: end; font-weight: 700;">Go To Site</a>
                                        </span>
                                    </a>
                                    <div class="card-body post-content pl-0 pr-0">
                                        <a href="#"><h5 class="card-title content-title">${item.project_name}</h5></a>
                                        <p class="card-text">${item.description}</p>
                                    </div>
                                </div>`
                    }
                    $("#my_modal").html(html);
                    $("#modal_title").html("Project Detail");
                } else {
                    alert("Something went wrong, Try again!");
                }
                $("#my_Modal").modal("show");
            },
            error: function () {
                alert("Something went wrong!");
            }
        });
    });

    function formatDate(dateString) {
        const date = new Date(dateString);

        const day = date.getDate();
        const month = date.toLocaleString('en-US', { month: 'short' });
        const year = date.getFullYear().toString();

        return `${day} ${month}, ${year}`;
    }


    // get All Blogs
    function getAllBlogs() {
        $.ajax({
            type: 'POST',
            url: '/API/adminApi.php',
            dataType: 'JSON',
            data: {
                method: 'getAllBlogs',
            },
            beforeSend: function () {
                $(".preloader, .preloader-icon").show();
            },
            complete: function () {
                $(".preloader, .preloader-icon").hide();
            },
            success: function (response) {
                let status = response.status;
                let html = '';
                if (status == 1) {
                    if (response.data.length > 0) {
                        $.each(response.data, function (index, item) {
                            html += `<div class="col-12 col-sm-8 col-lg-4 your_blog">
                                        <div class="card single-post"><a class="post-img" href="#">
                                            <img class="card-img-top" src="blog_img/${item.card_image}" alt="Blog post">
                                            <span class="content-date">${formatDate(item.created_at)}</span></a>
                                            <div class="card-body post-content">
                                                <a href="#"><h5 class="card-title content-title">${item.title}</h5></a>
                                                <p class="card-text content-description">${item.description}</p>
                                            </div>
                                            <span class="see-more text-primary single_blog" data-id="${item.id}" style="cursor:pointer;">See more</span>
                                        </div>
                                    </div>`;
                        });
                    }
                    $("#all_blog_container").html(html);
                    // alert("Message sent successfully!");
                } else {
                    alert("Something went wrong, Try again!");
                }
            },
            error: function () {
                alert("Something went wrong!");
            }
        });
    }
    getAllBlogs();

    // Single Plog Detail modal
    $("body").on("click", ".single_blog", function () {
        let id = $(this).data("id");
        // alert(id);
        $.ajax({
            type: 'POST',
            url: '/API/adminApi.php',
            dataType: 'JSON',
            data: {
                method: 'getSingleBlog',
                id: id,
            },
            beforeSend: function () {
                $(".preloader, .preloader-icon").show();
            },
            complete: function () {
                $(".preloader, .preloader-icon").hide();
            },
            success: function (response) {
                let status = response.status;
                let html = ""
                if (status == 1) {
                    // alert("Message sent successfully!");
                    if (response.data.length > 0) {
                        let item = response.data[0];
                        html += `<div class="card single-post" style="background-color: transparent;"><a class="post-img" href="#">
                                    <img class="card-img-top" src="blog_img/${item.card_image}" alt="Blog post">
                                    <span class="" style="display: flex; justify-content: end; font-weight: 700;">${formatDate(item.created_at)}</span></a>
                                    <div class="card-body post-content pl-0 pr-0">
                                        <a href="#"><h5 class="card-title content-title">${item.title}</h5></a>
                                        <p class="card-text">${item.full_detail}</p>
                                    </div>
                                </div>`
                    }
                    $("#my_modal").html(html);
                    $("#modal_title").html("Blog Detail");
                } else {
                    alert("Something went wrong, Try again!");
                }
                $("#my_Modal").modal("show");
            },
            error: function () {
                alert("Something went wrong!");
            }
        });
    });

    // Single servies Detail modal
    $("body").on("click", ".more-single-service", function () {
        let id = $(this).data("id");
        // alert(id);
        $.ajax({
            type: 'POST',
            url: '/API/adminApi.php',
            dataType: 'JSON',
            data: {
                method: 'getSingleService',
                id: id,
            },
            beforeSend: function () {
                $(".preloader, .preloader-icon").show();
            },
            complete: function () {
                $(".preloader, .preloader-icon").hide();
            },
            success: function (response) {
                let status = response.status;
                let html = ""
                if (status == 1) {
                    // alert("Message sent successfully!");
                    if (response.data.length > 0) {
                        let item = response.data[0];
                        html += `<div class="card single-post" style="background-color: transparent;">
                                    <h5 class="item-title">${item.heading}</h5>
                                    <div class="card-body post-content pl-0 pr-0">
                                        <p class="card-text">${item.description}</p>
                                    </div>
                                </div>`
                    }
                    $("#my_modal").html(html);
                    $("#modal_title").html("Service Detail");
                } else {
                    alert("Something went wrong, Try again!");
                }
                $("#my_Modal").modal("show");
            },
            error: function () {
                alert("Something went wrong!");
            }
        });
    });

    // Single Education Detail modal
    $("body").on("click", ".education_detail", function () {
        let id = $(this).data("id");
        // alert(id);
        $.ajax({
            type: 'POST',
            url: '/API/adminApi.php',
            dataType: 'JSON',
            data: {
                method: 'getSingleEducation',
                id: id,
            },
            beforeSend: function () {
                $(".preloader, .preloader-icon").show();
            },
            complete: function () {
                $(".preloader, .preloader-icon").hide();
            },
            success: function (response) {
                let status = response.status;
                let html = ""
                if (status == 1) {
                    // alert("Message sent successfully!");
                    if (response.data.length > 0) {
                        let item = response.data[0];
                        html += `<div class="card single-post" style="background-color: transparent;">
                                    <h5 class="item-title">${item.education_name}</h5>
                                    <span class="item-details">${item.university} / ${item.from_year} - ${item.to_year}</span>
                                    <div class="card-body post-content pl-0 pr-0">
                                        <p class="card-text">${item.description}</p>
                                    </div>
                                </div>`
                    }
                    $("#my_modal").html(html);
                    $("#modal_title").html('Education Detail');
                } else {
                    alert("Something went wrong, Try again!");
                }
                $("#my_Modal").modal("show");
            },
            error: function () {
                alert("Something went wrong!");
            }
        });
    });

    // Single Experience Detail modal
    $("body").on("click", ".experience_detail", function () {
        let id = $(this).data("id");
        // alert(id);
        $.ajax({
            type: 'POST',
            url: '/API/adminApi.php',
            dataType: 'JSON',
            data: {
                method: 'getSingleExperience',
                id: id,
            },
            beforeSend: function () {
                $(".preloader, .preloader-icon").show();
            },
            complete: function () {
                $(".preloader, .preloader-icon").hide();
            },
            success: function (response) {
                let status = response.status;
                let html = ""
                if (status == 1) {
                    // alert("Message sent successfully!");
                    if (response.data.length > 0) {
                        let item = response.data[0];
                        html += `<div class="card single-post" style="background-color: transparent;">
                                    <h5 class="item-title">${item.job_title}</h5>
                                    <span class="item-details">${item.company_name} / ${item.from_year} - ${item.to_year}</span>
                                    <div class="card-body post-content pl-0 pr-0">
                                        <p class="card-text">${item.description}</p>
                                    </div>
                                </div>`
                    }
                    $("#my_modal").html(html);
                    $("#modal_title").html('Experience Detail');
                } else {
                    alert("Something went wrong, Try again!");
                }
                $("#my_Modal").modal("show");
            },
            error: function () {
                alert("Something went wrong!");
            }
        });
    });

    // Single testimonials Detail modal
    $("body").on("click", ".testimonial_detail", function () {
        let id = $(this).data("id");
        // alert(id);
        $.ajax({
            type: 'POST',
            url: '/API/adminApi.php',
            dataType: 'JSON',
            data: {
                method: 'getSingleTestimonial',
                id: id,
            },
            beforeSend: function () {
                $(".preloader, .preloader-icon").show();
            },
            complete: function () {
                $(".preloader, .preloader-icon").hide();
            },
            success: function (response) {
                let status = response.status;
                let html = ""
                if (status == 1) {
                    // alert("Message sent successfully!");
                    if (response.data.length > 0) {
                        let item = response.data[0];

                        // Convert created_at to timestamp (ms)
                        let createdAt = new Date(item.created_at).getTime();
                        let now = Date.now();

                        // Difference in seconds
                        let diff = Math.floor((now - createdAt) / 1000);

                        let timeAgo = "";

                        if (diff < 60) {
                            timeAgo = diff + " s ago";
                        } else if (diff < 3600) {
                            timeAgo = Math.floor(diff / 60) + " m ago";
                        } else if (diff < 86400) {
                            timeAgo = Math.floor(diff / 3600) + " h ago";
                        } else if (diff < 172800) {
                            timeAgo = "1 day ago";
                        } else {
                            timeAgo = Math.floor(diff / 86400) + " days ago";
                        }
                        html += `<div class="single-review swiper-slide">
                                    <div class="review-header d-flex justify-content-between align-items-center">
                                        <div class="review-client">
                                            <div class="media">
                                            <img class="img-fluid rounded-circle client-avatar"
                                                width="50"
                                                src="assets/user_images/${item.photo ? item.photo : 'unknown.jpg'}"
                                                alt="Client Avatar" />
                                            <div class="client-details ml-4 mt-1">
                                                <h6 class="client-name mb-0">${item.full_name}</h6>
                                                <span class="client-role">${item.subject}</span>
                                            </div>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="client-role float-right" style="font-size: 12px !important;">
                                            ${timeAgo}
                                            </span>
                                        </div>
                                    </div>
                                    <p class="review-content mt-2">${item.description}</p>
                                </div>`;
                    }
                    $("#my_modal").html(html);
                    $("#modal_title").html('Testimonial Feedback');
                } else {
                    alert("Something went wrong, Try again!");
                }
                $("#my_Modal").modal("show");
            },
            error: function () {
                alert("Something went wrong!");
            }
        });
    });
});
