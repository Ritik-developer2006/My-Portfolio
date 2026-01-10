getContactDetail();

function getContactDetail() {
    $.ajax({
        type: 'POST',
        url: '/API/adminApi.php',
        dataType: 'JSON',
        data: JSON.stringify({
            method: 'getBasicDetail'
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
                                            <div>Personal Details</div>
                                            <div>
                                            <i class="fa-solid fa-pen-to-square edit_contact" style="cursor: pointer;"></i>
                                            <i class="fa-solid fa-eye-slash hide_contact d-none" style="cursor: pointer;"></i>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="#" class="update_contact">
                                                <input type="hidden" name="contact_id" value="${item.id}" class="contact_id">
                                                <div class="row g-3">
                                                    <div class="col-12 col-md-6 mt-3">
                                                        <label for="full_name${item.id}" class="form-label mb-2">Full Name</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly required name='full_name' value="${item.full_name}" class="form-control ps-2" id="full_name${item.id}" placeholder="Your full name">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6 mt-3">
                                                        <label for="email${item.id}" class="form-label mb-2">Email-Id</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="email" readonly required name='email' value="${item.email}" class="form-control ps-2" id="email${item.id}" placeholder="Your email id">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6 mt-3">
                                                        <label for="number${item.id}" class="form-label mb-2">Mobile number</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="number" readonly required name='number' value="${item.number}" class="form-control ps-2" id="number${item.id}" placeholder="Your number">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6 mt-3">
                                                        <label for="age${item.id}" class="form-label mb-2">Your age</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="number" readonly required name='age' value="${item.age}" class="form-control ps-2" id="age${item.id}" placeholder="Your age">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6 mt-3">
                                                        <label for="country${item.id}" class="form-label mb-2">Country</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly required name='country' value="${item.country}" class="form-control ps-2" id="state${item.id}" placeholder="Country">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-md-6 mt-3">
                                                        <label for="state${item.id}" class="form-label mb-2">State</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly required name='state' value="${item.state}" class="form-control ps-2" id="state${item.id}" placeholder="State">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 mt-3">
                                                        <label for="address${item.id}" class="form-label mb-2">Full Address</label>
                                                        <textarea class="form-control" readonly required rows="5" name="address" id="description${item.id}">${item.address}</textarea>
                                                    </div>

                                                    <div class="col-sm-12 d-none submit_btn">
                                                        <button class="btn btn-sm btn-primary" type="submit">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>`;
                    });
                    $("#contact_container").removeClass("justify-content-center");
                    $("#contact_container").html(html);
                }
            }
        },
        error: function () {
            console.log("Something went wrong, while geting data of educations!");
        }
    });
};

$("body").on("click", ".edit_contact", function () {

    $(this).addClass("d-none");
    $(this).closest(".card").find('.hide_contact').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_contact");

    // show submit button
    form.find(".submit_btn").removeClass("d-none");
    // remove readonly from all inputs & textarea
    form.find("input,textarea").removeAttr("readonly");

    // now focus on first input
    form.find("[name='full_name']").focus();

});

$("body").on("click", ".hide_contact", function () {

    $(this).addClass("d-none");
    $(this).closest(".card").find('.edit_contact').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_contact");

    // show submit button
    form.find(".submit_btn").addClass("d-none");

    // remove readonly from all inputs & textarea
    form.find("input,textarea").attr("readonly", true);

});

$("body").on("submit", ".update_contact", function (e) {
    e.preventDefault(); // stop normal submit

    let form = this;
    let formData = new FormData(form);
    formData.append("method", "updateContactDetail");

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
                toastr.success("Contact updated successfully!");
                getContactDetail();
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

getContactPage();
function getContactPage() {
    $.ajax({
        type: 'POST',
        url: '/API/adminApi.php',
        dataType: 'JSON',
        data: JSON.stringify({
            method: 'getContactPage'
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
                                            <div>Contact Text</div>
                                            <div>
                                                <i class="fa-solid fa-pen-to-square edit_text" style="cursor: pointer;"></i>
                                                <i class="fa-solid fa-eye-slash hide_text d-none" style="cursor: pointer;"></i>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="#" class="update_text">
                                                <input type="hidden" name="text_id" value="${item.id}" class="text_id">
                                                <div class="row g-3">
                                                    <div class="col-12 col-lg-6 mt-3">
                                                        <label for="message_heading${item.id}" class="form-label mb-2">Message Heading</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly required name='message_heading' value="${item.message_heading}" class="form-control ps-2" id="message_heading${item.id}" placeholder="Message heading">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-6 mt-3">
                                                        <label for="contact_heading${item.id}" class="form-label mb-2">Contact-Us Heading</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly required name='contact_heading' value="${item.contact_heading}" class="form-control ps-2" id="contact_heading${item.id}" placeholder="Contact heading">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 mt-3">
                                                        <label for="description${item.id}" class="form-label mb-2">Contact description</label>
                                                        <textarea class="form-control" readonly required rows="5" name="description" id="description${item.id}">${item.description}</textarea>
                                                    </div>

                                                    <div class="col-12 col-lg-6 mt-3">
                                                        <label for="label1${item.id}" class="form-label mb-2">Contact-Us Label 1 text</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type='text' class='form-control ps-2' readonly required name='label1' value='${item.label1}' id='label1${item.id}' placeholder="Label text">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-6 mt-3">
                                                        <label for="label1_icon${item.id}" class="form-label mb-2">Contact-Us Label 1 icon</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type='text' class='form-control ps-2 text-nowrap' readonly required name='label1_icon' value='${item.label1_icon}' id='label1_icon${item.id}' placeholder='Label icon'>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-6 mt-3">
                                                        <label for="label2${item.id}" class="form-label mb-2">Contact-Us Label 2 text</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly required name='label2' value="${item.label2}" class="form-control ps-2" id="label2${item.id}" placeholder="Label text">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-6 mt-3">
                                                        <label for="label2_icon${item.id}" class="form-label mb-2">Contact-Us Label 2 icon</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type='text' class='form-control ps-2 text-nowrap' readonly required name='label2_icon' value='${item.label2_icon}' id='label2_icon${item.id}' placeholder='Label icon'>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-6 mt-3">
                                                        <label for="label3${item.id}" class="form-label mb-2">Contact-Us Label 3 text</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly required name='label3' value="${item.label3}" class="form-control ps-2" id="label3${item.id}" placeholder="Label text">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-6 mt-3">
                                                        <label for="label3_icon${item.id}" class="form-label mb-2">Contact-Us Label 3 icon</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type='text' class='form-control ps-2 text-nowrap' readonly required name='label3_icon' value='${item.label3_icon}' id='label3_icon${item.id}' placeholder='Label icon'>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-6 mt-3">
                                                        <label for="label4${item.id}" class="form-label mb-2">Contact-Us Label 4 text</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly required name='label4' value="${item.label4}" class="form-control ps-2" id="label4${item.id}" placeholder="Label text">
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-6 mt-3">
                                                        <label for="label4_icon${item.id}" class="form-label mb-2">Contact-Us Label 4 icon</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type='text' class='form-control ps-2 text-nowrap' readonly required name='label4_icon' value='${item.label4_icon}' id='label4_icon${item.id}' placeholder='Label icon'>
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
                    $("#text_container").removeClass("justify-content-center");
                    $("#text_container").html(html);
                }
            }
        },
        error: function () {
            console.log("Something went wrong, while geting data of educations!");
        }
    });
};

$("body").on("click", ".edit_text", function () {

    $(this).addClass("d-none");
    $(this).closest(".card").find('.hide_text').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_text");

    // show submit button
    form.find(".submit_btn").removeClass("d-none");
    // remove readonly from all inputs & textarea
    form.find("input,textarea").removeAttr("readonly");

    // now focus on first input
    form.find("[name='message_heading']").focus();

});

$("body").on("click", ".hide_text", function () {

    $(this).addClass("d-none");
    $(this).closest(".card").find('.edit_text').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_slider");

    // show submit button
    form.find(".submit_btn").addClass("d-none");

    // remove readonly from all inputs & textarea
    form.find("input,textarea").attr("readonly", true);

});

$("body").on("submit", ".update_text", function (e) {
    e.preventDefault(); // stop normal submit

    let form = this;
    let formData = new FormData(form);
    formData.append("method", "updateContactPage");

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
                toastr.success("Text updated successfully!");
                getContactPage();
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