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
                    <h1 class="page-header text-overflow">Edit Footer</h1>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End page title-->
                <!--Breadcrumb-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Settings</a></li>
                    <li class="active">Edit Footer</li>
                </ol>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End breadcrumb-->
            </div>
            <!--Page content-->
            <!--===================================================-->

            <div id="page-content">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit Footer</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <span class="help-block">Each field supports pure text as well as html tags e.g &lt;a href="http://address.com" &gt;Your Link Here &lt;/a&gt;</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="edit_store_foot">Store Footer</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" rows="8" name="edit_store_foot">

                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="edit_admin_foot">Admin Footer</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" rows="8" name="edit_admin_foot">

                                    </textarea>
                                </div>
                            </div>
                            <div class="panel-footer text-center">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--===================================================-->
                <!--End page content-->

            </div>


        </div>

    </div>
    <!--MAIN NAVIGATION-->
    <!--===================================================-->
    <?php $this->load->view('templates/menu'); ?>
    <!--===================================================-->
    <!--END MAIN NAVIGATION-->

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
    <!--===================================================-->
    <!-- END OF CONTAINER -->
    <!--JAVASCRIPT-->
    <!--=================================================-->
</div>

<?php $this->load->view('templates/scripts'); ?>
</body>
</html>
