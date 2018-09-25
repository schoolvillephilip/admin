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
					<h1 class="page-header text-overflow">New Sub Category</h1>
				</div>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End page title-->
				<!--Breadcrumb-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Sub Categories</a></li>
					<li><a href="#">Sub Categories List</a></li>
					<li class="active"><?= $sub_detail->name; ?></li>
				</ol>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End breadcrumb-->
			</div>
			<!--Page content-->
			<!--===================================================-->
			<div id="page-content">
				<div class="panel">
					<div class="panel-heading">
                        <?php $this->load->view('msg_view'); ?>
						<h3 class="panel-title" style="font-weight: bold"> &nbsp;</h3>
					</div>
					<div class="panel-body">
                        <?= form_open('', 'class="form-horizontal"'); ?>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Root Category</label>
                                <div class="col-lg-7">
                                    <select name="root_category" required class="selectpicker rootcat"
                                            title="Choose Root Category..."
                                            data-width="100%">
                                        <?php foreach($root_categories->result() as $root_category ) :
                                            $selected = ($root_category->root_category_id == $sub_detail->root_category_id) ? 'selected' : '';
                                        ?>
                                            <option value="<?= $root_category->root_category_id; ?>" <?= $selected ;?> ><?= $root_category->name; ?></option>';
                                        <?php endforeach; ?>
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Category</label>
                                <div class="col-lg-7">
                                    <select name="category" required class="form-control subcat" title="Choose Category..."
                                            data-width="100%">
                                        <?php foreach($categories->result() as $category ) :
                                            $selected = ($category->category_id == $sub_detail->category_id) ? 'selected' : '';
                                            ?>
                                            <option value="<?= $category->category_id; ?>" <?= $selected?> ><?= $category->name; ?></option>';
                                        <?php endforeach; ?>
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label" for="name">Name</label>
                                <div class="col-lg-7">
                                    <input type="text" required name="name" placeholder="Sub category name"
                                           class="form-control" value="<?= $sub_detail->name; ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label" for="specification">Specifications</label>
                                <div class="col-lg-7">
                                    <span class="text-dark" style="margin: 4px; padding-bottom: 5px;"><a href="<?= base_url('categories/specification/add'); ?>">Click to create new specification, if not found below.</a> </span><br /><br />
                                    <?php foreach($specifications->result() as $specification ) :
                                            $specs = json_decode( $sub_detail->specifications );
                                            $checked = (!is_null($specs) && in_array($specification->id, $specs) ) ? 'checked' : '';
                                        ?>
                                        <span style="margin-right: 5px;">
                                            <input type="checkbox" name="specifications[]" value="<?= $specification->id; ?>" <?= $checked; ?> >
                                                <?= $specification->spec_name; ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?= $sub_detail->sub_category_id; ?>">
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
