<?php $this->load->view('templates/meta_tags'); ?>
</head>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">
    <?php $this->load->view('templates/head_navbar'); ?>
    <div class="boxed">
        <div id="content-container">
            <div id="page-head">
                <div id="page-title">
                    <h1 class="page-header text-overflow">Store Status</h1>
                </div>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Store Settings</a></li>
                    <li class="active">Store Online/Offline</li>
                </ol>
            </div>
            <div id="page-content">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Store Status</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="form-group pad-ver">
                                <label class="col-md-3 control-label">Store Enabled</label>
                                <div class="col-md-9">
                                    <div class="radio">
                                        <input id="enable_radio" class="magic-radio" type="radio" name="enabled_radio"
                                               checked>
                                        <label for="enable_radio">Yes</label>

                                        <input id="enable_radio-2" class="magic-radio" type="radio"
                                               name="enabled_radio">
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
                                    <small class="help-block">Enter the IP Addresses to allow separated by a comma(,)
                                    </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="stat_mails">Reason Offline</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" rows="5">

                                    </textarea>
                                </div>
                            </div>
                            <div class="panel-footer text-center">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('templates/menu'); ?>
    <?php $this->load->view('templates/footer'); ?>
    <button class="scroll-top btn">
        <i class="pci-chevron chevron-up"></i>
    </button>
</div>
<?php $this->load->view('templates/scripts'); ?>
</body>
</html>
