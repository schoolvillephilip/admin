<?php $this->load->view('templates/meta_tags'); ?>
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
					<h1 class="page-header text-overflow">Features</h1>
				</div>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End page title-->
				<!--Breadcrumb-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Specification</a></li>
					<li><a href="#">Specification List</a></li>
					<li class="active">Features</li>
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
						<h3 class="panel-title" style="font-weight: bold">Features</h3>
					</div>
                    <div class="panel-body">
                        <?php if( empty($specification) ) : ?>
                            <div class="alert alert-info">Sorry the specification you are looking for does not exist.</div>
                        <?php else : ?>
                            <?= form_open('', 'class="form-horizontal"'); ?>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label" for="">Specification
                                        Name</label>
                                    <div class="col-lg-7">
                                        <input type="text" name="spec_name" class="form-control" value="<?= $specification->spec_name; ?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Multiple
                                        Options?</label>
                                    <div class="col-lg-7">
                                        <input id="has_option" type='checkbox' title="Does this have option" <?php if(!empty($specification->options)) echo 'checked'?> >
                                    </div>
                                </div>
                                <div id="has_option">
                                    <div id="options" <?php if(empty($specification->options)) echo 'style="display:none;"'?> >
                                        <div class="form-group">
                                            <label class="col-lg-3 control-label">Options</label>
                                            <div class="col-lg-7">
                                                <?php
                                                $value = '';
                                                $options = json_decode($specification->options);
                                                if( !empty($options)) foreach ( $options as $option ) $value .= $option .', ';
                                                ?>
                                                <input type="text" class="form-control" name="options" value="<?= $value; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label">Should this have multiple select?</label>
                                                <div class="col-lg-7">
                                                    <input id="multiple" name="multiple" type='checkbox' <?php if( $specification->multiple_options) echo 'checked'; ?> title="Allow multiple select" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label" for="">Description</label>
                                    <div class="col-lg-7">
                                        <textarea class="form-control" name="description"><?= $specification->description; ?></textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?= $specification->id; ?>">
                                <div class="panel-footer text-center">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                    <button class="btn btn-info" type="button" onclick="history.back()">Go Back</button>
                                </div>

                            <?= form_close(); ?>
                        <?php endif; ?>
					</div>
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
