function uploadFile() {

    FilePond.registerPlugin(FilePondPluginFileValidateType, FilePondPluginImagePreview);

    // SINGLE UPLOAD
    document.querySelectorAll('.singleUpload').forEach(input => {

        if (FilePond.find(input)) return;

        FilePond.create(input, {
            allowMultiple: false,
            storeAsFile: true,
            acceptedFileTypes: ['application/pdf'],
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
uploadFile();

getUserMessages();
function getUserMessages() {
    $.ajax({
        type: 'POST',
        url: '/API/adminApi.php',
        dataType: 'JSON',
        data: JSON.stringify({
            method: 'getUserMessages'
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
                // console.log(response.data);
                if (response.data.length > 0) {
                    $.each(response.data, function (index, item) {
                        html += `<div class="col-12 card ${item.id != 1 ? 'mt-3' : ''}">
                                        <div class="card-header d-flex justify-content-between">
                                            <div>${item.full_name}</div>
                                            <div>`;
                        if (item.file != '' && item.file != null && item.file != 'null') {
                        html += `<a href="../../uploads/${item.file}" download class="pdf-card">
                                    <i class="fa-solid fa-circle-down me-1" id="download" style="cursor: pointer" title="Download Attachement"></i>
                                </a>`};
                        html += `<i class="fa-solid fa-pen-to-square edit_message" style="cursor: pointer;"></i>
                                            <i class="fa-solid fa-eye-slash hide_message d-none" style="cursor: pointer;"></i>
                                            <i class="fa-solid fa-trash delete_message text-danger" style="cursor: pointer;"></i>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="#" class="update_message">
                                                <input type="hidden" name="message_id" value="${item.id}" class="message_id">
                                                <div class="row g-3">
                                                    <div class="col-sm-6 mt-3">
                                                        <label for="full_name${item.id}" class="form-label mb-2">Full Name</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly required name='full_name' value="${item.full_name}" class="form-control ps-2" id="full_name${item.id}" placeholder="Your full name">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 mt-3">
                                                        <label for="email${item.id}" class="form-label mb-2">Email</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly required name='email' value="${item.email}" class="form-control ps-2" id="email${item.id}" placeholder="Your email">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 mt-3">
                                                        <label for="subject${item.id}" class="form-label mb-2">Subject</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly required name='subject' value="${item.subject}" class="form-control ps-2" id="subject${item.id}" placeholder="Your subject">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-12">
                                                        <label for="message${item.id}" class="form-label mb-2">Message</label>
                                                        <textarea class="form-control" rows='5' readonly required name="message" id="message${item.id}">${item.message}</textarea>
                                                    </div>

                                                    <div class="col-sm-12 d-none submit_btn">
                                                        <button class="btn btn-sm btn-primary" type="submit">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>`;
                    });
                    $("#message_container").html(html);
                }
            }
        },
        error: function () {
            console.log("Something went wrong, while geting data of messages!");
        }
    });
};