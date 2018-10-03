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
					<h1 class="page-header text-overflow">Root Category</h1>
				</div>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End page title-->
				<!--Breadcrumb-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Root Categories</a></li>
					<li class="active">Root Categories List</li>
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
                            <a class="btn btn-danger" style="color: #fff;" href="<?= base_url('categories/root_category/add')?>">Add New Root Category</a>
                        </div>
                    </div>
					<div class="panel-body">
                        <?php if( $this->uri->segment(3) && cleanit($this->uri->segment(3)) == 'add' ) : ?>
                            <?= form_open_multipart('', 'class="form-horizontal"'); ?>
                            <div class="form-group">
                                <label class="col-lg-3 control-label" for="">Root Category Name</label>
                                <div class="col-lg-7">
                                    <input type="text" name="name" class="form-control" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label" for="">Icon</label>
                                <div class="col-lg-7">
                                    <input type="text" name="icon" class="form-control" required placeholder="Eg fa-telephone : Get the icon from frontawesome.com"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label" for="">Title</label>
                                <div class="col-lg-7">
                                    <input type="text" name="title" class="form-control" placeholder="Buy phones and tablets">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label" for="">Description</label>
                                <div class="col-lg-7">
                                    <textarea name="description" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label" for="">Category Image</label>
                                <div class="col-lg-7">
                                    <input type="file" name="image" />
                                    <span style="margin-top:3px;" class="text-dark">Image should be a PNG, transparent with at most 500 X 300px</span>
                                </div>
                            </div>
                            <div class="panel-footer text-center">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                            <?= form_close(); ?>
                        <?php else : ?>
						    <table id="basic" class="table table-striped table-bordered" cellspacing="0"
							   width="100%">
							<thead>
							<tr>
                                <th>Image</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Action</th>
							</tr>
							</thead>
							<tbody>
                                <?php foreach($root_categories->result() as $root_category ) : ?>
                                    <tr>
                                        <td class="text-center">
                                            <img src="<?= base_url('data/settings/categories/' . $root_category->image); ?>" width="40" height="40px">
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= base_url('categories/root_category/' . $root_category->root_category_id); ?>"><?= ucwords($root_category->name)?></a>
                                        </td>
                                        <td>
                                            <?= $root_category->description; ?>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a class="btn btn-mint btn-active-mint" href="<?= base_url('categories/root_category_detail/' . $root_category->root_category_id); ?>">Edit</a>
                                                <button class="btn btn-danger btn-active-danger">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
							</tbody>
						</table>
                        <?php endif; ?>
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
