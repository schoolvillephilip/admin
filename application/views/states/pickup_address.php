<?php $this->load->view('templates/meta_tags'); ?>
</head>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">

    <!--NAVBAR-->
    <!--===================================================-->
    <?php $this->load->view('templates/head_navbar'); ?>
    <!--===================================================-->
    <!--END NAVBAR-->

    <div class="boxed">

        <!--CONTENT CONTAINER-->
        <!--===================================================-->
        <div id="content-container">
            <div id="page-head">
                <!--Page Title-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <div id="page-title">
                    <h1 class="page-header text-overflow">Pickup Address</h1>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End page title-->
                <!--Breadcrumb-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Shipping</a></li>
                    <li class="active">Pickup Address</li>
                </ol>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End breadcrumb-->
            </div>
            <!--Page content-->
            <!--===================================================-->

            <div id="page-content">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add Pickup Address</h3>
                    </div>
                    <div class="panel-body">
                        <?php $this->load->view('msg_view'); ?>
                        <?= form_open('', 'class="form-horizontal"'); ?>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="pka_name">Store Title</label>
                                <div class="col-md-9">
                                    <input type="text" id="pka_name" name="title" class="form-control" placeholder="Enter Title">
                                    <small class="help-block">Enter the title of the pickup location</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="pka_phones">Phones of Store Workers</label>
                                <div class="col-md-9">
                                    <input type="text" id="pka_phones" name="phones" class="form-control" placeholder="Enter Phones">
                                    <small class="help-block">Enter the phone numbers of workers separated by a comma(,)</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="pka_mails">Emails of Store Workers</label>
                                <div class="col-md-9">
                                    <input type="text" id="pka_mails" name="email" class="form-control" placeholder="Enter Emails">
                                    <small class="help-block">Enter the emails of workers separated by a comma(,)</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="pka_add">Store Address</label>
                                <div class="col-md-9">
                                    <input type="text" id="pka_add" name="address" class="form-control" placeholder="Enter Address">
                                    <small class="help-block">Enter the pickup location address in full</small>
                                </div>
                            </div>

                            <div class="form-group pad-ver">
                                <label class="col-md-3 control-label">Pickup Location Enabled</label>
                                <div class="col-md-9">
                                    <div class="radio">
                                        <input id="enable" class="magic-radio" type="radio" name="enable" value="1" checked>
                                        <label for="enable">Yes</label>
                                        <input id="not-enable" class="magic-radio" type="radio" value="0" name="enable">
                                        <label for="not-enable">No</label>
                                    </div>
                                </div>
                            </div>
                            <?php if( $areas) :  ?>
                            <div class="form-group pad-ver">
                                <label class="col-md-3 control-label">Pickup Location Enabled</label>
                                <div class="col-md-9">
                                    <div class="row">
                                        <?php foreach($areas as $area) : ?>
                                            <div class="col-md-3">
                                                <div class="radio">
                                                    <input id="<?= $area->id; ?>" class="magic-checkbox" type="checkbox" name="areas[]" value="<?= $area->id; ?>">
                                                    <label for="<?= $area->id; ?>"><?= ucwords($area->name); ?></label>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <?php  endif; ?>
                            <div class="panel-footer text-center">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        <?= form_close(); ?>
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">All Pickup Addresses</h3>
                    </div>
                    <div class="panel-body">
                        <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>Store Name</th>
                                <th>Phones</th>
                                <th>Email</th>
                                <th class="min-tablet">Address</th>
                                <th class="min-tablet">Available Area</th>
                                <th class="min-desktop">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach( $pickup_address as $address) : ?>
                                    <tr>
                                        <td><?= $address->title; ?></td>
                                        <td><?= $address->phones; ?></td>
                                        <td><?= $address->emails; ?></td>
                                        <td><?= $address->address;?></td>
                                        <td>

                                            <?php
                                            $selected = json_decode($address->available_area);
                                            foreach ($areas as $area ):
                                                if(in_array($area->id, $selected)) echo ucwords($area->name) .','; ?>
                                            <?php endforeach; ?>
                                        </td>
                                        <td><?= ( $address->enable == 1 ) ? 'Enabled': 'Disabled';?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--===================================================-->
                <!--End page content-->
            </div>


        </div>

    </div>
    <!--MAIN NAVIGATION-->
    <!--===================================================-->
    <?php $this->load->view('templates/menu'); ?>
    <!--===================================================-->
    <!--END MAIN NAVIGATION-->

    <!-- FOOTER -->
    <!--===================================================-->
    <?php $this->load->view('templates/footer'); ?>
    <!--===================================================-->
    <!-- END FOOTER -->


    <!-- SCROLL PAGE BUTTON -->
    <!--===================================================-->
    <button class="scroll-top btn">
        <i class="pci-chevron chevron-up"></i>
    </button>
    <!--===================================================-->
    <!--===================================================-->
    <!-- END OF CONTAINER -->
    <!--JAVASCRIPT-->
    <!--=================================================-->
</div>

<?php $this->load->view('templates/scripts'); ?>
</body>
</html>
