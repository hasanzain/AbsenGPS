<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Form Report</h1>
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
                        <h3 class="card-title">Select Report Data</h3>
                    </div>
                    <?= $this->session->flashdata('message')?>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="<?= base_url("monitoring/report") ?>" method="POST">
                            <div class="form-group row">
                                <label for="example-month-input" class="col-2 col-form-label">From</label>
                                <div class="col-10">
                                    <select class="form-control" id="fromreport" name="fromreport">
                                        <?php foreach ($tabel as $key) {
                                          ?>
                                        <option value="<?= $key['nama_tabel'] ?>"><?= $key['nama_tabel'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-date-input" class="col-2 col-form-label">Date</label>
                                <div class="col-10">
                                    <input class="form-control" type="date" id="example-date-input" name="tanggal">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-date-input" class="col-2 col-form-label">Until</label>
                                <div class="col-10">
                                    <input class="form-control" type="date" id="example-date-input" name="until">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-date-input" class="col-2 col-form-label">Time</label>
                                <div class="col-10">
                                    <input class="form-control" type="time" id="example-date-input" name="time">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-date-input" class="col-2 col-form-label">Until</label>
                                <div class="col-10">
                                    <input class="form-control" type="time" id="example-date-input" name="timeuntil">
                                </div>
                            </div>
                            <div class="form-group row">
                                <input class="btn btn-primary" type="submit" value="Export Excel">
                            </div>

                        </form>
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