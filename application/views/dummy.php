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
                    <h1 class="page-header text-overflow">Product</h1>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End page title-->
                <!--Breadcrumb-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><?= get_root_category_name($this->session->userdata('rootcategory')); ?></li>
                    <li><?= get_category_name($this->session->userdata('category')); ?></li>
                    <li class="active"><?= get_subcategory_name($this->session->userdata('subcategory')); ?></li>
                </ol>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End breadcrumb-->
            </div>
            <!--Page content-->
            <!--===================================================-->
            <div id="page-content">

                <div class="row">
                    <div class="panel">
                        <div id="demo-bv-wz" class="pad-btm" style="margin-bottom: 30px">
                            <div class="wz-heading pad-top">
                                <!--Nav-->
                                <ul class="row wz-step wz-icon-bw wz-nav-off mar-top">
                                    <li class="col-xs-3">
                                        <a data-toggle="tab" href="#tab1">
                                            <span class="text-danger text-2x"><i class="fas fa-bookmark"></i></span>
                                            <p class="text-semibold mar-no">Basic Information</p>
                                        </a>
                                    </li>
                                    <li class="col-xs-3">
                                        <a data-toggle="tab" href="#tab2">
                                            <span class="text-warning text-2x"><i class="fab fa-product-hunt"></i></span>
                                            <p class="text-semibold mar-no">Product Specification & Attributes</p>
                                        </a>
                                    </li>
                                    <li class="col-xs-3">
                                        <a data-toggle="tab" href="#tab3">
                                            <span class="text-info text-2x"><i class="fas fa-money-check"></i></span>
                                            <p class="text-semibold mar-no">Product Pricing</p>
                                        </a>
                                    </li>
                                    <li class="col-xs-3">
                                        <a data-toggle="tab" href="#tab4">
                                            <span class="text-success text-2x"><i class="fas fa-images"></i></span>
                                            <p class="text-semibold mar-no">Image</p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!--progress bar-->
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-primary"></div>
                            </div>
                            <?= form_open_multipart('product/process', 'id="" class="form-horizontal"')?>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <!-- Tab1 -->
                                    <div id="tab1" class="tab-pane">
                                        <div id="demo-accordion" class="panel-group accordion">
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-parent="#demo-accordion" data-toggle="collapse" href="#general-description">
                                                            General Information
                                                        </a>
                                                    </h4>
                                                </div>
                                                <!--accordion-content-->
                                                <div class="panel-collapse collapse" id="general-description">
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Product Name *</label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control" required name="product_name" placeholder="Product name">
                                                                <span class="text-sm text-dark">Name of the product. For a better listing quality, the name should consist the actual product name, if available colour, edition, speciality</span>
                                                                <span class="text-sm text-dark">Wide Angle Camera 10 MP - Black, Galaxy Tab A Leather Flip Case - Red</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Brand Name *</label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control" required name="brand_name" placeholder="Eg: Apple, Chanel, Random House. Add under ''Generic'' brand if your product is unbranded.">
                                                                <span class="text-sm text-dark">Brand of the product. If brand does not exist, please copy https://goo.gl/Hw8vma into your browser and fill accordingly.</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Model</label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control" required name="model" placeholder="Eg:  iPhone 4S Samsung TV 4T">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Main Colour</label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control" name="main_colour" placeholder="Eg: royal blue, mint green, Peach red">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-parent="#demo-accordion" data-toggle="collapse" href="#product-specification">
                                                            Product Specification
                                                        </a>
                                                    </h4>
                                                </div>
                                                <!--accordion-content-->
                                                <div class="panel-collapse collapse" id="product-specification">
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Product Description </label>
                                                            <div class="col-lg-7">
                                                                <textarea placeholder="Product description" data-provide="markdown" rows="8" name="product_description" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">YouTube ID</label>
                                                            <div class="col-lg-7">
                                                                <input type="email" class="form-control" name="youtube_id" placeholder="YouTube ID">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">What's in the box?</label>
                                                            <div class="col-lg-7">
                                                                <textarea placeholder="Any information in the box" data-provide="markdown" name="in_the_box" rows="8" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Note</label>
                                                            <div class="col-lg-7">
                                                                <textarea placeholder="Additional info" name="note" data-provide="markdown" rows="8" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- tab1 ends -->

                                    <!-- Tab2 -->
                                    <div id="tab2" class="tab-pane">
                                        <div id="demo-accordion" class="panel-group accordion">
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-parent="#demo-accordion" data-toggle="collapse" href="#general-description">
                                                            General Information
                                                        </a>
                                                    </h4>
                                                </div>
                                                <!--accordion-content-->
                                                <div class="panel-collapse collapse" id="general-description">
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Product Name *</label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control" required name="product_name" placeholder="Product name">
                                                                <span class="text-sm text-dark">Name of the product. For a better listing quality, the name should consist the actual product name, if available colour, edition, speciality</span>
                                                                <span class="text-sm text-dark">Wide Angle Camera 10 MP - Black, Galaxy Tab A Leather Flip Case - Red</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Brand Name *</label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control" required name="brand_name" placeholder="Eg: Apple, Chanel, Random House. Add under ''Generic'' brand if your product is unbranded.">
                                                                <span class="text-sm text-dark">Brand of the product. If brand does not exist, please copy https://goo.gl/Hw8vma into your browser and fill accordingly.</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Model</label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control" required name="model" placeholder="Eg:  iPhone 4S Samsung TV 4T">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Main Colour</label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control" name="main_colour" placeholder="Eg: royal blue, mint green, Peach red">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-parent="#demo-accordion" data-toggle="collapse" href="#product-specification">
                                                            Product Specification
                                                        </a>
                                                    </h4>
                                                </div>
                                                <!--accordion-content-->
                                                <div class="panel-collapse collapse" id="product-specification">
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Product Description </label>
                                                            <div class="col-lg-7">
                                                                <textarea placeholder="Product description" data-provide="markdown" rows="8" name="product_description" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">YouTube ID</label>
                                                            <div class="col-lg-7">
                                                                <input type="email" class="form-control" name="youtube_id" placeholder="YouTube ID">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">What's in the box?</label>
                                                            <div class="col-lg-7">
                                                                <textarea placeholder="Any information in the box" data-provide="markdown" name="in_the_box" rows="8" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Note</label>
                                                            <div class="col-lg-7">
                                                                <textarea placeholder="Additional info" name="note" data-provide="markdown" rows="8" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- tab2 ends -->

                                    <!-- Tab2 -->
                                    <div id="tab3" class="tab-pane">
                                        <div id="demo-accordion" class="panel-group accordion">
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-parent="#demo-accordion" data-toggle="collapse" href="#general-description">
                                                            General Information
                                                        </a>
                                                    </h4>
                                                </div>
                                                <!--accordion-content-->
                                                <div class="panel-collapse collapse" id="general-description">
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Product Name *</label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control" required name="product_name" placeholder="Product name">
                                                                <span class="text-sm text-dark">Name of the product. For a better listing quality, the name should consist the actual product name, if available colour, edition, speciality</span>
                                                                <span class="text-sm text-dark">Wide Angle Camera 10 MP - Black, Galaxy Tab A Leather Flip Case - Red</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Brand Name *</label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control" required name="brand_name" placeholder="Eg: Apple, Chanel, Random House. Add under ''Generic'' brand if your product is unbranded.">
                                                                <span class="text-sm text-dark">Brand of the product. If brand does not exist, please copy https://goo.gl/Hw8vma into your browser and fill accordingly.</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Model</label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control" required name="model" placeholder="Eg:  iPhone 4S Samsung TV 4T">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Main Colour</label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control" name="main_colour" placeholder="Eg: royal blue, mint green, Peach red">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-parent="#demo-accordion" data-toggle="collapse" href="#product-specification">
                                                            Product Specification
                                                        </a>
                                                    </h4>
                                                </div>
                                                <!--accordion-content-->
                                                <div class="panel-collapse collapse" id="product-specification">
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Product Description </label>
                                                            <div class="col-lg-7">
                                                                <textarea placeholder="Product description" data-provide="markdown" rows="8" name="product_description" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">YouTube ID</label>
                                                            <div class="col-lg-7">
                                                                <input type="email" class="form-control" name="youtube_id" placeholder="YouTube ID">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">What's in the box?</label>
                                                            <div class="col-lg-7">
                                                                <textarea placeholder="Any information in the box" data-provide="markdown" name="in_the_box" rows="8" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Note</label>
                                                            <div class="col-lg-7">
                                                                <textarea placeholder="Additional info" name="note" data-provide="markdown" rows="8" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- tab2 ends -->

                                    <!-- Tab2 -->
                                    <div id="tab4" class="tab-pane">
                                        <div id="demo-accordion" class="panel-group accordion">
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-parent="#demo-accordion" data-toggle="collapse" href="#general-description">
                                                            General Information
                                                        </a>
                                                    </h4>
                                                </div>
                                                <!--accordion-content-->
                                                <div class="panel-collapse collapse" id="general-description">
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Product Name *</label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control" required name="product_name" placeholder="Product name">
                                                                <span class="text-sm text-dark">Name of the product. For a better listing quality, the name should consist the actual product name, if available colour, edition, speciality</span>
                                                                <span class="text-sm text-dark">Wide Angle Camera 10 MP - Black, Galaxy Tab A Leather Flip Case - Red</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Brand Name *</label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control" required name="brand_name" placeholder="Eg: Apple, Chanel, Random House. Add under ''Generic'' brand if your product is unbranded.">
                                                                <span class="text-sm text-dark">Brand of the product. If brand does not exist, please copy https://goo.gl/Hw8vma into your browser and fill accordingly.</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Model</label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control" required name="model" placeholder="Eg:  iPhone 4S Samsung TV 4T">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Main Colour</label>
                                                            <div class="col-lg-7">
                                                                <input type="text" class="form-control" name="main_colour" placeholder="Eg: royal blue, mint green, Peach red">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-parent="#demo-accordion" data-toggle="collapse" href="#product-specification">
                                                            Product Specification
                                                        </a>
                                                    </h4>
                                                </div>
                                                <!--accordion-content-->
                                                <div class="panel-collapse collapse" id="product-specification">
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Product Description </label>
                                                            <div class="col-lg-7">
                                                                <textarea placeholder="Product description" data-provide="markdown" rows="8" name="product_description" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">YouTube ID</label>
                                                            <div class="col-lg-7">
                                                                <input type="email" class="form-control" name="youtube_id" placeholder="YouTube ID">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">What's in the box?</label>
                                                            <div class="col-lg-7">
                                                                <textarea placeholder="Any information in the box" data-provide="markdown" name="in_the_box" rows="8" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Note</label>
                                                            <div class="col-lg-7">
                                                                <textarea placeholder="Additional info" name="note" data-provide="markdown" rows="8" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- tab2 ends -->

                                </div>
                            </div>
                            <!--Footer button-->

                            <div class="panel-footer text-center">
                                <div class="box-inline">
                                    <button type="button" class="previous btn btn-primary">Previous</button>
                                    <button type="button" class="next btn btn-primary">Next</button>
                                    <button type="button" class="finish btn btn-warning" disabled>Finish</button>
                                </div>
                            </div>
                            <?= form_close();?>
                        </div>
                    </div>
                </div>

            </div>
            <!--===================================================-->
            <!--End page content-->

        </div>
        <!--===================================================-->
        <!--END CONTENT CONTAINER-->

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
<script type="text/javascript">
    $.fn.rowCount = function() {
        return $('tr', $(this).find('tbody')).length;
    };
    $('.add-more').click(function (x) {
        // check if the number of variation row exceeds limit
        let row_id = $('.pricing_table').rowCount() * 1 ;
        let new_id = row_id + 1;
        let new_row = '<tr data-row-id="'+new_id+'"><td><div class="form-group-sm"><input title="variation" type="text" class="form-control" name="variation[]" /></div></td><td><div class="form-group-sm"><input title="Seller SKU" type="text" class="form-control" name="seller_sku[]" /></div></td><td><div class="form-group-sm"><input title="EAN / UPC / ISBN" type="text" class="form-control" name="isbn[]" /></div></td><td><div class="form-group-sm"><input title="Quantity" type="number" min="1" max="100" class="form-control" name="quantity[]" /></div></td><td><div class="form-group-sm"><input title="Price" type="text" required class="form-control" name="price[]" /></div></td><td><div class="form-group-sm"><input title="Starting date for this variation" type="date" class="form-control" name="start_date[]" /></div></td><td><div class="form-group-sm"><input title="End date for this variation" type="date" class="form-control" name="end_date[]" /></div></td><td class=""><div class="btn-group"><a class="btn btn-sm btn-default btn-hover-success demo-psi-pen-5 add-tooltip add-more" href="#" data-original-title="Add Another Variation" data-container="body"></a><a class="btn btn-sm btn-default btn-hover-danger demo-pli-trash add-tooltip delete-row" href="#" data-original-title="Delete This Variation" data-container="body"></a></div></td></tr>'
        $('.pricing_table tbody').append(new_row);
    });
    $('.delete_row').on('click', function (x) {
        // check the number of row
        $(this).closest('.variation_body').fadeOut().remove();
    });

    $(".panel-title").click(function (x) {
        $(this).find("<i>").toggleClass("fa-arrow-down");
    });
</script>

</body>

</html>
