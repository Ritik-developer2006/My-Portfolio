<?php
require_once("header.php");
?>
<style>
.panel .panel-body {
    min-height: 275px;
}
</style>

<!-- main content start -->
<div class="main-content">
    <div class="dashboard-breadcrumb mb-25 border shadow">
        <h2>My Profile</h2>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <!-- Basics Details -->
            <div class="panel mb-25 border shadow">
                <div class="panel-header d-flex justify-content-start">
                    <div>
                        <h5 class="fw-bold"><i class="material-icons text-primary me-2">Profile</i> Card</h5>
                    </div>
                </div>
                <div class="panel-body d-flex flex-column justify-content-center align-items-center p-3" id="basic_container">
                    <div class="d-flex flex-column align-items-center text-center p-3">
                        <img src="https://myprofile.tech/img/WhatsApp%20Image%202025-12-14%20at%2013.32.35_d8dfae31.jpg" alt="Admin"
                            class="rounded-circle" width="150" height="150">
                        <div class="mt-3">
                            <h5 class="mb-1 text-uppercase">Ritik Kumar</h5>
                            <p class="text-secondary mb-1">Web Developer</p>
                            <p class="text-muted font-size-sm">Atlanta Systems Pvt. Ltd.</p>
                            <a href="tel:+919354607685"><button class="btn btn-primary follow">Call</button></a>
                            <a href="mailto:rk5771829@gmail.com"><button class="btn btn-outline-primary message">Message</button></a>
                        </div>

                        <!-- Modal for reply message -->
                        <div class="modal fade" id="exampleModa" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Enter your
                                            message</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-start">
                                        <form class="row g-3 needs-validation" action="/message_reply" novalidate>
                                            <div class="col-md-12">
                                                <label for="validationCustomMessage3"
                                                    class="form-label">Write Message</label>
                                                <textarea class="form-control" id='message'
                                                    id="validationCustomMessage3" placeholder="write here....." maxlength='250' required></textarea>
                                                <div class='text-end'><small><span id='charCount'>0</span>/250</small></div>
                                                <div class="invalid-feedback">
                                                    Please enter message.
                                                </div>
                                            </div>
                                            <div class="col-12 text-end pt-4 border-top">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit"
                                                    class="btn btn-primary">Send</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <!-- All Educations -->
            <div class="panel mb-25 border shadow">
                <div class="panel-header d-flex justify-content-start">
                    <div>
                        <h5 class="fw-bold"><i class="material-icons text-primary me-2">Personal</i> Details</h5>
                    </div>
                </div>
                <div class="panel-body d-flex flex-column" id="personal_container">
                    <!-- data come through ajax -->
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            Ritik Kumar
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Designation</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            Back-end developer
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            rk5771829@gmail.com
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Phone</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            (+91)9354607685
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            H-no. 121 Meethapur village, Badarpur, New delhi-110044, India.
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <button class="btn btn-primary btn-sm" role='button' data-bs-toggle="modal" data-bs-target="#edit">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- All Experinces -->
            <div class="panel mb-25 border shadow">
                <div class="panel-header d-flex justify-content-start">
                    <div>
                        <h5 class="fw-bold">Social Media Accounts</h5>
                    </div>
                </div>
                <div class="panel-body d-flex flex-column" id="social_container">
                    <ul class="list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-bottom pe-0 ps-0 pb-2">
                            <h7 class="mb-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-globe me-2 icon-inline">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="2" y1="12" x2="22" y2="12"></line>
                                    <path
                                        d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                    </path>
                                </svg>Website
                            </h7>
                            <span class="text-secondary">https://rkdeveloper.com</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-bottom pe-0 ps-0 pt-2 pb-2">
                            <h7 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-github me-2 icon-inline">
                                    <path
                                        d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                    </path>
                                </svg>Github</h7>
                            <span class="text-secondary">rkdeveloper</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-bottom pe-0 ps-0 pb-2 pt-2">
                            <h7 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-twitter me-2 icon-inline text-info">
                                    <path
                                        d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                    </path>
                                </svg>Twitter</h7>
                            <span class="text-secondary">@rkdeveloper</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-bottom pe-0 ps-0 pt-2 pb-2">
                            <h7 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-instagram me-2 icon-inline text-danger">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                </svg>Instagram</h7>
                            <span class="text-secondary">rkdeveloper_2024</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap border-bottom pe-0 ps-0 pt-2 pb-2">
                            <h7 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-facebook me-2 icon-inline text-primary">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                    </path>
                                </svg>Facebook</h7>
                            <span class="text-secondary">rkdeveloper</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <!-- All Experinces -->
            <div class="panel mb-25 border shadow">
                <div class="panel-header d-flex justify-content-start">
                    <div>
                        <h5 class="fw-bold">
                            <i class="material-icons text-primary me-2">Skills</i> Status</h5>
                    </div>
                </div>
                <div class="panel-body d-flex flex-column" id="skills_container">
                    <small>PHP</small>
                    <div class="progress mb-3">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%"
                            aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <small>Laravel</small>
                    <div class="progress mb-3">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%"
                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <small>CSS</small>
                    <div class="progress mb-3">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%"
                            aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <small>JavaScript</small>
                    <div class="progress mb-3">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%"
                            aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <small>Backend API</small>
                    <div class="progress mb-3">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%"
                            aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <!-- All Experinces -->
            <div class="panel mb-25 border shadow">
                <div class="panel-header d-flex justify-content-start">
                    <div>
                        <h5 class="fw-bold">
                            <i class="material-icons text-primary me-2">Project</i> Status</h5>
                    </div>
                </div>
                <div class="panel-body d-flex flex-column" id="project_container">
                    <small>PHP</small>
                    <div class="progress mb-3">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%"
                            aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <small>Laravel</small>
                    <div class="progress mb-3">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%"
                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <small>CSS</small>
                    <div class="progress mb-3">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%"
                            aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <small>JavaScript</small>
                    <div class="progress mb-3">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%"
                            aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <small>Backend API</small>
                    <div class="progress mb-3">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%"
                            aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require_once("footer.php");
    ?>