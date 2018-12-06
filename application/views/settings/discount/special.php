<?php $this->load->view('templates/meta_tags'); ?>
</head>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">
    <?php $this->load->view('templates/head_navbar'); ?>
    <div class="boxed">
        <div id="content-container">
            <div id="page-head">
                <div id="page-title">
                    <h1 class="page-header text-overflow">Special Offers</h1>
                </div>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Discount Options</a></li>
                    <li class="active">Special Offers</li>
                </ol>
            </div>
            <div id="page-content">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Special Offers</h3>
                    </div>
                    <div class="panel-body">

                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="of_name">Offer Name</label>
                                <div class="col-md-9">
                                    <input type="text" id="of_name" class="form-control" placeholder="Enter Name">
                                    <small class="help-block">Enter the name you want to call the offer</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="of_discount">Discount &#8358;</label>
                                <div class="col-md-9">
                                    <input type="text" id="of_discount" class="form-control" placeholder="0.00">
                                    <small class="help-block">Enter the discount on the sales</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="of_exp">Expiry Dates</label>
                                <div class="col-md-9">
                                    <input type="date" id="of_exp" class="form-control"
                                           placeholder="Select Expiry Date">
                                    <small class="help-block">Select expiry date of offer</small>
                                </div>
                            </div>
                            <div class="form-group pad-ver">
                                <label class="col-md-3 control-label">Multi Buy Only</label>
                                <div class="col-md-9">
                                    <div class="radio">
                                        <input id="multi_radio" class="magic-radio" type="radio" name="multi_radio"
                                               checked>
                                        <label for="multi_radio">Yes</label>

                                        <input id="multi_radio-2" class="magic-radio" type="radio" name="multi_radio">
                                        <label for="multi_radio-2">No</label>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group pad-ver">
                                <label class="col-md-3 control-label">Enabled</label>
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
                            <div class="panel-footer text-center">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </form>

                        <div class="panel" style="margin-top: 40px;">
                            <div class="panel-heading">
                                <h3 class="panel-title">For Category</h3>
                            </div>
                            <div class="panel-body">
                                Loops out all categories
                                <div class="form-group pad-ver">
                                    <div class="radio">
                                        <input id="demo-form-radio" class="magic-radio" type="radio"
                                               name="cat_radio">
                                        <label for="demo-form-radio">Electronics</label>
                                    </div>
                                    <div class="radio">
                                        <input id="demo-form-radio-2" class="magic-radio" type="radio"
                                               name="cat_radio">
                                        <label for="demo-form-radio-2">Fashion</label>
                                    </div>
                                    <div class="radio">
                                        <input id="demo-form-radio-3" class="magic-radio" type="radio"
                                               name="cat_radio">
                                        <label for="demo-form-radio-3">Real Estates</label>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="panel" style="margin-top: 20px;">
                    <div class="panel-heading">
                        <h3 class="panel-title">All Special Offers</h3>
                    </div>
                    <div class="panel-body">
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
</div>
<?php $this->load->view('templates/scripts'); ?>
</body>
</html>
