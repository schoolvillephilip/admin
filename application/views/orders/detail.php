<?php $this->load->view('templates/meta_tags'); ?>
<style>
    .active-status{
        background-color: #124431 ;
        color: #FFFFFF;
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
                    <h1 class="page-header text-overflow">Seller</h1>
                </div>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Dashboard</a></li>
                    <li>Order detail</li>
                    <li class="active">#<?= $this->uri->segment(3); ?></li>
                </ol>
            </div>
            <?php if ($orders) : ?>
                <div id="page-content">
                    <div class="row">
                        <?php $this->load->view('msg_view'); ?>
                        <?php $x = 1;
                        foreach ($orders as $order) : ?>
                            <div class="col-sm-6 clearfix">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#details-tab-<?= $x; ?>" data-toggle="tab">
                                                        Order Details</a>
                                                </li>

                                                <li style="opacity: 1;">
                                                    <a class="btn btn-default btn-active-primary dropdown-toggle"
                                                       data-toggle="dropdown" aria-expanded="false">
                                                        Action <i class="demo-pli-dot-vertical icon-lg"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-right" role="menu" style="">
                                                        <li class="<?php
                                                        if ($order->active_status == 'shipped'){
                                                            echo 'active-status';}?>">
                                                            <a class="<?php if( $order->active_status =='delivered' || $order->active_status == 'completed' || $order->active_status == 'returned'){echo '';}else{echo 'order-status';}?>"
                                                               href="javascript:;" <?php if($order->active_status != 'shipped') : ?>
                                                               data-oid="<?= $order->id; ?>"
                                                               data-order-code="<?= $order->order_code?>" data-type="shipped"
                                                                <?php endif; ?>
                                                                >
                                                                Mark as shipped
                                                            </a>
                                                        </li>
                                                        <li class="<?php if ($order->active_status == 'delivered') echo 'active-status'; ?>">
                                                            <a href="javascript:;"
                                                               class="<?php if( $order->active_status == 'completed' || $order->active_status == 'returned' ){echo '';}else{ echo 'order-status'; }?>"
                                                               data-oid="<?= $order->id; ?>"
                                                               data-order-code="<?= $order->order_code?>" data-type="delivered">
                                                                Mark as delivered
                                                            </a>
                                                        </li>
                                                        <li class="<?php if ($order->active_status == 'completed') echo 'active-status'; ?>">
                                                            <a href="javascript:;" class="<?php if( $order->active_status == 'returned' ){echo '';}else{echo 'order-status'; }?>"
                                                               data-oid="<?= $order->id; ?>"
                                                               data-order-code="<?= $order->order_code?>" data-type="completed">
                                                                Mark as completed
                                                            </a>
                                                        </li>
                                                        <li class="<?php if ($order->active_status == 'returned') echo 'active-status'; ?>">
                                                            <a href="javascript:;" class="order-status"
                                                               data-oid="<?= $order->id; ?>"
                                                               data-order-code="<?= $order->order_code?>" data-type="returned">
                                                                Returned
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>

                                            </ul>
                                        </div>
                                        <h3 class="panel-title text-bold">Order Summary ( Item #<?= $x; ?> )</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade in active" id="details-tab-<?= $x; ?>">
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th>Items #<?= $x; ?></th>
                                                            <th>Detail</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td class="text-semibold">Order Unique ID</td>
                                                            <td>
                                                                <?= $order->id; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-semibold">Order Assigned To</td>
                                                            <td>
                                                                <?php
                                                                    if( $order->agent == 0 ){
                                                                        echo 'Not yet Assigned to';
                                                                    }else{
                                                                        $user = $this->admin->get_row('users', array('id' => $order->agent ));
                                                                        echo '<a class="btn-link" href="#"> ' .$user->first_name .' '.$user->last_name  . ' </a>';
                                                                    }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-semibold">Product Name</td>
                                                            <td><a class="btn-link"
                                                                   href="<?= base_url('product/detail/' . $order->product_id); ?>"><?= $order->product_name; ?></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-semibold">Customer Billing Name</td>
                                                            <td><?= $order->first_name . ' ' . $order->last_name; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-semibold">Customer Phone</td>
                                                            <td><?= $order->phone . ', ' . $order->phone2; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-semibold">Customer Email</td>
                                                            <td><?= $order->email; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-semibold">Seller's Name</td>
                                                            <td><a class="btn-link"
                                                                   href="<?= base_url('sellers/detail/' . $order->seller_id); ?>"><?= ucwords($order->legal_company_name); ?></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-semibold">Seller's Email</td>
                                                            <td><?= $order->seller_email; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-semibold">Quantity</td>
                                                            <td><?= $order->qty; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-semibold">Delivery Channel</td>
                                                            <td>
                                                                <?php
                                                                    $delivery = '';
                                                                    if( $order->pickup_location_id != 0 ) {
                                                                        // Get the delivery address
                                                                        $result = $this->admin->get_pickup_address( $order->pickup_location_id );
                                                                        $delivery = '<strong>To Pickup At : </strong>' .$result->title . ' - '. $result->phones.', '. $result->address .' '. $result->emails;
                                                                    }else{
                                                                        $delivery = '<b>Deliveing To : Name </b>' . $order->first_name . ' ' . $order->last_name . '; <b> Phone :</b> ' . $order->phone . '; <b>Address: </b>' .$order->address;
                                                                    }
                                                                    echo $delivery;
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-semibold">Present Status</td>
                                                            <td>
                                                                <span class="label label-success"><?= ucfirst($order->active_status); ?></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-semibold">Status Flow</td>
                                                            <td>
                                                                <ul class="list-group">
                                                                    <?php $status = json_decode($order->status, true);
                                                                    foreach ($status as $s => $key):
                                                                        ?>
                                                                        <li class="list-group-item"><strong>Status
                                                                                :</strong> <?= $key['msg']; ?> :
                                                                            <strong>Time
                                                                                :</strong> <?= $key['datetime']; ?></li>
                                                                    <?php endforeach; ?>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-semibold">Ordered Date</td>
                                                            <td>
                                                                <span><?= neatDate($order->order_date) . ' (' . neatTime($order->order_date) . ')'; ?></span>
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
                            <?php $x++; endforeach; ?>
                    </div>
                </div>
            <?php else : ?>
                <div id="page-content">
                    <div class="alert alert-danger">Sorry, the order code can not be found.</div>
                </div>
            <?php endif; ?>
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
    let action_type, order_code,id;
    $('.order-status').on('click', function () {
        action_type = $(this).data('type');
        order_code = $(this).data('order-code');
        id = $(this).data('oid');
        $('#modal_confirm')
            .find('.modal-header > p')
            .text("Confirm to mark this order as " + action_type ).end()
            .modal('show');
    });

    $('#confirm_true').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: base_url + 'orders/mark_order/',
            data: {'type': action_type, 'order_code': order_code, 'id':id},
            type: "POST",
            dataType: 'json',
            success: function (data) {
                window.location.href = base_url + "orders/detail/" +order_code;
            },
            error: function (data) {
                window.location.href = base_url + "orders/detail/" +order_code;
            }
        });
    });
</script>
</body>
</html>
