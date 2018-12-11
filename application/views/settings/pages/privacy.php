<?php $this->load->view('templates/meta_tags'); ?>
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
</head>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">
    <?php $this->load->view('templates/head_navbar'); ?>
    <div class="boxed">
        <div id="content-container">
            <div id="page-head">
                <div id="page-title">
                    <h1 class="page-header text-overflow">Privacy Policy Page Settings</h1>
                </div>
                <ol class="breadcrumb">
                    <li><i class="demo-pli-home"></i></li>
                    <li>Store Settings</li>
                    <li>Page Settings</li>
                    <li class="active">Privacy</li>
                </ol>
            </div>
            <div id="page-content">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Privacy Policy Page</h3>
                    </div>
                    <div class="panel-body">
                        <h4 style="color: #35bbae;">Privacy Policy</h4>
                        <div id="om_summer_note">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary">Save</button>
                        </div>
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
<script src="<?= base_url('assets/js/demo/form-text-editor.js'); ?>"></script>
<script>
    $(document).ready(function () {
        $('#om_summer_note').summernote({
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
