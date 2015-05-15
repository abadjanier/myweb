<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo lang('login_heading');?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?= base_url()?>assets/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?= base_url()?>assets/admin/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="<?= base_url()?>assets/admin/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
      <div class="container">
          <div class="dropdown" style="float: right">
              <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Tutorials
                  <span class="caret"></span></button>
              <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="menu1">
                  <li role="presentation" >
                      <?php if ($this->session->idiom == 'spanish') { ?>
                          <a role="menuitem" tabindex="-1" href="<?= base_url() ?>/lang/cat">
                              <img alt="" class="img-circle" src="<?= base_url(); ?>assets/global/img/flags/catalan.png"> Catala </a>
                      <?php } else { ?>
                          <a role="menuitem" tabindex="-1" href="<?= base_url() ?>/lang/es">
                              <img alt="" class="img-circle" src="<?= base_url(); ?>assets/global/img/flags/spanish.png"> Espanyol </a>
                      <?php } ?>
                  </li>
                  <!-- END QUICK SIDEBAR TOGGLER -->
              </ul>
          </div>
      </div>
  </div>
      
    <div class="login-box">
      <div class="login-logo">
          <span><?php echo lang('activate_user_password_heading');?></span>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <div id="infoMessage"><?php if ($message) echo $message;?></div>
        <?php echo validation_errors(); ?>
        <?php echo form_open("admin/auth/activateuser");?>
          <div class="form-group has-feedback">
              <input type="password" name="password" class="form-control" placeholder="<?= lang('activate_user_password')?>">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
              <input type="password" name="repeat_password" class="form-control" placeholder="<?= lang('activate_user_repeat_password')?>">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
        <div class="row">
            <div class="col-xs-12">
                <input type="hidden" name="id" value="<?= $id?>">
                  <input type="hidden" name="code" value="<?= $code?>">
                <button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo lang('activate_user_save_password'); ?></button>
            </div><!-- /.col -->
        </div>
        <?php echo form_close();?>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="<?= base_url()?>assets/admin/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?= base_url()?>assets/admin/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?= base_url()?>assets/admin/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>