<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Relay Control</h1>
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
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">

                <div class="card col-md">
                    <div class="card-header">
                        <h3 class="card-title">List Relay</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card col-md">
                            <div class="row">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Relay</th>
                                            <th scope="col">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        foreach ($relay->result_array() as $key) {
                                            ?>
                                        <tr>
                                            <th scope="row"><?= $i++ ?></th>
                                            <td><?= $key['nama_relay'] ?></td>
                                            <td>
                                                <a
                                                    href="<?= base_url('monitoring/update_relay?id=').$key['id'].'&nilai='.$key['nilai'] ?>">
                                                    <button type="button"
                                                        class="btn btn-<?= $key['button'] ?>"><?= $key['status'] ?></button>
                                            </td>
                                            </a>
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
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->