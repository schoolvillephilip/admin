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
                                        <div class="tab-pane fade in active">
                                            <div class="table-responsive">
<!--                                                <div class="alert alert-info">-->
<!--                                                    <p>Note the following</p>-->
<!--                                                    <ul>-->
<!--                                                        <li>Orders will be are marked as <b>'certified'</b> </li>-->
<!--                                                    </ul>-->
<!--                                                </div>-->
                                                <table class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>Field</th>
                                                        <th>Detail</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td class="text-semibold">Buyer's Name</td>
                                                        <td>
                                                            <?= $order->name; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-semibold">Orders</td>
                                                        <td>
                                                            <a target="_blank" href="<?= base_url('orders/detail/' . $order_code .'/'); ?>" class="btn-link">See Order Details</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-semibold">Amount Expected To Pay</td>
                                                        <td>
                                                            <?= ngn(($order->amount + $order->delivery_charge)); ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-semibold">Paid From</td>
                                                        <td>
                                                            <?= $order->bank; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-semibold">Deposit Type</td>
                                                        <td>
                                                            <?= $order->deposit_type; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-semibold">Remark/Comment</td>
                                                        <td>
                                                            <?= $order->remark; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-semibold">Proof of Payment</td>
                                                        <td>
                                                            <?php if( !empty($order->pop) ) : ?>
                                                                <a href="<?= STATIC_CATEGORY_PATH . $order->pop; ?>" target="_blank">
                                                                    <img src="<?= STATIC_CATEGORY_PATH . $order->pop; ?>" class="img img-responsive" style="width: 80px;" />
                                                                </a>
                                                            <?php else: ?>
                                                                <span>No POP uploaded</span>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <?php if($order->payment_made !='success') : ?>
                                                        <tr>
                                                        <td class="text-semibold">Action</td>
                                                        <td>
                                                            <?= form_open('orders/bank_transfer_process/'); ?>
                                                                <div class="form-group">
                                                                    <label for="action_btn">Select An Action</label>
                                                                    <select name="action" class="form-control" required>
                                                                        <option value="" selected>-- Select An Action --</option>
                                                                        <option value="cancelled">Cancel Transaction</option>
                                                                        <option value="certified">Payment Was received</option>
                                                                    </select>
                                                                </div>
                                                                <input type="hidden" name="order" value="<?= $order_code?>" />
                                                                <input type="hidden" name="status" value='<?= $order->status; ?>' />
                                                                <input type="hidden" name="phone" value="<?= $order->phone; ?>" />
                                                                <input type="hidden" name="name" value="<?= $order->name; ?>" />
                                                                <div class="form-group">
                                                                    <button class="btn btn-success" type="submit">Submit</button>
                                                                </div>
                                                            <?= form_close(); ?>
                                                        </td>
                                                    </tr>
                                                    <?php else: ?>
                                                        <tr>
                                                            <td>Action</td>
                                                            <td><label class="label label-success">Payment has been marked has success</label></td>
                                                        </tr>
                                                    <?php endif;?>
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
