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
                                            <th scope="col">latitudeMin</th>
                                            <th scope="col">longitudeMin</th>
                                            <th scope="col">latitudeMax</th>
                                            <th scope="col">longitudeMax</th>
                                            <th scope="col">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        foreach ($location_range->result_array() as $key) {
                                            ?>
                                        <tr>
                                            <th scope="row"><?= $i++ ?></th>
                                            <td><?= $key['latitudeMin'] ?></td>
                                            <td><?= $key['longitudeMin'] ?></td>
                                            <td><?= $key['latitudeMax'] ?></td>
                                            <td><?= $key['longitudeMax'] ?></td>
                                            <td>
                                                <a
                                                    href="<?= base_url('monitoring/update_location_range?id=').$key['id'] ?>">
                                                    <button type="button" class="btn btn-success">Detail</button>
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