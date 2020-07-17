<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin</b>Pasar</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="#" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="username" placeholder="Username">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <a href="<?= base_url('home') ?>" class="btn btn-warning">Kembali</a>
                    <button type="submit" class="btn btn-primary">Sign In</button>
                </div>
            </div>
        </form>
        <a href="#">I forgot my password</a><br>
        <a href="<?= base_url('Admin/Auth/registrasi') ?>" class="text-center">Register a new membership</a>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->