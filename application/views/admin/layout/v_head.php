
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?></title>
    
 <!-- BEGIN PAGE LEVEL STYLES -->
 <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/table/datatable/dt-global_style.css">\
    <link href="<?php echo base_url(); ?>assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/style-img.css" rel="stylesheet" type="text/jcss">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/plugins/bootstrap-select/bootstrap-select.min.css">
    <link href="<?php echo base_url() ?>assets/css/components/custom-counter.css" rel="stylesheet" type="text/css">
    <script src="<?php echo base_url(); ?>assets/js/libs/jquery-3.1.1.min.js"></script>
    

    
    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>assets/back-end/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/font-icons/fontawesome/css/fontawesome.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/font-icons/fontawesome/css/regular.css">
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="<?php echo base_url(); ?>assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <?php echo $map['js']; ?>
</head>