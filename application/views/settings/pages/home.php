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
            <?php $this->load->view('msg_view'); ?>
            <div id="page-content">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Slider Settings</div>
                    </div>
                    <div class="panel-body">
                        <?= form_open_multipart('', 'class="form-horizontal"'); ?>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Where to be linked to</label>
                                <div class="col-lg-7">
                                    <input type="text" name="url" class="form-control" required placeholder="Enter the Url for the slider">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Slider Image</label>
                                <div class="col-lg-7">
                                    <input type="file" name="slider_image" class="" required />
                                </div>
                            </div>
                            <input type="hidden" name="process_type" value="upload_slider_image">
                            <div class="panel-footer text-center">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        <?= form_close(); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Slider Position</th>
                                            <th>Slider URL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>4</td>
                                            <td><a class="btn-link">hjsjsjss</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">Featured Images</div>
                    </div>
                    <div class="panel-body">
                        <?= form_open('', 'class="form-horizontal"'); ?>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" >Product ID</label>
                            <div class="col-lg-7">
                                <input type="text" name="icon" class="form-control" required
                                       placeholder="Enter a product ID"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label" >Text</label>
                            <div class="col-lg-7">
                                <input type="text" name="icon" class="form-control" required
                                       placeholder="Enter slider text"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" >Featured Image</label>
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
                        <?= form_open_multipart('settings/process', 'class="form-horizontal"'); ?>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Position</label>
                                <div class="col-lg-7">
                                    <select name="position" required class="selectpicker rootcat"
                                            title="Select Position on Page"
                                            data-width="100%">
                                        <option value="">-- Select Position on Page --</option>
                                        <option value="top">Top</option>
                                        <option value="top_fixed">Top Fixed</option>
                                        <option value="bottom">Bottom</option>
                                        <option value="bottom_fixed">Bottom Fixed</option>
                                        <option value="left">Left</option>
                                        <option value="right">Right</option>
                                        <option value="first_banner">First Banner</option>
                                        <option value="second_banner">Second Banner</option>
                                        <option value="third_banner">Third Banner</option>
                                        <option value="fourth_banner">Fourth Banner</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Url</label>
                                <div class="col-lg-7">
                                    <input type="text" name="icon" class="form-control"
                                           placeholder="Enter Url"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label" >Featured Image</label>
                                <div class="col-lg-7">
                                    <input type="file" name="cta_image" required/>
                                    <span style="margin-top:3px;" class="text-dark">Image should be a PNG, with at most 500 X 300px</span>
                                </div>
                            </div>
                            <input type="hidden" name="process_type" value="call_to_action"
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
                        <?= form_open_multipart('settings/process', 'class="form-horizontal"'); ?>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Design Type</label>
                            <div class="col-lg-7">
                                <select name="design_type" required class="selectpicker rootcat"
                                        title="Select Position on Page"
                                        data-width="100%">
                                    <option value="">-- Design Type --</option>
                                    <option value="simple">Simple</option>
                                    <option value="single_split"> Single Spit</option>
                                    <option value="multiple">Multiple</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" >Text</label>
                            <div class="col-lg-7">
                                <input type="text" name="modal_text" class="form-control" required
                                       placeholder="Enter Modal text"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" >Featured Image</label>
                            <div class="col-lg-7">
                                <input type="file" name="modal_image" />
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
                                    <option value="rounded">Rounded</option>
                                    <option value="boxed">Boxed</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Slider button background color</label>
                            <div class="col-lg-7">
                                <select name="background_colour" required class="selectpicker rootcat"
                                        title="Choose Color..."
                                        data-width="100%">
                                    <option value="">-- Choose color--</option>
                                    <option value="red">Red</option>
                                    <option value="green">Green</option>
                                    <option value="white">White</option>
                                    <option value="yellow">Yellow</option>
                                    <option value="black">Black</option>
                                    <option value="cyan">Cyan</option>
                                    <option value="orange">Orange</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label" >Button Text</label>
                            <div class="col-lg-7">
                                <input type="text" name="btn_text" class="form-control"
                                       placeholder="Button Text"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label" >Button Url</label>
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
<script>
</script>
</body>
</html>
