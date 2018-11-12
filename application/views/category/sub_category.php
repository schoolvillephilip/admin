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
					<h1 class="page-header text-overflow">SubCategory</h1>
				</div>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End page title-->
				<!--Breadcrumb-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">SubCategory</a></li>
					<li class="active">Sub Category List</li>
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
                            <a class="btn btn-danger" style="color: #fff;" href="<?= base_url('categories/sub_category/add')?>">Add New Specification</a>
                        </div>
                    </div>
					<div class="panel-body">
						<?php if( $this->uri->segment(3) && cleanit($this->uri->segment(3)) == 'add') : ?>
                            <?= form_open('', 'class="form-horizontal"'); ?>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Root Category</label>
                                    <div class="col-lg-7">
                                        <select name="root_category" required class="selectpicker rootcat"
                                                title="Choose Root Category..."
                                                data-width="100%">
                                            <?php foreach($root_categories->result() as $root_category ) echo '<option value="'.$root_category->root_category_id.'">'.$root_category->name.' </option>'; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Category</label>
                                    <div class="col-lg-7">
                                        <select name="category" required class="form-control subcat" title="Choose Category..."
                                                data-width="100%">
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label" for="name">Name</label>
                                    <div class="col-lg-7">
                                        <input type="text" required name="name" placeholder="Sub category name"
                                               class="form-control"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label" for="specification">Specifications</label>
                                    <div class="col-lg-7">
                                        <span class="text-dark" style="margin: 4px; padding-bottom: 5px;"><a href="<?= base_url('categories/specification/add'); ?>">Click to create new specification, if not found below.</a> </span><br /><br />
                                        <?php foreach($specifications->result() as $specification ) : ?>
                                        <span style="margin-right: 5px;">
                                            <input type="checkbox" name="specifications[]" value="<?= $specification->id; ?>"> <?= $specification->spec_name; ?>
                                        </span>
                                        <?php endforeach; ?>
                                    </div>

                                </div>
                                <div class="panel-footer text-center">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>

                            <?= form_close(); ?>
                        <?php else : ?>
                            <table id="basic" class="table table-striped table-bordered" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th></th>
                                <th class="text-center">Name</th>
                                <th class="min-tablet text-center">Date Created</th>
                                <th class="min-tablet text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($sub_categories->result() as $category ) : ?>
                            <tr>
                                <td class="text-center"><input id="1" type='checkbox' title="select this item"
                                                               value="1"></i></td>
                                <td class="text-center">
                                    <a href="<?= base_url('categories/sub_category_detail/' . $category->sub_category_id); ?>"><?= ucwords($category->name)?></a>
                                </td>
                                <td class="text-center"><?= neatDate($category->created_at); ?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a class="btn btn-mint btn-active-mint" href="<?= base_url('categories/sub_category_detail/'. $category->sub_category_id);?>">Edit</a>
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
    $('.rootcat').change(function ($x) {
        $(".subcat").empty();
        let id = $(this).val();
        $.ajax({
            method: "POST",
            url: base_url + 'categories/append_category',
            data: { id: id },
            dataType: 'json'
        }).done(function( msg ) {
            $(".subcat").append("<option>-- Please select a category --</option>");
            $(msg).each(function(i){
                $(".subcat").append("<option value=" +msg[i].category_id+ ">" +msg[i].name+ "</option>")
            });
        });
    });
</script>
</body>
</html>
