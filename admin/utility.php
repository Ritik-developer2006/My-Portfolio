<?php
require_once("header.php");
?>
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/custom.css">

<!-- main content start -->
<div class="main-content">
    <div class="dashboard-breadcrumb mb-25">
        <h2>Utilities</h2>
    </div>
    <div class="row">
         <div class="col-12 col-sm-12">
            <div class="panel mb-25">
                <div class="panel-header d-flex justify-content-between">
                    <div>
                        <h5 class="fw-bold">My Curriculum Vitae(CV)</h5>
                    </div>
                    <div>
                        <a href="../Resume/cv.pdf" download class="pdf-card">
                            <i class="fa-solid fa-circle-down fs-6" id="download" style="cursor: pointer"></i>
                        </a>
                    </div>
                </div>
                <div class="panel-body" style="min-height: 120px;">
                    <div class="row g-3">
                        <form action="" method="post" id="cv_form" enctype="multipart/form-data">
                            <div class="col-12 d-flex gap-4">
                                <div>
                                    <label for="logo${item.id}" class="form-label mb-2">Previous CV</label>
                                    <a href="../Resume/cv.pdf" download class="pdf-card">
                                        <div class="image-preview-container">
                                            <img src="../Resume/mycv_icon.svg" style="filter: brightness(1.5);" class="rounded image-preview">
                                        </div>
                                    </a>
                                </div>
                                <div class="flex-fill">
                                    <label class="form-label mb-2" for="myCv">Upload New CV</label>
                                    <input type="file" required name="myCv" id="myCv" class="singleUpload">
                                </div>
                            </div>
                            <div class="col-12 submit_btn mt-1">
                                <button class="btn btn-sm btn-primary" type="submit">Update CV</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12">
            <div class="panel border shadow">
                <div class="panel-header d-flex justify-content-between">
                    <div>
                        <h5 class="fw-bold">All User Messages</h5>
                    </div>
                    <div><i class="fa-solid fa-circle-plus text-success" id="add_message" style="cursor: pointer"></i></div>
                </div>
                <div class="panel-body d-flex flex-column justify-content-center align-items-center" id="message_container">
                    <!-- data come through ajax -->
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <div class="mb-2">
                            <i class="fa-solid fa-circle-info fs-1"></i>
                        </div>
                        <div>
                            <h5>Data Not Available!</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer start -->
    <div class="footer">
        <p>Copyright© <script>
                document.write(new Date().getFullYear())
            </script> All Rights Reserved By <span class="text-primary">Digiboard</span></p>
    </div>
    <!-- footer end -->
</div>
<!-- main content end -->

<?php
require_once("footer.php");
?>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.min.js"></script>
<script src="assets/js/utility.js"></script>