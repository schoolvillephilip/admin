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
					<h1 class="page-header text-overflow">Specification</h1>
				</div>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End page title-->
				<!--Breadcrumb-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Specification</a></li>
					<li class="active">Specifications List</li>
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
                            <a class="btn btn-danger" style="color: #fff;" href="<?= base_url('categories/specification/add')?>">Add New Specification</a>
                        </div>
					</div>
					<div class="panel-body">
                        <?php if($this->uri->segment(3) && cleanit($this->uri->segment(3)) == 'add') : ?>
                            <?= form_open('', 'class="form-horizontal"'); ?>
                            <div class="form-group">
                                <label class="col-lg-3 control-label" for="">Specification
                                    Name</label>
                                <div class="col-lg-7">
                                    <input type="text" name="spec_name" class="form-control" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Specification Options?</label>
                                <div class="col-lg-7">
                                    <input id="has_option" type='checkbox' title="Does this have option" >
                                </div>
                            </div>
                            <div id="has_option">
                                <div id="options" style="display: none;">
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Options</label>
                                        <div class="col-lg-7">
                                            <input type="text" class="form-control" name="options" placeholder="type the options separated by comma (,)">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Should this have multiple select?</label>
                                        <div class="col-lg-7">
                                            <input id="multiple" name="multiple" type='checkbox' title="Allow multiple select" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label" for="description">Description</label>
                                <div class="col-lg-7">
                                    <textarea class="form-control" name="description"></textarea>
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
								<th>Specification Name</th>
								<th class="min-tablet">Description</th>
								<th class="min-tablet">Options</th>
								<th class="min-tablet">Action</th>
							</tr>
							</thead>
							<tbody>
                                <?php foreach($specifications->result() as $specification ) : ?>
                                    <tr>
                                        <td><a href="<?= base_url('categories/specification_detail/' . $specification->id); ?>"><?= $specification->spec_name; ?></a></td>
                                        <td><?= $specification->description; ?></td>
                                        <td>
                                            <?php
                                                $options = json_decode($specification->options);
                                                if( !is_null($options) )
                                                    foreach( $options as $option ) echo $option .' ,'
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= base_url('categories/specification_detail/' . $specification->id);?>" class="btn btn-mint btn-active-mint">Edit</a>
                                            <button class="btn btn-danger btn-active-danger">Delete</button>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
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
<script>
    $(document).ready(function(){
        $('#has_option').change(function(){
            if(this.checked){
                $('#options').fadeIn('slow');
                $('#options_field').attr('required', true);
            }else{
                $('#options').fadeOut('slow');
            }

        });
    });
</script>
</body>
</html>
