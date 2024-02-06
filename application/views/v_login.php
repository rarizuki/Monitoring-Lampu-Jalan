
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?></title>
    <!--CustomCSS -->
    <link href="<?php echo base_url(); ?>assets/back-end/vendor/CustomCss/CssFix.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/back-end/vendor/CustomCss/loginForm.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/back-end/js/sweetalert2.css" rel="stylesheet" type="text/css">


    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/back-end/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url(); ?>assets/back-end/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/back-end/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>assets/back-end/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

   
</head>

<body class="bg">

         <div class="container-lg">
            <div class="row">
                <?php 
                //notifikasi error
              echo validation_errors('<div class="alert alert-warning">','</div>');
              //notifikasi

              if ($this->session->flashdata('warning')) {
                echo '<div class="alert alert-warning">';
                echo $this->session->flashdata('warning');
                echo '</div>';
                # code...
              }?>
            </div>
            <div class="row">
                <?php
                if ($this->session->flashdata('sukses')) {
                  echo '<div class="alert alert-success">';
                echo $this->session->flashdata('sukses');
                echo '</div>';
                # code...
              }
              //form open
              echo form_open(base_url('login'),'class="form-horizontal" entype="multipart/formdata"');
              ?>
            </div>
        </div>

            <div class="contain">
                <div class="form">
                    
                    <h2 style="color: white; text-align: center;">Please Sign In</h2>
                    <div class="inputBox">
                        <div class="col-sm-12">
                            <!-- <div class="panel-body"> -->
                                   
                                    
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input  placeholder="Username" name="username" type="text" autofocus>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input placeholder="Password" name="password" type="password" value="">
                                    </div>
                                </div>
                                        
                                <div class="col-sm-6 miring">
                                    <button type="submit" class="btn btn-success btn-block"><i class="fa fa-sign-out"></i>Login</button>
                                </div>
                                <div class="col-sm-6">
                                    <a class="btn btn-block" type="submit" href="<?php echo base_url(); ?>"><i class="fa fa-globe"></i> Web</a>
                                </div>

                               <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- jQuery -->
            <script src="<?php echo base_url(); ?>assets/back-end/vendor/jquery/jquery.min.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="<?php echo base_url(); ?>assets/back-end/vendor/bootstrap/js/bootstrap.min.js"></script>

            <!-- Metis Menu Plugin JavaScript -->
            <script src="<?php echo base_url(); ?>assets/back-end/vendor/metisMenu/metisMenu.min.js"></script>

            <!-- Custom Theme JavaScript -->
            <script src="<?php echo base_url(); ?>assets/back-end/dist/js/sb-admin-2.js"></script>
            <script src="<?php echo base_url(); ?>assets/back-end/dist/js/sweetalert2.js"></script>

</body>

</html>
