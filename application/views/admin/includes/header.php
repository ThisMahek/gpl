<!doctype html>
<html lang="en">
<head>

        <meta charset="utf-8" />
        <title>Welcomt to Sports Teams and Tournament Admin panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="#">
        <!-- plugin css -->
        <link href="<?= base_url()?>assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

        <!-- preloader css -->
        <link rel="stylesheet" href="<?= base_url()?>assets/css/preloader.min.css" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="<?= base_url()?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?= base_url()?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?= base_url()?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
          <!-- DataTables -->
        <link href="<?= base_url()?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url()?>assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <!-- choices css -->
        <link href="<?= base_url()?>assets/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <script src="<?= base_url()?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url()?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- alert message flashdata cdn -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- alert message flashdata cdn -->
    </head>
    <style>
    .note-table .btn-group{
        display:none;
    }
    .select2-container--default .select2-selection--multiple {
      border: 1px solid lightgray;
    }
    .note-view{
        display:none;
    }
    .note-btn-group  .dropdown-toggle{
         display:none;
    }
    div.dataTables_wrapper div.dataTables_length label {
       text-transform: capitalize;
    }
    .select2-container--default.select2-container--focus .select2-selection--multiple {
            border: solid lightgray 1px;
            outline: 0;
        }
        .select2-container {
            display: block;
            margin: 0;
            width: 100%!important
        }
     .btn{
         text-transform: capitalize;
     }
     .card-header h4{
         text-transform: capitalize;
     }
      .btn-primary {
            color: #fff;
            background-color: #C22424!important;
            border-color: #fd625e!important;
            box-shadow: 0 2px 6px 0 rgb(253 98 94 / 50%)!important;
        }
        .wd-200{
            width:200px;
        }
        .page-item.active .page-link {
                color: #fff;
                background-color: #C22424;
                border-color: #C22424;
            }
        .table img{
            width:100px;
        }
        .btn-success{
            background:#1DB53B!important;
        }
        .navbar-header{
            background: #C22424;
            box-shadow: 0 .25rem .75rem rgba(18,38,63,.08)!important;
        }
        .navbar-header .icon-lg{
          color:white;
        }
        .vertical-menu{
           box-shadow: 0 .25rem .75rem rgba(18,38,63,.08)!important;  
        }
        body {
         background-color: #0000000d;
        }
        .card{
                box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
        }
        .mm-active .active {
            color: #C22424!important;
        }
        .mm-active>a {
            color: #C22424!important;
        }
        .pace .pace-activity {
          background: #C22424;
        }
        .pace .pace-progress {
                background: -webkit-gradient(linear,left top,right top,color-stop(20%,#5156be),color-stop(40%,#2ab57d),color-stop(60%,#4ba6ef),color-stop(80%,#ffbf53),to(#fd625e));
                background: linear-gradient(to right,#be5179 20%,#2ab57d 40%,#4ba6ef 60%,#ffbf53 80%,#fd625e 100%)
        }
        #sidebar-menu ul li a:hover{
            color: #C22424!important;
        }
        #sidebar-menu ul li a:hover i{
            color: #C22424;
        }
        .desktop_responsive{
            display:block;
            overflow-x:scroll;
        }
        /* width */
        .desktop_responsive::-webkit-scrollbar {
          width: 10px;
          height:5px;
        }
        
        /* Track */
        .desktop_responsive::-webkit-scrollbar-track {
          background: #f1f1f1;
        }
        
        /* Handle */
        .desktop_responsive::-webkit-scrollbar-thumb {
          background: #888;
        }
        
        /* Handle on hover */
       .desktop_responsive::-webkit-scrollbar-thumb:hover {
          background: #555;
        }
       .mm-active .active svg{
            color: #C22424!important;
            fill: #e9393452!important;
        }
       #sidebar-menu ul li a:hover svg{
            color: #C22424;
            fill: #e9393452;
        }
      /*#sidebar-menu ul li a svg{*/
      /*     color: #C22424;*/
      /*     fill: #e9393452;*/
      /*  }*/
     .mm-active>a i{
            color: #C22424!important;
            fill: #e9393452;
        }
     .mm-active .active i{
            color: #C22424!important;
            fill: #e9393452;
        }
        .mm-active>a svg{
            color: #C22424!important;
            fill: #e9393452!important;
        }
        .text-color{
            color:#495057;
        }
       
        .mm-active>i{
            color: #C22424!important;
        }
        .sidebar-enable .header-item i{
            color:white;
        }
          .hidden-field{
                visibility:hidden;
                height:0px;
                width:0px;
            }
            .image-section {
            border: 2px dotted lightgray;
            padding: 10px 0px;
        }
        .dashed-border{
          padding: 10px;
            border: 1px dotted lightgray;
            width: 100%;
            display: block;
            text-align: center;
        }
     .dashed-border i{
         font-size:20px;
     }
     .float-right{
         float:right;
     }
     .note-insert{
         display:none;
     }
     #vertical-menu-btn i{
         color:white;
     }
     .table td .user-img{
         height: 50px;
        width: 50px;
        border-radius: 50%;
        margin-right: 5px;
     }
     .table td .game-img{
         height: 50px;
        width:auto;
        margin-right: 5px;
     }
     .name-first-letter{
         font-weight: 600;
            height: 40px;
            width: 40px;
            color: white;
            border-radius: 50%;
            text-align: center;
            line-height: 36px;
            margin-left: auto;
            margin-right: auto;
        }
        
        
   
     /*for desktop view*/
    @media only screen and (min-width: 992px){
         #vertical-menu-btn{
             display:none;
         }
     }
     /*for desktop view*/
     /*tablet view*/
       @media (min-width: 576px) and (max-device-width : 1024px){
           .table-responsive{
             display:block!important;
             overflow-x:scroll!important;
         } 
       }
       /*tablet view css*/
     /*mobile view*/
     @media only screen and (max-width: 600px) {
         .table-responsive{
             display:block!important;
             overflow-x:scroll!important;
         }
        }
     /*mobile view*/
    </style>
    <body>
  <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="<?= base_url()?>Admin/index" class="logo logo-dark">
                                <span class="logo-sm">
                                    <!--<img src="<?= base_url()?>assets/images/logo-sm.svg" alt="" height="24">-->
                                    ST
                                </span>
                                <span class="logo-lg">
                                    <!--<img src="<?= base_url()?>assets/images/logo-sm.svg" alt="" height="24">-->
                                    <span class="logo-txt">Sports Tournament</span>
                                </span>
                            </a>

                            <a href="<?= base_url()?>Admin/index" class="logo logo-light">
                                <span class="logo-sm">
                                    <!--<img src="<?= base_url()?>assets/images/logo-sm.svg" alt="" height="24">-->
                                </span>
                                <span class="logo-lg">
                                    <!--<img src="<?= base_url()?>assets/images/logo-sm.svg" alt="" height="24"> -->
                                    <span class="logo-txt">Sports Tournament</span>
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <!-- App Search-->
                        <!--<form class="app-search d-none d-lg-block">-->
                        <!--    <div class="position-relative">-->
                        <!--        <input type="text" class="form-control" placeholder="Search...">-->
                        <!--        <button class="btn btn-primary" type="button"><i class="bx bx-search-alt align-middle"></i></button>-->
                        <!--    </div>-->
                        <!--</form>-->
                    </div>

                    <div class="d-flex">

                        <!--<div class="dropdown d-inline-block d-lg-none ms-2">-->
                        <!--    <button type="button" class="btn header-item" id="page-header-search-dropdown"-->
                        <!--    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                        <!--        <i data-feather="search" class="icon-lg"></i>-->
                        <!--    </button>-->
                        <!--    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"-->
                        <!--        aria-labelledby="page-header-search-dropdown">-->
        
                        <!--        <form class="p-3">-->
                        <!--            <div class="form-group m-0">-->
                        <!--                <div class="input-group">-->
                        <!--                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Search Result">-->

                        <!--                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </form>-->
                        <!--    </div>-->
                        <!--</div>-->

                        <!--<div class="dropdown d-none d-sm-inline-block">-->
                        <!--    <button type="button" class="btn header-item"-->
                        <!--    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                        <!--        <img id="header-lang-img" src="<?= base_url()?>assets/images/flags/us.jpg" alt="Header Language" height="16">-->
                        <!--    </button>-->
                        <!--    <div class="dropdown-menu dropdown-menu-end">-->

                                <!-- item-->
                        <!--        <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="en">-->
                        <!--            <img src="<?= base_url()?>assets/images/flags/us.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">English</span>-->
                        <!--        </a>-->
                                <!-- item-->
                        <!--        <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="sp">-->
                        <!--            <img src="<?= base_url()?>assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>-->
                        <!--        </a>-->

                                <!-- item-->
                        <!--        <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="gr">-->
                        <!--            <img src="<?= base_url()?>assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>-->
                        <!--        </a>-->

                                <!-- item-->
                        <!--        <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="it">-->
                        <!--            <img src="<?= base_url()?>assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>-->
                        <!--        </a>-->

                                <!-- item-->
                        <!--        <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="ru">-->
                        <!--            <img src="<?= base_url()?>assets/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>-->
                        <!--        </a>-->
                        <!--    </div>-->
                        <!--</div>-->

                        <div class="dropdown d-none d-sm-inline-block">
                            <button type="button" class="btn header-item" id="mode-setting-btn">
                                <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                                <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                            </button>
                        </div>

                       

                        <!--<div class="dropdown d-inline-block">-->
                        <!--    <button type="button" class="btn header-item noti-icon position-relative" id="page-header-notifications-dropdown"-->
                        <!--    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                        <!--        <i data-feather="bell" class="icon-lg"></i>-->
                        <!--        <span class="badge bg-danger rounded-pill">5</span>-->
                        <!--    </button>-->
                        <!--    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"-->
                        <!--        aria-labelledby="page-header-notifications-dropdown">-->
                        <!--        <div class="p-3">-->
                        <!--            <div class="row align-items-center">-->
                        <!--                <div class="col">-->
                        <!--                    <h6 class="m-0"> Notifications </h6>-->
                        <!--                </div>-->
                        <!--                <div class="col-auto">-->
                        <!--                    <a href="#!" class="small text-reset text-decoration-underline"> Unread (3)</a>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--        <div data-simplebar style="max-height: 230px;">-->
                        <!--            <a href="#!" class="text-reset notification-item">-->
                        <!--                <div class="d-flex">-->
                        <!--                    <div class="flex-shrink-0 me-3">-->
                        <!--                        <img src="<?= base_url()?>assets/images/users/avatar-3.jpg" class="rounded-circle avatar-sm" alt="user-pic">-->
                        <!--                    </div>-->
                        <!--                    <div class="flex-grow-1">-->
                        <!--                        <h6 class="mb-1">James Lemire</h6>-->
                        <!--                        <div class="font-size-13 text-muted">-->
                        <!--                            <p class="mb-1">It will seem like simplified English.</p>-->
                        <!--                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1 hours ago</span></p>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </a>-->
                        <!--            <a href="#!" class="text-reset notification-item">-->
                        <!--                <div class="d-flex">-->
                        <!--                    <div class="flex-shrink-0 avatar-sm me-3">-->
                        <!--                        <span class="avatar-title bg-primary rounded-circle font-size-16">-->
                        <!--                            <i class="bx bx-cart"></i>-->
                        <!--                        </span>-->
                        <!--                    </div>-->
                        <!--                    <div class="flex-grow-1">-->
                        <!--                        <h6 class="mb-1">Your order is placed</h6>-->
                        <!--                        <div class="font-size-13 text-muted">-->
                        <!--                            <p class="mb-1">If several languages coalesce the grammar</p>-->
                        <!--                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3 min ago</span></p>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </a>-->
                        <!--            <a href="#!" class="text-reset notification-item">-->
                        <!--                <div class="d-flex">-->
                        <!--                    <div class="flex-shrink-0 avatar-sm me-3">-->
                        <!--                        <span class="avatar-title bg-success rounded-circle font-size-16">-->
                        <!--                            <i class="bx bx-badge-check"></i>-->
                        <!--                        </span>-->
                        <!--                    </div>-->
                        <!--                    <div class="flex-grow-1">-->
                        <!--                        <h6 class="mb-1">Your item is shipped</h6>-->
                        <!--                        <div class="font-size-13 text-muted">-->
                        <!--                            <p class="mb-1">If several languages coalesce the grammar</p>-->
                        <!--                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3 min ago</span></p>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </a>-->

                        <!--            <a href="#!" class="text-reset notification-item">-->
                        <!--                <div class="d-flex">-->
                        <!--                    <div class="flex-shrink-0 me-3">-->
                        <!--                        <img src="<?= base_url()?>assets/images/users/avatar-6.jpg" class="rounded-circle avatar-sm" alt="user-pic">-->
                        <!--                    </div>-->
                        <!--                    <div class="flex-grow-1">-->
                        <!--                        <h6 class="mb-1">Salena Layfield</h6>-->
                        <!--                        <div class="font-size-13 text-muted">-->
                        <!--                            <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>-->
                        <!--                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1 hours ago</span></p>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </a>-->
                        <!--        </div>-->
                        <!--        <div class="p-2 border-top d-grid">-->
                        <!--            <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">-->
                        <!--                <i class="mdi mdi-arrow-right-circle me-1"></i> <span>View More..</span> -->
                        <!--            </a>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item right-bar-toggle me-2">
                                <i data-feather="settings" class="icon-lg"></i>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="<?= base_url()?><?= $admin_details['image'] ?>"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium text-white"><?= $admin_details['name']?></span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block text-white"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="<?= base_url()?>Admin/admin_profile"><i class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> Profile</a>
                                <a class="dropdown-item" href="<?= base_url()?>Admin/change_password"><i class="mdi mdi-cog font-size-16 align-middle me-1"></i> Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('admin/logout')?>"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                            </div>
                        </div>

                    </div>
                </div>
            </header>
