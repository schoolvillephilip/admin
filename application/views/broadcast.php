<?php $this->load->view('templates/meta_tags'); ?>
</head>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">
    <?php $this->load->view('templates/head_navbar'); ?>
    <div class="boxed">
        <div id="content-container">
            <div id="page-head">
                <div id="page-title">
                    <h1 class="page-header text-overflow">Send Broadcats</h1>
                </div>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Broadcast</a></li>
                    <li class="active">Send Broadcast</li>
                </ol>
            </div>
            <div id="page-content">

                <div class="row">
                <div class="col-lg-12">
					        <div class="panel">
					            <div class="panel-heading">
					                <h3 class="panel-title">Send Broadcast Message to System Users</h3>
					            </div>
					            <form class="form-horizontal">
					                <div class="panel-body">
					                    <div class="row">
					                        <div class="col-md-6 mar-btm">
					                            <label>Message Type</label>
					                            <select class="form-control">
                                                    <option>--select--</option>
                                                    <option>Email</option>
                                                    <option>SMS</option>
                                                </select>
					                        </div>
					                        <div class="col-md-6 mar-btm">
					                            <label>Select Reciever Account Type</label>
					                            <select class="form-control" id="reciever_type">
                                                    <option>--select--</option>
                                                    <option>Accountant</option>
                                                    <option>Manager</option>
                                                    <option>Sales Rep</option>
                                                    <option>Sellers</option>
                                                    <option>All Users</option>
                                                    <option value="custom">Custom</option>
                                                </select>
					                        </div>
					                    </div>
                                        <div style="display:none;" id="custom_reciever">
                                        <label>Emails / Phone Numbers</label>
                                        <input type="text" class="form-control mar-btm" placeholder="Separate entrie with a comma(,)">
                                        </div>
					                    <textarea placeholder="Message" rows="7" class="form-control"></textarea>
					                </div>
					                <div class="panel-footer text-right">
					                    <button class="btn btn-primary" type="submit">Send message</button>
					                </div>
					            </form>
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
    $('#reciever_type').on('change',function(){
        let selected_value = $('#reciever_type').val();
        if(selected_value == "custom"){
            $('#custom_reciever').show();
        }else{
            $('#custom_reciever').hide();
        }
    });
</script>
</body>
</html>
