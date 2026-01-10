$(document).ready(function () {
    // alert("dasdasd");
    // console.log("Custom JS is running!");

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
            },
            error: function () {
                alert("File not found. Please check the file path.");
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
                    alert("Message sent successfully!");
                    location.reload();
                } else {
                    alert("Something went wrong, Try again!");
                }
            },
            error: function () {
                alert("Something went wrong!");
            }
        });
    });

    // Feedback form Submit
    $("#feedback-form").on("submit", function (e) {
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
                    alert("Thankyou for your Feedback!");
                    location.reload();
                } else {
                    alert("Something went wrong, Try again!");
                }
            },
            error: function () {
                alert("Something went wrong!");
            }
        });
    });

    // Feedback modal
    $("#your_feeedback").on("click", function () {
        $("#myModal").modal("show");
    });

    // get All Projects
    function getAllProjects(){
        $.ajax({
            type: 'POST',
            url: '/API/adminApi.php',
            dataType: 'JSON',
            data: {
                method : 'getAllProject',
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
                        $.each(response.data, function(index, item) {
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
                method : 'getSingleProject',
                id : id,
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
                    $("#your_project").html(html);
                } else {
                    alert("Something went wrong, Try again!");
                }
                $("#yourProject").modal("show");
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
    function getAllBlogs(){
        $.ajax({
            type: 'POST',
            url: '/API/adminApi.php',
            dataType: 'JSON',
            data: {
                method : 'getAllBlogs',
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
                        $.each(response.data, function(index, item) {
                            html += `<div class="col-12 col-sm-8 col-lg-4 your_blog">
                                        <div class="card single-post single_blog" data-id="${item.id}"><a class="post-img" href="#">
                                            <img class="card-img-top" src="blog_img/${item.card_image}" alt="Blog post">
                                            <span class="content-date">${formatDate(item.created_at)}</span></a>
                                            <div class="card-body post-content">
                                                <a href="#"><h5 class="card-title content-title">${item.title}</h5></a>
                                                <p class="card-text content-description">${item.description}</p>
                                            </div>
                                            <span class="see-more text-primary" style="cursor:pointer;">See more</span>
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
                method : 'getSingleBlog',
                id : id,
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
                    $("#your_blog").html(html);
                } else {
                    alert("Something went wrong, Try again!");
                }
                $("#yourBlog").modal("show");
            },
            error: function () {
                alert("Something went wrong!");
            }
        });
    });
});
