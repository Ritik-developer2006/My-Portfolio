<?php
require_once("header.php");
?>

<!-- main content start -->
<div class="main-content">
    <div class="dashboard-breadcrumb mb-25 border shadow">
        <h2>Resume Section</h2>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <!-- All Educations -->
            <div class="panel mb-25 border shadow">
                <div class="panel-header d-flex justify-content-between">
                    <div>
                        <h5 class="fw-bold">Educations</h5>
                    </div>
                    <div><i class="fa-solid fa-circle-plus" id="add_education" style="cursor: pointer"></i></div>
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
        <div class="col-lg-6">
            <!-- All Experinces -->
            <div class="panel mb-25 border shadow">
                <div class="panel-header d-flex justify-content-between">
                    <div>
                        <h5 class="fw-bold">Experinces</h5>
                    </div>
                    <div><i class="fa-solid fa-circle-plus"></i></div>
                </div>
                <div class="panel-body d-flex flex-column justify-content-center align-items-center" id="experience_container">
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
            <!-- All Skills -->
            <div class="panel mb-25 border shadow">
                <div class="panel-header d-flex justify-content-between">
                    <div>
                        <h5 class="fw-bold">Skills</h5>
                    </div>
                    <div><i class="fa-solid fa-circle-plus"></i></div>
                </div>
                <div class="panel-body d-flex flex-column justify-content-center align-items-center" id="skill_container">
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
    <div class="modal fade" id="delete_education" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-2">
                    <h3 class="modal-title fs-6" id="staticBackdropLabel">Confirmation</h3>
                    <button type="button" class="btn-close m-0 close_modal" data-bs-dismiss="modal" aria-label="Close" style="font-size: 12px !important;"></button>
                </div>
                <div class="modal-body" style="font-size: small;">
                    Are you sure to delete this education?
                    <input type="hidden" id="current_delete_id" value="">
                </div>
                <div class="modal-footer p-2 border-top">
                    <button type="button" class="btn btn-sm btn-secondary close_modal" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-sm btn-danger" id="delete_now">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete_experience" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-2">
                    <h3 class="modal-title fs-6" id="staticBackdropLabel">Confirmation</h3>
                    <button type="button" class="btn-close m-0 close_modal" data-bs-dismiss="modal" aria-label="Close" style="font-size: 12px !important;"></button>
                </div>
                <div class="modal-body" style="font-size: small;">
                    Are you sure to delete this experience?
                    <input type="hidden" id="current_delete_experience_id" value="">
                </div>
                <div class="modal-footer p-2 border-top">
                    <button type="button" class="btn btn-sm btn-secondary close_modal" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-sm btn-danger" id="delete_experience_now">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete_skill" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-2">
                    <h3 class="modal-title fs-6" id="staticBackdropLabel">Confirmation</h3>
                    <button type="button" class="btn-close m-0 close_modal" data-bs-dismiss="modal" aria-label="Close" style="font-size: 12px !important;"></button>
                </div>
                <div class="modal-body" style="font-size: small;">
                    Are you sure to delete this skill?
                    <input type="hidden" id="current_delete_skill_id" value="">
                </div>
                <div class="modal-footer p-2 border-top">
                    <button type="button" class="btn btn-sm btn-secondary close_modal" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-sm btn-danger" id="delete_skill_now">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/resume.js"></script>