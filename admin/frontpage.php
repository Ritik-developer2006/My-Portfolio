<?php
require_once("header.php");
?>
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/custom.css">

<!-- main content start -->
<div class="main-content">
    <div class="dashboard-breadcrumb mb-25 border shadow">
        <h2>Front Page Details</h2>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- All Educations -->
            <div class="panel mb-25 border shadow">
                <div class="panel-header d-flex justify-content-between">
                    <div>
                        <h5 class="fw-bold">Menus</h5>
                    </div>
                    <div><i class="fa-solid fa-circle-plus" id="add_menu" style="cursor: pointer"></i></div>
                </div>
                <div class="panel-body d-flex justify-content-center align-items-center gap-3 flex-wrap" id="menu_container" style="min-height: auto;">
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
        <div class="col-lg-12">
            <!-- All Experinces -->
            <div class="panel mb-25 border shadow">
                <div class="panel-header d-flex justify-content-between">
                    <div>
                        <h5 class="fw-bold">All Sliders Name</h5>
                    </div>
                    <div><i class="fa-solid fa-circle-plus" id="add_slider" style="cursor: pointer;"></i></div>
                </div>
                <div class="panel-body d-flex justify-content-center align-items-center gap-3 flex-wrap" id="slider_container" style="min-height: auto;">
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
        <div class="col-lg-12">
            <!-- All Experinces -->
            <div class="panel mb-25 border shadow">
                <div class="panel-header d-flex justify-content-between">
                    <div>
                        <h5 class="fw-bold">Logo & Background Image</h5>
                    </div>
                    <!-- <div><i class="fa-solid fa-circle-plus"></i></div> -->
                </div>
                <div class="panel-body d-flex justify-content-center align-items-center gap-3 flex-wrap" id="utility_container" style="min-height: auto;">
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
    <div class="modal fade" id="delete_menu" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-2">
                    <h3 class="modal-title fs-6" id="staticBackdropLabel">Confirmation</h3>
                    <button type="button" class="btn-close m-0 close_modal" data-bs-dismiss="modal" aria-label="Close" style="font-size: 12px !important;"></button>
                </div>
                <div class="modal-body" style="font-size: small;">
                    Are you sure to delete this menu?
                    <input type="hidden" id="current_delete_id" value="">
                </div>
                <div class="modal-footer p-2 border-top">
                    <button type="button" class="btn btn-sm btn-secondary close_modal" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-sm btn-danger" id="delete_now">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete_slider" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-2">
                    <h3 class="modal-title fs-6" id="staticBackdropLabel">Confirmation</h3>
                    <button type="button" class="btn-close m-0 close_slider_modal" data-bs-dismiss="modal" aria-label="Close" style="font-size: 12px !important;"></button>
                </div>
                <div class="modal-body" style="font-size: small;">
                    Are you sure to delete this slider?
                    <input type="hidden" id="current_delete_slider_id" value="">
                </div>
                <div class="modal-footer p-2 border-top">
                    <button type="button" class="btn btn-sm btn-secondary close_slider_modal" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-sm btn-danger" id="delete_slider_now">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add_menu_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
        <div class="modal-dialog modal modal-dialog-centered">
            <div class="modal-content">
                <form id="add_menu_form" method="post" enctype="multipart/form-data" action="#">
                    <div class="modal-header p-2">
                        <h3 class="modal-title fs-6" id="staticBackdropLabel">Add Menu</h3>
                        <button type="button" class="btn-close m-0 close_menu_modal" data-bs-dismiss="modal" aria-label="Close" style="font-size: 12px !important;"></button>
                    </div>
                    <div class="modal-body" style="font-size: small;">
                        <div class="row g-3">
                            <div class="col-sm-12 mt-3">
                                <label for="menu_name" class="form-label mb-2">Menu Name</label>
                                <div class="input-group-with-icon">
                                    <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                        <i class="fa-solid fa-pen-nib"></i>
                                    </span>
                                    <input type="text" required name='menu_name' value="" class="form-control ps-2" id="menu_name" placeholder="Menu name">
                                </div>
                            </div>
                            <div class="col-sm-12 mt-3">
                                <label for="menu_link" class="form-label mb-2">Menu link</label>
                                <div class="input-group-with-icon">
                                    <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                        <i class="fa-solid fa-pen-nib"></i>
                                    </span>
                                    <input type="text" required name='menu_link' value="" class="form-control ps-2" id="menu_link" placeholder="Menu link">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer p-2 border-top">
                        <button type="button" class="btn btn-sm btn-secondary close_menu_modal" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-primary" id="add_menu_now">Add Menu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add_slider_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
        <div class="modal-dialog modal modal-dialog-centered">
            <div class="modal-content">
                <form id="add_slider_form" method="post" enctype="multipart/form-data" action="#">
                    <div class="modal-header p-2">
                        <h3 class="modal-title fs-6" id="staticBackdropLabel">Add Slider</h3>
                        <button type="button" class="btn-close m-0 close_slider_modal" data-bs-dismiss="modal" aria-label="Close" style="font-size: 12px !important;"></button>
                    </div>
                    <div class="modal-body" style="font-size: small;">
                        <div class="row g-3">
                            <div class="col-sm-12 mt-3">
                                <label for="slider_name" class="form-label mb-2">Slider Name</label>
                                <div class="input-group-with-icon">
                                    <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                        <i class="fa-solid fa-pen-nib"></i>
                                    </span>
                                    <input type="text" required name='slider_name' value="" class="form-control ps-2" id="slider_name" placeholder="Slider name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer p-2 border-top">
                        <button type="button" class="btn btn-sm btn-secondary close_slider_modal" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-primary" id="add_slider_now">Add Slider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.min.js"></script>
    <script src="assets/js/frontpage.js"></script>