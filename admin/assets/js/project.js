function initSelect2() {
    $('.select2').select2({
        width: '100%',
        placeholder: '--Select Category--',
        allowClear: true
    });
}

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

getCategories();

function getCategories() {
    $.ajax({
        type: 'POST',
        url: '/API/adminApi.php',
        dataType: 'JSON',
        data: JSON.stringify({
            method: 'getProjectFilter'
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
                                            <i class="fa-solid fa-pen-to-square edit_category" style="cursor: pointer;"></i>
                                            <i class="fa-solid fa-eye-slash hide_category d-none" style="cursor: pointer;"></i>
                                            <i class="fa-solid fa-trash delete_category text-danger" style="cursor: pointer;"></i>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="#" class="update_category">
                                                <input type="hidden" name="category_id" value="${item.id}" class="category_id">
                                                <div class="row g-3">
                                                    <div class="col-sm-12">
                                                        <label for="category${item.id}" class="form-label mb-2">Category Name</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly required name='category' value="${item.name}" class="form-control ps-2" id="category${item.id}" placeholder="Your category">
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
                    $("#category_container").removeClass("justify-content-center");
                    $("#category_container").html(html);
                }

            }
        },
        error: function () {
            console.log("Something went wrong, while geting data of educations!");
        }
    });
};

$("body").on("click", ".edit_category", function () {

    $(this).addClass("d-none");
    $(this).closest(".card").find('.hide_category').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_category");

    // show submit button
    form.find(".submit_btn").removeClass("d-none");
    // remove readonly from all inputs & textarea
    form.find("input").removeAttr("readonly");

    // now focus on first input
    form.find("[name='category']").focus();

});

$("body").on("click", ".hide_category", function () {

    $(this).addClass("d-none");
    $(this).closest(".card").find('.edit_category').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_category");

    // show submit button
    form.find(".submit_btn").addClass("d-none");

    // remove readonly from all inputs & textarea
    form.find("input").attr("readonly", true);

});

$("body").on("click", ".delete_category", function () {

    let form = $(this).closest(".card").find("form.update_category");
    // show submit button
    let testimonial_id = form.find("[name='category_id']").val();
    $("#current_delete_id").val(testimonial_id);
    $("#delete_category").modal("show");
    // alert(testimonial_id);

});

$("body").on("click", ".close_modal", function () {
    $("#delete_category").modal("hide");
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
            method: 'deleteCategory'
        }),
        contentType: "application/json",
        beforeSend: function () {
            $(".preloader, .preloader-icon").show();
        },
        success: function (response) {
            if (response.status == 1) {
                toastr.success("Category delete successfully!");
                getCategories();
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

$("body").on("submit", ".update_category", function (e) {
    e.preventDefault(); // stop normal submit

    let form = this;
    let formData = new FormData(form);
    formData.append("method", "updateCategory");

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
                toastr.success("Category updated successfully!");
                getCategories();
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

function getAllCategories(selectElement, selectedId) {
    $.ajax({
        type: 'POST',
        url: '/API/adminApi.php',
        dataType: 'JSON',
        data: JSON.stringify({
            method: 'getProjectFilter'
        }),
        contentType: "application/json",
        success: function (response) {
            if (response.status == 1) {
                let html = `<option value="">--Select Category--</option>`;

                $.each(response.data, function (index, item) {
                    let selected = (item.id == selectedId) ? 'selected' : '';
                    html += `<option value="${item.id}" ${selected}>${item.name}</option>`;
                });
                selectElement.html(html);
            }
        }
    });
}

getAllProjects();

function getAllProjects() {
    $.ajax({
        type: 'POST',
        url: '/API/adminApi.php',
        dataType: 'JSON',
        data: JSON.stringify({
            method: 'getAllProject'
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
                        html += `<div class="card col-12 ${item.id != 1 ? 'mt-3' : ''}">
                                            <div class="card-header d-flex justify-content-between">
                                                <div>${item.project_name}</div>
                                                <div>
                                                <i class="fa-solid fa-pen-to-square edit_project" style="cursor: pointer;"></i>
                                                <i class="fa-solid fa-eye-slash hide_project d-none" style="cursor: pointer;"></i>
                                                <i class="fa-solid fa-trash delete_project text-danger" style="cursor: pointer;"></i>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <form method="post" action="#" class="update_project" enctype="multipart/form-data">
                                                    <input type="hidden" name="project_id" value="${item.id}" class="project_id">
                                                    <div class="row g-3">
                                                        <div class="col-sm-6 mt-3">
                                                            <label for="project_name${item.id}" class="form-label mb-2">Project Name</label>
                                                            <div class="input-group-with-icon">
                                                                <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                    <i class="fa-solid fa-pen-nib"></i>
                                                                </span>
                                                                <input type="text" readonly required name='project_name' value="${item.project_name}" class="form-control ps-2" id="project_name${item.id}" placeholder="Your college">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6 mt-3">
                                                            <label for="link${item.id}" class="form-label mb-2">Project Url</label>
                                                            <div class="input-group-with-icon">
                                                                <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                    <i class="fa-solid fa-pen-nib"></i>
                                                                </span>
                                                                <input type="text" readonly required name='link' value="${item.link}" class="form-control ps-2" id="link${item.id}" placeholder="Project Url">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 d-flex gap-4 mt-3">
                                                            <div>
                                                                <label for="icon${item.id}" class="form-label mb-2">Project Image</label>
                                                                <div class="image-preview-container">
                                                                    <img src="../img/${item.images}" class="image-preview">
                                                                </div>
                                                            </div>
                                                            <div class="flex-fill">
                                                                <label class="form-label mb-2" for="image${item.id}">New Image
                                                                </label>
                                                                <input type="file" name="images" id="image${item.id}" class="singleUpload">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6 mt-3">
                                                            <label for="data_filter_id${item.id}" class="form-label mb-2">Category</label>
                                                            <div class="input-group-with-icon">
                                                                <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                    <i class="fa-solid fa-pen-nib"></i>
                                                                </span>
                                                                <select name='data_filter_id' readonly required id="data_filter_id${item.id}" class="form-control ps-2 project_category select2">
                                                                    <option>--Select Category--</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-sm-12 mt-3">
                                                            <label for="description${item.id}" class="form-label mb-2">Example textarea</label>
                                                            <textarea class="form-control" readonly required rows="5" name="description" id="description${item.id}">${item.description}</textarea>
                                                        </div>

                                                        <div class="col-sm-12 d-none submit_btn">
                                                            <button class="btn btn-sm btn-primary" type="submit">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>`;
                    });
                    $("#project_container").html(html);
                    uploadFile();
                    response.data.forEach(function (item) {
                        let selectBox = $("#data_filter_id" + item.id);
                        getAllCategories(selectBox, item.data_filter_id);
                    });
                    initSelect2();
                }
            }
        },
        error: function () {
            console.log("Something went wrong, while geting data of educations!");
        }
    });
};

$("body").on("click", ".edit_project", function () {

    $(this).addClass("d-none");
    $(this).closest(".card").find('.hide_project').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_project");

    // show submit button
    form.find(".submit_btn").removeClass("d-none");
    // remove readonly from all inputs & textarea
    form.find("input, textarea, select").removeAttr("readonly");

    // now focus on first input
    form.find("[name='project_name']").focus();

});

$("body").on("click", ".hide_project", function () {

    $(this).addClass("d-none");
    $(this).closest(".card").find('.edit_project').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_project");

    // show submit button
    form.find(".submit_btn").addClass("d-none");

    // remove readonly from all inputs & textarea
    form.find("input, textarea, select").attr("readonly", true);

});

$("body").on("click", ".delete_project", function () {

    let form = $(this).closest(".card").find("form.update_project");
    // show submit button
    let testimonial_id = form.find("[name='project_id']").val();
    $("#current_delete_project_id").val(testimonial_id);
    $("#delete_project").modal("show");
    // alert(testimonial_id);

});

$("body").on("click", ".close_modal_project", function () {
    $("#delete_project").modal("hide");
});

$("body").on("click", "#delete_project_now", function () {
    let id = $("body #current_delete_project_id").val();
    // alert(id);
    $.ajax({
        type: "POST",
        url: "/API/adminApi.php",
        dataType: "JSON",
        data: JSON.stringify({
            id: id,
            method: 'deleteProject'
        }),
        contentType: "application/json",
        beforeSend: function () {
            $(".preloader, .preloader-icon").show();
        },
        success: function (response) {
            if (response.status == 1) {
                toastr.success("Project delete successfully!");
                getAllProjects();
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

$("body").on("submit", ".update_project", function (e) {
    e.preventDefault(); // stop normal submit

    let form = this;
    let formData = new FormData(form);
    formData.append("method", "updateProject");

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
                toastr.success("Project updated successfully!");
                getAllProjects();
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