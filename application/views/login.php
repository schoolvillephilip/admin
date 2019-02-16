<?php $this->load->view('templates/meta_tags.php'); ?>
</head>
<body>
<div id="container" class="cls-container" style="background-color: #fff !important;">
    <div id="bg-overlay"></div>
    <div class="cls-content ">
        <div class="cls-content-lg panel panel-colorful "
             style="border: 1px solid #26a69a !important;padding-top:10px;">
            <div class="panel-title" style="background-color: transparent !important;">
                <div class="row">
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4">
                        <a href="<?= base_url(); ?>">
                            <img src="<?= base_url('assets/img/onitshamarket-logo.png'); ?>"
                                 alt="<?= lang('app_name'); ?>"
                                 class="brand-title img-responsive">
                        </a>
                    </div>
                    <div class="col-md-4">

                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="mar-ver pad-btm">
                    <h1 class="h3 text-2x">Login</h1>
                    <p class="text-semibold">Sign in to your account</p>
                    <?php $this->load->view('msg_view'); ?>
                </div>
                <?= form_open('login/process'); ?>
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" name="email" autofocus>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
<!--                <div id="captcha">-->
<!--                    --><?//= $this->recaptcha->getWidget(); ?>
<!--                </div>-->
                <div class="checkbox pad-btm text-left">
                    <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox">
                    <label for="demo-form-checkbox">Remember me</label>
                </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Sign In</button>
                <?= form_close(); ?>
            </div>
<!--            <div class="pad-all">-->
<!--                <a href="--><?//= base_url('reset'); ?><!--" class="btn-link mar-rgt">Forgot password ?</a>-->
<!--            </div>-->
        </div>
    </div>

</div>
<?php $this->load->view('templates/scripts.php'); ?>
<?= $this->recaptcha->getScriptTag(); ?>
</body>
</html>
