<?php $this->load->view('templates/meta_tags'); ?>
<link href="<?= base_url('assets/plugins/bootstrap-select/bootstrap-select.min.css')?>" rel="stylesheet">
</head>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">
    <?php $this->load->view('templates/head_navbar'); ?>
    <div class="boxed">
        <div id="content-container">
            <div id="page-head">
                <div id="page-title">
                    <h1 class="page-header text-overflow">Brands</h1>
                </div>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Brands</a></li>
                    <li class="active">Brand List</li>
                </ol>
            </div>
            <div id="page-content">
                <div class="panel">
                    <?php $this->load->view('msg_view'); ?>
                    <div class="panel-heading">
                        <div class="panel-title">
                            <a class="btn btn-danger" style="color: #fff;" href="<?= base_url('brands/add') ?>">Add New
                                Brand</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <?= form_open_multipart('', 'class="form-horizontal"'); ?>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Brand Name</label>
                            <div class="col-lg-7">
                                <input type="text" name="brand_name" class="form-control" autofocus="" width="100%"
                                       required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Brand Image</label>
                            <div class="col-lg-7">
                                <input type="file" name="brand_image">
                            </div>
                        </div>

                        <<div class="form-group">
                            <label class="col-lg-3 control-label">Parent Category</label>
                            <div class="col-lg-7">
                                <select name="category[]" multiple class="selectpicker form-control"
                                        title="Choose Parent Category..."
                                        data-width="100%">
                                    <?php foreach ($categories as $category) :?>
                                        <option value="<?= $category->slug; ?>" ><?= $category->name; ?> </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="">Brand Description</label>
                            <div class="col-lg-7">
                                <textarea name="description" class="form-control" rows="3"
                                          placeholder="Enter brand description"></textarea>
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
<script src="<?= base_url('assets/plugins/bootstrap-select/bootstrap-select.min.js'); ?>"></script>
</body>
</html>
