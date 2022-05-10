<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">UPDATE LOCATION RANGE</h1>
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
        <form action="<?= base_url('monitoring/update_location_range_') ?>" method="post">
            <?php
            $i=0;
            foreach ($location_range->result_array() as $key) {
            ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Latitude Min</label>
                    <input type="text" class="form-control" id="latitudeMin" name="latitudeMin"
                        value="<?= $key['latitudeMin'] ?>">
                    <input type="text" class="form-control" id="id" name="id" value="<?= $key['id'] ?>" hidden>
                    <?= form_error('latitudeMin', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Latitude Max</label>
                    <input type="text" class="form-control" id="latitudeMax" name="latitudeMax"
                        value="<?= $key['latitudeMax'] ?>">
                    <?= form_error('latitudeMax', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">longitude Min</label>
                    <input type="text" class="form-control" id="longitudeMin" name="longitudeMin"
                        value="<?= $key['longitudeMin'] ?>">
                    <?= form_error('longitudeMin', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Longitude Max</label>
                    <input type="text" class="form-control" id="longitudeMax" name="longitudeMax"
                        value="<?= $key['longitudeMax'] ?>">
                    <?= form_error('LongitudeMax', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group col-md-6">
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>
            </div>
            <?php
                                        }
            ?>

        </form>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->