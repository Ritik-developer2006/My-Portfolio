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

getAllMenu();

function getAllMenu() {
    $.ajax({
        type: 'POST',
        url: '/API/adminApi.php',
        dataType: 'JSON',
        data: JSON.stringify({
            method: 'getAllMenu'
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
                                            <div>${item.name}</div>
                                            <div>
                                            <i class="fa-solid fa-pen-to-square edit_menu" style="cursor: pointer;"></i>
                                            <i class="fa-solid fa-eye-slash hide_menu d-none" style="cursor: pointer;"></i>
                                            <i class="fa-solid fa-trash delete_menu text-danger" style="cursor: pointer;"></i>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="#" class="update_menu">
                                                <input type="hidden" name="menu_id" value="${item.id}" class="menu_id">
                                                <div class="row g-3">
                                                    <div class="col-sm-12">
                                                        <label for="name${item.id}" class="form-label mb-2">Menu Name</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly required name='name' value="${item.name}" class="form-control ps-2" id="name${item.id}" placeholder="Your university">
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
                    $("#menu_container").removeClass("justify-content-center");
                    $("#menu_container").html(html);
                }
            }
        },
        error: function () {
            console.log("Something went wrong, while geting data of educations!");
        }
    });
};

$("body").on("click", ".edit_menu", function () {

    $(this).addClass("d-none");
    $(this).closest(".card").find('.hide_menu').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_menu");

    // show submit button
    form.find(".submit_btn").removeClass("d-none");
    // remove readonly from all inputs & textarea
    form.find("input").removeAttr("readonly");

    // now focus on first input
    form.find("[name='name']").focus();

});

$("body").on("click", ".hide_menu", function () {

    $(this).addClass("d-none");
    $(this).closest(".card").find('.edit_menu').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_menu");

    // show submit button
    form.find(".submit_btn").addClass("d-none");

    // remove readonly from all inputs & textarea
    form.find("input").attr("readonly", true);

});

$("body").on("click", ".delete_menu", function () {

    let form = $(this).closest(".card").find("form.update_menu");
    // show submit button
    let testimonial_id = form.find("[name='menu_id']").val();
    $("#current_delete_id").val(testimonial_id);
    $("#delete_menu").modal("show");
    // alert(testimonial_id);

});

$("body").on("click", ".close_modal", function () {
    $("#delete_menu").modal("hide");
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
            method: 'deleteMenu'
        }),
        contentType: "application/json",
        beforeSend: function () {
            $(".preloader, .preloader-icon").show();
        },
        success: function (response) {
            if (response.status == 1) {
                toastr.success("Menu delete successfully!");
                getAllMenu();
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

$("body").on("submit", ".update_menu", function (e) {
    e.preventDefault(); // stop normal submit

    let form = this;
    let formData = new FormData(form);
    formData.append("method", "updateMenu");

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
                toastr.success("Menu updated successfully!");
                getAllMenu();
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

getAllSlider();

function getAllSlider() {
    $.ajax({
        type: 'POST',
        url: '/API/adminApi.php',
        dataType: 'JSON',
        data: JSON.stringify({
            method: 'getAllSlider'
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
                                            <div>${item.name}</div>
                                            <div>
                                                <i class="fa-solid fa-pen-to-square edit_slider" style="cursor: pointer;"></i>
                                                <i class="fa-solid fa-eye-slash hide_slider d-none" style="cursor: pointer;"></i>
                                                <i class="fa-solid fa-trash delete_slider text-danger" style="cursor: pointer;"></i>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="#" class="update_slider">
                                                <input type="hidden" name="slider_id" value="${item.id}" class="slider_id">
                                                <div class="row g-3">
                                                    <div class="col-sm-12 mt-3">
                                                        <label for="name${item.id}" class="form-label mb-2">Slider Name</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly required name='name' value="${item.name}" class="form-control ps-2" id="name${item.id}" placeholder="Slider name">
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
                    $("#slider_container").removeClass("justify-content-center");
                    $("#slider_container").html(html);
                }
            }
        },
        error: function () {
            console.log("Something went wrong, while geting data of educations!");
        }
    });
};

$("body").on("click", ".edit_slider", function () {

    $(this).addClass("d-none");
    $(this).closest(".card").find('.hide_slider').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_slider");

    // show submit button
    form.find(".submit_btn").removeClass("d-none");
    // remove readonly from all inputs & textarea
    form.find("input").removeAttr("readonly");

    // now focus on first input
    form.find("[name='name']").focus();

});

$("body").on("click", ".hide_slider", function () {

    $(this).addClass("d-none");
    $(this).closest(".card").find('.edit_slider').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_slider");

    // show submit button
    form.find(".submit_btn").addClass("d-none");

    // remove readonly from all inputs & textarea
    form.find("input").attr("readonly", true);

});

$("body").on("click", ".delete_slider", function () {

    let form = $(this).closest(".card").find("form.update_slider");
    // show submit button
    let slider_id = form.find("[name='slider_id']").val();
    $("#current_delete_slider_id").val(slider_id);
    $("#delete_slider").modal("show");
    // alert(testimonial_id);

});

$("body").on("click", ".close_slider_modal", function () {
    $("#delete_slider").modal("hide");
});

$("body").on("click", "#delete_slider_now", function () {
    let id = $("body #current_delete_slider_id").val();
    // alert(id);
    $.ajax({
        type: "POST",
        url: "/API/adminApi.php",
        dataType: "JSON",
        data: JSON.stringify({
            id: id,
            method: 'deleteSlider'
        }),
        contentType: "application/json",
        beforeSend: function () {
            $(".preloader, .preloader-icon").show();
        },
        success: function (response) {
            if (response.status == 1) {
                toastr.success("Slider delete successfully!");
                getAllSlider();
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

$("body").on("submit", ".update_slider", function (e) {
    e.preventDefault(); // stop normal submit

    let form = this;
    let formData = new FormData(form);
    formData.append("method", "updateSlider");

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
                toastr.success("Slider updated successfully!");
                getAllSlider();
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

getLogoBck();

function getLogoBck() {
    $.ajax({
        type: 'POST',
        url: '/API/adminApi.php',
        dataType: 'JSON',
        data: JSON.stringify({
            method: 'getLogoBck'
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
                        html += `<div class="card flex-fill" style="height: -webkit-fill-available;">
                                            <div class="card-header d-flex justify-content-between">
                                                <div>Logo</div>
                                                <div>
                                                <i class="fa-solid fa-pen-to-square edit_logo" style="cursor: pointer;"></i>
                                                <i class="fa-solid fa-eye-slash hide_logo d-none" style="cursor: pointer;"></i>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <form method="post" action="#" class="update_logo" enctype="multipart/form-data">
                                                    <input type="hidden" name="logo_id" value="${item.id}" class="logo_id">
                                                    <div class="row g-3">
                                                        <div class="col-12 d-flex gap-4">
                                                            <div>
                                                                <label for="logo${item.id}" class="form-label mb-2">Prev. Logo</label>
                                                                <div class="image-preview-container">
                                                                    <img src="../img/favicons/${item.logo}" style="filter: brightness(1.5);" class="rounded image-preview">
                                                                </div>
                                                            </div>
                                                            <div class="flex-fill">
                                                                <label class="form-label mb-2" for="logo${item.id}">New Logo
                                                                </label>
                                                                <input type="file" required name="logo" id="logo${item.id}" class="singleUpload">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 d-none submit_btn">
                                                            <button class="btn btn-sm btn-primary" type="submit">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="card flex-fill">
                                            <div class="card-header d-flex justify-content-between">
                                                <div>Background</div>
                                                <div>
                                                <i class="fa-solid fa-pen-to-square edit_bck" style="cursor: pointer;"></i>
                                                <i class="fa-solid fa-eye-slash hide_bck d-none" style="cursor: pointer;"></i>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <form method="post" action="#" class="update_bck" enctype="multipart/form-data">
                                                    <input type="hidden" name="bck_id" value="${item.id}" class="bck_id">
                                                    <div class="row g-3">
                                                        <div class="col-12 d-flex gap-4">
                                                            <div>
                                                                <label for="bck_img${item.id}" class="form-label mb-2">Prev. Image</label>
                                                                <div class="image-preview-container">
                                                                    <img src="../img/${item.bck_img}" class="image-preview">
                                                                </div>
                                                            </div>
                                                            <div class="flex-fill">
                                                                <label class="form-label mb-2" for="bck_img${item.id}">New Image
                                                                </label>
                                                                <input type="file" required name="bck" id="bck_img${item.id}" class="singleUpload">
                                                            </div>
                                                        </div>
                                        
                                                        <div class="col-12 d-none submit_btn">
                                                            <button class="btn btn-sm btn-primary" type="submit">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>`;
                    });
                    $("#utility_container").removeClass("justify-content-center");
                    $("#utility_container").html(html);
                    uploadFile();
                }
            }
        },
        error: function () {
            console.log("Something went wrong, while geting data of educations!");
        }
    });
};

$("body").on("click", ".edit_logo", function () {

    $(this).addClass("d-none");
    $(this).closest(".card").find('.hide_logo').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_logo");

    // show submit button
    form.find(".submit_btn").removeClass("d-none");
    // remove readonly from all inputs & textarea
    form.find("input").removeAttr("readonly");

    // now focus on first input
    form.find("[name='logo']").focus();

});

$("body").on("click", ".hide_logo", function () {

    $(this).addClass("d-none");
    $(this).closest(".card").find('.edit_logo').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_logo");

    // show submit button
    form.find(".submit_btn").addClass("d-none");

    // remove readonly from all inputs & textarea
    form.find("input").attr("readonly", true);

});

$("body").on("click", ".edit_bck", function () {

    $(this).addClass("d-none");
    $(this).closest(".card").find('.hide_bck').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_bck");

    // show submit button
    form.find(".submit_btn").removeClass("d-none");
    // remove readonly from all inputs & textarea
    form.find("input").removeAttr("readonly");

    // now focus on first input
    form.find("[name='logo']").focus();

});

$("body").on("click", ".hide_bck", function () {

    $(this).addClass("d-none");
    $(this).closest(".card").find('.edit_bck').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_bck");

    // show submit button
    form.find(".submit_btn").addClass("d-none");

    // remove readonly from all inputs & textarea
    form.find("input").attr("readonly", true);

});

$("body").on("submit", ".update_logo", function (e) {
    e.preventDefault(); // stop normal submit

    let form = this;
    let formData = new FormData(form);
    formData.append("method", "updateLogo");

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
                toastr.success("Logo updated successfully!");
                getLogoBck();
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

$("body").on("submit", ".update_bck", function (e) {
    e.preventDefault(); // stop normal submit

    let form = this;
    let formData = new FormData(form);
    formData.append("method", "updateBck");

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
                toastr.success("Background image updated successfully!");
                getLogoBck();
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