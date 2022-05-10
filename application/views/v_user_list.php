<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-primary">DAFTAR USER</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="card col-md">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card col-md">
                            <div class="row">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">NIP</th>
                                            <th scope="col">PANGKAT</th>
                                            <th scope="col">EMAIL</th>
                                            <th scope="col">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=0;
                                        foreach ($user->result_array() as $key) {
                                            ?>
                                        <tr>
                                            <th scope="row"><?= $i++ ?></th>
                                            <td><?= $key['nama'] ?></td>
                                            <td><?= $key['nip'] ?></td>
                                            <td><?= $key['pangkat'] ?></td>
                                            <td><?= $key['email'] ?></td>
                                            <td>
                                                <a href="<?= base_url('monitoring/update_user?id=').$key['id'] ?>">
                                                    <button type="button" class="btn btn-success">Detail</button>
                                                </a>
                                                <a href="<?= base_url('monitoring/delete_user?id=').$key['id'] ?>">
                                                    <button type="button" class="btn btn-danger">Delete</button>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>


                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
            <!-- /.content-wrapper -->
    </section>




    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-secondary">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->