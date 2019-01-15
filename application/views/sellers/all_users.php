<?php $this->load->view('templates/meta_tags'); ?>
<style>
    .set_admin:hover, .change_group:hover {
        color: #bb5103;
    }

    .set_admin, .change_group {
        color: #198f50;
        font-weight: bold;
    }
</style>
</head>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">
    <?php $this->load->view('templates/head_navbar'); ?>
    <div class="boxed">
        <div id="content-container">
            <div id="page-head">
                <div id="page-title">
                    <h1 class="page-header text-overflow">All Users</h1>
                </div>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">User Management</a></li>
                    <li class="active">All Users</li>
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
                            <h3 class="panel-title">A list of all users in the Database</h3>
                        </div>
                        <div class="panel-body">
                            <table id="all_users" class="table table-striped table-bordered" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th width="40%">Name</th>
                                    <th>Email</th>
                                    <th width="10%">Administrator</th>
                                    <th>Role</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($users as $user) : ?>
                                    <tr>
                                        <td>
                                            <?= ucwords($user->first_name . ' ' . $user->last_name); ?>
                                        </td>
                                        <td><?= $user->email; ?></td>
                                        <td style="cursor: pointer;" class="set_admin" data-id="<?= $user->id; ?>"
                                            data-name="<?= ucwords($user->first_name . ' ' . $user->last_name); ?>"
                                            data-email="<?= $user->email; ?>">
                                            <a class="set_admin" href="javascript:;" data-id="<?= $user->id; ?>"
                                               data-name="<?= ucwords($user->first_name . ' ' . $user->last_name); ?>"
                                               data-email="<?= $user->email; ?>">
                                                <?php
                                                if ($user->is_admin == 1):
                                                    echo "Yes";
                                                else:
                                                    echo "No";
                                                endif
                                                ?>
                                            </a>
                                        </td>
                                        <td style="cursor: pointer;" class="change_group" data-id="<?= $user->id; ?>"
                                            data-name="<?= ucwords($user->first_name . ' ' . $user->last_name); ?>"
                                            data-email="<?= $user->email; ?>">
                                            <a class="change_group" href="javascript:;" data-id="<?= $user->id; ?>"
                                               data-name="<?= ucwords($user->first_name . ' ' . $user->last_name); ?>"
                                               data-email="<?= $user->email; ?>">
                                                <?php
                                                if ($user->is_admin == 1) {
                                                    switch ($user->groups):
                                                        case "1" :
                                                            echo "Administrator";
                                                            break;
                                                        case "2" :
                                                            echo "Manager";
                                                            break;
                                                        case "3" :
                                                            echo "Accountant";
                                                            break;
                                                        case "4" :
                                                            echo "Sales Representative";
                                                            break;
                                                        default:
                                                            if ($user->is_seller == "approved") {
                                                                echo "Seller";
                                                            } else {
                                                                echo "User";
                                                            }
                                                            break;
                                                    endswitch;
                                                }else{
                                                    if ($user->is_seller == "approved") {
                                                        echo "Seller";
                                                    } else {
                                                        echo "User";
                                                    }
                                                }
                                                ?>
                                            </a>
                                        </td>
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

<div class="modal fade text-left" id="modal_role" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-sm modal-notify" role="document">
        <!--Content-->
        <div class="modal-content text-center">
            <!--Header-->
            <div class="modal-header d-flex justify-content-center bg-default">
                <p class="heading">Change Role</p>
            </div>

            <!--Body-->
            <div class="modal-body">
                <p class="user_name"></p>
                <p class="user_email"></p>
                <div class="option_here"></div>
            </div>

            <!--Footer-->
            <div class="modal-footer flex-center">
                <a href="javascript:;" class="btn  btn-primary" id="role_update">Done</a>
                <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">Cancel</a>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<?php $this->load->view('templates/confirm_modal'); ?>
<?php $this->load->view('templates/scripts'); ?>
<script>
    let setHtml, changeHtml, update_id, update_type, update_value;
    setHtml = '<select class="form-control update_value"><option value="">--select--</option><option value="1">Yes</option><option value="0">No</option></select>';
    changeHtml = '<select class="form-control update_value"><option value="">--select--</option><option value="1">Administrator</option><option value="2">Manager</option><option value="3">Accountant</option><option value="4">Sales Rep</option><option value="0">User</option></select>';
    $('#all_users').dataTable({
        "responsive": true,
        "pageLength": 100,
        "language": {
            "paginate": {
                "previous": '<i class="demo-psi-arrow-left"></i>',
                "next": '<i class="demo-psi-arrow-right"></i>'
            }
        }
    });
    $('#role_update').on('click', function () {
        update_value = $('.update_value').val();
        if (update_value) {
            $('#modal_confirm')
                .find('.modal-header > p')
                .text("Continue to change this user role?").end()
                .modal('show');
        } else {
            alert('Please select an option');
        }
    });

    $('#confirm_true').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: base_url + 'sellers/update_user_role/',
            data: {'update_type': update_type, 'update_value': update_value, 'update_id': update_id},
            type: "POST",
            dataType: 'json',
            success: function (data) {
                window.location.href = base_url + "sellers/all_users/";
            },
            error: function (data) {
                window.location.href = base_url + "sellers/all_users/";
            }
        });
    });
    $('.change_group').on('click', function () {
        let self = $(this);
        update_id = self.data('id');
        update_type = "admin_group";
        let name = self.data('name');
        let email = self.data('email');
        $("#modal_role")
            .find('.modal-header  p')
            .text("Change User Admin Group").end()
            .find('.modal-body p.user_name')
            .text(name).end()
            .find('.modal-body p.user_email')
            .text(email).end()
            .find('.modal-body div.option_here')
            .html(changeHtml).end()
            .modal('show');
    });

    $('.set_admin').on('click', function () {
        let self = $(this);
        update_id = self.data('id');
        update_type = "admin_right";
        let name = self.data('name');
        let email = self.data('email');
        $("#modal_role")
            .find('.modal-header > p')
            .text("Change User Admin Privileges").end()
            .find('.modal-body p.user_name')
            .text(name).end()
            .find('.modal-body p.user_email')
            .text(email).end()
            .find('.modal-body div.option_here')
            .html(setHtml).end()
            .modal('show');
    });
</script>
</body>
</html>
