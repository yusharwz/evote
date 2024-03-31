<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $this->M_Web->view('deskripsi'); ?>">
    <meta name="keywords" content="<?php echo $this->M_Web->view('keyword'); ?>">
    <meta name="author" content="<?php echo $this->M_Web->view('autor'); ?>">
    <title><?= $judul_web; ?></title>
    <base href="<?php echo base_url(); ?>">
    <link rel="icon" href="<?php echo $this->M_Web->view('favicon'); ?>">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/parsley.min.css" rel="stylesheet">
    <link href="assets/css/sticky-footer-navbar.css" rel="stylesheet">
  </head>
  <body style="background:#f1f1f1;">

    <div class="panel panel-default">
      <div class="panel-heading text-center">
        <b style="font-size:20px;">
          <?php echo $this->M_Web->view('judul_web'); ?> <br>
          <?php echo $this->M_Web->view('judul_web2'); ?>
        </b>
      </div>
    </div>

    <div class="container-fluid">
      <?php $this->load->view($content); ?>
    </div>

    <center><?php echo $this->M_Web->view('footer'); ?></center>

    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/parsley.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
