<script>
$(document).ready(function() {
    live_data();
})

function live_data() {
    setTimeout(function() {
        data_sensor();
        icmp();
        live_data();
    }, 1000);
}

function data_sensor() {
    $.ajax({
        url: "<?= base_url() ?>/data_sensor?order=desc&limit=1",
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            $('#line_suhu').html(data[0]["suhu"] + " C");
            $('#line_arus').html(data[0]["arus"] + " A");
            $('#line_tegangan').html(data[0]["tegangan"] + " V");
            $('#line_daya').html(data[0]["daya"] + " W");
        }
    });
}


function icmp() {
    $.ajax({
        url: "<?= base_url() ?>/icmp?order=desc&limit=1&lokasi=benoa",
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            $('#relay1').html("status ICMP : " + data[0]["icmp_1"]);
            $('#relay2').html("status ICMP : " + data[0]["icmp_2"]);
            $('#relay3').html("status ICMP : " + data[0]["icmp_3"]);
            $('#relay4').html("status ICMP : " + data[0]["icmp_4"]);
            $('#relay5').html("status ICMP : " + data[0]["icmp_5"]);
            $('#relay6').html("status ICMP : " + data[0]["icmp_6"]);
            $('#relay7').html("status ICMP : " + data[0]["icmp_7"]);
            $('#relay8').html("status ICMP : " + data[0]["icmp_8"]);

        }
    });
}
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-primary">Sensor Benoa</h1>


                    <h3 class="m-0 text-secondary">Data</h3>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">

            <div class="row">


                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger elevation-1"><i
                                class="fas fa-thermometer-quarter"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Suhu</span>
                            <span class="info-box-number">
                                <div id="line_suhu"></div>
                            </span>
                        </div>

                    </div>
                </div>

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-water"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Arus</span></span>
                            <span class="info-box-number">
                                <div id="line_arus"></div>
                            </span>
                        </div>

                    </div>
                </div>


                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-bolt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Tegangan</span>
                            <span class="info-box-number">
                                <div id="line_tegangan"></div>
                            </span>
                        </div>

                    </div>
                </div>

                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-dumbbell"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Daya</span>
                            <span class="info-box-number">
                                <div id="line_daya"></div>
                            </span>
                        </div>

                    </div>
                </div>

                <div class="clearfix hidden-md-up"></div>

                <div class="card col-md">

                    <div class="card-header">
                        <h3 class="card-title">List Relay</h3>
                    </div>

                    <div class="row">

                        <?php
                                        $i=1;
                                        foreach ($relay->result_array() as $key) {
                                            ?>

                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="info-box">
                                <span class="info-box-icon elevation-1">
                                    <a
                                        href="<?= base_url('monitoring/update_relay?id=').$key['id'].'&nilai='.$key['nilai'] ?>">
                                        <button type="button"
                                            class="btn btn-<?= $key['button'] ?>"><?= $key['status'] ?></button>
                                    </a>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><?= $key['nama_relay'] ?></span>
                                    <div id="<?= $key['nama_relay'] ?>"></div>
                                </div>

                            </div>
                        </div>
                        <?php
                                        }
                                        ?>

                    </div>



                </div>



            </div>
            <!-- /.content-wrapper -->
    </section>



    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-secondary">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->