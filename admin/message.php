<?php
require_once("header.php");
?>
<style>
    .panel .panel-body {
        min-height: 275px;
    }
    .msg-short{
        margin-top: -10px !important;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>

<!-- main content start -->
<div class="main-content">
    <div class="dashboard-breadcrumb mb-25 border shadow">
        <h2>My Profile</h2>
    </div>
    <div class="row">
        <div class="col-12">
            <!-- Basics Details -->
            <div class="panel mb-25 border shadow">
                <div class="panel-header d-flex justify-content-start">
                    <div>
                        <h5 class="fw-bold">All Messages</h5>
                    </div>
                </div>
                <div class="panel-body d-flex flex-columnp-3 p-3" id="message_container">
                    <ul class="list-group-flush w-100">
                        <li class="list-group-item border-bottom p-2" style="background: #d9f1e8;">
                            <div class="d-flex align-items-center gap-3">
                                <div>
                                    <input type="checkbox" class="form-check-input mt-0" name="read" id="read_done">
                                </div>
                                <div class="avatar col-2">
                                    <img src="assets/images/avatar.png" alt="image">
                                </div>
                                <div class="msg-txt flex-fill">
                                    <div class="d-flex justify-content-between">
                                        <div class="name fw-medium">Archer Cowie</div>
                                        <div class="time fw-medium"><small>2 hours ago</small></div>
                                    </div>
                                    <div class="msg-short"><small>There are many variations of passages of Lorem Ipsum. There are many variations of passages of Lorem Ipsum. There are many variations of passages of Lorem Ipsum. There are many variations of passages of Lorem Ipsum. There are many variations of passages of Lorem Ipsum. There are many variations of passages of Lorem Ipsum.</small></div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-bottom p-2">
                            <div class="d-flex align-items-center gap-3">
                                <div>
                                    <input type="checkbox" class="form-check-input mt-0" name="read" id="read_done">
                                </div>
                                <div class="avatar col-2">
                                    <img src="assets/images/avatar-2.png" alt="image">
                                </div>
                                <div class="msg-txt flex-fill">
                                    <div class="d-flex justify-content-between">
                                        <div class="name fw-medium">Archer Cowie</div>
                                        <div class="time fw-medium"><small>2 hours ago</small></div>
                                    </div>
                                    <div class="msg-short"><small>There are many variations of passages of Lorem Ipsum.</small></div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-bottom p-2">
                            <div class="d-flex align-items-center gap-3">
                                <div>
                                    <input type="checkbox" class="form-check-input mt-0" name="read" id="read_done">
                                </div>
                                <div class="avatar col-2">
                                    <img src="assets/images/avatar-3.png" alt="image">
                                </div>
                                <div class="msg-txt flex-fill">
                                    <div class="d-flex justify-content-between">
                                        <div class="name fw-medium">Archer Cowie</div>
                                        <div class="time fw-medium"><small>2 hours ago</small></div>
                                    </div>
                                    <div class="msg-short"><small>There are many variations of passages of Lorem Ipsum.</small></div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-bottom p-2">
                            <div class="d-flex align-items-center gap-3">
                                <div>
                                    <input type="checkbox" class="form-check-input mt-0" name="read" id="read_done">
                                </div>
                                <div class="avatar col-2">
                                    <img src="assets/images/avatar.png" alt="image">
                                </div>
                                <div class="msg-txt flex-fill">
                                    <div class="d-flex justify-content-between">
                                        <div class="name fw-medium">Archer Cowie</div>
                                        <div class="time fw-medium"><small>2 hours ago</small></div>
                                    </div>
                                    <div class="msg-short"><small>There are many variations of passages of Lorem Ipsum.</small></div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-bottom p-2">
                            <div class="d-flex align-items-center gap-3">
                                <div>
                                    <input type="checkbox" class="form-check-input mt-0" name="read" id="read_done">
                                </div>
                                <div class="avatar col-2">
                                    <img src="assets/images/avatar-2.png" alt="image">
                                </div>
                                <div class="msg-txt flex-fill">
                                    <div class="d-flex justify-content-between">
                                        <div class="name fw-medium">Archer Cowie</div>
                                        <div class="time fw-medium"><small>2 hours ago</small></div>
                                    </div>
                                    <div class="msg-short"><small>There are many variations of passages of Lorem Ipsum.</small></div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item border-bottom p-2">
                            <div class="d-flex align-items-center gap-3">
                                <div>
                                    <input type="checkbox" class="form-check-input mt-0" name="read" id="read_done">
                                </div>
                                <div class="avatar col-2">
                                    <img src="assets/images/avatar-3.png" alt="image">
                                </div>
                                <div class="msg-txt flex-fill">
                                    <div class="d-flex justify-content-between">
                                        <div class="name fw-medium">Archer Cowie</div>
                                        <div class="time fw-medium"><small>2 hours ago</small></div>
                                    </div>
                                    <div class="msg-short"><small>There are many variations of passages of Lorem Ipsum.</small></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <?php
    require_once("footer.php");
    ?>