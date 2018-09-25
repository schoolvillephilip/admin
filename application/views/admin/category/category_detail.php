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
					<h1 class="page-header text-overflow">Home Audio / Video</h1>
				</div>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End page title-->
				<!--Breadcrumb-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Category</a></li>
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
						<h3 class="panel-title" style="font-weight: bold"><?= $category->name; ?></h3>
					</div>
					<div class="panel-body">
                        <?= form_open('', 'class="form-horizontal"'); ?>
							<div class="form-group">
								<label class="col-lg-3 control-label" for="">Root Category Name</label>
								<div class="col-lg-7">
                                    <select name="root_category_id" class="selectpicker"
                                            title="Select Root Category..." data-width="100%">
                                        <?php foreach($root_categories->result() as $root_category ){
                                            $selected = $root_category->root_category_id == $category->root_category_id ? 'selected' : '';
                                            echo '<option value="'.$root_category->root_category_id.'" '.$selected.'>'.$root_category->name.' </option>';
                                        }
                                        ?>
                                    </select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-3 control-label">Category Name</label>
								<div class="col-lg-7">
                                    <input type="text" name="name" value="<?= $category->name; ?>" required class="form-control"/>
								</div>
                            </div>
                            <input type="hidden" name="id" value="<?= $category->category_id; ?>">
                            <div class="panel-footer text-center">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        <?= form_close(); ?>
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
</body>

</html>
