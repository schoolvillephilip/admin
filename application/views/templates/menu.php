<nav id="mainnav-container">
    <div id="mainnav">
        <div class="mainnav-brand">
            <a href="#" class="mainnav-toggle"><i class="pci-cross pci-circle icon-lg"></i></a>
        </div>
        <?php $group = $this->session->userdata('group_id'); ?>
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">
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
                            <a href="<?= base_url('profile_settings'); ?>" class="list-group-item">
                                <i class="demo-pli-male icon-lg icon-fw"></i> View Profile
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
                        <li>
                            <a href="<?= base_url('dashboard') ?>">
                                <i class="demo-pli-home"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <?php if (in_array($group, array('1', '2', '4'))) : ?>
                            <li <?php if ($pg_name == 'sellers') echo 'class="active"' ?>>
                                <a href="#">
                                    <i class="demo-pli-list-view"></i>
                                    <span class="menu-title">Product Catalogue</span>
                                    <i class="arrow"></i>
                                </a>
                                <ul class="collapse <?php if ($pg_name == 'product') echo 'in'; ?>">
                                    <li <?php if ($sub_name == 'products_overview') echo 'class="active-link"' ?>><a
                                                href="<?= base_url('product') ?>">Products Overview</a></li>
                                    <li <?php if ($sub_name == 'approve_product') echo 'class="active-link"' ?>><a
                                                href="<?= base_url('product/approve'); ?>">Approve Product</a></li>
                                </ul>
                            </li>
                        <?php endif ?>
                        <li class="<?php if ($pg_name == 'orders') echo 'active' ?>">
                            <a href="<?= base_url('orders') ?>">
                                <i class="demo-pli-shopping-basket"></i>
                                <span class="menu-title">Sales &amp; Orders</span>
                            </a>
                        </li>
                        <?php if (in_array($group, array('1', '2'))) : ?>
                            <li <?php if ($pg_name == 'select_category') echo 'class="active"' ?>>
                                <a href="#">
                                    <i class="demo-pli-split-vertical-2"></i>
                                    <span class="menu-title">Brand &amp; Categories</span>
                                    <i class="arrow"></i>
                                </a>
                                <ul class="collapse <?php if ($pg_name == 'select_category') echo 'in'; ?>">
                                    <li <?php if ($sub_name == 'brands') echo 'class="active-link"' ?>>
                                        <a href="<?= base_url('brands'); ?>">
                                            <span class="menu-title">Brands</span>
                                        </a>
                                    </li>
                                    <li <?php if ($sub_name == 'category') echo 'class="active-link"' ?>><a
                                                href="<?= base_url('categories'); ?>">Categories</a></li>
                                    <li <?php if ($sub_name == 'specification') echo 'class="active-link"' ?>>
                                        <a
                                                href="<?= base_url('categories/specification'); ?>">Specifications</a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif ?>
                        <?php if ($group == '1') : ?>
                            <li <?php if ($pg_name == 'sellers') echo 'class="active"' ?>>
                                <a href="#">
                                    <i class="demo-pli-find-user"></i>
                                    <span class="menu-title">User Management</span>
                                    <i class="arrow"></i>
                                </a>
                                <ul class="collapse <?php if ($pg_name == 'sellers') echo 'in'; ?>">
                                    <li <?php if ($sub_name == 'users') echo 'class="active-link"' ?>><a
                                                href="<?= base_url('sellers/all_users') ?>">All Users</a></li>
                                    <li <?php if ($sub_name == 'sellers_overview') echo 'class="active-link"' ?>><a
                                                href="<?= base_url('sellers') ?>">Sellers</a></li>
                                    <li <?php if ($sub_name == 'approve_sellers') echo 'class="active-link"' ?>><a
                                                href="<?= base_url('sellers/approve'); ?>">Approve Sellers</a></li>
                                </ul>
                            </li>
                        <?php endif ?>
                        <li <?php if ($pg_name == 'report') echo 'class="active"' ?>>
                            <a href="javascript:;">
                                <i class="demo-pli-bar-chart"></i>
                                <span class="menu-title">Reports</span>
                                <i class="arrow"></i>
                            </a>
                            <ul class="collapse <?php if ($pg_name == 'report') echo 'in'; ?>">
                                <li <?php if ($sub_name == 'sales_report') echo 'class="active-link"' ?>><a
                                            href="<?= base_url('account/sales_report'); ?>">
                                        <i class="demo-pli-star"></i>Sales Report</a></li>
                                <li <?php if ($sub_name == 'statement') echo 'class="active"' ?>><a
                                            href="<?= base_url('account/statement'); ?>">
                                        <i class="demo-pli-star"></i>Account Statement</a></li>
                                <li <?php if ($sub_name == 'payout') echo 'class="active-link"' ?>><a
                                            href="<?= base_url('account/payout'); ?>">
                                        <i class="demo-pli-star"></i>Payout Requests</a></li>
                                <li <?php if ($sub_name == 'history') echo 'class="active-link"' ?>><a
                                            href="<?= base_url('account/history'); ?>">
                                        <i class="demo-pli-star"></i>Payout History</a></li>
                            </ul>
                        </li>
                        <li class="list-divider"></li>
                        <?php if ($group == '1') : ?>
                            <li <?php if ($pg_name == 'settings') echo 'class="active"' ?>>
                                <a href="#">
                                    <i class="demo-pli-gear"></i>
                                    <span class="menu-title">Settings</span>
                                    <i class="arrow"></i>
                                </a>
                                <ul class="collapse <?php if ($pg_name == 'settings') echo 'in' ?>;">
                                    <li <?php if ($sub_name == 'gen_set') echo 'class="active-link"' ?>><a
                                                href="<?= base_url('settings') ?>">General Settings</a></li>
                                    <li <?php if ($sub_name == 'mail_set') echo 'class="active-link"' ?>><a
                                                href="<?= base_url('settings/mail') ?>">Mail Settings</a></li>
                                    <li <?php if ($sub_name == 'e_foot') echo 'class="active-link"' ?>><a
                                                href="<?= base_url('settings/edit_footer') ?>">Edit Footer</a></li>
                                </ul>
                            </li>
                            <li <?php if ($pg_name == 'store_settings') echo 'class="active"' ?>>
                                <a href="#">
                                    <i class="demo-pli-gears"></i>
                                    <span class="menu-title">Store Settings</span>
                                    <i class="arrow"></i>
                                </a>
                                <ul class="collapse <?php if ($pg_name == 'store_settings') echo 'in' ?>;">
                                    <li><a
                                                href="#">Pages Settings
                                            <i class="arrow"></i>
                                        </a>
                                        <ul class="collapse <?php if ($sub_name == 'page_settings') echo 'in' ?>;">
                                            <li <?php if ($least_sub == 'homepage') echo 'class="active-link"' ?>><a
                                                        href="<?= base_url('settings/home') ?>">Homepage</a></li>
                                            <li <?php if ($least_sub == 'category') echo 'class="active-link"' ?>><a
                                                        href="#">Category</a></li>
                                            <li <?php if ($least_sub == 'checkout') echo 'class="active-link"' ?>><a
                                                        href="#">Checkout</a></li>
                                            <li <?php if ($least_sub == 'single_prod') echo 'class="active-link"' ?>><a
                                                        href="#">Single Product</a></li>
                                            <li <?php if ($least_sub == 'privacy') echo 'class="active-link"' ?>><a
                                                        href="<?= base_url('settings/privacy') ?>">Privacy Policy</a>
                                            </li>
                                            <li <?php if ($least_sub == 'terms') echo 'class="active-link"' ?>><a
                                                        href="<?= base_url('settings/terms') ?>">Terms</a></li>
                                            <li <?php if ($least_sub == 'agreement') echo 'class="active-link"' ?>><a
                                                        href="<?= base_url('settings/agreement') ?>">Agreement</a></li>
                                        </ul>
                                    </li>
                                    <li><a
                                                href="#">Homepage Products</a></li>
                                    <li <?php if ($sub_name == 'payment_set') echo 'class="active-link"' ?>><a
                                                href="<?= base_url('settings/payment') ?>">Payment Methods</a></li>
                                </ul>
                            </li>
                        <?php endif ?>
                        <?php if (in_array($group, array('1', '2', '3'))) : ?>
                            <li <?php if ($pg_name == 'disc_opt') echo 'class="active"' ?>>
                                <a href="#">
                                    <i class="demo-pli-medal-2"></i>
                                    <span class="menu-title">Discount Options</span>
                                    <i class="arrow"></i>
                                </a>
                                <ul class="collapse <?php if ($pg_name == 'disc_opt') echo 'in'; ?>">
                                    <li <?php if ($sub_name == 'gift_card') echo 'class="active-link"' ?>><a
                                                href="<?= base_url('settings/discount/giftcards') ?>">Gift Cards</a>
                                    </li>
                                    <li <?php if ($sub_name == 'special') echo 'class="active-link"' ?>><a
                                                href="<?= base_url('settings/discount/special') ?>">Special Offers</a>
                                    </li>
                                    <li <?php if ($sub_name == 'coupon') echo 'class="active-link"' ?>><a
                                                href="<?= base_url('settings/discount/coupons') ?>">Discount Coupon</a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif ?>
                        <?php if (in_array($group, array('1', '2'))) : ?>
                            <li <?php if ($pg_name == 'states') echo 'class="active"' ?>>
                                <a href="<?= base_url('states'); ?>">
                                    <i class="demo-pli-map-2"></i>
                                    <span class="menu-title">Shipping</span>
                                    <i class="arrow"></i>
                                </a>
                                <ul class="collapse <?php if ($pg_name == 'states') echo 'in'; ?>">
                                    <li <?php if ($sub_name == 'states_areas') echo 'class="active-link"' ?>><a
                                                href="<?= base_url('states') ?>">States Areas</a></li>
                                    <li <?php if ($sub_name == 'pickup_address') echo 'class="active-link"' ?>><a
                                                href="<?= base_url('states/pickup_address'); ?>">Pickup Address</a></li>
                                </ul>
                            </li>
                            <li class="list-divider"></li>
                        <?php endif ?>
                        <li <?php if ($pg_name == 'pro_settings') echo 'class="active"' ?>>
                            <a href="#">
                                <i class="demo-pli-add-user-star"></i>
                                <span class="menu-title">Profile</span>
                                <i class="arrow"></i>
                            </a>
                            <ul class="collapse <?php if ($pg_name == 'pro_settings') echo 'in'; ?>">
                                <li <?php if ($sub_name == 'profile') echo 'class="active-link"' ?>><a
                                            href="<?= base_url('profile_settings') ?>">Profile Settings</a></li>
                                <li <?php if ($sub_name == 'change_password') echo 'class="active-link"' ?>><a
                                            href="<?= base_url('profile_settings/change_password'); ?>">Change
                                        Password</a></li>
                                <li <?php if ($sub_name == 'notification') echo 'class="active-link"' ?>><a
                                            href="<?= base_url('profile_settings/notification'); ?>">Notification
                                        Setting</a>
                                </li>
                            </ul>
                        </li>
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
    </div>
</nav>
