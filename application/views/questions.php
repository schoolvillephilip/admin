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
                    <?php $this->load->view('msg_view'); ?>
                    <div class="panel-body">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="">Approve / Decline Questions</h3>
                            </div>
                            <div class="panel-body">
                                <table id="all-question-col-exp" class="table toggle-circle">
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
                                        <tr>
                                            <td><img src="<?= PRODUCTS_IMAGE_PATH . $question->image_name; ?>"
                                                     alt="<?= $question->product_name; ?>"/></td>
                                            <td><?= character_limiter($question->product_name, 30); ?></td>
                                            <td><?= character_limiter($question->product_description, 20); ?></td>
                                            <td><?= $question->legal_company_name; ?></td>
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
                                                        data-qid="<?= $question->id; ?>" data-action="approve" data-text="Approve Question?">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                                <button class="btn btn-danger mar-lft decline_question" title="Decline"
                                                        data-qid="<?= $question->id; ?>" data-action="decline" data-text="Decline Question?">
                                                    <i class="fa fa-times"></i></button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
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
    let self, action = text =  "", qid;
    let fooColExp = $('#all-question-col-exp');
    fooColExp.footable().trigger('footable_expand_first_row');
    $('.approve_question, .decline_question').on('click', function () {
        self = $(this);
        action = $(this).data('action');
        text = $(this).data('text');
        qid = self.data('qid');
        $('#modal_confirm')
            .find('.modal-header > p')
            .text(text).end()
            .find('.modal-body')
            .html('<i class="fa fa-check fa-4x text-primary"></i>').end()
            .modal('show');
    });

    $('#confirm_true').on('click', function (e) {
        e.preventDefault();

        $.ajax({
            url: base_url + 'questions/action/',
            data: {'qid': qid, 'action' : action},
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
