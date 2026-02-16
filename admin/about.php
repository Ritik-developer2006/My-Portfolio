<?php
require_once("header.php");
?>
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
<style>
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
        <h2>About Section</h2>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- All Skills -->
            <div class="panel mb-25 border shadow">
                <div class="panel-header d-flex justify-content-between">
                    <div>
                        <h5 class="fw-bold">Basic Details</h5>
                    </div>
                    <!-- <div><i class="fa-solid fa-circle-plus"></i></div> -->
                </div>
                <div class="panel-body d-flex flex-column justify-content-center align-items-center" id="basic_container">
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
        <div class="col-lg-6">
            <!-- All Educations -->
            <div class="panel mb-25 border shadow">
                <div class="panel-header d-flex justify-content-between">
                    <div>
                        <h5 class="fw-bold">Testimonials</h5>
                    </div>
                    <!-- <div><i class="fa-solid fa-circle-plus" id="add_education" style="cursor: pointer"></i></div> -->
                </div>
                <div class="panel-body d-flex flex-column justify-content-center align-items-center" id="testimonial_container">
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
        <div class="col-lg-6">
            <!-- All Experinces -->
            <div class="panel mb-25 border shadow">
                <div class="panel-header d-flex justify-content-between">
                    <div>
                        <h5 class="fw-bold">Services</h5>
                    </div>
                    <div><i class="fa-solid fa-circle-plus" id="add_service" style="cursor: pointer;"></i></div>
                </div>
                <div class="panel-body d-flex flex-column justify-content-center align-items-center" id="service_container">
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

    <?php
    require_once("footer.php");
    ?>

    <div class="modal fade" id="delete_testinmonial" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-2">
                    <h3 class="modal-title fs-6" id="staticBackdropLabel">Confirmation</h3>
                    <button type="button" class="btn-close m-0 close_modal" data-bs-dismiss="modal" aria-label="Close" style="font-size: 12px !important;"></button>
                </div>
                <div class="modal-body" style="font-size: small;">
                    Are you sure to delete this testimonial?
                    <input type="hidden" id="current_delete_id" value="">
                </div>
                <div class="modal-footer p-2 border-top">
                    <button type="button" class="btn btn-sm btn-secondary close_modal" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-sm btn-danger" id="delete_now">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete_service" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-2">
                    <h3 class="modal-title fs-6" id="staticBackdropLabel">Confirmation</h3>
                    <button type="button" class="btn-close m-0 close_modal_service" data-bs-dismiss="modal" aria-label="Close" style="font-size: 12px !important;"></button>
                </div>
                <div class="modal-body" style="font-size: small;">
                    Are you sure to delete this service?
                    <input type="hidden" id="current_delete_service_id" value="">
                </div>
                <div class="modal-footer p-2 border-top">
                    <button type="button" class="btn btn-sm btn-secondary close_modal_service" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-sm btn-danger" id="delete_service_now">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add_service_modal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal modal-dialog-centered">
            <form method="post" action="#" id="add_service_form">
                <div class="modal-content">
                    <div class="modal-header p-2">
                        <h3 class="modal-title fs-6" id="staticBackdropLabel">Add Service</h3>
                        <button type="button" class="btn-close m-0 close_service_modal" data-bs-dismiss="modal" aria-label="Close" style="font-size: 12px !important;"></button>
                    </div>
                    <div class="modal-body" style="font-size: small;">
                        <div class="row g-3">
                            <div class="col-sm-6 mt-3">
                                <label for="heading" class="form-label mb-2">Service Name</label>
                                <div class="input-group-with-icon">
                                    <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                        <i class="fa-solid fa-pen-nib"></i>
                                    </span>
                                    <input type="text" required name='heading' value="" class="form-control ps-2" id="" placeholder="Your service name">
                                </div>
                            </div>

                            <div class="col-sm-6 mt-3">
                                <label for="icon" class="form-label mb-2">Service Icon</label>
                                <div class="input-group-with-icon">
                                    <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                        <i class="fa-solid fa-pen-nib"></i>
                                    </span>
                                    <input type="text" required name='icon' value="" class="form-control ps-2" id="icon" placeholder="Your service icon">
                                </div>
                            </div>

                            <div class="col-sm-12 mt-3">
                                <label for="ex_description" class="form-label mb-2">Service Description</label>
                                <textarea class="form-control" rows="5" required name="description" id="ex_description" placeholder="Describe your service"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer p-2 border-top">
                        <button type="button" class="btn btn-sm btn-secondary close_service_modal" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-primary" id="add_service_now">Add Service</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.min.js"></script>
    <script src="assets/js/about.js"></script>