<?php $this->load->view('templates/meta_tags'); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
</head>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">
    <?php $this->load->view('templates/head_navbar'); ?>
    <div class="boxed">
        <div id="content-container">
            <div id="page-head">
                <div id="page-title">
                    <h1 class="page-header text-overflow">Jobs</h1>
                </div>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Jobs</a></li>
                    <li class="active">Add / Manage Jobs</li>
                </ol>
            </div>
            <div id="page-content">
                <div class="panel">
                    <?php $this->load->view('msg_view'); ?>
                    <div class="panel-heading">
                        <div class="panel-title">Add New Job</div>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="<?= base_url('jobs'); ?>">
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Job Title</label>
                                <div class="col-lg-7">
                                    <input type="text" name="job_title" value="<?= set_value('job_title', '')?>" class="form-control" required>
                                    <?= form_error('job_title'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="salary" class="control-label col-lg-3">Salary</label>
                                <div class="col-lg-7">
                                    <input type="text" name="salary_range" value="<?= set_value('salary_range', '')?>" class="form-control" placeholder="Enter salary range, not compulstory">
                                    <?= form_error('salary_range'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label" for="">Job Type</label>
                                <div class="col-lg-7">
                                    <select name="job_type" class="form-control">
                                        <option value="internship">-- Select Job Type --</option>
                                        <option value="internship" <?= set_select('job_type', 'internship')?>">Internship</option>
                                        <option value="part-time" <?= set_select('job_type', 'part-time')?>">Part Time</option>
                                        <option value="full-time" <?= set_select('job_type', 'full-time')?>">Full Time</option>
                                        <option value="contract" <?= set_select('job_type', 'contract')?>">Contract</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label" for="">Location</label>
                                <div class="col-lg-7">
                                    <select name="job_location" class="form-control">
                                        <option value="">-- Select job location --</option>
                                        <option value="lagos">Lagos</option>
                                        <option value="anambra">Anambra</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Job Description</label>
                                <div class="col-lg-7">
                                    <textarea name="job_description" value="<?= set_value('job_description', '')?>" class="om_summer_note form-control" required></textarea>
                                    <?= form_error('job_description'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="due_date" class="control-label col-lg-3">Due Date</label>
                                <div class="col-lg-7">
                                    <input type="text" name="due_date" class="form-control" placeholder="Enter due date, if applicable">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-lg-3 control-label">Make this post active</label>
                                <div class="col-lg-7">
                                    <div class="radio">
                                        <input id="no" class="magic-radio" type="radio" name="active" value="0" checked>
                                        <label for="no">No</label>

                                        <input id="yes" class="magic-radio" type="radio" name="active" value="1">
                                        <label for="yes">Yes</label>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer text-center">
                                <button class="btn btn-primary" type="submit">Publish</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('templates/menu'); ?>
    </div>
    <?php $this->load->view('templates/footer'); ?>
    <button class="scroll-top btn">
        <i class="pci-chevron chevron-up"></i>
    </button>
</div>
<?php $this->load->view('templates/scripts'); ?>
<script src="<?= base_url('assets/plugins/summernote/summernote.min.js'); ?>"></script>
<script>
    $(document).ready(function () {
        $('.om_summer_note').summernote({
            placeholder: 'write here...',
            height : '230px',
            focus: true,
            toolbar: [
                ["style", ["style"]],
                ["font", ["bold", "underline", "clear"]],
                ["fontname", ["fontname"]],
                ["color", ["color"]],
                ["para", ["ul", "ol", "paragraph"]],
                ["insert", ["link"]],
                ["view", ["fullscreen"]]
            ],
        });
    });
</script>
</body>
</html>
