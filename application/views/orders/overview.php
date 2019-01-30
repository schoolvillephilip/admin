<?php $this->load->view('templates/meta_tags'); ?>
</head>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">
    <?php $this->load->view('templates/head_navbar'); ?>
    <div class="boxed">
        <div id="content-container">
            <div id="page-head">
                <div id="page-title">
                    <h1 class="page-header text-overflow">Orders</h1>
                </div>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li>Dashboard</li>
                    <li class="active">Orders</li>
                </ol>
            </div>
            <div id="page-content">
				<div class="row">
                    <?php $this->load->view('msg_view'); ?>
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">A list of all orders in the Database</h3>
						</div>
						<div class="panel-body">
							<table id="order-datatable" class="table table-striped table-bordered" cellspacing="0"
								   width="100%">
								<thead>
								<tr>
									<th>Order Code</th>
									<th class="text-center">Customer Name / Billing Address</th>
                                    <th>Delivering to State (Area)</th>
									<th class="min-desktop">Total Quantity</th>
									<th class="min-desktop">Total Amount (&#8358;)</th>
									<th class="min-desktop">Date Ordered</th>
                                    <?php if($profile->groups != 4 ): #This conditioon has already been checked from the server though
                                        ?>
									<th class="min-desktop">Assigned To</th>
                                    <?php endif; ?>
								</tr>
								</thead>
								<tbody>
									<?php foreach( $orders as $order ): ?>
										<tr>
											<td><a class="btn-link" href="<?= base_url('orders/detail/' . $order->order_code); ?>"><?= $order->order_code; ?></a></td>
											<td class="text-center">
                                                <?php
                                                $delivery = '';
                                                if( $order->pickup_location_id != 0 ) {
                                                    // Get the delivery address
                                                    $result = $this->admin->get_pickup_address( $order->pickup_location_id );
                                                    $delivery = '<strong>To Pickup At :</strong>' .$result->title . ' - '. $result->phones.', '. $result->address .' '. $result->emails;
                                                }else{
                                                    $delivery = '<b>Delivering To :</b><b>Name </b>' . $order->first_name . ' ' . $order->last_name . '; <b> Phone :</b> ' . $order->phone . '; <b>Address: </b>' .$order->address;
                                                }
                                                echo $delivery;
                                                ?>
                                            </td>
                                            <td><?= $order->state . ' ('. $order->area. ')'; ?></td>
											<td class="text-center"><?= $order->qty; ?></td>
											<td><?= ngn($order->amount * $order->qty); ?></td>
											<td><?= neatDate($order->order_date); ?></td>
                                            <?php if($profile->groups != 4 ): # if not sales rep  ?>
											    <td>
                                                <?php if($order->agent == 0 ) : #No agent has been assigned yet  ?>
                                                <form class="form-inline" id="<?= $order->order_code; ?>" >
                                                    <div class="form-group-sm">
                                                        <select class="form-control" required name="agent_id">
                                                            <option value="">Select Agent</option>
                                                            <?php
                                                            $agents = $this->admin->get_agent();
                                                            foreach($agents as $agent):?>
                                                                <option value="<?= $agent->id?>"><?= ucwords($agent->first_name . ' ' . $agent->last_name);?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <input type="hidden" name="order_code" value="<?= $order->order_code; ?>">
                                                    <button type="button" class="btn btn-danger btn-sm assign-agent" data-id="<?= $order->order_code; ?>">Assign</button>
                                                </form>
                                                <?php else :
                                                    $u = $this->admin->get_agent($order->agent);
                                                    $user = $u->first_name .' '.$u->last_name;
                                                    ?>
                                                    <span class="text text-semibold"><?= ucwords($user); ?></span>
                                                <?php endif; ?>
                                            </td>
                                            <?php endif; ?>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>

					</div>

				</div>

                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
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
<?php $this->load->view('templates/confirm_modal'); ?>
<?php $this->load->view('templates/scripts'); ?>
<script>
    $('#order-datatable').dataTable({
        "responsive": true,
        "language": {
            "paginate": {
                "previous": '<i class="demo-psi-arrow-left"></i>',
                "next": '<i class="demo-psi-arrow-right"></i>'
            }
        }
    });

    let order_code;
    $('.assign-agent').on('click', function () {
        order_code = $(this).data('id');
        $('#modal_confirm')
            .find('.modal-header > p')
            .text(`Confirm to mark this agent to follow up on this order #${order_code} item(s).`).end()
            .modal('show');
    });

    $('#confirm_true').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: base_url + 'orders/assign_agent/',
            data: $(`#${order_code}`).serialize(),
            type: "POST",
            dataType: 'json',
            success: function (data) {
                window.location.href = base_url + "orders/";
            },
            error: function (data) {
                window.location.href = base_url + "orders/";
            }
        });
    });
</script>
</body>
</html>
