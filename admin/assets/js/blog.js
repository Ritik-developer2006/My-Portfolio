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

    // SINGLE DOCUMENT
    document.querySelectorAll('.singleDocument').forEach(input => {

        if (FilePond.find(input)) return;

        FilePond.create(input, {
            allowMultiple: false,
            storeAsFile: true,
            acceptedFileTypes: [
                'application/pdf', // PDF
                'application/msword', // DOC
                'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // DOCX
                'application/vnd.ms-excel', // XLS
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // XLSX
                'text/plain' // TXT
            ],
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

    // SINGLE VIDEO
    document.querySelectorAll('.singleVideo').forEach(input => {

        if (FilePond.find(input)) return;

        FilePond.create(input, {
            allowMultiple: false,
            storeAsFile: true,
            acceptedFileTypes: [
                'video/mp4', // MP4
                'video/ogg', // OGG
                'video/webm', // WebM
                'video/avi', // AVI (may need browser support check)
                'video/mov', // MOV (QuickTime)
                'video/mpeg' // MPEG
            ],
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

    // MULTIPLE UPLOAD
    document.querySelectorAll('.multipleUpload').forEach(input => {

        if (FilePond.find(input)) return;

        FilePond.create(input, {
            allowMultiple: true,
            maxFiles: 4,
            storeAsFile: true,
            acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg', 'image/webp'],
            allowFileTypeValidation: true,
            allowFileSizeValidation: true,
            labelIdle: `
                <i class="fa-solid fa-cloud-arrow-up fa-2x"></i>
                <h4 style="font-size:12px;font-weight:700;">Multiple Upload</h4>
                `,
            imagePreviewHeight: 70,
            itemPanelAspectRatio: 1,
            styleItemPanelAspectRatio: 1,
            styleItemPanelBorderRadius: '8px'
        });
    });
}


function textEditor() {
    // tinymce.init({
    //     selector: '.text-editor',
    //     plugins: [
    //         // Core editing features
    //         'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
    //         // Your account includes a free trial of TinyMCE premium features
    //         // Try the most popular premium features until Jan 4, 2026:
    //         'checklist', 'mediaembed', 'casechange', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'advtemplate', 'ai', 'uploadcare', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown', 'importword', 'exportword', 'exportpdf'
    //     ],
    //     toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography uploadcare | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    //     tinycomments_mode: 'embedded',
    //     tinycomments_author: 'Author name',
    //     mergetags_list: [
    //         {
    //             value: 'First.Name',
    //             title: 'First Name'
    //         },
    //         {
    //             value: 'Email',
    //             title: 'Email'
    //         },
    //     ]
    //     // ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
    //     // uploadcare_public_key: 'b4dcf4234d769594174e',
    // });
    tinymce.init({
    selector: '.text-editor',
    plugins: 'lists link table image code',
    toolbar:
        'undo redo | bold italic underline | bullist numlist | link image table | code'
    });

}

getAllblogs();

function getAllblogs() {
    $.ajax({
        type: 'POST',
        url: '/API/adminApi.php',
        dataType: 'JSON',
        data: JSON.stringify({
            method: 'getAllBlogs'
        }),
        contentType: "application/json",
        beforeSend: function () {
            $(".preloader").show();
        },
        complete: function () {
            $(".preloader").hide();
        },
        success: function (response) {
            console.log(response);
            let status = response.status;
            if (status == 1) {
                let html = "";
                if (response.data.length > 0) {
                    $.each(response.data, function (index, item) {
                        let multipleImgHtml = '';
                        let cardImageHtml = '';
                        let documentHtml = '';
                        let videoHtml = '';
                        if (item.multiple_img && item.multiple_img.trim() !== '') {
                            let multipleArray = item.multiple_img.split(',');
                            multipleArray.forEach(img => {
                                if (img.trim() !== '') {
                                    multipleImgHtml += `
                                        <div class="image-preview-container">
                                            <img src="../blog_img/${img.trim()}" class="rounded image-preview">
                                        </div>
                                    `;
                                }
                            });
                        } else {
                            multipleImgHtml += `
                                <div class="image-preview-container text-danger flex-fill d-flex justify-content-center align-items-center text-center">
                                    <h5>No image uploaded!</h5>
                                </div>
                            `;
                        }

                        if (item.card_image && item.card_image.trim() !== '') {
                            cardImageHtml += `
                                <div class="image-preview-container">
                                    <img src="../blog_img/${item.card_image}" class="image-preview">
                                </div>
                            `;
                        } else {
                            cardImageHtml += `
                                <div class="image-preview-container text-danger flex-fill d-flex justify-content-center align-items-center text-center">
                                    <h6>No image uploaded!</h6>
                                </div>
                            `;
                        }

                        if (item.document && item.document.trim() !== '') {
                            documentHtml += `
                                <div class="image-preview-container d-flex justufy-content-center align-items-center">
                                    <a href="../blog_attachment/${item.document}" download target="_blank" class="attachment-download">
                                        <img src="../img/images.jpeg" width="125">
                                    </a>
                                </div>
                            `;
                        } else {
                            documentHtml += `
                                <div class="image-preview-container text-danger flex-fill d-flex justify-content-center align-items-center text-center">
                                    <h6>No document uploaded!</h6>
                                </div>
                            `;
                        }

                        if (item.video && item.video.trim() !== '') {
                            videoHtml += `
                                <div class="image-preview-container d-flex justify-content-center align-items-center">
                                    <video class="image-preview" controls>
                                        <source src="../blog_video/${item.video}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            `;
                        } else {
                            videoHtml += `
                                <div class="image-preview-container text-danger flex-fill d-flex justify-content-center align-items-center text-center">
                                    <h6>No video uploaded!</h6>
                                </div>
                            `;
                        }

                        // console.log(multipleArray);
                        html += `<div class="card col-12${item.id != 1 ? ' mt-3' : ''}">
                                        <div class="card-header d-flex justify-content-between">
                                            <div>${item.title}</div>
                                            <div>
                                            <i class="fa-solid fa-pen-to-square edit_blog" style="cursor: pointer;"></i>
                                            <i class="fa-solid fa-eye-slash hide_blog d-none" style="cursor: pointer;"></i>
                                            <i class="fa-solid fa-trash delete_blog text-danger" style="cursor: pointer;"></i>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="#" class="update_blog" enctype="multipart/form-data">
                                                <input type="hidden" name="blog_id" value="${item.id}" class="blog_id">
                                                <div class="row g-3">
                                                    <div class="col-sm-12 mt-3">
                                                        <label for="blog_title${item.id}" class="form-label mb-2">Blog title</label>
                                                        <div class="input-group-with-icon">
                                                            <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                                                <i class="fa-solid fa-pen-nib"></i>
                                                            </span>
                                                            <input type="text" readonly required name='blog_title' value="${item.title}" class="form-control ps-2" id="blog_title${item.id}" placeholder="Your blog title">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-12 mt-3">
                                                        <label for="description${item.id}" class="form-label mb-2">Short description</label>
                                                        <textarea class="form-control" rows="5" readonly required name="description" id="description${item.id}">${item.description}</textarea>
                                                    </div>

                                                    <div class="col-lg-12 mt-3">
                                                        <label for="full_detail${item.id}" class="form-label mb-2">Detail description</label>
                                                        <textarea class="form-control text-editor" readonly required name="full_detail" id="full_detail${item.id}">${item.full_detail}</textarea>
                                                    </div>

                                                    <div class="col-lg-4 d-flex gap-4 mt-3">
                                                        <div>
                                                            <label for="card_image${item.id}" class="form-label mb-2">Card Image</label>
                                                            ${cardImageHtml}
                                                        </div>
                                                        <div class="flex-fill">
                                                            <label class="form-label mb-2" for="card_image${item.id}">New card image
                                                            </label>
                                                            <input type="file" name="card_image" id="card_image${item.id}" class="singleUpload">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 d-flex gap-4 mt-3">
                                                        <div>
                                                            <label for="document${item.id}" class="form-label mb-2">Blog attachment</label>
                                                            ${documentHtml}
                                                        </div>
                                                        <div class="flex-fill">
                                                            <label class="form-label mb-2" for="document${item.id}">New attachment
                                                            </label>
                                                            <input type="file" name="document" id="document${item.id}" class="singleDocument">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 d-flex gap-4 mt-3">
                                                        <div>
                                                            <label for="video${item.id}" class="form-label mb-2">Blog attachment</label>
                                                            ${videoHtml}
                                                        </div>
                                                        <div class="flex-fill">
                                                            <label class="form-label mb-2" for="video${item.id}">Blog video
                                                            </label>
                                                            <input type="text" name="video" id="video${item.id}" class="singleVideo">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-12 col-md-6 col-lg-6 mt-3">
                                                        <label for="card_image${item.id}" class="form-label mb-2">Multiple blog image</label>
                                                        <div class="d-flex justify-content-between align-items-center gap-3">
                                                            ${multipleImgHtml}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-lg-6 mt-3">
                                                        <label class="form-label mb-2" for="multiple_image${item.id}">New multiple blog image
                                                        </label>
                                                        <input type="file" name="multiple_img[]" multiple accept="image/*" id="multiple_image${item.id}" class="multipleUpload">
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
                    textEditor();
                    uploadFile();
                }
            }
        },
        error: function () {
            console.log("Something went wrong, while geting data of educations!");
        }
    });
};

$("body").on("click", ".edit_blog", function () {

    $(this).addClass("d-none");
    $(this).closest(".card").find('.hide_blog').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_blog");

    // show submit button
    form.find(".submit_btn").removeClass("d-none");
    // remove readonly from all inputs & textarea
    form.find("input, textarea").removeAttr("readonly");

    // now focus on first input
    form.find("[name='blog_title']").focus();

});

$("body").on("click", ".hide_blog", function () {

    $(this).addClass("d-none");
    $(this).closest(".card").find('.edit_blog').removeClass("d-none");
    let form = $(this).closest(".card").find("form.update_blog");

    // show submit button
    form.find(".submit_btn").addClass("d-none");

    // remove readonly from all inputs & textarea
    form.find("input, textarea").attr("readonly", true);

});

$("body").on("click", ".delete_blog", function () {

    let form = $(this).closest(".card").find("form.update_blog");
    // show submit button
    let blog_id = form.find("[name='blog_id']").val();
    $("#current_delete_blog_id").val(blog_id);
    $("#delete_blog").modal("show");
    // alert(testimonial_id);

});

$("body").on("click", ".close_modal_blog", function () {
    $("#delete_blog").modal("hide");
});

$("body").on("click", "#delete_blog_now", function () {
    let id = $("body #current_delete_blog_id").val();
    // alert(id);
    $.ajax({
        type: "POST",
        url: "/API/adminApi.php",
        dataType: "JSON",
        data: JSON.stringify({
            id: id,
            method: 'deleteBlog'
        }),
        contentType: "application/json",
        beforeSend: function () {
            $(".preloader, .preloader-icon").show();
        },
        success: function (response) {
            if (response.status == 1) {
                toastr.success("Blog delete successfully!");
                getAllblogs();
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

$("body").on("submit", ".update_blog", function (e) {
    e.preventDefault(); // stop normal submit

    let form = this;
    let formData = new FormData(form);
    formData.append("method", "updateBlog");

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
                toastr.success("Blog updated successfully!");
                getAllblogs();
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