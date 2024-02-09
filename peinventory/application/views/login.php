<?php $this->load->view('layouts/header') ?>


<div class="login-box">
  <div class="login-logo">
    <body>   
    
  </div>
  <!-- /.login-logo -->
  <div class="">
    <img src="assets/dist/img/citlogoshs.png" class="center">
    <style>
    .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  height:30%;
  width: 30%; 
}
</style>
<br>

    <p><font size="5" class="login-box-msg">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspP.E. Department

    </font>
    </p>

    <!-- flash -->
    <div id="msg"></div>

    <form>
      <div class="form-group has-feedback">
        <input id="un" type="text" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="pwd" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        
        <!-- progres bar -->
        <div class="col-xs-6 pull-right" id="loader" style="display: none;">
          <button disabled class="btn btn-primary btn-block btn-flat">
            <i class="fa fa-spinner fa-spin"></i> Connecting
          </button>
        </div>

        <div class="col-xs-6 pull-right">
          <button id="btn-login" type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        
      </div>
    </form>


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php $this->load->view('layouts/scripts') ?>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>

<?php $this->load->view('scripts/login') ?>
<?php $this->load->view('layouts/footer') ?>