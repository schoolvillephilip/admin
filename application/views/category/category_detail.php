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
					<li><a href="#">Category</a></li>
					<li><a href="#">Category Detail</a></li>
					<li class="active"><?= $category->name; ?></li>
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
						<h3 class="panel-title" style="font-weight: bold">Editing <?= $category->name; ?></h3>
					</div>
					<div class="panel-body">
                        <?= form_open_multipart('', 'class="form-horizontal"');?>
                            <div class="form-group">
                                <label class="col-lg-3 control-label" for="">Parent Category Name</label>
                                <div class="col-lg-7">
                                    <select name="pid" class="selectpicker form-control"
											title="Choose Parent Category..."
											data-width="100%">
                                    	<?php foreach ($categories as $cat) : ?>
                                    		<option value="<?= $cat->id; ?>" <?php if($cat->id == $category->pid) echo 'selected'; ?>><?= $cat->name ?></option> ?>
                                    	<?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label" for="">Icon</label>
                                <div class="col-lg-7">
                                    <input type="text" name="icon" class="form-control" value="<?= $category->icon; ?>" required placeholder="Eg fa-telephone : Get the icon from frontawesome.com"/>
                                </div>
                            </div>
                            <div class="form-group">
                            	<label class="col-lg-3 control-label" for="">Category name</label>
                            	<div class="col-lg-7">
                            		<input type="text" name="name" class="form-control" value="<?= $category->name; ?>" placeholder="Electronics">
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
                                    <?php if( !empty($category->image) ): ?>
                                	<span class="">
                                        <img src="<?= base_url('data/settings/categories/'. $category->image);?>" width="40" height="40">
                                    </span>
                                	<?php endif; ?>
                                    <input type="file" name="image" />
                                    <span style="margin-top:3px;" class="text-dark">Change Image? Image should be a PNG, transparent with at most 500 X 300px</span>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?= $category->id; ?>" >
                            <input type="hidden" name="img" value="<?= $category->image; ?>">
							<div class="panel-footer text-center">
								<button class="btn btn-primary" type="submit">Update</button>
								<a href="<?= base_url('categories'); ?>" class="btn btn-danger"> Go Back To All Categories</a>
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
