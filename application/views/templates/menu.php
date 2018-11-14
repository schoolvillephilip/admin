<nav id="mainnav-container">
    <div id="mainnav">

        <!--It will only appear on small screen devices.-->
        <!--================================-->
        <div class="mainnav-brand">
            <a href="<?= base_url(); ?>" class="brand">
                <div class="brand-title">
                    <span class="brand-text"><?= lang('app_name') ?>.com</span>
                </div>
            </a>
            <a href="#" class="mainnav-toggle"><i class="pci-cross pci-circle icon-lg"></i></a>
        </div>


        <!--Menu-->
        <!--================================-->
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">

                    <!--Profile Widget-->
                    <!--================================-->
                    <div id="mainnav-profile" class="mainnav-profile">
                        <div class="profile-wrap text-center">
                            <div class="pad-btm">
                                <img src="<?= base_url('assets/img/onitshamarket-logo.png'); ?>"
                                     alt="<?= lang('app_name'); ?>" class="brand-title img-responsive">
                            </div>
                            <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                                            <span class="pull-right dropdown-toggle">
                                                <i class="dropdown-caret"></i>
                                            </span>
                                <p class="mnp-name"><?= ucwords($profile->first_name . ' ' . $profile->last_name); ?></p>
                                <span class="mnp-desc"><?= $profile->email; ?></span>
                            </a>
                        </div>
                        <div id="profile-nav" class="collapse list-group bg-trans">
                            <a href="<?= base_url('settings/profile'); ?>" class="list-group-item">
                                <i class="demo-pli-male icon-lg icon-fw"></i> View Profile
                            </a>
                            <a href="<?= base_url('settings') ?>" class="list-group-item">
                                <i class="demo-pli-gear icon-lg icon-fw"></i> Settings
                            </a>
                            <a href="<?= base_url('help') ?>" class="list-group-item">
                                <i class="demo-pli-information icon-lg icon-fw"></i> Help
                            </a>
                            <a href="<?= base_url('logout') ?>" class="list-group-item">
                                <i class="demo-pli-unlock icon-lg icon-fw"></i> Logout
                            </a>
                        </div>
                    </div>


                    <ul id="mainnav-menu" class="list-group">

                        <!--Menu list item-->
                        <li>
                            <a href="<?= base_url('dashboard') ?>">
                                <i class="demo-pli-home"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>

                        <!--Menu list item-->
                        <li class="">
                            <a href="#">
                                <i class="demo-pli-gear"></i>
                                <span class="menu-title">Settings</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a
                                            href="#">General Settings</a></li>
                                <li><a
                                            href="#">Mail Settings</a></li>
                                <li><a
                                            href="#">Edit Footer</a></li>
                            </ul>
                        </li>
                        <!--Menu list item-->
                        <li class="">
                            <a href="#">
                                <i class="demo-pli-gears"></i>
                                <span class="menu-title">Store Settings</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse">
                                <li><a
                                            href="#">Global Store Settings</a></li>
                                <li><a
                                            href="#">Homepage Products</a></li>
                                <li><a
                                            href="#">Store Online/Offline</a></li>
                            </ul>
                        </li>

                        <li class="<?php if ($pg_name == 'sellers') echo 'class="active-sub"' ?>">
                            <a href="#">
                                <i class="demo-pli-list-view"></i>
                                <span class="menu-title">Product Catalogue</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse <?php if ($pg_name == 'product') echo 'in'; ?>">
                                <li <?php if ($sub_name == 'products_overview') echo 'class="active-link"' ?>><a
                                            href="<?= base_url('product') ?>">Products Overview</a></li>
                                <li <?php if ($sub_name == 'approve_product') echo 'class="active-link"' ?>><a
                                            href="<?= base_url('product/approve'); ?>">Approve Product</a></li>

                            </ul>
                        </li>
                        <!--Menu list item-->
                        <li class="<?php if ($pg_name == 'select_category') echo 'class="active-sub"' ?>">
                            <a href="#">
                                <i class="demo-pli-split-vertical-2"></i>
                                <span class="menu-title">Brand &amp; Categories</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse <?php if ($pg_name == 'select_category') echo 'in'; ?>">

                                <li>
                                    <a href="<?= base_url('brands'); ?>">
                                        <span class="menu-title">Brands</span>
                                    </a>
                                </li>
                                <li <?php if ($sub_name == 'root_category') echo 'class="active-link"' ?>><a
                                            href="<?= base_url('categories/root_category'); ?>">Root Categories</a></li>
                                <li <?php if ($sub_name == 'category') echo 'class="active-link"' ?>><a
                                            href="<?= base_url('categories/category'); ?>">Categories</a></li>
                                <li <?php if ($sub_name == 'sub_category') echo 'class="active-link"' ?>><a
                                            href="<?= base_url('categories/sub_category'); ?>">Sub Categories</a></li>
                                <li <?php if ($sub_name == 'specification') echo 'class="active-link"' ?>><a
                                            href="<?= base_url('categories/specification'); ?>">Specifications</a></li>
                            </ul>
                        </li>

                        <!--Menu list item-->
                        <li class="<?php if ($pg_name == 'select_category') echo 'class="active-sub"' ?>">
                            <a href="#">
                                <i class="demo-pli-medal-2"></i>
                                <span class="menu-title">Discount Options</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse <?php if ($pg_name == 'select_category') echo 'in'; ?>">
                                <li><a
                                            href="#">Gift Cards</a></li>
                                <li><a
                                            href="#">Special Offers</a></li>
                                <li><a
                                            href="#">Discount Coupon</a></li>
                            </ul>
                        </li>
                        <!--Menu list item-->

                        <li class="<?php if ($pg_name == 'states') echo 'class="active-sub"' ?>">
                            <a href="<?= base_url('states'); ?>">
                                <i class="demo-pli-map-2"></i>
                                <span class="menu-title">Shipping</span>
                                <i class="arrow"></i>
                            </a>
                            <!--Submenu-->
                            <ul class="collapse <?php if ($pg_name == 'states') echo 'in'; ?>">
                                <li <?php if ($sub_name == 'states_areas') echo 'class="active-link"' ?>><a
                                            href="<?= base_url('states') ?>">States Areas</a></li>
                                <li <?php if ($sub_name == 'pickup_address') echo 'class="active-link"' ?>><a
                                            href="<?= base_url('states/pickup_address'); ?>">Pickup Address</a></li>
                                <li><a
                                            href="#">Shipping Zones</a></li>
                                <li><a
                                            href="#">Shipping Rate</a></li>
                            </ul>
                        </li>

                        <li class="<?php if ($pg_name == 'orders') echo 'class="active-link"' ?>">
                            <a href="<?= base_url('orders') ?>">
                                <i class="demo-pli-shopping-basket"></i>
                                <span class="menu-title">Sales &amp; Orders</span>
                            </a>

                        </li>

                        <li class="<?php if ($pg_name == 'sellers') echo 'class="active-sub"' ?>">
                            <a href="#">
                                <i class="demo-pli-find-user"></i>
                                <span class="menu-title">User Management</span>
                                <i class="arrow"></i>
                            </a>
                            <!--Submenu-->
                            <ul class="collapse <?php if ($pg_name == 'sellers') echo 'in'; ?>">
                                <li <?php if ($sub_name == 'sellers_overview') echo 'class="active-link"' ?>><a
                                            href="<?= base_url('sellers') ?>">All Users</a></li>
                                <li <?php if ($sub_name == 'sellers_overview') echo 'class="active-link"' ?>><a
                                            href="<?= base_url('sellers') ?>">Sellers</a></li>
                                <li <?php if ($sub_name == 'approve_sellers') echo 'class="active-link"' ?>><a
                                            href="<?= base_url('sellers/approve'); ?>">Approve Sellers</a></li>

                            </ul>
                        </li>


                        <li class="list-divider"></li>
                        <li class="<?php if ($pg_name == 'settings') echo 'class="active-sub"' ?>">
                            <a href="#">
                                <i class="demo-pli-gear"></i>
                                <span class="menu-title">Settings</span>
                                <i class="arrow"></i>
                            </a>

                            <!--Submenu-->
                            <ul class="collapse <?php if ($pg_name == 'settings') echo 'in'; ?>">
                                <li <?php if ($sub_name == 'profile') echo 'class="active-link"' ?>><a
                                            href="<?= base_url('settings') ?>">Profile</a></li>
                                <li <?php if ($sub_name == 'change_password') echo 'class="active-link"' ?>><a
                                            href="<?= base_url('settings/change_password'); ?>">Change Password</a></li>
                                <li <?php if ($sub_name == 'notification') echo 'class="active-link"' ?>><a
                                            href="<?= base_url('settings/notification'); ?>">Notification Setting</a>
                                </li>

                            </ul>
                        </li>
                        <!--Menu list item-->
                        <li>
                            <a href="<?= base_url('help'); ?>">
                                <i class="demo-pli-information"></i>
                                <span class="menu-title">Help & Guidelines</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?= base_url('logout'); ?>">
                                <i class="fa fa-key"></i>
                                <span class="menu-title">Logout</span>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
        <!--================================-->
        <!--End menu-->

    </div>
</nav>
