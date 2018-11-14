<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $page_title; ?></title>
    <link rel="shortcut icon" href="<?= base_url('assets/landing/img/favicon.png'); ?>" type="image/png">
    <link rel="icon" href="<?= base_url('assets/landing/img/favicon.png'); ?>" type="image/png">
    <link rel="canonical" href="<?= current_url(); ?>"/>
    <!--=================================================-->
    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="<?= base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/nifty.min.css')?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/demo/nifty-demo-icons.min.css')?>" rel="stylesheet">
    <?php if( in_array($pg_name, array('product','template', 'settings','select_category','category','sub_category'))) :?>
        <link href="<?= base_url('assets/plugins/bootstrap-validator/bootstrapValidator.min.css')?>" rel="stylesheet">
        <link href="<?= base_url('assets/plugins/dropzone/dropzone.min.html')?>" rel="stylesheet">
        <link href="<?= base_url('assets/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css')?>" rel="stylesheet">
        <link href="<?= base_url('assets/plugins/bootstrap-select/bootstrap-select.min.css')?>" rel="stylesheet">
        <link href="<?= base_url('assets/plugins/bootstrap-table/bootstrap-table.min.css')?>" rel="stylesheet">
        <link href="<?= base_url('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')?>" rel="stylesheet">
    <?php endif; ?>
    <?php if( in_array($pg_name, array('manage_product','sellers','product','orders') ) ): ?>
        <!--DataTables [ OPTIONAL ]-->
        <link href="<?= base_url('assets/plugins/datatables/media/css/dataTables.bootstrap.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css'); ?>" rel="stylesheet">
    <?php endif;?>
    <style>
        #demo-nifty-settings{
            display: none;
        }
         #demo-nifty-settings{
             display: none;
         }
        .panel-title{
            color:#fff;
            background: #425865 !important;
        }
        .panel-title:hover{
            background: #1ca28b !important;
            color:#fff;
        }
    </style>

