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
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories List</a></li>
					<li class="active">Home Audio / Video</li>
				</ol>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End breadcrumb-->
			</div>
			<!--Page content-->
			<!--===================================================-->
			<div id="page-content">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title" style="font-weight: bold">Home Audio / Video</h3>
					</div>
					<div class="panel-body">
						<form class="form-horizontal">
							<div class="form-group">
								<label class="col-lg-3 control-label" for="demo-hor-inputemail">Name</label>
								<div class="col-lg-7">
									<input type="text" value="Home Audio / Video" id="demo-hor-inputemail"
										   class="form-control"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-3 control-label">Root Category</label>
								<div class="col-lg-7">
									<select name="features[]" class="selectpicker" multiple
											title="Choose features..." data-width="100%">
										<option selected="selected" name="electronics">Electronics</option>
										<option name="fashion">Fashion</option>
									</select>
								</div>


					</div>
					<div class="panel-footer text-center">
						<button class="btn btn-primary" type="submit">Submit</button>
					</div>

					</form>
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
