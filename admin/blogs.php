<?php
require_once("header.php");
?>
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
<style>
    .tox-tinymce {
        height: 312px !important;
    }

    .tox-promotion-button {
        display: none !important;
    }

    .tox-notifications-container {
        display: none !important;
    }

    .tox-statusbar {
        display: none !important;
    }

    .filepond--credits {
        display: none !important;
    }

    .filepond--root {
        min-height: 60px;
    }

    .card,
    .card-body,
    .col-lg-4,
    .col-md-5 {
        overflow: visible !important;
    }

    .filepond--item {
        width: calc(25% - 0.5em);
    }

    .filepond--image-preview-overlay {
        display: none !important;
    }

    .tox-notification {
        display: none !important;
    }

    .image-preview-container {
        width: 120px;
        height: 75px;
        background: #1f1f1f;
        border-radius: 10px;
        position: relative;
        overflow: hidden;
    }

    .image-preview {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
</style>
<!-- main content start -->
<div class="main-content">
    <div class="dashboard-breadcrumb mb-25 border shadow">
        <h2>Blog Section</h2>
    </div>
    <div class="row">
        <div class="col-12">
            <!-- All Educations -->
            <div class="panel mb-25 border shadow">
                <div class="panel-header d-flex justify-content-between">
                    <div>
                        <h5 class="fw-bold">All Blogs</h5>
                    </div>
                    <div><i class="fa-solid fa-circle-plus" id="add_blog" style="cursor: pointer"></i></div>
                </div>
                <div class="panel-body d-flex flex-column justify-content-center align-items-center" id="education_container">
                    <!-- data come through ajax -->
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <div>
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
    <!-- main content end -->

    <?php
    require_once("footer.php");
    ?>
    <div class="modal fade" id="delete_blog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-2">
                    <h3 class="modal-title fs-6" id="staticBackdropLabel">Confirmation</h3>
                    <button type="button" class="btn-close m-0 close_modal_blog" data-bs-dismiss="modal" aria-label="Close" style="font-size: 12px !important;"></button>
                </div>
                <div class="modal-body" style="font-size: small;">
                    Are you sure to delete this blog?
                    <input type="hidden" id="current_delete_blog_id" value="">
                </div>
                <div class="modal-footer p-2 border-top">
                    <button type="button" class="btn btn-sm btn-secondary close_modal_blog" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-sm btn-danger" id="delete_blog_now">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="https://cdn.tiny.cloud/1/wd87r1fgxzh2szjregh8gh38b074cx3wkj0d7qk6yol0zggp/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.min.js"></script>
    <script src="assets/js/blog.js"></script>