<?php $this->load->view('templates/meta_tags'); ?>
</head>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">
	<?php $this->load->view('templates/head_navbar'); ?>
	<div class="boxed">
		<div id="content-container">
			<div id="page-head">
				<div id="page-title">
					<h1 class="page-header text-overflow">Approve Products</h1>
				</div>
				<ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Dashboard</a></li>
					<li><a href="#">Products</a></li>
					<li class="active">Approve Products</li>
				</ol>
			</div>
			<div id="page-content">
				<div class="row pad-ver">
					<?php $this->load->view('msg_view'); ?>
					<form action="#" method="post" class="col-xs-12 col-sm-10 col-sm-offset-1 pad-hor">
						<div class="input-group mar-btm">
							<input type="text" placeholder="Search Pending Product Records"
								   class="form-control input-lg">
							<span class="input-group-btn">
                     <button class="btn btn-primary btn-lg" type="button">Search</button>
                 </span>
						</div>
					</form>
				</div>
				<div class="row">
					<div class="panel" id="pr-spec">
						<div class="panel-heading">
							<h3 class="panel-title">A list of all pending products in the database</h3>
						</div>
						<div class="panel-body">
							<table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0"
								   width="100%">
								<thead>
								<tr>
                                    <th style="display: none;">Unique ID</th>
									<th>Product</th>
									<th>Category</th>
									<th>Seller</th>
									<th>Product Status</th>
									<th>Date Posted</th>
								</tr>
								</thead>
								<tbody>
									<?php foreach( $products as $product ): ?>
										<tr>
                                            <td style="display: none;"><?= $product->id; ?></td>
											<td><a class="btn-link" href="<?= base_url('product/detail/' . $product->id); ?>"><?= $product->product_name;?></a></td>
											<?php $category = $this->admin->get_single_category( $product->category_id ); ?>
											<td><?= !empty($category->name) ? $category->name : ''; ?></td>
											<td><a href="<?= base_url('sellers/detail/'. $product->seller_id); ?>"><?= ucwords($product->first_name . ' ' . $product->last_name); ?></a></td>
											<td><?= productStatus($product->product_status); ?></td>
											<td><?= neatDate($product->created_on); ?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
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
<script>
	$('#demo-dt-basic').dataTable({
		"responsive": true,
        "order": [[ 0, "desc" ]],
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
