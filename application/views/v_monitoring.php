<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-primary">DAFTAR ABSENSI</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">

            <form action="monitoring" method="POST">
                <div class="input-group mb-3 col-lg-5">
                    <span class="input-group-text">Filter</span>
                    <input type="text" class="form-control" placeholder="NRP" aria-label="NRP" name="nip">
                    <input type="date" class="form-control" name="tanggal">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
                </div>
            </form>

            <form action="monitoring/export_csv" method="POST">
                <div class="input-group mb-3 col-lg-5">
                    <span class="input-group-text">Filter</span>
                    <input type="text" class="form-control" placeholder="NRP" aria-label="NRP" name="nip">
                    <input type="date" class="form-control" name="tanggal">
                    <button class="btn btn-outline-success" type="submit" id="button-addon2">Export Data</button>
                </div>
            </form>
                

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
                                            <th scope="col">LOKASI</th>
                                            <th scope="col">JAM</th>
                                            <th scope="col">TANGGAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=0;
                                        foreach ($absensi->result_array() as $key) {
                                            ?>
                                        <tr>
                                            <th scope="row"><?= $i++ ?></th>
                                            <td><?= $key['nama'] ?></td>
                                            <td><?= $key['nip'] ?></td>
                                            <td><?= $key['pangkat'] ?></td>
                                            <td><a href="https://www.google.com/maps/search/?api=1&query=<?= $key['latitude'] ?>,<?= $key['longitude'] ?>&hl=id"
                                                    target="blank">Klik Disini</a></td>
                                            <td><?= $key['jam'] ?></td>
                                            <td><?= $key['tanggal'] ?></td>
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

            </div>
            <!-- /.content-wrapper -->
    </section>




    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-secondary">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->