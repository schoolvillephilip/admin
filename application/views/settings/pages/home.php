<?php $this->load->view('templates/meta_tags'); ?>
</head>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">
    <?php $this->load->view('templates/head_navbar'); ?>
    <div class="boxed">
        <div id="content-container">
            <div id="page-head">
                <div id="page-title">
                    <h1 class="page-header text-overflow">Homepage Settings</h1>
                </div>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Store Settings</a></li>
                    <li>Pages</li>
                    <li class="active">Homepage</li>
                </ol>
            </div>
            <div id="page-content">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Slider Settings</div>
                    </div>
                    <div class="panel-body">
                        <?= form_open('', 'class="form-horizontal"'); ?>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="">Product ID</label>
                            <div class="col-lg-7">
                                <input type="text" name="icon" class="form-control" required
                                       placeholder="Enter a product ID"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="">Slider Text</label>
                            <div class="col-lg-7">
                                <input type="text" name="icon" class="form-control" required
                                       placeholder="Enter slider text"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Slider button background color</label>
                            <div class="col-lg-7">
                                <select name="root_category" required class="selectpicker rootcat"
                                        title="Choose Color..."
                                        data-width="100%">
                                    <option value="">-- Choose color--</option>
                                    <option>Red</option>
                                    <option>Green</option>
                                    <option>White</option>
                                    <option>Yellow</option>
                                    <option>Black</option>
                                    <option>Cyan</option>
                                    <option>Orange</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Slider button color</label>
                            <div class="col-lg-7">
                                <select name="root_category" required class="selectpicker rootcat"
                                        title="Choose Color..."
                                        data-width="100%">
                                    <option value="">-- Choose color--</option>
                                    <option>Red</option>
                                    <option>Green</option>
                                    <option>White</option>
                                    <option>Yellow</option>
                                    <option>Black</option>
                                    <option>Cyan</option>
                                    <option>Orange</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="">Slider Images</label>
                            <div class="col-lg-7">
                                <div class="dz-max-files-reached"></div>
                                <div class="bord-top pad-ver">
									<span class="btn btn-success fileinput-button dz-clickable">
                                                                    <i class="fa fa-plus"></i>
                                                                    <span>Add files...</span>
                                                                </span>
                                    <div class="btn-group pull-right">
                                        <button id="dz-remove-btn" class="btn btn-danger cancel"
                                                type="reset" disabled="">
                                            <i class="demo-psi-trash"></i>
                                        </button>
                                    </div>
                                </div>
                                <div id="dz-previews">
                                    <div id="dz-template" class="pad-top bord-top">
                                        <div class="media">
                                            <div class="media-body">
                                                <div class="media-block">
                                                    <div class="media-left">
                                                        <img class="dz-img" data-dz-thumbnail>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-main text-bold mar-no text-overflow"
                                                           data-dz-name></p>
                                                        <span
                                                                class="dz-error text-danger text-sm"
                                                                data-dz-errormessage></span>
                                                        <p class="text-sm" data-dz-size></p>
                                                        <div id="dz-total-progress"
                                                             style="opacity:0">
                                                            <div
                                                                    class="progress progress-xs active"
                                                                    role="progressbar"
                                                                    aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    aria-valuenow="0">
                                                                <div
                                                                        class="progress-bar progress-bar-success"
                                                                        style="width:0%;"
                                                                        data-dz-uploadprogress></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="media-right">
                                                <button data-dz-remove
                                                        class="btn btn-xs btn-danger dz-cancel">
                                                    <i class="demo-psi-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span style="margin-top:3px;" class="text-dark">Image should be a PNG, with at most 500 X 300px</span>
                            </div>
                        </div>
                        <div class="panel-footer text-center">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                        <?= form_close(); ?>

                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Featured Images</div>
                    </div>
                    <div class="panel-body">
                        <?= form_open('', 'class="form-horizontal"'); ?>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="">Product ID</label>
                            <div class="col-lg-7">
                                <input type="text" name="icon" class="form-control" required
                                       placeholder="Enter a product ID"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="">Text</label>
                            <div class="col-lg-7">
                                <input type="text" name="icon" class="form-control" required
                                       placeholder="Enter slider text"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="">Featured Image</label>
                            <div class="col-lg-7">
                                <input type="file" name="image"/>
                                <span style="margin-top:3px;" class="text-dark">Image should be a PNG, with at most 500 X 300px</span>
                            </div>
                        </div>
                        <div class="panel-footer text-center">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                        <?= form_close(); ?>

                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Call To Action (CTA)</div>
                    </div>
                    <div class="panel-body">
                        <?= form_open('', 'class="form-horizontal"'); ?>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Position</label>
                            <div class="col-lg-7">
                                <select name="root_category" required class="selectpicker rootcat"
                                        title="Select Position on Page"
                                        data-width="100%">
                                    <option value="">-- Select Position on Page --</option>
                                    <option>Top</option>
                                    <option>Top Fixed</option>
                                    <option>Bottom</option>
                                    <option>Bottom Fixed</option>
                                    <option>Left</option>
                                    <option>Right</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="">Product ID</label>
                            <div class="col-lg-7">
                                <input type="text" name="icon" class="form-control"
                                       placeholder="Enter a product ID"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="">Url</label>
                            <div class="col-lg-7">
                                <input type="text" name="icon" class="form-control"
                                       placeholder="Enter Url"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="">Text</label>
                            <div class="col-lg-7">
                                <input type="text" name="icon" class="form-control" required
                                       placeholder="Enter slider text"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="">Featured Image</label>
                            <div class="col-lg-7">
                                <input type="file" name="image"/>
                                <span style="margin-top:3px;" class="text-dark">Image should be a PNG, with at most 500 X 300px</span>
                            </div>
                        </div>
                        <div class="panel-footer text-center">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                        <?= form_close(); ?>

                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Modals</div>
                    </div>
                    <div class="panel-body">
                        <?= form_open('', 'class="form-horizontal"'); ?>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Design Type</label>
                            <div class="col-lg-7">
                                <select name="root_category" required class="selectpicker rootcat"
                                        title="Select Position on Page"
                                        data-width="100%">
                                    <option value="">-- Design Type --</option>
                                    <option>Simple</option>
                                    <option>Single Spit</option>
                                    <option>Multiple</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="">Text</label>
                            <div class="col-lg-7">
                                <input type="text" name="icon" class="form-control" required
                                       placeholder="Enter slider text"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="">Featured Image</label>
                            <div class="col-lg-7">
                                <input type="file" name="image"/>
                                <span style="margin-top:3px;" class="text-dark">Image should be a PNG, with at most 500 X 300px</span>
                            </div>
                        </div>
                        <h5 class="text-center " style="margin: 20px">Modal Buttons</h5>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Slider button type</label>
                            <div class="col-lg-7">
                                <select name="button_type" required class="selectpicker rootcat"
                                        title="Button Type"
                                        data-width="100%">
                                    <option value="">-- Button Type --</option>
                                    <option>Rounded</option>
                                    <option>Boxed</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Slider button background color</label>
                            <div class="col-lg-7">
                                <select name="root_category" required class="selectpicker rootcat"
                                        title="Choose Color..."
                                        data-width="100%">
                                    <option value="">-- Choose color--</option>
                                    <option>Red</option>
                                    <option>Green</option>
                                    <option>White</option>
                                    <option>Yellow</option>
                                    <option>Black</option>
                                    <option>Cyan</option>
                                    <option>Orange</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="">Button Text</label>
                            <div class="col-lg-7">
                                <input type="text" name="btn_text" class="form-control"
                                       placeholder="Button Text"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="">Button Url</label>
                            <div class="col-lg-7">
                                <input type="text" name="btn_url" class="form-control"
                                       placeholder="Enter Url"/>
                            </div>
                        </div>

                        <div class="panel-footer text-center">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                        <?= form_close(); ?>

                    </div>
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
