<?php $this->load->view('templates/meta_tags'); ?>
<link href="<?= base_url('assets/plugins/datatables/media/css/dataTables.bootstrap.css'); ?>" rel="stylesheet">
<link href="<?= base_url('assets/plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css'); ?>"
      rel="stylesheet">
</head>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">
    <?php $this->load->view('templates/head_navbar'); ?>
    <div class="boxed">
        <div id="content-container">
            <div id="page-head">
                <div id="page-title">
                    <h1 class="page-header text-overflow">Brands</h1>
                </div>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Brands</a></li>
                    <li class="active">Brand List</li>
                </ol>
            </div>
            <div id="page-content">
                <div class="panel">
                    <?php $this->load->view('msg_view'); ?>
                    <div class="panel-heading">
                        <div class="panel-title">
                            <a class="btn btn-danger" style="color: #fff;" href="<?= base_url('brands/add') ?>">Add New
                                Brand</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table id="basic" class="table table-striped table-bordered" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th class="text-center">Brand name</th>
                                <th class="min-tablet text-center">Brand description</th>
                                <th class="min-tablet text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($brands->result() as $brand) : ?>
                                <tr>
                                    <td class="text-center">
                                        <a href="<?= base_url('brands/detail/' . $brand->id); ?>"><?= ucwords($brand->brand_name) ?></a>
                                    </td>
                                    <td class="text-center">
                                        <?= $brand->description; ?>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a class="btn btn-mint btn-active-mint"
                                               href="<?= base_url('brands/detail/' . $brand->id); ?>">Edit</a>
                                            <button class="btn btn-danger btn-active-danger">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
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
<script src="<?= base_url('assets/plugins/datatables/media/js/jquery.dataTables.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/datatables/media/js/dataTables.bootstrap.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js'); ?>"></script>
<script>
    $(document).ready(function (x) {
        $('#basic').dataTable({
            "responsive": true,
            "language": {
                "paginate": {
                    "previous": '<i class="demo-psi-arrow-left"></i>',
                    "next": '<i class="demo-psi-arrow-right"></i>'
                }
            }
        });
    });
</script>
</body>
</html>
