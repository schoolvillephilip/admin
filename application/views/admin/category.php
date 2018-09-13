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
                        <h1 class="page-header text-overflow">Category</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->
                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="demo-pli-home"></i></a></li>
                        <li><a href="#">Category</a></li>
                        <li class="active">Category List</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->
                </div>
                <!--Page content-->
                <!--===================================================-->
				<div id="page-content">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title" style="font-weight: bold">Category</h3>
						</div>
						<div class="panel-body">
							<table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0"
								   width="100%">
								<thead>
								<tr>
									<th>Name</th>
									<th class="min-tablet">Date Created</th>
									<th class="min-tablet">Action</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td><a href="<?= base_url('categories/category_detail'); ?>">Home Audio / Video</a></td>
									<td>2018-08-24 21:20:30</td>
									<td><input id="1" type='checkbox' name='featured_image' title="select this item"
											   value="1"></td>
								</tr>
								<tr>
									<td>Men Wears</td>
									<td>2018-08-24 21:23:40</td>
									<td><input id="2" type='checkbox' name='featured_image' title="select this item"
											   value="2"></i></td>
								</tr>
								<tr>
									<td>Tablet Phones</td>
									<td>2018-08-24 21:23:59</td>
									<td><input id="3" type='checkbox' name='featured_image' title="select this item"
											   value="3"></i></td>
								</tr>
								<tr>
									<td>Graphics Design</td>
									<td>2018-08-27 11:15:54</td>
									<td><input id="4" type='checkbox' name='featured_image' title="select this item"
											   value="4"></i></td>
								</tr>
								<tr>
									<td>Ladies Wears</td>
									<td>2018-08-27 11:15:54</td>
									<td><input id="5" type='checkbox' name='featured_image' title="select this item"
											   value="5"></i></td>
								</tr>
								</tbody>
							</table>
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
