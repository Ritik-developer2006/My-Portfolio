<?php
require_once("header.php");
?>
<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet">
<link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/css/custom.css">

<!-- main content start -->
<div class="main-content">
    <div class="dashboard-breadcrumb mb-25 border shadow">
        <h2>Projects Section</h2>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- All Educations -->
            <div class="panel mb-25 border shadow">
                <div class="panel-header d-flex justify-content-between">
                    <div>
                        <h5 class="fw-bold">Categories</h5>
                    </div>
                    <div><i class="fa-solid fa-circle-plus" id="add_category" style="cursor: pointer"></i></div>
                </div>
                <div class="panel-body d-flex justify-content-center align-items-center gap-3 flex-wrap" id="category_container" style="min-height: auto;">
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
                        <h5 class="fw-bold">All Projects</h5>
                    </div>
                    <div><i class="fa-solid fa-circle-plus" id="add_project" style="cursor: pointer"></i></div>
                </div>
                <div class="panel-body d-flex flex-column justify-content-center align-items-center" id="project_container">
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
    <div class="modal fade" id="delete_category" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-2">
                    <h3 class="modal-title fs-6" id="staticBackdropLabel">Confirmation</h3>
                    <button type="button" class="btn-close m-0 close_modal" data-bs-dismiss="modal" aria-label="Close" style="font-size: 12px !important;"></button>
                </div>
                <div class="modal-body" style="font-size: small;">
                    Are you sure to delete this category?
                    <input type="hidden" id="current_delete_id" value="">
                </div>
                <div class="modal-footer p-2 border-top">
                    <button type="button" class="btn btn-sm btn-secondary close_modal" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-sm btn-danger" id="delete_now">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="delete_project" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-2">
                    <h3 class="modal-title fs-6" id="staticBackdropLabel">Confirmation</h3>
                    <button type="button" class="btn-close m-0 close_modal_project" data-bs-dismiss="modal" aria-label="Close" style="font-size: 12px !important;"></button>
                </div>
                <div class="modal-body" style="font-size: small;">
                    Are you sure to delete this project?
                    <input type="hidden" id="current_delete_project_id" value="">
                </div>
                <div class="modal-footer p-2 border-top">
                    <button type="button" class="btn btn-sm btn-secondary close_modal_project" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-sm btn-danger" id="delete_project_now">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add_project_modal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal modal-dialog-centered">
            <form method="post" action="#" id="add_project_form">
                <div class="modal-content">
                    <div class="modal-header p-2">
                        <h3 class="modal-title fs-6" id="staticBackdropLabel">Add Project</h3>
                        <button type="button" class="btn-close m-0 close_project_modal" data-bs-dismiss="modal" aria-label="Close" style="font-size: 12px !important;"></button>
                    </div>
                    <div class="modal-body" style="font-size: small;">
                        <div class="row g-3">
                            <div class="col-sm-6 mt-3">
                                <label for="project_name" class="form-label mb-2">Project Name</label>
                                <div class="input-group-with-icon">
                                    <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                        <i class="fa-solid fa-pen-nib"></i>
                                    </span>
                                    <input type="text" required name='project_name' value="" class="form-control ps-2" id="project_name" placeholder="Your college">
                                </div>
                            </div>

                            <div class="col-sm-6 mt-3">
                                <label for="link" class="form-label mb-2">Project Url</label>
                                <div class="input-group-with-icon">
                                    <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                        <i class="fa-solid fa-pen-nib"></i>
                                    </span>
                                    <input type="text" required name='link' value="" class="form-control ps-2" id="link" placeholder="Project Url">
                                </div>
                            </div>

                            <div class="col-lg-12 d-flex gap-4 mt-3">
                                <div class="flex-fill">
                                    <label class="form-label mb-2" for="image">New Image
                                    </label>
                                    <input type="file" name="images" id="image" class="singleUpload">
                                </div>
                            </div>

                            <div class="col-sm-12 mt-3">
                                <label for="data_filter_id" class="form-label mb-2">Category</label>
                                <div class="input-group-with-icon">
                                    <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                        <i class="fa-solid fa-pen-nib"></i>
                                    </span>
                                    <select name='data_filter_id' required id="data_filter_id" class="form-control ps-2 select2">
                                        <option>--Select Category--</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12 mt-3">
                                <label for="description" class="form-label mb-2">Example textarea</label>
                                <textarea class="form-control" readonly required rows="5" name="description" id="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer p-2 border-top">
                        <button type="button" class="btn btn-sm btn-secondary close_project_modal" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-primary" id="add_project_now">Add Project</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="add_category_modal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal modal-dialog-centered">
            <form method="post" action="#" id="add_category_form">
                <div class="modal-content">
                    <div class="modal-header p-2">
                        <h3 class="modal-title fs-6" id="staticBackdropLabel">Add Category</h3>
                        <button type="button" class="btn-close m-0 close_category_modal" data-bs-dismiss="modal" aria-label="Close" style="font-size: 12px !important;"></button>
                    </div>
                    <div class="modal-body" style="font-size: small;">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="category" class="form-label mb-2">Category Name</label>
                                <div class="input-group-with-icon">
                                    <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                        <i class="fa-solid fa-pen-nib"></i>
                                    </span>
                                    <input type="text" required name='category' value="" class="form-control ps-2" id="category" placeholder="Your category">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer p-2 border-top">
                        <button type="button" class="btn btn-sm btn-secondary close_category_modal" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-primary" id="add_category_now">Add Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="assets/js/project.js"></script>