<script>
$(document).ready(function() {
    done();

    function done() {
        setTimeout(() => {
            showGraph1();
            showGraph2();
            showGraph3();
            showGraph4();
            done();
        }, 500);
    }



    function showGraph1() {
        $.ajax({
            method: "GET",
            url: "<?= base_url() ?>/data_sensor?order=desc&limit=60&lokasi=benoa",
            success: function(e) {
                var nama = [],
                    values = [];
                for (var i in e) {
                    nama.push(e[i].jam);
                    values.push(e[i].suhu);
                }
                var ctx = document.getElementById("line_suhu").getContext('2d');
                var panzerChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: nama.reverse(),
                        datasets: [{
                            label: "Suhu",
                            data: values.reverse(),
                            backgroundColor: ['rgba(222, 52, 70, 0.2)'],
                            borderColor: ['rgba(222, 52, 70, 1)']
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        legend: {
                            display: true,
                            position: 'bottom'
                        },
                        animation: {
                            duration: 0
                        },
                        hover: {
                            animationDuration: 0
                        },
                        responsiveAnimationDuration: 0
                    }
                });
            }
        });
    }



    function showGraph2() {
        $.ajax({
            method: "GET",
            url: "<?= base_url() ?>/data_sensor?order=desc&limit=60&lokasi=benoa",
            success: function(e) {
                var nama = [],
                    values = [];
                for (var i in e) {
                    nama.push(e[i].jam);
                    values.push(e[i].arus);
                }
                var ctx = document.getElementById("line_arus").getContext('2d');
                var panzerChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: nama.reverse(),
                        datasets: [{
                            label: "Arus",
                            data: values.reverse(),
                            backgroundColor: ['rgba(250, 194, 12, 0.2)'],
                            borderColor: ['rgba(250, 194, 12, 1)']
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        legend: {
                            display: true,
                            position: 'bottom'
                        },
                        animation: {
                            duration: 0
                        },
                        hover: {
                            animationDuration: 0
                        },
                        responsiveAnimationDuration: 0
                    }
                });
            }
        });
    }


    function showGraph3() {
        $.ajax({
            method: "GET",
            url: "<?= base_url() ?>/data_sensor?order=desc&limit=60&lokasi=benoa",
            success: function(e) {
                var nama = [],
                    values = [];
                for (var i in e) {
                    nama.push(e[i].jam);
                    values.push(e[i].tegangan);
                }
                var ctx = document.getElementById("line_tegangan").getContext('2d');
                var panzerChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: nama.reverse(),
                        datasets: [{
                            label: "Tegangan",
                            data: values.reverse(),
                            backgroundColor: ['rgba(53, 60, 67, 0.2)'],
                            borderColor: ['rgba(53, 60, 67, 1)']
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        legend: {
                            display: true,
                            position: 'bottom'
                        },
                        animation: {
                            duration: 0
                        },
                        hover: {
                            animationDuration: 0
                        },
                        responsiveAnimationDuration: 0
                    }
                });
            }
        });
    }

    function showGraph4() {
        $.ajax({
            method: "GET",
            url: "<?= base_url() ?>/data_sensor?order=desc&limit=60&lokasi=benoa",
            success: function(e) {
                var nama = [],
                    values = [];
                for (var i in e) {
                    nama.push(e[i].jam);
                    values.push(e[i].daya);
                }
                var ctx = document.getElementById("line_daya").getContext('2d');
                var panzerChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: nama.reverse(),
                        datasets: [{
                            label: "Daya",
                            data: values.reverse(),
                            backgroundColor: ['rgba(222, 52, 70, 0.2)'],
                            borderColor: ['rgba(222, 52, 70, 1)']
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        legend: {
                            display: true,
                            position: 'bottom'
                        },
                        animation: {
                            duration: 0
                        },
                        hover: {
                            animationDuration: 0
                        },
                        responsiveAnimationDuration: 0
                    }
                });
            }
        });
    }


});
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Real Time Monitor</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </div>



    <section class="content">
        <div class="container-fluid">

            <div class="row">

                <div class="card card-primary card-outline col-lg-12">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="far fa-chart-bar"></i>
                            Suhu
                        </h3>
                    </div>
                    <div class="card-body">
                        <div id="grafik">
                            <canvas id="line_suhu"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body-->
                </div>

                <div class="card card-primary card-outline col-lg-12">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="far fa-chart-bar"></i>
                            Arus
                        </h3>
                    </div>
                    <div class="card-body">
                        <div id="grafik">
                            <canvas id="line_arus"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body-->
                </div>

                <div class="card card-primary card-outline col-lg-12">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="far fa-chart-bar"></i>
                            Tegangan
                        </h3>
                    </div>
                    <div class="card-body">
                        <div id="grafik">
                            <canvas id="line_tegangan"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>


                <div class="card card-primary card-outline col-lg-12">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="far fa-chart-bar"></i>
                            Daya
                        </h3>
                    </div>
                    <div class="card-body">
                        <div id="grafik">
                            <canvas id="line_daya"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>



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