<?php $this->load->view('templates/meta_tags'); ?>
<link href="<?= base_url('assets/plugins/datatables/media/css/dataTables.bootstrap.css'); ?>" rel="stylesheet">
<link href="<?= base_url('assets/plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css'); ?>" rel="stylesheet">
</head>
<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        
        <!--NAVBAR-->
        <!--===================================================-->
        <?php $this->load->view('templates/head_navbar'); ?>
        <!--===================================================-->
        <!--END NAVBAR-->

        <div class="boxed">

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Brands</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->
                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="demo-pli-home"></i></a></li>
                        <li><a href="#">Brands</a></li>
                        <li class="active">Brand <?= $brand->brand_name; ?></li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->
                </div>
                <!--Page content-->
                <!--===================================================-->
				<div id="page-content">
					<div class="panel">
                        <?php $this->load->view('msg_view'); ?>
						<div class="panel-heading">
                            <div class="panel-title">
                                <strong>Editing <?= $brand->brand_name; ?></strong>
                            </div>
						</div>
						<div class="panel-body">
                            <?= form_open('brands/process', 'class="form-horizontal"'); ?>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Brand Name</label>
                                    <div class="col-lg-7">
                                        <input type="text" name="brand_name" class="form-control" autofocus="" value="<?= $brand->brand_name; ?>" width="100%" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label" for="">Brand Description</label>
                                    <div class="col-lg-7">
                                        <textarea name="description" class="form-control" rows="3" placeholder="Enter brand description"><?= $brand->description; ?></textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?= $brand->id; ?>">
                                <div class="panel-footer text-center">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            <?= form_close(); ?>
						</div>
					</div>
				</div>
                <!--===================================================-->
                <!--End page content-->

            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->



            <!--ASIDE-->
            <!--===================================================-->
            <?php $this->load->view('templates/aside_menu'); ?>
            <!--===================================================-->
            <!--END ASIDE-->

            <!--MAIN NAVIGATION-->
            <!--===================================================-->
            <?php $this->load->view('templates/menu'); ?>
            <!--===================================================-->
            <!--END MAIN NAVIGATION-->

        </div>


        <!-- FOOTER -->
        <!--===================================================-->
        <?php $this->load->view('templates/footer'); ?>
        <!--===================================================-->
        <!-- END FOOTER -->


        <!-- SCROLL PAGE BUTTON -->
        <!--===================================================-->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
        <!--===================================================-->
    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->
    <!--JAVASCRIPT-->
    <!--=================================================-->


    <?php $this->load->view('templates/scripts'); ?>
    <script src="<?= base_url('assets/plugins/datatables/media/js/jquery.dataTables.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables/media/js/dataTables.bootstrap.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js'); ?>"></script>
    <script>
        $(document).ready(function (x) {
            $('#basic').dataTable( {
                "responsive": true,
                "language": {
                    "paginate": {
                        "previous": '<i class="demo-psi-arrow-left"></i>',
                        "next": '<i class="demo-psi-arrow-right"></i>'
                    }
                }
            } );
        });
    </script>

</body>

</html>
