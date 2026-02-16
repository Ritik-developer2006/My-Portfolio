function uploadFile() {

    FilePond.registerPlugin(FilePondPluginFileValidateType, FilePondPluginImagePreview);

    // SINGLE UPLOAD
    document.querySelectorAll('.singleUpload').forEach(input => {

        if (FilePond.find(input)) return;

        FilePond.create(input, {
            allowMultiple: false,
            storeAsFile: true,
            acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg', 'image/webp'],
            allowFileTypeValidation: true,
            allowFileSizeValidation: true,
            labelIdle: `
                <i class="fa-solid fa-cloud-arrow-up fa-2x"></i>
                <h4 style="font-size:12px;font-weight:700;">Single Upload</h4>
                `,
            imagePreviewHeight: 70,
            styleItemPanelAspectRatio: 1
        });
    });
}

getBasicDetails();

function getBasicDetails() {
    $.ajax({
        type: 'POST',
        url: '/API/adminApi.php',
        dataType: 'JSON',
        data: JSON.stringify({
            method: 'getAboutUs'
        }),
        contentType: "application/json",
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
                let html = "";
                if (response.data.length > 0) {
                    $.each(response.data, function (index, item) {
                        html += `<div class="card">
                                        <div class="card-header d-flex justify-content-between">
                                            <div>Basic Details</div>
                                            <div>
                                                <i class="fa-solid fa-pen-to-square edit_basic" style="cursor: pointer;"></i>
                                                <i class="fa-solid fa-eye-slash hide_basic d-none" style="cursor: pointer;"></i>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="#" enctype="multipart/form-data" class="update_basic">
                                                <input type="hidden" name="basic_id" value="${item.id}" class="basic_id">
                                                <div class="row g-3">
                                                    <div class="col-sm-6 mt-3">
                                                        <label for="heading${item.id}" class="form-label mb-2">Heading</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly required name='heading' value="${item.heading}" class="form-control ps-2" id="heading${item.id}" placeholder="Your heading">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 mt-3">
                                                        <label for="twitter_link${item.id}" class="form-label mb-2">Twitter Account</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly required name='twitter_link' value="${item.twitter_link}" class="form-control ps-2" id="twitter_link${item.id}" placeholder="Your twitter link">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 mt-3">
                                                        <label for="instagram_link${item.id}" class="form-label mb-2">Instagram Account</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly required name='instagram_link' value="${item.instagram_link}" class="form-control ps-2" id="instagram_link${item.id}" placeholder="Your instagram link">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 mt-3">
                                                        <label for="linkdin_link${item.id}" class="form-label mb-2">Linkdin Account</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly required name='linkdin_link' value="${item.linkdin_link}" class="form-control ps-2" id="linkdin_link${item.id}" placeholder="Your linkdin link">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 mt-3">
                                                        <label for="github_link${item.id}" class="form-label mb-2">Github Account</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly required name='github_link' value="${item.github_link}" class="form-control ps-2" id="github_link${item.id}" placeholder="Your github link">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 mt-3">
                                                        <label for="facebook_link${item.id}" class="form-label mb-2">Facebook Account</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly required name='facebook_link' value="${item.facebook_link}" class="form-control ps-2" id="facebook_link${item.id}" placeholder="Your facebook link">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-12 col-lg-6 mt-3">
                                                        <label for="description${item.id}" class="form-label mb-2">Description About Me</label>
                                                        <textarea class="form-control" rows='5' readonly required name="description" id="description${item.id}">${item.description}</textarea>
                                                    </div>

                                                    <div class="col-sm-12 col-lg-6 d-flex gap-4 mt-3">
                                                        <div>
                                                            <label for="icon${item.id}" class="form-label mb-2">My Prev. Image</label>
                                                            <div class="image-preview-container">
                                                                <img src="../img/${item.image}" class="rounded image-preview">
                                                            </div>
                                                        </div>
                                                        <div class="flex-fill">
                                                            <label class="form-label mb-2" for="image${item.id}">My New Image
                                                            </label>
                                                            <input type="file" name="image" id="image${item.id}" class="singleUpload">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 d-none submit_btn">
                                                        <button class="btn btn-sm btn-primary" type="submit">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>`;
                    });
                    $("#basic_container").html(html);
                    uploadFile();
                }
            }
        },
        error: function () {
            console.log("Something went wrong, while geting data of educations!");
        }
    });
};

getAllServices();

function getAllServices() {
    $.ajax({
        type: 'POST',
        url: '/API/adminApi.php',
        dataType: 'JSON',
        data: JSON.stringify({
            method: 'getAllServices'
        }),
        contentType: "application/json",
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
                let html = "";
                if (response.data.length > 0) {
                    $.each(response.data, function (index, item) {
                        html += `<div class="card ${item.id != 1 ? 'mt-3' : ''}">
                                        <div class="card-header d-flex justify-content-between">
                                            <div>${item.heading}</div>
                                            <div>
                                            <i class="fa-solid fa-pen-to-square edit_service" style="cursor: pointer;"></i>
                                            <i class="fa-solid fa-eye-slash hide_service d-none" style="cursor: pointer;"></i>
                                            <i class="fa-solid fa-trash delete_service text-danger" style="cursor: pointer;"></i>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="#"  class="update_service">
                                                <input type="hidden" name="service_id" value="${item.id}" class="service_id">
                                                <div class="row g-3">
                                                    <div class="col-sm-6 mt-3">
                                                        <label for="heading${item.id}" class="form-label mb-2">Service Name</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly required name='heading' value="${item.heading}" class="form-control ps-2" id="heading${item.id}" placeholder="Your heading">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 mt-3">
                                                        <label for="icon${item.id}" class="form-label mb-2">Service Icon</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly required name='icon' value='${item.icon}' class="form-control ps-2" id="icon${item.id}" placeholder="Your icon">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-12 mt-3">
                                                        <label for="ex_description${item.id}" class="form-label mb-2">Service Description</label>
                                                        <textarea class="form-control" rows="5" readonly required name="description" id="ex_description${item.id}">${item.description}</textarea>
                                                    </div>

                                                    <div class="col-sm-12 d-none submit_btn">
                                                        <button class="btn btn-sm btn-primary" type="submit">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>`;
                    });
                    $("#service_container").html(html);
                }
            }
        },
        error: function () {
            console.log("Something went wrong, while geting data of educations!");
        }
    });
};

getAllTestimonials();

function getAllTestimonials() {
    $.ajax({
        type: 'POST',
        url: '/API/adminApi.php',
        dataType: 'JSON',
        data: JSON.stringify({
            method: 'getAllTestimonials'
        }),
        contentType: "application/json",
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
                let html = "";
                if (response.data.length > 0) {
                    $.each(response.data, function (index, item) {
                        html += `<div class="card col-12${item.id != 1 ? ' mt-3' : ''}">
                                            <div class="card-header d-flex justify-content-between">
                                                <div>${item.full_name}</div>
                                                <div>
                                                <i class="fa-solid fa-pen-to-square edit_testimonial" style="cursor: pointer;"></i>
                                                <i class="fa-solid fa-eye-slash hide_testimonial d-none" style="cursor: pointer;"></i>
                                                <i class="fa-solid fa-trash delete_testimonial text-danger" style="cursor: pointer;"></i>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <form method="post" action="#" enctype="multipart/form-data" class="update_testimonial">
                                                    <input type="hidden" name="testimonial_id" value="${item.id}" class="testimonial_id">
                                                    <div class="row g-3">
                                                        <div class="col-sm-6 mt-3">
                                                            <label for="full_name${item.id}" class="form-label mb-2">Full Name</label>
                                                            <div class="input-group-with-icon">
                                                                <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                    <i class="fa-solid fa-pen-nib"></i>
                                                                </span>
                                                                <input type="text" readonly name='full_name' value="${item.full_name}" class="form-control ps-2" id="full_name${item.id}" placeholder="Your full name">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6 mt-3">
                                                            <label for="email${item.id}" class="form-label mb-2">Email Id</label>
                                                            <div class="input-group-with-icon">
                                                                <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                    <i class="fa-solid fa-pen-nib"></i>
                                                                </span>
                                                                <input type="email" readonly name="email" class="form-control" value="${item.email}" id="email${item.id}">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 mt-3">
                                                            <label for="subject${item.id}" class="form-label mb-2">Designation</label>
                                                            <div class="input-group-with-icon">
                                                                <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                    <i class="fa-solid fa-pen-nib"></i>
                                                                </span>
                                                                <input type="text" name="subject" readonly class="form-control" value="${item.subject}" id="subject${item.id}">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 d-flex gap-4 mt-3">
                                                            <div>
                                                                <label for="icon${item.id}" class="form-label mb-2">Picture</label>
                                                                <div class="image-preview-container">
                                                                    <img src="../assets/user_images/${item.photo == '' || item.photo == null ? 'unknown.jpg' : item.photo}" class="image-preview">
                                                                </div>
                                                            </div>
                                                            <div class="flex-fill">
                                                                <label class="form-label mb-2" for="card_image${item.id}">New Picture
                                                                </label>
                                                                <input type="file" readonly name="photo" id="card_image${item.id}" class="singleUpload">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 mt-3">
                                                            <label for="ex_description${item.id}" class="form-label mb-2">Feedback Message</label>
                                                            <textarea class="form-control" rows="5" readonly name="description" id="ex_description${item.id}">${item.description}</textarea>
                                                        </div>

                                                        <div class="col-sm-12 d-none submit_btn">
                                                            <button class="btn btn-sm btn-primary" type="submit">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>`;
                    });
                    $("#testimonial_container").html(html);
                    uploadFile();
                }
            }
        },
        error: function () {
            console.log("Something went wrong, while geting data of educations!");
        }
    });
};

$("body").on("click", ".edit_testimonial", function () {

    $(this).addClass("d-none");
    $(this).closest(".card").find('.hide_testimonial').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_testimonial");

    // show submit button
    form.find(".submit_btn").removeClass("d-none");
    // remove readonly from all inputs & textarea
    form.find("input, textarea").removeAttr("readonly");

    // now focus on first input
    form.find("[name='full_name']").focus();

});

$("body").on("click", ".hide_testimonial", function () {

    $(this).addClass("d-none");
    $(this).closest(".card").find('.edit_testimonial').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_testimonial");

    // show submit button
    form.find(".submit_btn").addClass("d-none");

    // remove readonly from all inputs & textarea
    form.find("input, textarea").attr("readonly", true);

});

$("body").on("click", ".delete_testimonial", function () {

    let form = $(this).closest(".card").find("form.update_testimonial");
    // show submit button
    let testimonial_id = form.find("[name='testimonial_id']").val();
    $("#current_delete_id").val(testimonial_id);
    $("#delete_testinmonial").modal("show");
    // alert(testimonial_id);

});

$("body").on("click", ".close_modal", function () {
    $("#delete_testinmonial").modal("hide");
});

$("body").on("click", "#delete_now", function () {
    let id = $("body #current_delete_id").val();
    // alert(id);
    $.ajax({
        type: "POST",
        url: "/API/adminApi.php",
        dataType: "JSON",
        data: JSON.stringify({
            id: id,
            method: 'deleteTestimonial'
        }),
        contentType: "application/json",
        beforeSend: function () {
            $(".preloader, .preloader-icon").show();
        },
        success: function (response) {
            if (response.status == 1) {
                toastr.success("Testimonial delete successfully!");
                $("#delete_testinmonial").modal("hide");
                getAllTestimonials();
            } else {
                toastr.error("Something went wrong, Try again!");
            }
        },
        complete: function () {
            $("#delete_testinmonial").modal("hide");
            $(".preloader, .preloader-icon").hide();
        },
        error: function () {
            toastr.error("Internal sever error");
        }
    });
});

$("body").on("submit", ".update_testimonial", function (e) {
    e.preventDefault(); // stop normal submit

    let form = this;
    let formData = new FormData(form);
    formData.append("method", "updateTestimonial");

    $.ajax({
        type: "POST",
        url: "/API/adminApi.php",
        data: formData,
        dataType: "JSON",
        processData: false, // REQUIRED
        contentType: false, // REQUIRED
        beforeSend: function () {
            $(".preloader, .preloader-icon").show();
        },
        success: function (response) {
            if (response.status == 1) {
                toastr.success("Testimonial updated successfully!");
                getAllTestimonials();
            } else {
                toastr.error("Something went wrong, Try again!");
            }
        },
        complete: function () {
            $(".preloader, .preloader-icon").hide();
        },
        error: function () {
            toastr.error("Internal sever error");
        }
    });
});

$("body").on("click", ".delete_service", function () {

    $(this).closest(".card").find('.edit_service').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_service");
    // show submit button
    let testimonial_id = form.find("[name='service_id']").val();
    $("#current_delete_service_id").val(testimonial_id);
    $("#delete_service").modal("show");
    // alert(testimonial_id);

});

$("body").on("click", ".close_modal_service", function () {
    $("#delete_service").modal("hide");
});

$("body").on("click", "#delete_service_now", function () {
    let id = $("body #current_delete_service_id").val();
    // alert(id);
    $.ajax({
        type: "POST",
        url: "/API/adminApi.php",
        dataType: "JSON",
        data: JSON.stringify({
            id: id,
            method: 'deleteService'
        }),
        contentType: "application/json",
        beforeSend: function () {
            $(".preloader, .preloader-icon").show();
        },
        success: function (response) {
            if (response.status == 1) {
                toastr.success("Service delete successfully!");
                $("#delete_service").modal("hide");
                getAllServices();
            } else {
                toastr.error("Something went wrong, Try again!");
            }
        },
        complete: function () {
            $("#delete_service").modal("hide");
            $(".preloader, .preloader-icon").hide();
        },
        error: function () {
            toastr.error("Internal sever error");
        }
    });
});

$("body").on("click", ".edit_service", function () {

    $(this).addClass("d-none");
    $(this).closest(".card").find('.hide_service').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_service");

    // show submit button
    form.find(".submit_btn").removeClass("d-none");
    // remove readonly from all inputs & textarea
    form.find("input, textarea").removeAttr("readonly");

    // now focus on first input
    form.find("[name='heading']").focus();

});

$("body").on("click", ".hide_service", function () {

    $(this).addClass("d-none");
    $(this).closest(".card").find('.edit_service').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_service");

    // show submit button
    form.find(".submit_btn").addClass("d-none");

    // remove readonly from all inputs & textarea
    form.find("input, textarea").attr("readonly", true);

});

$("body").on("submit", ".update_service", function (e) {
    e.preventDefault(); // stop normal submit

    let form = this;
    let formData = new FormData(form);
    formData.append("method", "updateService");

    $.ajax({
        type: "POST",
        url: "/API/adminApi.php",
        data: formData,
        dataType: "JSON",
        processData: false, // REQUIRED
        contentType: false, // REQUIRED
        beforeSend: function () {
            $(".preloader, .preloader-icon").show();
        },
        success: function (response) {
            if (response.status == 1) {
                toastr.success("Service updated successfully!");
                getAllServices();
            } else {
                toastr.error("Something went wrong, Try again!");
            }
        },
        complete: function () {
            $(".preloader, .preloader-icon").hide();
        },
        error: function () {
            toastr.error("Internal sever error");
        }
    });
});

$("body").on("click", ".edit_basic", function () {

    $(this).addClass("d-none");
    $(this).closest(".card").find('.hide_basic').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_basic");

    // show submit button
    form.find(".submit_btn").removeClass("d-none");
    // remove readonly from all inputs & textarea
    form.find("input, textarea").removeAttr("readonly");

    // now focus on first input
    form.find("[name='heading']").focus();

});

$("body").on("click", ".hide_basic", function () {

    $(this).addClass("d-none");
    $(this).closest(".card").find('.edit_basic').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_basic");

    // show submit button
    form.find(".submit_btn").addClass("d-none");

    // remove readonly from all inputs & textarea
    form.find("input, textarea").attr("readonly", true);

});

$("body").on("submit", ".update_basic", function (e) {
    e.preventDefault(); // stop normal submit

    let form = this;
    let formData = new FormData(form);
    formData.append("method", "updateBasic");

    $.ajax({
        type: "POST",
        url: "/API/adminApi.php",
        data: formData,
        dataType: "JSON",
        processData: false, // REQUIRED
        contentType: false, // REQUIRED
        beforeSend: function () {
            $(".preloader, .preloader-icon").show();
        },
        success: function (response) {
            if (response.status == 1) {
                toastr.success("Detail updated successfully!");
                getBasicDetails();
            } else {
                toastr.error("Something went wrong, Try again!");
            }
        },
        complete: function () {
            $(".preloader, .preloader-icon").hide();
        },
        error: function () {
            toastr.error("Internal sever error");
        }
    });
});

$("body").on("click", ".close_service_modal", function () {
    $("#add_service_modal").modal("hide");
});

$("body").on("click", "#add_service", function () {
    $("#add_service_modal").modal("show");
});

$("body").on("submit", "#add_service_form", function (e) {
    e.preventDefault(); // stop normal submit

    let form = this;
    let formData = new FormData(form);
    formData.append("method", "addService");

    $.ajax({
        type: "POST",
        url: "/API/adminApi.php",
        data: formData,
        dataType: "JSON",
        processData: false, // REQUIRED
        contentType: false, // REQUIRED
        beforeSend: function () {
            $(".preloader, .preloader-icon").show();
        },
        success: function (response) {
            if (response.status == 1) {
                toastr.success("Service added successfully!");
                $("#add_service_modal").modal("hide");
                getAllServices();
            } else {
                toastr.error("Something went wrong, Try again!");
            }
        },
        complete: function () {
            $(".preloader, .preloader-icon").hide();
        },
        error: function () {
            toastr.error("Internal sever error");
        }
    });
});