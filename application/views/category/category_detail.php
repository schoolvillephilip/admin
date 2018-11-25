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
					<h1 class="page-header text-overflow"><?= $category->name; ?></h1>
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
            </div>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End breadcrumb-->
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
										<option value="">-- Select A Parent Category --</option>
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
                                <label class="col-lg-3 control-label" for="">Category Commission (%) *</label>
                                <div class="col-lg-7">
                                    <input type="text" name="commission" class="form-control" placeholder="Eg: 10%"
                                           required/>
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

                            <div class="form-group">
                                <label class="col-lg-3 control-label" for="specification">Specifications</label>
                                <div class="col-lg-7">
                                    <span class="text-dark" style="margin: 4px; padding-bottom: 5px;"><a href="<?= base_url('categories/specification/add'); ?>">Click to create new specification, if not found below.</a> </span><br /><br />
                                    <?php foreach($specifications->result() as $specification ) :
                                            $specs = json_decode( $category->specifications );
                                            $checked = (!is_null($specs) && in_array($specification->id, $specs) ) ? 'checked' : '';
                                        ?>
                                        <span style="margin-right: 5px;">
                                            <input type="checkbox" name="specifications[]" value="<?= $specification->id; ?>" <?= $checked; ?> >
                                                <?= $specification->spec_name; ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label"></label>
                                <div class="col-lg-7">
                                    <div class="checkbox">
                                        <input id="has_option" type='checkbox' <?= !empty($category->variation_name) ? 'checked' : ''; ?> name="has_variation" title="Does this have variation"
                                               class="magic-checkbox">
                                        <label for="has_option">Does This Category Have Variations?</label>
                                    </div>
                                </div>
                            </div>
                            <div id="has_option">
                                <div id="options" style="display: <?= !empty($category->variation_name) ? 'block' : 'none'; ?>;">
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label" for="">Variation Name</label>
                                        <div class="col-lg-7">
                                            <input type="text" name="variation_name" value="<?= $category->variation_name; ?>" class="form-control" placeholder="Eg: Size"
                                                   id="var_name"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Options</label>
                                        <div class="col-lg-7" id="">
                                            <?php $value = '';
                                                if( !empty( $options) ){
                                                    foreach( $options as $option) $value .= $option->name .',';
                                                }
                                            ?>
                                            <input data-role="tagsinput" type="text" class="form-control typeahead" value="<?= $value; ?>" name="variation_options"
                                                   placeholder="type the options separated by comma (,)" id="var_opt">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer text-center">
                                <button class="btn btn-primary" type="submit">Update</button>
                                <a href="<?= base_url('categories'); ?>" class="btn btn-danger"> Go Back To All Categories</a>
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


        <!--ASIDE-->
        <!--===================================================-->
        <?php $this->load->view('templates/menu'); ?>
        <!--===================================================-->
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
    <?php foreach ($options_array as $option) :  ?>
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
