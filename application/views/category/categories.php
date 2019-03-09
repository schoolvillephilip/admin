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
                    <h1 class="page-header text-overflow">Category</h1>
                </div>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">All categories</a></li>
                </ol>
            </div>
            <div id="page-content">
                <div class="panel">
                    <?php $this->load->view('msg_view'); ?>
                    <div class="panel-heading">
                        <div class="panel-title">
                            <a class="btn btn-danger" style="color: #fff;" href="<?= base_url('categories/add') ?>">Add
                                New Category</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table id="basic" class="table table-striped table-bordered" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Parent Category</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($categories as $category) : ?>
                                <tr id="<?= $category->id; ?>">
                                    <td class="text-center">
                                        <img src="<?= STATIC_CATEGORY_PATH . $category->image; ?>"
                                             width="40" height="40px">
                                    </td>
                                    <td class="text-center">
                                        <a class="btn-link" href="<?= base_url('categories/edit/' . $category->id); ?>"><?= ucwords($category->name) ?></a>
                                    </td>
                                    <td>
                                        <?php if ($category->pid != 0) :
                                            $parent_name = $this->admin->get_single_category($category->pid)->name;
                                            echo $parent_name;
                                            ?>
                                        <?php else : ?>
                                            No Parent Category
                                        <?php endif; ?>
                                    </td>
                                    <td><?= word_limiter($category->title, 5); ?></td>
                                    <td>
                                        <?= word_limiter($category->description, 10); ?>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a class="btn btn-mint btn-active-mint"
                                               href="<?= base_url('categories/edit/' . $category->id); ?>">Edit</a>
                                            <button class="btn btn-danger btn-active-danger delete-category" data-cid="<?= $category->id; ?>">Delete</button>
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
<script> let base_url = "<?= base_url(); ?>"; </script>
<?php $this->load->view('templates/confirm_modal'); ?>
<script src="<?= base_url('assets/plugins/datatables/media/js/jquery.dataTables.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/datatables/media/js/dataTables.bootstrap.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js'); ?>"></script>
<script>


        $(document).ready(function() {
            var table = $('#basic').DataTable();
            $('#basic tbody').on('click', 'tr > td:last-child .delete-category', function () {
                var row_id = $( this ).data('cid');
                let is_confirm = confirm('Are you sure about this action? Some products or other categories might be associated to this category.');
                if( is_confirm ){
                    $.ajax({
                        url : base_url + 'categories/delete',
                        data: { id : row_id},
                        method: "POST",
                        success: function( response ){
                            if( response ){
                                alert( 'Category has been deleted successfully.');
                                $(`#${row_id}`).fadeOut();
                            }else{
                                alert('There was an error deleting this category');
                            }
                        },
                        error: function () {

                        }
                    })
                }

            });
        });
</script>
</body>
</html>
