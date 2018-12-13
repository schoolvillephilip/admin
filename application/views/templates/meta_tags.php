<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noindex,nofollow">
    <title><?= $page_title; ?> - <?= lang('app_name'); ?></title>
    <link rel="shortcut icon" href="<?= base_url('assets/img/favicon.png'); ?>" type="image/png">
    <link rel="icon" href="<?= base_url('assets/img/favicon.png'); ?>" type="image/png">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/nifty.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/plugins/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/demo/nifty-demo-icons.min.css') ?>" rel="stylesheet">
    <?php if (in_array($pg_name, array('product', 'template', 'settings', 'select_category', 'category', 'sub_category'))) : ?>
        <link href="<?= base_url('assets/plugins/bootstrap-validator/bootstrapValidator.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/plugins/dropzone/dropzone.min.html') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css') ?>"
              rel="stylesheet">
        <link href="<?= base_url('assets/plugins/bootstrap-select/bootstrap-select.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/plugins/bootstrap-table/bootstrap-table.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') ?>"
              rel="stylesheet">
    <?php endif; ?>
    <?php if (in_array($pg_name, array('manage_product', 'sellers', 'product', 'orders'))): ?>
        <link href="<?= base_url('assets/plugins/datatables/media/css/dataTables.bootstrap.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css'); ?>"
              rel="stylesheet">
    <?php endif; ?>
    <?php if($pg_name =='report'):?>
        <link href="<?= base_url('assets/plugins/datatables/media/css/dataTables.bootstrap.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css'); ?>" rel="stylesheet">
    <?php endif; ?>
    <?php if($pg_name == 'store_settings'): ?>
    <link href="<?= base_url('assets/plugins/bootstrap-select/bootstrap-select.min.css')?>" rel="stylesheet">
    <?php endif; ?>
    <link href="<?= base_url('assets/plugins/morris-js/morris.min.css'); ?>" rel="stylesheet">
    <style>
        #demo-nifty-settings {display: none; }

        .panel-title { color: #fff; background: #425865 !important; }

        .panel-title:hover { background: #1ca28b !important; color: #fff; }
    </style>

