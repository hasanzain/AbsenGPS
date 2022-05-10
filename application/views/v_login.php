<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>LOGIN</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <?= $this->session->flashdata('message');
                 ?>

                <form action="<?= base_url('auth') ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="nip" id="nip" placeholder="nip"
                            value="<?= set_value('nip') ?>">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                    </div>
                    <?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-4">
                            <input type="submit" class="btn btn-primary btn-block" value="Sign In">
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                <!-- /.social-auth-links -->


            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->