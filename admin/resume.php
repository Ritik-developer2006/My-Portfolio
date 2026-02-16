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
                    <div><i class="fa-solid fa-circle-plus" id="add_experience" style="cursor: pointer;"></i></div>
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
                    <div><i class="fa-solid fa-circle-plus" id="add_skill" style="cursor: pointer;"></i></div>
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

    <div class="modal fade" id="add_skill_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal modal-dialog-centered">
            <form method="post" action="#" id="add_skill_form">
                <div class="modal-content">
                    <div class="modal-header p-2">
                        <h3 class="modal-title fs-6" id="staticBackdropLabel">Add Skill</h3>
                        <button type="button" class="btn-close m-0 close_skill_modal" data-bs-dismiss="modal" aria-label="Close" style="font-size: 12px !important;"></button>
                    </div>
                    <div class="modal-body" style="font-size: small;">
                        <div class="row g-3">
                            <div class="col-sm-12 mt-3">
                                <label for="skill" class="form-label mb-2">Skill</label>
                                <div class="input-group-with-icon">
                                    <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                        <i class="fa-solid fa-pen-nib"></i>
                                    </span>
                                    <input type="text" required name='skill' value="" class="form-control ps-2" id="skill" placeholder="Your skill">
                                </div>
                            </div>

                            <div class="col-sm-12 mt-3">
                                <label for="per_knowledge" class="form-label mb-2">Skill Knowledge</label>
                                <div class="input-group-with-icon">
                                    <span class="input-icon ps-4 pe-4" style="border-right: 1px solid #e5e5e5;">
                                        <output for="per_knowledge" class="rangeValue" id="rangeValue" aria-hidden="true"></output>%
                                    </span>
                                    <input type="range" required class="form-range range ps-2 pe-2" min="0" max="100" name="per_knowledge" value="" rows="5" id="per_knowledge">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer p-2 border-top">
                        <button type="button" class="btn btn-sm btn-secondary close_skill_modal" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-primary" id="add_skill_now">Add Skill</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="add_education_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal modal-dialog-centered">
            <form method="post" action="#" id="add_education_form">
                <div class="modal-content">
                    <div class="modal-header p-2">
                        <h3 class="modal-title fs-6" id="staticBackdropLabel">Add Education</h3>
                        <button type="button" class="btn-close m-0 close_education_modal" data-bs-dismiss="modal" aria-label="Close" style="font-size: 12px !important;"></button>
                    </div>
                    <div class="modal-body" style="font-size: small;">
                        <div class="row g-3">
                            <div class="col-sm-6 mt-3">
                                <label for="education_name" class="form-label mb-2">Education Name</label>
                                <div class="input-group-with-icon">
                                    <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                        <i class="fa-solid fa-pen-nib"></i>
                                    </span>
                                    <input type="text" required name='education_name' value="" class="form-control ps-2" id="education_name" placeholder="Type of education">
                                </div>
                            </div>

                            <div class="col-sm-6 mt-3">
                                <label for="college" class="form-label mb-2">college</label>
                                <div class="input-group-with-icon">
                                    <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                        <i class="fa-solid fa-pen-nib"></i>
                                    </span>
                                    <input type="text" required name='college' value="" class="form-control ps-2" id="college" placeholder="Your college">
                                </div>
                            </div>

                            <div class="col-sm-12 mt-3">
                                <label for="university" class="form-label mb-2">University</label>
                                <div class="input-group-with-icon">
                                    <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                        <i class="fa-solid fa-pen-nib"></i>
                                    </span>
                                    <input type="text" required name='university' value="" class="form-control ps-2" id="university" placeholder="Your university">
                                </div>
                            </div>

                            <div class="col-sm-6 mt-3">
                                <label for="from_year" class="form-label mb-2">From Date</label>
                                <input type="date" required name='from_year' value="" class="form-control" id="from_year">
                            </div>

                            <div class="col-sm-6 mt-3">
                                <label for="to_year" class="form-label mb-2">End Date</label>
                                <input type="date" required name='to_year' value="" class="form-control" id="to_year">
                            </div>

                            <div class="col-sm-12">
                                <label for="description" class="form-label mb-2">Description</label>
                                <textarea class="form-control" rows='5' required name="description" id="description" placeholder="Describe your education"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer p-2 border-top">
                        <button type="button" class="btn btn-sm btn-secondary close_education_modal" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-primary" id="add_education_now">Add Education</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="add_experience_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal modal-dialog-centered">
            <form method="post" action="#" id="add_experience_form">
                <div class="modal-content">
                    <div class="modal-header p-2">
                        <h3 class="modal-title fs-6" id="staticBackdropLabel">Add Experience</h3>
                        <button type="button" class="btn-close m-0 close_experience_modal" data-bs-dismiss="modal" aria-label="Close" style="font-size: 12px !important;"></button>
                    </div>
                    <div class="modal-body" style="font-size: small;">
                        <div class="row g-3">
                            <div class="col-sm-6 mt-3">
                                <label for="job_title" class="form-label mb-2">Job Title</label>
                                <div class="input-group-with-icon">
                                    <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                        <i class="fa-solid fa-pen-nib"></i>
                                    </span>
                                    <input type="text" required name='job_title' value="" class="form-control ps-2" id="job_title" placeholder="Your job title">
                                </div>
                            </div>

                            <div class="col-sm-6 mt-3">
                                <label for="company_name" class="form-label mb-2">Compnay Name</label>
                                <div class="input-group-with-icon">
                                    <span class="input-icon" style="border-right: 1px solid #e5e5e5;">
                                        <i class="fa-solid fa-pen-nib"></i>
                                    </span>
                                    <input type="text" required name='company_name' value="" class="form-control ps-2" id="company_name" placeholder="Company Name">
                                </div>
                            </div>

                            <div class="col-sm-6 mt-3">
                                <label for="ex_from_year" class="form-label mb-2">From date</label>
                                <input type="date" required name='from_year' value="" class="form-control" id="ex_from_year">
                            </div>

                            <div class="col-sm-6 mt-3">
                                <label for="ex_to_year" class="form-label mb-2">End date</label>
                                <input type="date" required name='to_year' value="" class="form-control" id="ex_to_year">
                            </div>

                            <div class="col-sm-12 mt-3">
                                <label for="ex_description" class="form-label mb-2">Description</label>
                                <textarea class="form-control" rows="5" required name="description" id="ex_description" placeholder="Describe your job role"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer p-2 border-top">
                        <button type="button" class="btn btn-sm btn-secondary close_experience_modal" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-primary" id="add_experience_now">Add Experience</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/js/resume.js"></script>