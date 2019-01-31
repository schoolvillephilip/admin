<?php $this->load->view('templates/meta_tags'); ?>
<link href="<?= base_url('assets/plugins/fooTable/css/footable.core.css'); ?>" rel="stylesheet">
</head>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">
    <?php $this->load->view('templates/head_navbar'); ?>
    <div class="boxed">
        <div id="content-container">
            <div id="page-head">
                <div id="page-title">
                    <h1 class="page-header text-overflow">Customer Questions</h1>
                </div>
                <ol class="breadcrumb">
                    <li><i class="demo-pli-home"></i></li>
                    <li>Notifications</li>
                    <li class="active">Questions</li>
                </ol>
            </div>
            <div id="page-content">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">All Questions</h3>
                    </div>
                    <div class="panel-body">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="">Approve / Decline Questions</h3>
                            </div>
                            <div class="panel-body">
                                <label class="form-inline">Show
                                    <select id="q-show-entries" class="form-control input-sm">
                                        <option value="5">5</option>
                                        <option value="10" selected>10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                    </select>
                                    entries
                                </label>
                                <table id="all-question-col-exp" class="table toggle-circle" data-page-size="10">
                                    <thead>
                                    <tr>
                                        <th data-toggle="true">Product Image</th>
                                        <th>Product Name</th>
                                        <th>Product Details</th>
                                        <th data-hide="all">Seller</th>
                                        <th data-hide="all">Customer Name</th>
                                        <th data-hide="all">Question</th>
                                        <th data-hide="all">Date</th>
                                        <th data-hide="all">Answer</th>
                                        <th data-hide="all">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($questions as $question): ?>
                                        <?php
                                        $pid = $question->pid;
                                        $product = $this->admin->get_question_product($pid);
                                        $product_img = $this->admin->get_question_product_img($pid);
                                        ?>
                                        <tr>
                                            <td><img src="<?= PRODUCTS_IMAGE_PATH . $product_img->image_name; ?>"
                                                     alt="<?= word_limiter($product->product_name, 3); ?>"/></td>
                                            <td><?= word_limiter($product->product_name, 3); ?></td>
                                            <td><?= word_limiter($product->product_description, 9); ?></td>
                                            <td><?= ucwords($product->first_name . ' ' . $product->last_name); ?></td>
                                            <td><?= $question->display_name; ?></td>
                                            <td>
                                                <span style="font-weight:800 !important;">
                                                    <i class="fa fa-question-circle-o"></i>&nbsp;<?= $question->question; ?>
                                                </span>
                                            </td>
                                            <td><?= date('l, F d', strtotime($question->qtimestamp)); ?></td>
                                            <td><span class="label-warning label">Not Answered Yet</span></td>
                                            <td>
                                                <button class="btn btn-success approve_question" title="Approve"
                                                        data-qid="<?= $question->id; ?>">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                                <button class="btn btn-danger mar-lft decline_question" title="Decline"
                                                        data-qid="<?= $question->id; ?>">
                                                    <i class="fa fa-times"></i></button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="7">
                                            <div class="text-right">
                                                <ul class="pagination"></ul>
                                            </div>
                                        </td>
                                    </tr>
                                    </tfoot>

                                </table>
                            </div>
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
<?php $this->load->view('templates/confirm_modal'); ?>
<?php $this->load->view('templates/scripts'); ?>
<script src="<?= base_url('assets/plugins/fooTable/dist/footable.all.min.js'); ?>"></script>
<script>
    let self, action = "", qid;
    let fooColExp = $('#all-question-col-exp');
    fooColExp.footable().trigger('footable_expand_first_row');
    $('#q-show-entries').change(function (e) {
        e.preventDefault();
        var pageSize = $(this).val();
        fooColExp.data('page-size', pageSize);
        fooColExp.trigger('footable_initialized');
    });
    $('.approve_question').on('click', function () {
        self = $(this);
        action = "approve";
        qid = self.data('qid');
        $('#modal_confirm')
            .find('.modal-header')
            .removeClass('bg-danger').addClass('bg-primary').end()
            .find('.modal-header > p')
            .text("Approve Question?").end()
            .find('.modal-body')
            .html('<i class="fa fa-check fa-4x text-primary"></i>').end()
            .modal('show');
    });
    $('.decline_question').on('click', function () {
        self = $(this);
        action = "decline";
        qid = self.data('qid');
        $('#modal_confirm')
            .find('.modal-header')
            .removeClass('bg-primary').addClass('bg-danger').end()
            .find('.modal-header > p')
            .text("Decline Question?").end()
            .find('.modal-body')
            .html('<i class="fa fa-times fa-4x text-danger"></i>').end()
            .modal('show');
    });

    $('#confirm_true').on('click', function (e) {
        e.preventDefault();
        let url = "";
        switch (action) {
            case 'approve':
                url = 'questions/approve_question';
                break;
            case 'decline':
                url = 'questions/decline_question';
                break;
            default:
                url = "";
                break;
        }
        $.ajax({
            url: base_url + url,
            data: {'qid': qid,},
            type: "POST",
            dataType: 'json',
            success: function (d) {
                window.location.href = base_url + "questions/";
            },
            error: function (d) {
                window.location.href = base_url + "questions/";
            }
        });
    });
</script>
</body>
</html>
