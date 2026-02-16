<?php
session_start();

if (empty($_SESSION['isLogin'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en" data-menu="vertical" data-nav-size="nav-default">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Panel</title>
    <!-- Favicons-->
    <link rel="apple-touch-icon" sizes="180x180" href="../img/favicons/myLogo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicons/myLogo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicons/myLogo.png">
    <link rel="stylesheet" href="assets/css/OverlayScrollbars.min.css" />
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="assets/css/daterangepicker.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" id="primaryColor" href="assets/css/blue-color.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" id="rtlStyle" href="#">
    <style>
        .main-menu{
            border-right: 1px solid #dce1df !important;
        }
    </style>
</head>

<body class="body-padding body-p-top light-theme">
    <!-- preloader start -->
    <div class="preloader">
        <div class="preloader-block">
            <div class="preloader-icon">
                <span class="loading-dot loading-dot-1"></span>
                <span class="loading-dot loading-dot-2"></span>
                <span class="loading-dot loading-dot-3"></span>
            </div>
        </div>
    </div>
    <!-- preloader end -->

    <!-- header start -->
    <div class="header">
        <div class="row g-0 align-items-center">
            <div class="col-xxl-6 col-xl-5 col-4 d-flex align-items-center gap-20">
                <div class="main-logo d-lg-block d-none">
                    <div class="logo-big">
                        <a href="https://myprofile.tech" target="_blank" class="d-flex align-items-center">
                            <img src="../img/favicons/myLogo.png" alt="Logo" style="filter: brightness(0.5); width: 32px;">
                            <span class="fs-4 ms-1" style="font-weight: 500; color: #009e66">MyPortfolio</span>
                        </a>
                    </div>
                    <div class="logo-small">
                        <a href="https://myprofile.tech" target="_blank">
                            <img src="../img/favicons/myLogo.png" alt="Logo" style="filter: brightness(0.5); width: 35px;">
                        </a>
                    </div>
                </div>
                <div class="nav-close-btn">
                    <button id="navClose"><i class="fa-solid fa-bars-staggered"></i></button>
                </div>
                <a href="https://myprofile.tech" target="_blank" class="btn btn-sm btn-primary site-view-btn"><i class="fa-solid fa-globe me-1"></i> <span>View Website</span></a>
            </div>
            <div class="col-4 d-lg-none">
                <div class="mobile-logo">
                    <a href="https://myprofile.tech" target="_blank" class="d-flex align-items-center">
                        <img src="../img/favicons/myLogo.png" alt="Logo" style="filter: brightness(0.5); width: 23px;">
                        <span class="fs-6 ms-1" style="font-weight: 500; color: #009e66">MyPortfolio</span>
                    </a>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-7 col-lg-8 col-4">
                <div class="header-right-btns d-flex justify-content-end align-items-center">
                    <div class="header-collapse-group">
                        <div class="header-right-btns d-flex justify-content-end align-items-center p-0">
                            <form class="header-form">
                                <input type="search" name="search" placeholder="Search..." required>
                                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                            <div class="header-right-btns d-flex justify-content-end align-items-center p-0">
                                <div class="lang-select">
                                    <span>Language:</span>
                                    <select>
                                        <option value="">EN</option>
                                        <option value="">BN</option>
                                        <option value="">FR</option>
                                    </select>
                                </div>
                                <div class="header-btn-box">
                                    <button class="header-btn" id="messageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-regular fa-comment"></i>
                                        <span class="badge bg-danger">3</span>
                                    </button>
                                    <ul class="message-dropdown dropdown-menu" aria-labelledby="messageDropdown">
                                        <li>
                                            <a href="#" class="d-flex">
                                                <div class="avatar">
                                                    <img src="assets/images/avatar.png" alt="image">
                                                </div>
                                                <div class="msg-txt">
                                                    <span class="name">Archer Cowie</span>
                                                    <span class="msg-short">There are many variations of passages of Lorem Ipsum.</span>
                                                    <span class="time">2 Hours ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="d-flex">
                                                <div class="avatar">
                                                    <img src="assets/images/avatar-2.png" alt="image">
                                                </div>
                                                <div class="msg-txt">
                                                    <span class="name">Cody Rodway</span>
                                                    <span class="msg-short">There are many variations of passages of Lorem Ipsum.</span>
                                                    <span class="time">2 Hours ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="d-flex">
                                                <div class="avatar">
                                                    <img src="assets/images/avatar-3.png" alt="image">
                                                </div>
                                                <div class="msg-txt">
                                                    <span class="name">Zane Bain</span>
                                                    <span class="msg-short">There are many variations of passages of Lorem Ipsum.</span>
                                                    <span class="time">2 Hours ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="message.php" class="show-all-btn">Show all message</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="header-btn-box">
                                    <button class="header-btn" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-regular fa-bell"></i>
                                        <span class="badge bg-danger">9+</span>
                                    </button>
                                    <ul class="notification-dropdown dropdown-menu" aria-labelledby="notificationDropdown">
                                        <li>
                                            <a href="#" class="d-flex align-items-center">
                                                <div class="avatar">
                                                    <img src="assets/images/avatar.png" alt="image">
                                                </div>
                                                <div class="notification-txt">
                                                    <span class="notification-icon text-primary"><i class="fa-solid fa-thumbs-up"></i></span> <span class="fw-bold">Archer</span> Likes your post
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="d-flex align-items-center">
                                                <div class="avatar">
                                                    <img src="assets/images/avatar-2.png" alt="image">
                                                </div>
                                                <div class="notification-txt">
                                                    <span class="notification-icon text-success"><i class="fa-solid fa-comment-dots"></i></span> <span class="fw-bold">Cody</span> Commented on your post
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="d-flex align-items-center">
                                                <div class="avatar">
                                                    <img src="assets/images/avatar-3.png" alt="image">
                                                </div>
                                                <div class="notification-txt">
                                                    <span class="notification-icon"><i class="fa-solid fa-share"></i></span> <span class="fw-bold">Zane</span> Shared your post
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="d-flex align-items-center">
                                                <div class="avatar">
                                                    <img src="assets/images/avatar-4.png" alt="image">
                                                </div>
                                                <div class="notification-txt">
                                                    <span class="notification-icon text-primary"><i class="fa-solid fa-thumbs-up"></i></span> <span class="fw-bold">Christopher</span> Likes your post
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="d-flex align-items-center">
                                                <div class="avatar">
                                                    <img src="assets/images/avatar-5.png" alt="image">
                                                </div>
                                                <div class="notification-txt">
                                                    <span class="notification-icon text-success"><i class="fa-solid fa-comment-dots"></i></span> <span class="fw-bold">Charlie</span> Commented on your post
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="d-flex align-items-center">
                                                <div class="avatar">
                                                    <img src="assets/images/avatar-6.png" alt="image">
                                                </div>
                                                <div class="notification-txt">
                                                    <span class="notification-icon"><i class="fa-solid fa-share"></i></span> <span class="fw-bold">Jayden</span> Shared your post
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="message.php" class="show-all-btn">Show all message</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="header-btn-box">
                                    <div class="dropdown">
                                        <button class="header-btn" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                            <i class="fa-solid fa-calculator"></i>
                                        </button>
                                        <ul class="dropdown-menu calculator-dropdown">
                                            <div class="dgb-calc-box">
                                                <div>
                                                    <input type="text" id="dgbCalcResult" placeholder="0" autocomplete="off" readonly>
                                                </div>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td class="bg-danger">C</td>
                                                            <td class="bg-secondary">CE</td>
                                                            <td class="dgb-calc-oprator bg-primary">/</td>
                                                            <td class="dgb-calc-oprator bg-primary">*</td>
                                                        </tr>
                                                        <tr>
                                                            <td>7</td>
                                                            <td>8</td>
                                                            <td>9</td>
                                                            <td class="dgb-calc-oprator bg-primary">-</td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>5</td>
                                                            <td>6</td>
                                                            <td class="dgb-calc-oprator bg-primary">+</td>
                                                        </tr>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>2</td>
                                                            <td>3</td>
                                                            <td rowspan="2" class="dgb-calc-sum bg-primary">=</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">0</td>
                                                            <td>.</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                                <button class="header-btn fullscreen-btn" id="btnFullscreen"><i class="fa-solid fa-expand"></i></button>
                                <button class="header-btn fullscreen-btn" id="darkTheme"> <i id="themeIcon" class="fa-solid fa-moon"></i></button>
                                <button class="header-btn fullscreen-btn d-none" id="lightTheme"> <i id="themeIcon" class="fa-solid fa-sun"></i></button>
                            </div>
                        </div>
                    </div>
                    <button class="header-btn header-collapse-group-btn d-lg-none"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                    <!-- <button class="header-btn theme-settings-btn d-lg-none"><i class="fa-solid fa-gear"></i></button> -->
                    <div class="header-btn-box profile-btn-box">
                        <button class="profile-btn" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="assets/images/admin.png" alt="image">
                        </button>
                        <ul class="dropdown-menu profile-dropdown-menu">
                            <li>
                                <div class="dropdown-txt text-center">
                                    <p class="mb-0">RITIK KUMAR</p>
                                    <span class="d-block">Web Developer</span>
                                    <div class="d-flex justify-content-center">
                                        <div class="form-check pt-3">
                                            <input class="form-check-input" type="checkbox" id="seeProfileAsSidebar">
                                            <label class="form-check-label ps-1" for="seeProfileAsSidebar">See as sidebar</label>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li><a class="dropdown-item" href="profile.php"><span class="dropdown-icon"><i class="fa-regular fa-circle-user"></i></span> Profile</a></li>
                            <li><a class="dropdown-item" href="message.php"><span class="dropdown-icon"><i class="fa-solid fa-envelope"></i></span> Message</a></li>
                            <li><a class="dropdown-item" href="task.php"><span class="dropdown-icon"><i class="fa-regular fa-calendar-check"></i></span> Taskboard</a></li>
                            <li><a class="dropdown-item" href="#"><span class="dropdown-icon"><i class="fa-regular fa-circle-question"></i></span> Help</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="edit-profile.html"><span class="dropdown-icon"><i class="fa-solid fa-gear"></i></span> Settings</a></li>
                            <li><a class="dropdown-item logOut" href="#"><span class="dropdown-icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></span> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header end -->

    <!-- profile right sidebar start -->
    <div class="profile-right-sidebar">
        <button class="right-bar-close pt-0"><i class="fa-solid fa-chevron-right fs-5"></i></button>
        <div class="top-panel">
            <div class="profile-content scrollable">
                <ul>
                    <li>
                        <div class="dropdown-txt text-center">
                            <p class="mb-0 text-uppercase">RITIK KUMAR</p>
                            <span class="d-block">Web Developer</span>
                            <div class="d-flex justify-content-center">
                                <div class="form-check pt-3">
                                    <input class="form-check-input" type="checkbox" id="seeProfileAsDropdown">
                                    <label class="form-check-label" for="seeProfileAsDropdown">See as dropdown</label>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="profile.php"><span class="dropdown-icon"><i class="fa-regular fa-circle-user"></i></span> Profile</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="message.php"><span class="dropdown-icon"><i class="fa-solid fa-envelope"></i></span> Message</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="task.php"><span class="dropdown-icon"><i class="fa-regular fa-calendar-check"></i></span> Taskboard</a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#"><span class="dropdown-icon"><i class="fa-regular fa-circle-question"></i></span> Help</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="bottom-panel">
            <div class="button-group">
                <a href="edit-profile.html"><i class="fa-solid fa-gear"></i><span>Settings</span></a>
                <a class="dropdown-item logOut" href="#"><i class="fa-solid fa-arrow-right-from-bracket"></i><span>Logout</span></a>
            </div>
        </div>
    </div>
    <!-- profile right sidebar end -->

    <!-- <div class="right-sidebar-btn d-lg-block d-none">
        <button class="header-btn theme-settings-btn btn-primary"><i class="fa-solid fa-gear"></i></button>
    </div> -->
    <!-- right sidebar start -->
    <!-- <div class="right-sidebar">
        <button class="right-bar-close pt-0"><i class="fa-solid fa-chevron-right fs-5"></i></button>
        <div class="sidebar-title">
            <h3>Layout Settings</h3>
        </div>
        <div class="sidebar-body scrollable">
            <div class="right-sidebar-group">
                <span class="sidebar-subtitle">Nav Position <span><i class="fa-light fa-angle-up"></i></span></span>
                <div class="settings-row">
                    <div class="settings-col">
                        <div class="dashboard-icon d-flex gap-1 border rounded active" id="verticalMenu">
                            <div class="pb-2 px-1 pt-1 bg-menu">
                                <div class="px-2 py-1 rounded-pill bg-nav mb-2"></div>
                                <div class="border border-primary mb-1">
                                    <div class="px-2 pt-1 bg-nav mb-1"></div>
                                    <div class="px-2 pt-1 bg-nav mb-1"></div>
                                </div>
                                <div class="border border-primary">
                                    <div class="px-2 pt-1 bg-nav mb-1"></div>
                                    <div class="px-2 pt-1 bg-nav mb-1"></div>
                                </div>
                            </div>
                            <div class="w-100 d-flex flex-column justify-content-between">
                                <div class="px-2 py-1 bg-menu"></div>
                                <div class="px-2 py-1 bg-menu"></div>
                            </div>
                            <span class="part-txt">Vertical</span>
                        </div>
                    </div>
                    <div class="settings-col d-lg-block d-none">
                        <div class="dashboard-icon d-flex h-100 gap-1 border rounded" id="horizontalMenu">
                            <div class="w-100 d-flex flex-column justify-content-between">
                                <div>
                                    <div class="p-1 bg-menu border-bottom">
                                        <div class="rounded-circle p-1 bg-nav w-max-content"></div>
                                    </div>
                                    <div class="p-1 bg-menu d-flex gap-1 mb-1">
                                        <div class="w-max-content px-2 pt-1 rounded bg-nav"></div>
                                        <div class="w-max-content px-2 pt-1 rounded bg-nav"></div>
                                        <div class="w-max-content px-2 pt-1 rounded bg-nav"></div>
                                        <div class="w-max-content px-2 pt-1 rounded bg-nav"></div>
                                    </div>
                                </div>
                                <div class="px-2 py-1 bg-menu"></div>
                            </div>
                            <span class="part-txt">Horizontal</span>
                        </div>
                    </div>
                    <div class="settings-col">
                        <div class="dashboard-icon d-flex gap-1 border rounded" id="twoColumnMenu">
                            <div class="p-1 bg-menu"></div>
                            <div class="pb-4 px-1 pt-1 bg-menu">
                                <div class="px-2 py-1 rounded-pill bg-nav mb-2"></div>
                                <div class="px-2 pt-1 bg-nav mb-1"></div>
                                <div class="px-2 pt-1 bg-nav mb-1"></div>
                                <div class="px-2 pt-1 bg-nav mb-1"></div>
                            </div>
                            <div class="w-100 d-flex flex-column justify-content-between">
                                <div class="px-2 py-1 bg-menu"></div>
                                <div class="px-2 py-1 bg-menu"></div>
                            </div>
                            <span class="part-txt">Two column</span>
                        </div>
                    </div>
                    <div class="settings-col">
                        <div class="dashboard-icon d-flex gap-1 border rounded" id="flushMenu">
                            <div class="pb-4 px-1 pt-1 bg-menu">
                                <div class="px-2 py-1 rounded-pill bg-nav mb-2"></div>
                                <div class="px-2 pt-1 bg-nav mb-1"></div>
                                <div class="px-2 pt-1 bg-nav mb-1"></div>
                                <div class="px-2 pt-1 bg-nav mb-1"></div>
                            </div>
                            <div class="w-100 d-flex flex-column justify-content-between">
                                <div class="px-2 py-1 bg-menu"></div>
                                <div class="px-2 py-1 bg-menu"></div>
                            </div>
                            <span class="part-txt">Flush</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-sidebar-group">
                <span class="sidebar-subtitle">Theme Direction <span><i class="fa-light fa-angle-up"></i></span></span>
                <div>
                    <div class="btn-group d-flex">
                        <button class="btn btn-primary active w-50" id="dirLtr">LTR</button>
                        <button class="btn btn-primary w-50" id="dirRtl">RTL</button>
                    </div>
                </div>
            </div>
            <div class="right-sidebar-group">
                <span class="sidebar-subtitle">Primary Color <span><i class="fa-light fa-angle-up"></i></span></span>
                <div class="settings-row-2">
                    <button class="color-palette color-palette-1 active" data-color="blue-color">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="color-palette color-palette-2" data-color="orange-color">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="color-palette color-palette-3" data-color="pink-color">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="color-palette color-palette-4" data-color="eagle_green-color">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="color-palette color-palette-5" data-color="purple-color">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="color-palette color-palette-6" data-color="gold-color">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="color-palette color-palette-7" data-color="green-color">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="color-palette color-palette-8" data-color="deep_pink-color">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="color-palette color-palette-9" data-color="tea_green-color">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="color-palette color-palette-10" data-color="yellow_green-color">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
            <div class="right-sidebar-group">
                <span class="sidebar-subtitle">Theme Color <span><i class="fa-light fa-angle-up"></i></span></span>
                <div class="settings-row">
                    <div class="settings-col">
                        <div class="dashboard-icon d-flex bg-blue-theme gap-1 border rounded" id="blueTheme">
                            <div class="pb-4 px-1 pt-1 bg-menu">
                                <div class="px-2 py-1 rounded-pill bg-nav mb-2"></div>
                                <div class="px-2 pt-1 bg-nav mb-1"></div>
                                <div class="px-2 pt-1 bg-nav mb-1"></div>
                                <div class="px-2 pt-1 bg-nav mb-1"></div>
                            </div>
                            <div class="w-100 d-flex flex-column justify-content-between">
                                <div class="px-2 py-1 bg-menu"></div>
                                <div class="px-2 py-1 bg-menu"></div>
                            </div>
                            <span class="part-txt">Blue Theme</span>
                        </div>
                    </div>
                    <div class="settings-col">
                        <div class="dashboard-icon d-flex gap-1 border rounded bg-body-secondary light-theme-btn active" id="lightTheme">
                            <div class="pb-4 px-1 pt-1 bg-dark-subtle">
                                <div class="px-2 py-1 rounded-pill bg-primary mb-2"></div>
                                <div class="px-2 pt-1 bg-primary mb-1"></div>
                                <div class="px-2 pt-1 bg-primary mb-1"></div>
                                <div class="px-2 pt-1 bg-primary mb-1"></div>
                            </div>
                            <div class="w-100 d-flex flex-column justify-content-between">
                                <div class="px-2 py-1 bg-dark-subtle"></div>
                                <div class="px-2 py-1 bg-dark-subtle"></div>
                            </div>
                            <span class="part-txt">Light Theme</span>
                        </div>
                    </div>
                    <div class="settings-col">
                        <div class="dashboard-icon d-flex gap-1 border rounded bg-dark" id="darkTheme">
                            <div class="pb-4 px-1 pt-1 bg-menu">
                                <div class="px-2 py-1 rounded-pill bg-nav mb-2"></div>
                                <div class="px-2 pt-1 bg-nav mb-1"></div>
                                <div class="px-2 pt-1 bg-nav mb-1"></div>
                                <div class="px-2 pt-1 bg-nav mb-1"></div>
                            </div>
                            <div class="w-100 d-flex flex-column justify-content-between">
                                <div class="px-2 py-1 bg-menu"></div>
                                <div class="px-2 py-1 bg-menu"></div>
                            </div>
                            <span class="part-txt">Dark Theme</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-sidebar-group" id="navBarSizeGroup">
                <span class="sidebar-subtitle">Navbar Size <span><i class="fa-light fa-angle-up"></i></span></span>
                <div class="settings-row">
                    <div class="settings-col">
                        <div class="dashboard-icon d-flex gap-1 border rounded active" id="sidebarDefault">
                            <div class="pb-4 px-1 pt-1 bg-menu">
                                <div class="px-2 py-1 rounded-pill bg-nav mb-2"></div>
                                <div class="px-2 pt-1 bg-nav mb-1"></div>
                                <div class="px-2 pt-1 bg-nav mb-1"></div>
                                <div class="px-2 pt-1 bg-nav mb-1"></div>
                            </div>
                            <div class="w-100 d-flex flex-column justify-content-between">
                                <div class="px-2 py-1 bg-menu"></div>
                                <div class="px-2 py-1 bg-menu"></div>
                            </div>
                            <span class="part-txt">Default</span>
                        </div>
                    </div>
                    <div class="settings-col">
                        <div class="dashboard-icon d-flex gap-1 border rounded" id="sidebarSmall">
                            <div class="pb-4 pt-1 bg-menu">
                                <div class="p-1 rounded-pill bg-nav mb-2"></div>
                                <div class="ps-1 pt-1 bg-nav mb-1"></div>
                                <div class="ps-1 pt-1 bg-nav mb-1"></div>
                                <div class="ps-1 pt-1 bg-nav mb-1"></div>
                            </div>
                            <div class="w-100 d-flex flex-column justify-content-between">
                                <div class="px-2 py-1 bg-menu"></div>
                                <div class="px-2 py-1 bg-menu"></div>
                            </div>
                            <span class="part-txt">Small icon</span>
                        </div>
                    </div>
                    <div class="settings-col">
                        <div class="dashboard-icon d-flex gap-1 border rounded" id="sidebarHover">
                            <div class="pb-4 pt-1 bg-menu">
                                <div class="p-1 rounded-pill bg-nav mb-2"></div>
                                <div class="ps-1 pt-1 bg-nav mb-1"></div>
                                <div class="ps-1 pt-1 bg-nav mb-1"></div>
                                <div class="ps-1 pt-1 bg-nav mb-1"></div>
                            </div>
                            <div class="w-100 d-flex flex-column justify-content-between">
                                <div class="px-2 py-1 bg-menu"></div>
                                <div class="px-2 py-1 bg-menu"></div>
                            </div>
                            <span class="part-txt">Expand on hover</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-sidebar-group">
                <span class="sidebar-subtitle">Sidebar Background <span><i class="fa-light fa-angle-up"></i></span></span>
                <div>
                    <div class="sidebar-bg-btn-box">
                        <button id="noBackground">
                            <span><i class="fa-light fa-xmark"></i></span>
                        </button>
                        <button class="sidebar-bg-btn" data-img="assets/images/nav-bg-1.jpg"></button>
                        <button class="sidebar-bg-btn" data-img="assets/images/nav-bg-2.jpg"></button>
                        <button class="sidebar-bg-btn" data-img="assets/images/nav-bg-3.jpg"></button>
                        <button class="sidebar-bg-btn" data-img="assets/images/nav-bg-4.jpg"></button>
                    </div>
                </div>
            </div>
            <div class="right-sidebar-group">
                <span class="sidebar-subtitle">Main Background <span><i class="fa-light fa-angle-up"></i></span></span>
                <div>
                    <div class="main-content-bg-btn-box">
                        <button id="noBackground2">
                            <span><i class="fa-light fa-xmark"></i></span>
                        </button>
                        <button class="main-content-bg-btn" data-img="assets/images/main-bg-1.jpg"></button>
                        <button class="main-content-bg-btn" data-img="assets/images/main-bg-2.jpg"></button>
                        <button class="main-content-bg-btn" data-img="assets/images/main-bg-3.jpg"></button>
                        <button class="main-content-bg-btn" data-img="assets/images/main-bg-4.jpg"></button>
                    </div>
                </div>
            </div>
            <div class="right-sidebar-group">
                <span class="sidebar-subtitle">Main preloader <span><i class="fa-light fa-angle-up"></i></span></span>
                <div class="settings-row">
                    <div class="settings-col">
                        <div class="dashboard-icon d-flex gap-1 border rounded" id="enableLoader">
                            <div class="pb-4 px-1 pt-1 bg-menu">
                                <div class="px-2 py-1 rounded-pill bg-nav mb-2"></div>
                                <div class="px-2 pt-1 bg-nav mb-1"></div>
                                <div class="px-2 pt-1 bg-nav mb-1"></div>
                                <div class="px-2 pt-1 bg-nav mb-1"></div>
                            </div>
                            <div class="w-100 d-flex flex-column justify-content-between">
                                <div class="px-2 py-1 bg-menu"></div>
                                <div class="px-2 py-1 bg-menu"></div>
                            </div>
                            <div class="preloader-small">
                                <div class="loader">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                            <span class="part-txt">Enable</span>
                        </div>
                    </div>
                    <div class="settings-col">
                        <div class="dashboard-icon d-flex gap-1 border rounded active" id="disableLoader">
                            <div class="pb-4 px-1 pt-1 bg-menu">
                                <div class="px-2 py-1 rounded-pill bg-nav mb-2"></div>
                                <div class="px-2 pt-1 bg-nav mb-1"></div>
                                <div class="px-2 pt-1 bg-nav mb-1"></div>
                                <div class="px-2 pt-1 bg-nav mb-1"></div>
                            </div>
                            <div class="w-100 d-flex flex-column justify-content-between">
                                <div class="px-2 py-1 bg-menu"></div>
                                <div class="px-2 py-1 bg-menu"></div>
                            </div>
                            <span class="part-txt">Disable</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- right sidebar end -->

    <!-- main sidebar start -->
    <div class="main-sidebar">
        <div class="main-menu">
            <ul class="sidebar-menu scrollable">
                <li class="sidebar-item open">
                    <a role="button" class="sidebar-link-group-title has-sub btn-primary">Dashboard</a>
                    <ul class="sidebar-link-group">
                        <li class="sidebar-dropdown-item">
                            <a href="graphical-dashboard.php" class="sidebar-link"><span class="nav-icon"><i class="fa-solid fa-chart-area"></i></span> <span class="sidebar-txt">Graphical Dashboard</span></a>
                        </li>
                        <li class="sidebar-dropdown-item">
                            <a href="tabular-dashboard.php" class="sidebar-link"><span class="nav-icon"><i class="fa-solid fa-table"></i></span> <span class="sidebar-txt">Tabular Dashboard</span></a>
                        </li>
                    </ul>
                </li>

                <!-- <li class="sidebar-item">
                    <a role="button" class="sidebar-link-group-title has-sub">Apps</a>
                    <ul class="sidebar-link-group">
                        <li class="sidebar-dropdown-item">
                            <a role="button" class="sidebar-link has-sub" data-dropdown="crmDropdown"><span class="nav-icon"><i class="fa-light fa-user-headset"></i></span> <span class="sidebar-txt">CRM</span></a>
                            <ul class="sidebar-dropdown-menu" id="crmDropdown">
                                <li class="sidebar-dropdown-item"><a href="audience.html" class="sidebar-link">Target Audience</a></li>
                                <li class="sidebar-dropdown-item"><a href="company.html" class="sidebar-link">Company</a></li>
                                <li class="sidebar-dropdown-item"><a href="task.html" class="sidebar-link">Task</a></li>
                                <li class="sidebar-dropdown-item"><a href="leads.html" class="sidebar-link">Leads</a></li>
                                <li class="sidebar-dropdown-item"><a href="customer.html" class="sidebar-link">Customer</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-dropdown-item">
                            <a role="button" class="sidebar-link has-sub" data-dropdown="hrmDropdown"><span class="nav-icon"><i class="fa-light fa-user-tie"></i></span> <span class="sidebar-txt">HRM</span></a>
                            <ul class="sidebar-dropdown-menu" id="hrmDropdown">
                                <li class="sidebar-dropdown-item"><a href="add-employee.html" class="sidebar-link">Add Employee</a></li>
                                <li class="sidebar-dropdown-item"><a href="all-employee.html" class="sidebar-link">All Employee</a></li>
                                <li class="sidebar-dropdown-item"><a href="attendance.html" class="sidebar-link">Attendance</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-dropdown-item">
                            <a role="button" class="sidebar-link has-sub" data-dropdown="ecommerceDropdown"><span class="nav-icon"><i class="fa-light fa-cart-shopping-fast"></i></span> <span class="sidebar-txt">eCommerce</span></a>
                            <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                                <li class="sidebar-dropdown-item"><a href="all-customer.html" class="sidebar-link">All Customer</a></li>
                                <li class="sidebar-dropdown-item"><a href="add-product.html" class="sidebar-link">Add Product</a></li>
                                <li class="sidebar-dropdown-item"><a href="all-product.html" class="sidebar-link">All Product</a></li>
                                <li class="sidebar-dropdown-item"><a href="category.html" class="sidebar-link">Category</a></li>
                                <li class="sidebar-dropdown-item"><a href="order.html" class="sidebar-link">Order</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-dropdown-item">
                            <a href="calendar.html" class="sidebar-link"><span class="nav-icon"><i class="fa-light fa-calendar"></i></span> <span class="sidebar-txt">Calendar</span></a>
                        </li>
                        <li class="sidebar-dropdown-item">
                            <a href="chat.html" class="sidebar-link"><span class="nav-icon"><i class="fa-light fa-messages"></i></span> <span class="sidebar-txt">Chat</span></a>
                        </li>
                        <li class="sidebar-dropdown-item">
                            <a href="email.html" class="sidebar-link"><span class="nav-icon"><i class="fa-light fa-envelope"></i></span> <span class="sidebar-txt">Email</span></a>
                        </li>
                        <li class="sidebar-dropdown-item">
                            <a role="button" class="sidebar-link has-sub" data-dropdown="ecommerceDropdown"><span class="nav-icon"><i class="fa-light fa-envelope-open-text"></i></span> <span class="sidebar-txt">Email Templates</span></a>
                            <ul class="sidebar-dropdown-menu" id="ecommerceDropdown">
                                <li class="sidebar-dropdown-item"><a href="card-declined.html" class="sidebar-link">Card Declined</a></li>
                                <li class="sidebar-dropdown-item"><a href="promotion.html" class="sidebar-link">Promotional</a></li>
                                <li class="sidebar-dropdown-item"><a href="subscription-confirm.html" class="sidebar-link">Subscription Confirm</a></li>
                                <li class="sidebar-dropdown-item"><a href="welcome-mail.html" class="sidebar-link">Welcome</a></li>
                                <li class="sidebar-dropdown-item"><a href="reset-password-mail.html" class="sidebar-link">Reset Password</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-dropdown-item">
                            <a href="invoices.html" class="sidebar-link"><span class="nav-icon"><i class="fa-light fa-file-invoice"></i></span> <span class="sidebar-txt">Invoices</span></a>
                        </li>
                        <li class="sidebar-dropdown-item">
                            <a href="contact.html" class="sidebar-link"><span class="nav-icon"><i class="fa-light fa-user-plus"></i></span> <span class="sidebar-txt">Contacts</span></a>
                        </li>
                    </ul>
                </li> -->

                <li class="sidebar-item">
                    <a role="button" class="sidebar-link-group-title has-sub btn-primary">Pages</a>
                    <ul class="sidebar-link-group">
                        <li class="sidebar-dropdown-item">
                            <a href="frontpage.php" class="sidebar-link"><span class="nav-icon"><i class="fa-solid fa-layer-group"></i></span> <span class="sidebar-txt">Front Page</span></a>
                        </li>
                        <li class="sidebar-dropdown-item">
                            <a href="resume.php" class="sidebar-link"><span class="nav-icon"><i class="fa-regular fa-folder"></i></span> <span class="sidebar-txt">Resume</span></a>
                        </li>
                        <li class="sidebar-dropdown-item">
                            <a href="about.php" class="sidebar-link"><span class="nav-icon"><i class="fa-regular fa-address-card"></i></span> <span class="sidebar-txt">About</span></a>
                        </li>
                        <li class="sidebar-dropdown-item">
                            <a href="project.php" class="sidebar-link"><span class="nav-icon"><i class="fa-brands fa-stack-exchange"></i></span> <span class="sidebar-txt">Project</span></a>
                        </li>
                        <li class="sidebar-dropdown-item">
                            <a href="blogs.php" class="sidebar-link"><span class="nav-icon"><i class="fa-solid fa-blog"></i></span> <span class="sidebar-txt">Blog</span></a>
                        </li>
                        <li class="sidebar-dropdown-item">
                            <a href="contact.php" class="sidebar-link"><span class="nav-icon"><i class="fa-solid fa-circle-user"></i></span> <span class="sidebar-txt">Contact Us</span></a>
                        </li>
                        <li class="sidebar-dropdown-item">
                            <a href="utility.php" class="sidebar-link"><span class="nav-icon"><i class="fa-solid fa-layer-group"></i></span> <span class="sidebar-txt">Utility</span></a>
                        </li>
                    </ul>
                </li>

                <!-- <li class="sidebar-item">
                    <a role="button" class="sidebar-link-group-title has-sub">Components</a>
                    <ul class="sidebar-link-group">
                        <li class="sidebar-dropdown-item">
                            <a href="form.php" class="sidebar-link"><span class="nav-icon"><i class="fa-light fa-memo-pad"></i></span> <span class="sidebar-txt">Forms</span></a>
                        </li>
                        <li class="sidebar-dropdown-item">
                            <a href="resume.php" class="sidebar-link"><span class="nav-icon"><i class="fa-regular fa-folder"></i></span> <span class="sidebar-txt">Resume</span></a>
                        </li>
                        <li class="sidebar-dropdown-item">
                            <a href="blogs.php" class="sidebar-link"><span class="nav-icon"><i class="fa-solid fa-blog"></i></span> <span class="sidebar-txt">Blogs</span></a>
                        </li>
                        <li class="sidebar-dropdown-item">
                            <a href="icon.html" class="sidebar-link"><span class="nav-icon"><i class="fa-light fa-compass-drafting"></i></span> <span class="sidebar-txt">Skills</span></a>
                        </li>
                        <li class="sidebar-dropdown-item">
                            <a href="map.html" class="sidebar-link"><span class="nav-icon"><i class="fa-light fa-location-dot"></i></span> <span class="sidebar-txt">Maps</span></a>
                        </li>
                        <li class="sidebar-dropdown-item">
                            <a href="file-manager.html" class="sidebar-link"><span class="nav-icon"><i class="fa-light fa-folder-open"></i></span> <span class="sidebar-txt">File Manager</span></a>
                        </li>
                    </ul>
                </li> -->
                <!-- <li class="help-center">
                    <h3>Help Center</h3>
                    <p>We're an award-winning, forward thinking</p>
                    <a href="#" class="btn btn-sm btn-light">Go to Help Center</a>
                </li> -->
            </ul>
        </div>
    </div>
    <!-- main sidebar end -->