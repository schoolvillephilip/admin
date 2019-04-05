<?php $this->load->view('templates/meta_tags'); ?>
</head>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">
    <?php $this->load->view('templates/head_navbar'); ?>
    <div class="boxed">
        <div id="content-container">
            <div id="page-head">
                <div id="page-title">
                    <h1 class="page-header text-overflow">Sellers</h1>
                </div>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">User Management</a></li>
                    <li class="active">All sellers</li>
                </ol>
            </div>
            <div id="page-content">
                <div class="row pad-ver">
                    <form action="#" method="post" class="col-xs-12 col-sm-10 col-sm-offset-1 pad-hor">
                        <div class="input-group mar-btm">
                            <input type="text" placeholder="Search seller with name or email"
                                   class="form-control input-lg">
                            <span class="input-group-btn">
                     <button class="btn btn-primary btn-lg" type="button">Search</button>
                 </span>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">A list of all sellers in the Database</h3>
                        </div>
                        <div class="panel-body">
                            <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th class="min-tablet">Company Name</th>
                                    <th class="min-tablet">Reg No.</th>
                                    <th class="min-desktop">Main Category</th>
                                    <th class="min-desktop">Last Login</th>
                                    <th class="min-tablet">Account Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($sellers as $seller) : ?>
                                    <tr>
                                        <td>
                                            <a href="<?= base_url('sellers/detail/' . $seller->uid); ?>" class="btn-link" ><?= ucwords($seller->first_name . ' ' . $seller->last_name); ?></a>
                                        </td>
                                        <td><?= $seller->email; ?></td>
                                        <td><?= $seller->legal_company_name; ?></td>
                                        <td><?= $seller->reg_no; ?></td>
                                        <td><?= $seller->main_category; ?></td>
                                        <td><?= neatDate($seller->last_login); ?></td>
                                        <td><?= accountStatus($seller->is_seller); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <?= $pagination ?>
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
<script>
    $('#demo-dt-basic').dataTable({
        "responsive": true,
        "language": {
            "paginate": {
                "previous": '<i class="demo-psi-arrow-left"></i>',
                "next": '<i class="demo-psi-arrow-right"></i>'
            }
        }
    });
</script>
</body>
</html>
