<?php $this->load->view('templates/meta_tags'); ?>
</head>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">
    <?php $this->load->view('templates/head_navbar'); ?>
    <div class="boxed">
        <div id="content-container">
            <div id="page-head">
                <div id="page-title">
                    <h1 class="page-header text-overflow">General Settings</h1>
                </div>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Settings</a></li>
                    <li class="active">General</li>
                </ol>
            </div>
            <div id="page-content">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">General Site Settings</h3>
                    </div>
                    <?php $this->load->view('msg_view'); ?>
                    <?= form_open('', 'class="panel-body form-horizontal"') ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="meta_key">Default Meta Keywords</label>
                        <div class="col-md-9">
                            <input type="text" id="meta_key" name="keywords" class="form-control"
                                   value="<?= !empty($settings->keywords) ? $settings->keywords : ''; ?>"
                                   placeholder="Meta Keywords">
                            <small class="help-block">Enter the default meta keywords</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="meta_desc">Default Meta Description</label>
                        <div class="col-md-9">
                            <input type="text" id="meta_desc" name="description" class="form-control"
                                   value="<?= !empty($settings->description) ? $settings->description : ''; ?>"
                                   placeholder="Meta Description">
                            <small class="help-block">Enter the default meta descriptions</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="socials">
                            Social Links
                        </label>
                        <div class="col-md-9">
                            <div class="row" style="padding-left:10px;padding-right: 10px;">
                                <div class="input-group mar-btm col-md-12">
                                    <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                                    <input type="text" class="form-control"
                                           placeholder="http://twitter.com/your-profile" name="twitter_link"
                                           value="<?= !empty($settings->twitter_link) ? $settings->twitter_link : ''; ?>">
                                </div>
                                <div class="input-group mar-btm col-md-12">
                                    <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                    <input type="text" class="form-control"
                                           placeholder="http://facebook.com/your-profile" name="facebook_link"
                                           value="<?= !empty($settings->facebook_link) ? $settings->facebook_link : ''; ?>">
                                </div>
                                <div class="input-group mar-btm col-md-12">
                                    <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                                    <input type="text" class="form-control"
                                           placeholder="http://instagram.com/your-profile" name="instagram_link"
                                           value="<?= !empty($settings->instagram_link) ? $settings->instagram_link : ''; ?>">
                                </div>
                                <div class="input-group mar-btm col-md-12">
                                    <span class="input-group-addon"><i class="fa fa-youtube"></i></span>
                                    <input type="text" class="form-control"
                                           placeholder="http://youtube.com/your-profile" name="youtube_link"
                                           value="<?= !empty($settings->youtube_link) ? $settings->youtube_link : ''; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group pad-ver">
                        <label class="col-md-3 control-label">Store Enabled</label>
                        <div class="col-md-9">
                            <div class="radio">
                                <input id="enable_radio" class="magic-radio" type="radio" name="enabled_radio" checked>
                                <label for="enable_radio">Yes</label>
                                <input id="enable_radio-2" class="magic-radio" type="radio" name="enabled_radio">
                                <label for="enable_radio-2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="stat_name">Date to Enable</label>
                        <div class="col-md-9">
                            <input type="date" id="stat_name" class="form-control">
                            <small class="help-block">Select date to bring store back online</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="stat_phones">If Disabled, Enable for IP
                            Address(es)</label>
                        <div class="col-md-9">
                            <input type="text" id="stat_phones" class="form-control" placeholder="0.0.0.0">
                            <small class="help-block">Enter the IP Addresses to allow separated by a comma(,)</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="stat_mails">Reason Offline</label>
                        <div class="col-md-9">
                                    <textarea class="form-control" rows="5">

                                    </textarea>
                        </div>
                    </div>
                    <input type="hidden" name="update" value="<?= !empty($settings->id) ? $settings->id : ''; ?>">
                    <div class="panel-footer text-center">
                        <button class="btn btn-primary" type="submit">Save/Update</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
        <?php $this->load->view('templates/menu'); ?>
    </div>
    <?php $this->load->view('templates/footer'); ?>
    <button class="scroll-top btn">
        <i class="pci-chevron chevron-up"></i>
    </button>
</div>
<?php $this->load->view('templates/scripts'); ?>
</body>
</html>
