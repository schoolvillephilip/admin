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
                                    <tr>
                                        <td><img src="<?=base_url('hey.jpg')?>" alt="Samsung S9+"/></td>
                                        <td>Samsung S9+</td>
                                        <td>32gb+3gb Ram, 13mp, (dual Sim) 4g - Black</td>
                                        <td>Chidi</td>
                                        <td>Akin Akinrounbi</td>
                                        <td><i class="fa fa-question-circle-o"></i> &nbsp; Is this the 5.6" version?</td>
                                        <td>12/02/19</td>
                                        <td><span class="label-warning label">Not Answered Yet</span></td>
                                        <td>
                                            <button class="btn btn-success" title="Approve">
                                                <i class="fa fa-check"></i>
                                            </button>
                                            <button class="btn btn-danger mar-lft" title="Decline">
                                                <i class="fa fa-times"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="<?=base_url('hey.jpg')?>" alt="iPhone XS Max"/></td>
                                        <td>iPhone XS Max</td>
                                        <td>128gb+6gb Ram, 18mp, (nano Sim) 4g - Rose Gold</td>
                                        <td>X-Stores</td>
                                        <td>Sholagbade Juwon</td>
                                        <td><i class="fa fa-question-circle-o"></i> &nbsp; What is the difference between this and the XR version?</td>
                                        <td>12/02/19</td>
                                        <td><span class="label-warning label">Not Answered Yet</span></td>
                                        <td>
                                            <button class="btn btn-success" title="Approve">
                                                <i class="fa fa-check"></i>
                                            </button>
                                            <button class="btn btn-danger mar-lft" title="Decline">
                                                <i class="fa fa-times"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="<?=base_url('hey.jpg')?>" alt="Cubot King Kong 3"/></td>
                                        <td>Cubot King Kong 3</td>
                                        <td>32gb+3gb Ram, 18mp, (mini Sim) 4g - Grey</td>
                                        <td>Amitek Bashnet</td>
                                        <td>Chinyere Uzo</td>
                                        <td><i class="fa fa-question-circle-o"></i> &nbsp; Does it come with a screen guard?</td>
                                        <td>12/02/19</td>
                                        <td><span class="label-warning label">Not Answered Yet</span></td>
                                        <td>
                                            <button class="btn btn-success" title="Approve">
                                                <i class="fa fa-check"></i>
                                            </button>
                                            <button class="btn btn-danger mar-lft" title="Decline">
                                                <i class="fa fa-times"></i></button>
                                        </td>
                                    </tr>
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
<?php $this->load->view('templates/scripts'); ?>
<script src="<?= base_url('assets/plugins/fooTable/dist/footable.all.min.js'); ?>"></script>
<script>
    var fooColExp = $('#all-question-col-exp');
    fooColExp.footable().trigger('footable_expand_first_row');
</script>
</body>
</html>
