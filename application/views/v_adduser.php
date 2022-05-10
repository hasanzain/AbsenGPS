<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="card col-md">

                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0 text-dark">Add User</h1>
                                    <?= $this->session->flashdata('message')?>
                                </div><!-- /.col -->
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                    </ol>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </div>
                    <!-- /.content-header -->

                    <!-- Main content -->
                    <section class="content">
                        <form action="<?= base_url('monitoring/adduser') ?>" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama">
                                    <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">NIP</label>
                                    <input type="text" class="form-control" id="nip" name="nip">
                                    <?= form_error('nip','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                    <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Pangkat</label>
                                    <input type="text" class="form-control" id="pangkat" name="pangkat">
                                    <?= form_error('pangkat','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="form-floating">
                                        <label for="alamat">Alamat</label>
                                        <textarea class="form-control" placeholder="Alamat" id="alamat" name="alamat"
                                            style="height: 100px"></textarea>
                                    </div>
                                    <?= form_error('alamat','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Email</label>
                                    <input type="text" class="form-control" id="email" name="email">
                                    <?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                            </div>
                            <input type="submit" value="Register" class="btn btn-primary">
                        </form>
                        <!-- /.content-wrapper -->

                        <!-- Control Sidebar -->
                        <aside class="control-sidebar control-sidebar-dark">
                            <!-- Control sidebar content goes here -->
                        </aside>
                        <!-- /.control-sidebar -->
                </div>
            </div>

        </div>
</section>