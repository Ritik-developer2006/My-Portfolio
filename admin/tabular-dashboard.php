<?php
require_once("header.php");
?>

<style>
    .small_description {
        max-width: 150px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    /* .visitor-body, 
    .testimonial-feedback-body{
        max-height: 400px;
        overflow: auto;
    } */
    #myTable2,
    #myTable3{
        width: 100% !important;
    }
    #myTable2_filter, 
    #myTable3_filter{
        max-width: 100% !important;
        width: 100% !important;
    }
    #myTable2_filter label, 
    #myTable3_filter label{
        max-width: 100% !important;
        width: 100% !important;
    }
    .visitor-table,
    .new-customer-table{
        width: 100% !important;
    }
</style>

<!-- main content start -->
<div class="main-content">
    <div class="dashboard-breadcrumb mb-25 border shadow">
        <h2>Tabular Dashboard</h2>
        <div class="input-group dashboard-filter">
            <input type="text" class="form-control" name="basic" id="dashboardFilter" readonly>
            <label for="dashboardFilter" class="input-group-text"><i class="fa-regular fa-calendar"></i></label>
        </div>
    </div>
    <div class="row mb-25">
        <div class="col-lg-3 col-6 col-xs-12">
            <div class="dashboard-top-box rounded-bottom panel-bg border shadow">
                <div class="left">
                    <h3 id="totalMessages">0</h3>
                    <p class="text-primary">Toal Messages</p>
                    <a href="utility.php">See details</a>
                </div>
                <div class="right">
                    <span class="text-primary">&nbsp;</span>
                    <div class="part-icon rounded">
                        <span><i class="fa-solid fa-comments text-primary"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 col-xs-12">
            <div class="dashboard-top-box rounded-bottom panel-bg border shadow">
                <div class="left">
                    <h3 id="totalFeedbacks">0</h3>
                    <p class="text-info">Total Feedbacks</p>
                    <a href="about.php">See details</a>
                </div>
                <div class="right">
                    <span class="text-primary">&nbsp;</span>
                    <div class="part-icon rounded">
                        <span><i class="fa-solid fa-comment-dots text-info"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 col-xs-12">
            <div class="dashboard-top-box rounded-bottom panel-bg border shadow">
                <div class="left">
                    <h3 id="totalBlogs">0</h3>
                    <p class="text-warning">Total Blogs</p>
                    <a href="blogs.php">See details</a>
                </div>
                <div class="right">
                    <span class="text-primary">&nbsp;</span>
                    <div class="part-icon rounded">
                        <span><i class="fa-solid fa-share-nodes text-warning"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 col-xs-12">
            <div class="dashboard-top-box rounded-bottom panel-bg border shadow">
                <div class="left">
                    <h3 id="totalProjects">0</h3>
                    <p class="text-secondary">Total Projects</p>
                    <a href="project.php">See details</a>
                </div>
                <div class="right">
                    <span class="text-primary">&nbsp;</span>
                    <div class="part-icon rounded">
                        <span><i class="fa-solid fa-briefcase text-secondary"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xxl-12">
            <div class="panel border shadow">
                <div class="panel-header">
                    <h5 class="fw-bold">All Project Details</h5>
                    <div id="tableSearch"></div>
                </div>
                <div class="panel-body">
                    <table class="table table-dashed recent-order-table" id="myTable">
                        <thead>
                            <tr>
                                <th>Project ID</th>
                                <th>Project Name</th>
                                <th>Customer/Company</th>
                                <th>Project Date</th>
                                <th>Project Duration</th>
                                <th>Deliver Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="project_container">
                            <!-- data come through ajax -->
                        </tbody>
                    </table>
                    <div class="table-bottom-control"></div>
                </div>
            </div>
        </div>
        <div class="col-xxl-6 col-md-6">
            <div class="panel border shadow">
                <div class="panel-header">
                    <h5 class="fw-bold">Customer Messages</h5>
                </div>
                <div class="panel-body visitor-body">
                    <table class="table table-border visitor-table table-striped border" id="myTable2">
                        <thead>
                            <tr>
                                <th style="width: 220px !important;">Full Name/Email</th>
                                <th class="text-center">Message</th>
                                <th class="text-center">Attachment</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="message_container">
                            <!-- data come through ajax -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xxl-6 col-md-6">
            <div class="panel border shadow">
                <div class="panel-header">
                    <h5 class="fw-bold">Testimonial Feedbacks</h5>
                </div>
                <div class="panel-body testimonial-feedback-body">
                    <table class="table table-border new-customer-table table-striped border" id="myTable3">
                        <thead>
                            <tr>
                                <th>Testimonial</th>
                                <th class="text-center">Feedback</th>
                                <th class="text-center">Submitted At</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="testimonial_container">
                            <!-- data come through ajax -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- main content end -->
    <?php
    require_once("footer.php");
    ?>
    <script src="assets/js/dashboard.js"></script>
