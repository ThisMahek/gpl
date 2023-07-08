
            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" data-key="t-menu">Menu</li>
                            <li>
                                <a href="<?= base_url()?>Admin/index" class="<?= ($page_name=="dashboard")?'active':''?>">
                                    <i data-feather="home"></i>
                                    <span data-key="t-dashboard">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url()?>Admin/manage_user" class="<?= ($page_name=="manage_user")?'active':''?>">
                                    <i class="bx bxs-user-detail"></i>
                                    <span data-key="t-dashboard">Manage Users</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url()?>Admin/manage_slider" class="<?= ($page_name=="manage_slider")?'active':''?>">
                                    <i class="bx bx-image-add"></i>
                                    <span data-key="t-dashboard">Manage Slider</span>
                                </a>
                            </li>
                            <!--  <li class="<?= ($page_name=="manage_slider" AND $page_name="add_slider")?'mm-active':''?>">-->
                            <!--    <a href="javascript: void(0);" class="has-arrow <?= ($page_name=="manage_slider" && $page_name="add_slider")?'mm-active':''?>">-->
                            <!--        <i class="bx bx-image-add"></i>-->
                            <!--        <span>Manage Slider</span>-->
                            <!--    </a>-->
                            <!--    <ul class="sub-menu" aria-expanded="false">-->
                            <!--        <li>-->
                            <!--            <a href="<?= base_url()?>Admin/manage_slider" class="<?= ($page_name=="manage_slider")?'mm-active':''?>">-->
                            <!--                <span>Manage Slider</span>-->
                            <!--            </a>-->
                            <!--        </li>-->
        
                            <!--        <li>-->
                            <!--            <a class="<?= ($page_name=="add_slider")?'mm-active':''?>" href="<?= base_url()?>Admin/add_slider">-->
                            <!--                <span>Add User</span>-->
                            <!--            </a>-->
                            <!--        </li>-->
                            <!--    </ul>-->
                            <!--</li>-->
                             <li>
                                <a href="<?= base_url()?>Admin/manage_notification" class="<?= ($page_name=="manage_notification")?'active':''?>">
                                    <i data-feather="bell"></i>
                                    <span>Manage Notification</span>
                                </a>
                            </li>
                             <li>
                                <a href="<?= base_url()?>admin/manage_category" class="<?= ($page_name=="manage_category")?'active':''?>">
                                    <i class="bx bxs-user-detail"></i>
                                    <span>Sport Category</span>
                                </a>
                            </li>

                            <li>
                                <a href="<?= base_url()?>admin/manage_sportsname" class="<?= ($page_name=="manage_category")?'active':''?>">
                                    <i class="bx bxs-user-detail"></i>
                                    <span>Game Category</span>
                                </a>
                            </li>
                        <!--      <li>
                                <a href="<?= base_url()?>Admin/manage_role" class="<?= ($page_name=="manage_role")?'active':''?>">
                                    <i class="bx bx-grid-small"></i>
                                    <span>Manage Role</span>
                                </a>
                            </li> -->
                            <!--<li class="<?= ($page_name=="manage_category" AND $page_name="add_category")?'mm-active':''?>">-->
                            <!--    <a href="javascript: void(0);" class="has-arrow <?= ($page_name=="manage_category" && $page_name="add_category")?'mm-active':''?>">-->
                            <!--        <i class="bx bxs-user-detail"></i>-->
                            <!--        <span data-key="t-apps">Sports Category</span>-->
                            <!--    </a>-->
                            <!--    <ul class="sub-menu" aria-expanded="false">-->
                            <!--        <li>-->
                            <!--            <a href="<?= base_url()?>Admin/manage_category" class="<?= ($page_name=="add_category")?'mm-active':''?>">-->
                            <!--                <span>Manage Sports Category</span>-->
                            <!--            </a>-->
                            <!--        </li>-->
        
                            <!--        <li>-->
                            <!--            <a class="<?= ($page_name=="add_category")?'mm-active':''?>" href="<?= base_url()?>Admin/add_category">-->
                            <!--                <span>Add Category</span>-->
                            <!--            </a>-->
                            <!--        </li>-->
                            <!--    </ul>-->
                            <!--</li>-->
                            <li class="<?= ($page_name=="manage_slider" AND $page_name="add_slider")?'mm-active':''?>">
                                <a  href="<?= base_url()?>Admin/manage_player" class="has-arrow <?= ($page_name=="manage_player" && $page_name="add_player")?'mm-active':''?>">
                                    <i class=" bx bx-run"></i>
                                    <span data-key="t-apps">Manage Players</span>
                                </a>
                                <!--<ul class="sub-menu" aria-expanded="false">-->
                                <!--    <li>-->
                                <!--        <a href="<?= base_url()?>Admin/manage_player" class="<?= ($page_name=="manage_player")?'mm-active':''?>">-->
                                <!--            <span>Manage Players</span>-->
                                <!--        </a>-->
                                <!--    </li>-->
                                    <!--<li>-->
                                    <!--    <a class="<?= ($page_name=="add_player")?'mm-active':''?>" href="<?= base_url()?>Admin/add_player">-->
                                    <!--        <span>Add Player</span>-->
                                    <!--    </a>-->
                                    <!--</li>-->
                                <!--</ul>-->
                            </li>
                         <!--    <li class="<?= ($page_name=="manage_team" AND $page_name="create_team")?'mm-active':''?>">
                                <a href="javascript: void(0);" class="has-arrow <?= ($page_name=="manage_team" && $page_name="create_team")?'mm-active':''?>">
                                    <i data-feather="grid"></i>
                                    <span data-key="t-apps">Manage Team</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li>
                                        <a href="<?= base_url()?>Admin/manage_team" class="<?= ($page_name=="manage_team")?'mm-active':''?>">
                                            <span>Manage Team</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="<?= ($page_name=="create_team")?'mm-active':''?>" href="<?= base_url()?>Admin/create_team">
                                            <span>Create Team</span>
                                        </a>
                                    </li>
                                </ul>
                            </li> -->
                            <li class="<?= ($page_name=="manage_tournament" AND $page_name="create_tournament")?'mm-active':''?>">
                                <a href="javascript: void(0);" class="has-arrow <?= ($page_name=="manage_tournament" && $page_name="create_tournament")?'mm-active':''?>">
                                    <i class="bx bx-sitemap"></i>
                                    <span data-key="t-apps">Management Tournament</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li>
                                        <a href="<?= base_url()?>Admin/manage_tournament" class="<?= ($page_name=="manage_tournament")?'mm-active':''?>">
                                            <span>Manage Tournament</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="<?= ($page_name=="create_tournament")?'mm-active':''?>" href="<?= base_url()?>Admin/create_tournament">
                                            <span>Create Tournament</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                              <li>
                                <a href="<?= base_url()?>Admin/app_link" class="<?= ($page_name=="app_link")?'active':''?>">
                                    <i class="bx bx-tab"></i>
                                    <span data-key="t-dashboard">Manage App link</span>
                                </a>
                            </li>
                            <!-- <li>-->
                            <!--    <a href="<?= base_url()?>Admin/manage_gallery" class="<?= ($page_name=="manage_gallery")?'active':''?>">-->
                            <!--        <i class="bx bx-image"></i>-->
                            <!--        <span data-key="t-dashboard">Manage Gallery</span>-->
                            <!--    </a>-->
                            <!--</li>-->
                            <li>
                                <a href="#" class="has-arrow">
                                    <i class="bx bx-sitemap"></i>
                                    <span data-key="t-apps">Manage Content</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                     <li>
                                        <a href="<?= base_url()?>Admin/manage_content" class="">
                                            <span>Manage Contact</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url()?>Admin/privacy_policy" class="">
                                            <span>Privacy Policy</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="" href="<?= base_url()?>Admin/term_condition">
                                            <span>Terms & Conditions</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--<li class="<?= ($page_name=="manage_slider" AND $page_name="add_slider")?'mm-active':''?>">-->
                            <!--    <a href="javascript: void(0);" class="has-arrow <?= ($page_name=="manage_blog" && $page_name="add_blog")?'mm-active':''?>">-->
                            <!--        <i class="bx bx-sitemap"></i>-->
                            <!--        <span data-key="t-apps">Manage Blog</span>-->
                            <!--    </a>-->
                            <!--    <ul class="sub-menu" aria-expanded="false">-->
                            <!--        <li>-->
                            <!--            <a href="<?= base_url()?>Admin/manage_blog" class="<?= ($page_name=="manage_blog")?'mm-active':''?>">-->
                            <!--                <span>Manage Blog</span>-->
                            <!--            </a>-->
                            <!--        </li>-->
                            <!--        <li>-->
                            <!--            <a class="<?= ($page_name=="add_blog")?'mm-active':''?>" href="<?= base_url()?>Admin/add_blog">-->
                            <!--                <span>Add Blog</span>-->
                            <!--            </a>-->
                            <!--        </li>-->
                            <!--    </ul>-->
                            <!--</li>-->
                            <li>
                                <a href="<?= base_url('admin/logout')?>" class="<?= ($page_name=="logout")?'active':''?>">
                                    <i class="bx bx-log-out"></i>
                                    <span data-key="t-dashboard">Logout</span>
                                </a>
                            </li>
                            <!--<li>-->
                            <!--    <a href="javascript: void(0);" class="has-arrow">-->
                            <!--        <i data-feather="grid"></i>-->
                            <!--        <span data-key="t-apps">Manage user</span>-->
                            <!--    </a>-->
                            <!--    <ul class="sub-menu" aria-expanded="false">-->
                            <!--        <li>-->
                            <!--            <a href="#">-->
                            <!--                <span data-key="t-calendar">Manage user</span>-->
                            <!--            </a>-->
                            <!--        </li>-->
        
                            <!--        <li>-->
                            <!--            <a href="#">-->
                            <!--                <span data-key="t-chat">Chat</span>-->
                            <!--            </a>-->
                            <!--        </li>-->
                            <!--        <li>-->
                            <!--            <a href="javascript: void(0);" class="has-arrow">-->
                            <!--                <span data-key="t-contacts">Contacts</span>-->
                            <!--            </a>-->
                            <!--            <ul class="sub-menu" aria-expanded="false">-->
                            <!--                <li><a href="apps-contacts-grid.html" data-key="t-user-grid">User Grid</a></li>-->
                            <!--                <li><a href="apps-contacts-list.html" data-key="t-user-list">User List</a></li>-->
                            <!--                <li><a href="apps-contacts-profile.html" data-key="t-profile">Profile</a></li>-->
                            <!--            </ul>-->
                            <!--        </li>-->
                            <!--    </ul>-->
                            <!--</li>-->
                       </ul>

                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
