// For hanlde range
function initRangeHandlers() {
    document.querySelectorAll('.range').forEach(function (rangeInput) {
        const id = rangeInput.id.replace('per_knowledge', '');
        const rangeOutput = document.getElementById('rangeValue' + id);

        // Set initial value
        if (rangeOutput) {
            rangeOutput.textContent = rangeInput.value;
        }

        // Update on input
        rangeInput.addEventListener('input', function () {
            if (rangeOutput) {
                rangeOutput.textContent = this.value;
            }
        });
    });
}

getAlleducation();

function getAlleducation() {
    $.ajax({
        type: 'POST',
        url: '/API/adminApi.php',
        dataType: 'JSON',
        data: JSON.stringify({
            method: 'getAlleducation'
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
                                            <div>${item.education_name}</div>
                                            <div>
                                            <i class="fa-solid fa-pen-to-square edit_education" style="cursor: pointer;"></i>
                                            <i class="fa-solid fa-eye-slash hide_education d-none" style="cursor: pointer;"></i>
                                            <i class="fa-solid fa-trash delete_education text-danger" style="cursor: pointer;"></i>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="#" class="update_education">
                                                <input type="hidden" name="education_id" value="${item.id}" class="education_id">
                                                <div class="row g-3">
                                                    <div class="col-sm-6 mt-3">
                                                        <label for="education_name${item.id}" class="form-label mb-2">Education Name</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly required name='education_name' value="${item.education_name}" class="form-control ps-2" id="education_name${item.id}" placeholder="Your university">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 mt-3">
                                                        <label for="college${item.id}" class="form-label mb-2">college</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly required name='college' value="${item.college_name}" class="form-control ps-2" id="college${item.id}" placeholder="Your college">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 mt-3">
                                                        <label for="university${item.id}" class="form-label mb-2">University</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly required name='university' value="${item.university}" class="form-control ps-2" id="university${item.id}" placeholder="Your university">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 mt-3">
                                                        <label for="from_year${item.id}" class="form-label mb-2">From Date</label>
                                                        <input type="date" readonly name='from_year' value="${item.from_year}" class="form-control" id="from_year${item.id}">
                                                    </div>

                                                    <div class="col-sm-6 mt-3">
                                                        <label for="to_year${item.id}" class="form-label mb-2">End Date</label>
                                                        <input type="date" readonly required name='to_year' value="${item.to_year}" class="form-control" id="to_year${item.id}">
                                                    </div>
                                                    
                                                    <div class="col-sm-12">
                                                        <label for="description${item.id}" class="form-label mb-2">Description</label>
                                                        <textarea class="form-control" rows='5' readonly required name="description" id="description${item.id}">${item.description}</textarea>
                                                    </div>

                                                    <div class="col-sm-12 d-none submit_btn">
                                                        <button class="btn btn-sm btn-primary" type="submit">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>`;
                    });
                    $("#education_container").html(html);
                }
            }
        },
        error: function () {
            console.log("Something went wrong, while geting data of educations!");
        }
    });
};

$("body").on("click", ".edit_education", function () {

    $(this).addClass("d-none");
    $(this).closest(".card").find('.hide_education').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_education");

    // show submit button
    form.find(".submit_btn").removeClass("d-none");
    // remove readonly from all inputs & textarea
    form.find("input, textarea").removeAttr("readonly");

    // now focus on first input
    form.find("[name='education_name']").focus();

});

$("body").on("click", ".hide_education", function () {

    $(this).addClass("d-none");
    $(this).closest(".card").find('.edit_education').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_education");

    // show submit button
    form.find(".submit_btn").addClass("d-none");

    // remove readonly from all inputs & textarea
    form.find("input, textarea").attr("readonly", true);

});

$("body").on("click", ".delete_education", function () {

    let form = $(this).closest(".card").find("form.update_education");
    // show submit button
    let education_id = form.find("[name='education_id']").val();
    $("#current_delete_id").val(education_id);
    $("#delete_education").modal("show");
    // alert(testimonial_id);

});

$("body").on("click", ".close_modal", function () {
    $("#delete_education").modal("hide");
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
            method: 'deleteEducation'
        }),
        contentType: "application/json",
        beforeSend: function () {
            $(".preloader, .preloader-icon").show();
        },
        success: function (response) {
            if (response.status == 1) {
                toastr.success("Education delete successfully!");
                getAlleducation();
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

$("body").on("submit", ".update_education", function (e) {
    e.preventDefault(); // stop normal submit

    let form = this;
    let formData = new FormData(form);
    formData.append("method", "updateEducation");

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
                toastr.success("Education updated successfully!");
                getAlleducation();
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

getAllexperience();

function getAllexperience() {
    $.ajax({
        type: 'POST',
        url: '/API/adminApi.php',
        dataType: 'JSON',
        data: JSON.stringify({
            method: 'getAllexperiences'
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
                                            <div>${item.job_title}</div>
                                            <div>
                                            <i class="fa-solid fa-pen-to-square edit_experience" style="cursor: pointer;"></i>
                                            <i class="fa-solid fa-eye-slash hide_experience d-none" style="cursor: pointer;"></i>
                                            <i class="fa-solid fa-trash delete_experience text-danger" style="cursor: pointer;"></i>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="#" class="update_experience">
                                                <input type="hidden" name="experience_id" value="${item.id}" class="experience_id">
                                                <div class="row g-3">
                                                    <div class="col-sm-6 mt-3">
                                                        <label for="job_title${item.id}" class="form-label mb-2">Job Title</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly required name='job_title' value="${item.job_title}" class="form-control ps-2" id="job_title${item.id}" placeholder="Your Designation">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 mt-3">
                                                        <label for="company_name${item.id}" class="form-label mb-2">Compnay Name</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly required name='company_name' value="${item.company_name}" class="form-control ps-2" id="company_name${item.id}" placeholder="Company Name">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 mt-3">
                                                        <label for="ex_from_year${item.id}" class="form-label mb-2">From date</label>
                                                        <input type="date" readonly required name='from_year' value="${item.from_year}" class="form-control" id="ex_from_year${item.id}">
                                                    </div>

                                                    <div class="col-sm-6 mt-3">
                                                        <label for="ex_to_year${item.id}" class="form-label mb-2">End date</label>
                                                        <input type="date" readonly required name='to_year' value="${item.to_year}" class="form-control" id="ex_to_year${item.id}">
                                                    </div>
                                                    
                                                    <div class="col-sm-12 mt-3">
                                                        <label for="ex_description${item.id}" class="form-label mb-2">Description</label>
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
                    $("#experience_container").html(html);
                }
            }
        },
        error: function () {
            console.log("Something went wrong, while geting data of educations!");
        }
    });
};

$("body").on("click", ".edit_experience", function () {

    $(this).addClass("d-none");
    $(this).closest(".card").find('.hide_experience').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_experience");

    // show submit button
    form.find(".submit_btn").removeClass("d-none");
    // remove readonly from all inputs & textarea
    form.find("input, textarea").removeAttr("readonly");

    // now focus on first input
    form.find("[name='job_title']").focus();

});

$("body").on("click", ".hide_experience", function () {

    $(this).addClass("d-none");
    $(this).closest(".card").find('.edit_experience').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_experience");

    // show submit button
    form.find(".submit_btn").addClass("d-none");

    // remove readonly from all inputs & textarea
    form.find("input, textarea").attr("readonly", true);

});

$("body").on("click", ".delete_experience", function () {

    let form = $(this).closest(".card").find("form.update_experience");
    // show submit button
    let education_id = form.find("[name='experience_id']").val();
    $("#current_delete_experience_id").val(education_id);
    $("#delete_experience").modal("show");
    // alert(testimonial_id);

});

$("body").on("click", ".close_modal", function () {
    $("#delete_experience").modal("hide");
});

$("body").on("click", "#delete_experience_now", function () {
    let id = $("body #current_delete_experience_id").val();
    // alert(id);
    $.ajax({
        type: "POST",
        url: "/API/adminApi.php",
        dataType: "JSON",
        data: JSON.stringify({
            id: id,
            method: 'deleteExperience'
        }),
        contentType: "application/json",
        beforeSend: function () {
            $(".preloader, .preloader-icon").show();
        },
        success: function (response) {
            if (response.status == 1) {
                toastr.success("Experience delete successfully!");
                getAllexperience();
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

$("body").on("submit", ".update_experience", function (e) {
    e.preventDefault(); // stop normal submit

    let form = this;
    let formData = new FormData(form);
    formData.append("method", "updateExperience");

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
                toastr.success("Experience updated successfully!");
                getAllexperience();
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

getAllskills();

function getAllskills() {
    $.ajax({
        type: 'POST',
        url: '/API/adminApi.php',
        dataType: 'JSON',
        data: JSON.stringify({
            method: 'getAllSkills'
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
                                            <div>${item.skill}</div>
                                            <div>
                                            <i class="fa-solid fa-pen-to-square edit_skill" style="cursor: pointer;"></i>
                                             <i class="fa-solid fa-eye-slash hide_skill d-none" style="cursor: pointer;"></i>
                                            <i class="fa-solid fa-trash delete_skill text-danger" style="cursor: pointer;"></i>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="#" class="update_skill">
                                                <input type="hidden" name="skill_id" value="${item.id}" class="skill_id">
                                                <div class="row g-3">
                                                    <div class="col-sm-6 mt-3">
                                                        <label for="skill${item.id}" class="form-label mb-2">Skill</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly required name='skill' value="${item.skill}" class="form-control ps-2" id="skill${item.id}" placeholder="Your skill">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 mt-3">
                                                        <label for="per_knowledge${item.id}" class="form-label mb-2">Skill Knowledge</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon ps-4 pe-4" style="border-right: 1px solid #e5e5e5;">
                                                                <output for="per_knowledge${item.id}" class="rangeValue" id="rangeValue${item.id}" aria-hidden="true"></output>%
                                                            </span>
                                                            <input type="range" readonly required class="form-range range ps-2 pe-2" min="0" max="100" name="per_knowledge" value="${item.per_knowledge}" rows="5" id="per_knowledge${item.id}">
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
                    $("#skill_container").html(html);
                    initRangeHandlers();
                }
            }
        },
        error: function () {
            console.log("Something went wrong, while geting data of educations!");
        }
    });
};

$("body").on("click", ".edit_skill", function () {

    $(this).addClass("d-none");
    $(this).closest(".card").find('.hide_skill').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_skill");

    // show submit button
    form.find(".submit_btn").removeClass("d-none");
    // remove readonly from all inputs & textarea
    form.find("input").removeAttr("readonly");

    // now focus on first input
    form.find("[name='skill']").focus();

});

$("body").on("click", ".hide_skill", function () {

    $(this).addClass("d-none");
    $(this).closest(".card").find('.edit_skill').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_skill");

    // show submit button
    form.find(".submit_btn").addClass("d-none");

    // remove readonly from all inputs & textarea
    form.find("input").attr("readonly", true);

});

$("body").on("click", ".delete_skill", function () {

    let form = $(this).closest(".card").find("form.update_skill");
    // show submit button
    let education_id = form.find("[name='skill_id']").val();
    $("#current_delete_skill_id").val(education_id);
    $("#delete_skill").modal("show");
    // alert(testimonial_id);

});

$("body").on("click", ".close_modal", function () {
    $("#delete_skill").modal("hide");
});

$("body").on("click", "#delete_skill_now", function () {
    let id = $("body #current_delete_skill_id").val();
    // alert(id);
    $.ajax({
        type: "POST",
        url: "/API/adminApi.php",
        dataType: "JSON",
        data: JSON.stringify({
            id: id,
            method: 'deleteSkill'
        }),
        contentType: "application/json",
        beforeSend: function () {
            $(".preloader, .preloader-icon").show();
        },
        success: function (response) {
            if (response.status == 1) {
                toastr.success("Skill delete successfully!");
                getAllskills();
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

$("body").on("submit", ".update_skill", function (e) {
    e.preventDefault(); // stop normal submit

    let form = this;
    let formData = new FormData(form);
    formData.append("method", "updateSkill");

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
                toastr.success("Skill updated successfully!");
                getAllskills();
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