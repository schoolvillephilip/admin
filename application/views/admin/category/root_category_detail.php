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
					<h1 class="page-header text-overflow">Fashion</h1>
				</div>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End page title-->
				<!--Breadcrumb-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Root Categories</a></li>
					<li><a href="#">Root Categories List</a></li>
					<li class="active">Fashion</li>
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
						<h3 class="panel-title" style="font-weight: bold">Editing <?= $category->name; ?> root category</h3>
					</div>
					<div class="panel-body">
                        <?= form_open_multipart('', 'class="form-horizontal"');?>
                            <div class="form-group">
                                <label class="col-lg-3 control-label" for="">Root Category Name</label>
                                <div class="col-lg-7">
                                    <input type="text" name="name" class="form-control" value="<?= $category->name;?>" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label" for="">Icon</label>
                                <div class="col-lg-7">
                                    <input type="text" name="icon" class="form-control" value="<?= $category->icon; ?>" required placeholder="Eg fa-telephone : Get the icon from frontawesome.com"/>
                                </div>
                            </div>
                            <div class="form-group">
                            	<label class="col-lg-3 control-label" for="">Title</label>
                            	<div class="col-lg-7">
                            		<input type="text" name="title" class="form-control" value="<?= $category->title?>" placeholder="Buy phones and tablets">
                            	</div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label" for="">Description</label>
                                <div class="col-lg-7">
                                    <textarea name="description" class="form-control"><?= $category->description; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label" for="">Category Image</label>
                                <div class="col-lg-7">
                                    <span class="">
                                        <img src="<?= base_url('data/settings/categories/'. $category->image);?>" width="40" height="40">
                                    </span>
                                    <input type="file" name="image" />
                                    <span style="margin-top:3px;" class="text-dark">Change Image? Image should be a PNG, transparent with at most 500 X 300px</span>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?= $category->root_category_id; ?>" >
                            <input type="hidden" name="img" value="<?= $category->image; ?>">
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
