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
                    <h1 class="page-header text-overflow">Agreement Page Settings</h1>
                </div>
                <ol class="breadcrumb">
                    <li><i class="demo-pli-home"></i></li>
                    <li>Store Settings</li>
                    <li>Page Settings</li>
                    <li class="active">Agreement</li>
                </ol>
            </div>
            <div id="page-content">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">User Agreement</h3>
                    </div>
                    <div class="panel-body">
                        <?php $this->load->view('msg_view'); ?>
                        <?= form_open('settings/agreement'); ?>
                        <div class="form-group">
                            <textarea class="om_summer_note form-control" name="agreement" placeholder="Drop text ad format it here" id="terms">
                                <?= ( $agreement ) ? $agreement->content : ''; ?>
                            </textarea>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit">Save/Update</button>
                        </div>
                        <?= form_close(); ?>
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
        var content = `<?= ( $agreement ) ? $agreement->content : ''; ?>`;
        $('.om_summer_note').summernote('code', content);
    });
</script>
</body>
</html>
