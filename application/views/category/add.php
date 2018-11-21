<?php $this->load->view('templates/meta_tags'); ?>
<link href="<?= base_url('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.css'); ?>" rel="stylesheet">
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
                    <li class="active">Add New Category</li>
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
                        <div class="panel-title">Add New Category</div>
                    </div>
                    <div class="panel-body">
                        <?= form_open_multipart('', 'class="form-horizontal"'); ?>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Parent Category</label>
                            <div class="col-lg-7">
                                <select name="pid" required class="selectpicker form-control"
                                        title="Choose Parent Category..."
                                        data-width="100%">
                                    <option value="0" selected="">-- Choose a parent category--</option>
                                    <?php foreach ($categories as $category) echo '<option value="' . $category->id . '">' . $category->name . ' </option>'; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="">Icon</label>
                            <div class="col-lg-7">
                                <input type="text" name="icon" class="form-control"
                                       placeholder="Eg fa-telephone : Get the icon from frontawesome.com"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="">Category Name *</label>
                            <div class="col-lg-7">
                                <input type="text" name="name" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="">Category Title *</label>
                            <div class="col-lg-7">
                                <input type="text" name="title" class="form-control"
                                       placeholder="Eg: Buy Computing Online in Nigeria" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="">Description *</label>
                            <div class="col-lg-7">
                                <textarea name="description" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="">Category Commission (%) *</label>
                            <div class="col-lg-7">
                                <input type="text" name="commission" class="form-control" placeholder="Eg: 10%"
                                       required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="">Category Image</label>
                            <div class="col-lg-7">
                                <input type="file" name="upload_image"/>
                                <span style="margin-top:3px;" class="text-dark">Image should be a PNG, transparent with at most 500 X 300px</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="specification">Specifications</label>
                            <div class="col-lg-7">
								<span class="text-dark"><a
                                            href="<?= base_url('categories/specification/add'); ?>">Click to create new specification, if not found below.</a> </span><br/><br/>
                                <?php foreach ($specifications->result() as $specification) : ?>
                                    <span style="margin-right: 5px;">
                                            <input type="checkbox" name="specifications[]"
                                                   value="<?= $specification->id; ?>"> <?= $specification->spec_name; ?>
                                        </span>
                                <?php endforeach; ?>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label"></label>
                            <div class="col-lg-7">

                                <div class="checkbox">
                                    <input id="has_option" type='checkbox' name="has_variation" title="Does this have variation"
                                           class="magic-checkbox">
                                    <label for="has_option">Does This Category Have Variations?</label>
                                </div>
                            </div>
                        </div>
                        <div id="has_option">
                            <div id="options" style="display: none;">
                                <div class="form-group">
                                    <label class="col-lg-3 control-label" for="">Variation Name</label>
                                    <div class="col-lg-7">
                                        <input type="text" name="variation_name" class="form-control" placeholder="Eg: Size"
                                               id="var_name"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Options</label>
                                    <div class="col-lg-7" id="">
                                        <input data-role="tagsinput" type="text" class="form-control typeahead" name="variation_options"
                                               placeholder="type the options separated by comma (,)" id="var_opt">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-center">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                        <?= form_close(); ?>
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
<script src="<?= base_url('assets/plugins/typeahead.js/typeahead.bundle.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js'); ?>"></script>

<script>
    $(document).ready(function () {
        $('#has_option').change(function () {
            if (this.checked) {
                $('#options').fadeIn('slow');
                $('#var_opt').attr('required', true);
                $('#var_name').attr('required', true);
            } else {
                $('#options').fadeOut('slow');
                $('#var_opt').attr('required', false);
                $('#var_name').attr('required', false);
            }
        });
    });

    var substringMatcher = function(strs) {
        return function findMatches(q, cb) {
            var matches, substringRegex;
            matches = [];
            substrRegex = new RegExp(q, 'i');
            $.each(strs, function(i, str) {
                if (substrRegex.test(str)) {
                    matches.push(str);
                }
            });
            cb(matches);
        };
    };

    option = [];
    <?php foreach ($options as $option) :  ?>
    option.push("<?=$option->name;?>");
    <?php endforeach;?>

    $('#var_opt').tagsinput({
        typeaheadjs: {
            name: 'states',
            source: substringMatcher(option)
        }
    });
</script>
</body>
</html>
