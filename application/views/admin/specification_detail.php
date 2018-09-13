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
					<div class="panel-heading">
						<h3 class="panel-title" style="font-weight: bold">Features</h3>
					</div>
					<div class="panel-body">
						<form class="form-horizontal">
							<div class="form-group">
								<label class="col-lg-3 control-label" for="demo-hor-inputemail">Specification
									Name</label>
								<div class="col-lg-7">
									<input type="text" value="Feature" id="demo-hor-inputemail"
										   class="form-control"/>
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label">Options</label>
								<div class="col-lg-7">
									<select name="type[]" class="selectpicker" multiple title="Choose a type..."
											data-width="100%">
										<option selected="selected" name="ceramics">3D</option>
										<option name="glass">3G</option>
										<option name="leather">4G</option>
										<option selected="selected" name="metal">blacklit keyboard</option>
										<option name="natural fibre">bluray</option>
										<option name="plume">bluetooth</option>
										<option selected="selected" name="resin">cdma</option>
										<option name="silicon">camera</option>
										<option selected="selected" name="stone">cordless</option>
										<option name="synthetic">dvd</option>
										<option name="textile">dvd rw</option>
										<option name="wood">dual core</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label" for="demo-hor-inputemail">Description</label>
								<div class="col-lg-7">
									<textarea class="form-control">Select the features of the product</textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="col-lg-3 control-label" for="demo-hor-inputemail">Multiple
									Options?</label>
								<div class="col-lg-7"><input id="1" type='checkbox'
															 name='color'
															 title="select this item"
															 checked
															 value="1">
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
