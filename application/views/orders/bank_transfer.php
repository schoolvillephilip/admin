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
                    <h1 class="page-header text-overflow">Payment</h1>
                </div>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Dashboard</a></li>
                    <li>Payment Confirmation</li>
                </ol>
            </div>
            <div id="page-content">
                    <div class="row">
                        <?php $this->load->view('msg_view'); ?>
                        <div class="col-sm-6 clearfix">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title text-bold">Payment Via Bank Transfer</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="details-tab-<?= $x; ?>">
                                            <div class="table-responsive">
                                                <div class="alert alert-info">
                                                    <p>Note the following</p>
                                                    <ul>
                                                        <li>Orders are marked as <b>'certified'</b> automatically when payment method is Interswitch webpay and the transaction is successful</li>
                                                    </ul>
                                                </div>
                                                <table class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>Field</th>
                                                        <th>Detail</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td class="text-semibold">Item Unique ID</td>
                                                        <td>
                                                            <?= $order->id; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-semibold">Transaction ID</td>
                                                        <td>
                                                            <?= $order->txnref; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-semibold">Payment Method</td>
                                                        <td>
                                                            <?= paymentMethod( $order->payment_method); ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-semibold">Order Assigned To</td>
                                                        <td>
                                                            <?php
                                                                if( $order->agent == 0 ){
                                                                    echo 'Not yet Assigned to an agent';
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
                                                        <td class="text-semibold">Buyer's Name</td>
                                                        <td><?= $order->first_name . ' ' . $order->last_name ; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-semibold">Other Email/Phone</td>
                                                        <td><?= $order->email . ' ' . $order->phone; ?></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
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
<script>
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

    $('#confirm_true').on('click', function (e){
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
