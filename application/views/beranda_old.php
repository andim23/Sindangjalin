                    <style type="text/css">
                        .fc-time{ display: none; }
                    </style>
                    <script src="<?=base_url('assets/global/plugins/jquery.min.js');?>" type="text/javascript"></script>
                    <script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
                    <script src="/https://code.highcharts.com/highcharts-3d.js"></script>
                    <link href="<?=base_url('assets/global/plugins/cubeportfolio/css/cubeportfolio.css');?>" rel="stylesheet" type="text/css" />
                    <link href="<?=base_url('assets/pages/css/portfolio.min.css');?>" rel="stylesheet" type="text/css" />
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Beranda
                        <small></small>
                    </h3>
                    <?php
                    // $x = ini_get('allow_url_fopen');
                    // echo "allow_url_fopen : ";
                    // if($x == 1){
                    // echo "On";
                    // } elseif ($x == 0){
                    // echo "Off";
                    // }
                    ?>
                    <!-- BEGIN DASHBOARD STATS 1-->
                    <div class="note note-info">
                        <b>Catatan</b>
                                        <p><b>*</b>&nbsp; &nbsp; &nbsp; &nbsp;Ini adalah rekapan data perjalanan dinas yg telah dilakukan, untuk melihat semua perjalanan dinas silahkan masuk ke menu yg telah disediakan. </p>
                                        <p><b>**</b>&nbsp; &nbsp; &nbsp;Ini adalah rekapan data rapat yg telah dilaksanakan, untuk melihat semua data rapat silahkan masuk ke menu yg telah disediakan. </p>
                    </div>
                    <div class="row" style="text-align: center;">
                        
                        
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 blue" href="<?php echo site_url('Master/lihat_jaldis'); ?>">
                                <div class="visual">
                                    <i class="icon-paper-plane"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="<?php echo count($data_jaldis); ?>">0</span> Data
                                    </div>
                                    <div class="desc"> Perjalanan Dinas DPRD* </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                                <div class="visual">
                                    <i class="fa fa-dollar"></i>
                                </div>
                                <div class="details">
                                    <div class="number">Rp 
                                        <?php
                                        foreach ($total_anggaran as $key => $ta) {                                        
                                        echo '<span data-counter="counterup" data-value="'.number_format($ta->total).'">0</span>';
                                        }
                                        ?> 
                                    </div>
                                    <div class="desc"> Total Anggaran </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 red" href="<?php echo site_url('Laporan/rapat'); ?>">
                                <div class="visual">
                                    <i class="icon-book-open"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="<?php echo count($data_rapat); ?>">0</span> Data </div>
                                    <div class="desc"> Rapat DPRD** </div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                                <div class="visual">
                                    <i class="fa fa-dollar"></i>
                                </div>
                                <div class="details">
                                    <div class="number">Rp 
                                        <span data-counter="counterup" data-value="<?php echo '0.00'; ?>"></span> </div>
                                    <div class="desc"> Total Anggaran </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- END DASHBOARD STATS 1-->
                    <div class="row">
                        <div class="col-md-6" style="text-align: center;">
                           <h3><b>Kalender Data JalDis</b></h3>
                           <br>
                           <div id="calendarIO2"></div>
                        </div>
                        <div class="col-md-6" style="text-align: center;">
                            <h3><b>Kalender Data Rapat</b></h3>
                            <br>
                            <div id="calendarIO"></div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6" style="text-align: center;">
                           <h3><b>Kalender Data Agenda</b></h3>
                           <br>
                           <div id="calendarIO3"></div>
                        </div>
                       
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                                                                                        <?php
                                                                                        $arrayPie = array();

                                                                                            foreach ($kategori_keperluan as $key => $row) {
                                                                                                $arrayPie[] =  "["."'".$row->nama_keperluan."'".",".$row->jumlah."]";
                                                                                            }

                                                                                        ?>
                                                                                        <script type="text/javascript">
                                                                                            $(function(){
                                                                                          var chart = new Highcharts.Chart({
                                                                                              chart: {
                                                                                                  renderTo: 'GrafikPie1',
                                                                                                 type: 'pie',
                                                                                                  options3d: {
                                                                                                      enabled: true,
                                                                                                      alpha: 45,
                                                                                                      beta: 0
                                                                                                  }
                                                                                              },
                                                                                              title: {
                                                                                                  text: 'JalDis Berdasar Kategori Keperluan'
                                                                                              },
                                                                                              tooltip: {
                                                                                                  pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b><br>Jumlah : <b>{point.y}</b>'
                                                                                              },
                                                                                              plotOptions: {
                                                                                                  pie: {
                                                                                                      allowPointSelect: true,
                                                                                                      cursor: 'pointer',
                                                                                                      depth: 35,
                                                                                                      dataLabels: {
                                                                                                          enabled: true,
                                                                                                          format: '{point.name}'
                                                                                                      }
                                                                                                  }
                                                                                              },
                                                                                              series: [{
                                                                                                  type: 'pie',
                                                                                                  name: 'Persentase',
                                                                                                  data: [<?= join($arrayPie,",") ?>],
                                                                                              }]
                                                                                          });
                                                                                         });
                                                                                        </script>
                                                                                        <div id="GrafikPie1"></div>
                                                                                          
                        </div>
                        <div class="col-md-6">
                                                                                        <?php
                                                                                        $arrayPie2 = array();

                                                                                            foreach ($kategori_rapat as $key => $rw) {
                                                                                                $arrayPie2[] =  "["."'".$rw->kategori."'".",".$rw->jumlah."]";
                                                                                            }

                                                                                        ?>
                                                                                        <script type="text/javascript">
                                                                                            $(function(){
                                                                                          var chart = new Highcharts.Chart({
                                                                                              chart: {
                                                                                                  renderTo: 'GrafikPie2',
                                                                                                 type: 'pie',
                                                                                                  options3d: {
                                                                                                      enabled: true,
                                                                                                      alpha: 45,
                                                                                                      beta: 0
                                                                                                  }
                                                                                              },
                                                                                              title: {
                                                                                                  text: 'Data Rapat Berdasar Alat Kelengkapan Dewan'
                                                                                              },
                                                                                              tooltip: {
                                                                                                  pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b><br>Jumlah : <b>{point.y}</b>'
                                                                                              },
                                                                                              plotOptions: {
                                                                                                  pie: {
                                                                                                      allowPointSelect: true,
                                                                                                      cursor: 'pointer',
                                                                                                      depth: 35,
                                                                                                      dataLabels: {
                                                                                                          enabled: true,
                                                                                                          format: '{point.name}'
                                                                                                      }
                                                                                                  }
                                                                                              },
                                                                                              series: [{
                                                                                                  type: 'pie',
                                                                                                  name: 'Persentase',
                                                                                                  data: [<?= join($arrayPie2,",") ?>],
                                                                                              }]
                                                                                          });
                                                                                         });
                                                                                        </script>
                                                                                        <div id="GrafikPie2"></div>
                                                                                          
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-6 col-sm-6">
                          
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bar-chart font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Site Visits</span>
                                        <span class="caption-helper">weekly stats...</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                                            <label class="btn red btn-outline btn-circle btn-sm active">
                                                <input type="radio" name="options" class="toggle" id="option1">New</label>
                                            <label class="btn red btn-outline btn-circle btn-sm">
                                                <input type="radio" name="options" class="toggle" id="option2">Returning</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="site_statistics_loading">
                                        <img src="../assets/global/img/loading.gif" alt="loading" /> </div>
                                    <div id="site_statistics_content" class="display-none">
                                        <div id="site_statistics" class="chart"> </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-6 col-sm-6">
                           
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-share font-red-sunglo hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Revenue</span>
                                        <span class="caption-helper">monthly stats...</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a href="" class="btn dark btn-outline btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Filter Range
                                                <span class="fa fa-angle-down"> </span>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;"> Q1 2014
                                                        <span class="label label-sm label-default"> past </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Q2 2014
                                                        <span class="label label-sm label-default"> past </span>
                                                    </a>
                                                </li>
                                                <li class="active">
                                                    <a href="javascript:;"> Q3 2014
                                                        <span class="label label-sm label-success"> current </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Q4 2014
                                                        <span class="label label-sm label-warning"> upcoming </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="site_activities_loading">
                                        <img src="../assets/global/img/loading.gif" alt="loading" /> </div>
                                    <div id="site_activities_content" class="display-none">
                                        <div id="site_activities" style="height: 228px;"> </div>
                                    </div>
                                    <div style="margin: 20px 0 10px 30px">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                                <span class="label label-sm label-success"> Revenue: </span>
                                                <h3>$13,234</h3>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                                <span class="label label-sm label-info"> Tax: </span>
                                                <h3>$134,900</h3>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                                <span class="label label-sm label-danger"> Shipment: </span>
                                                <h3>$1,134</h3>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                                                <span class="label label-sm label-warning"> Orders: </span>
                                                <h3>235090</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div> -->
                    <!-- <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-cursor font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">General Stats</span>
                                    </div>
                                    <div class="actions">
                                        <a href="javascript:;" class="btn btn-sm btn-circle red easy-pie-chart-reload">
                                            <i class="fa fa-repeat"></i> Reload </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="easy-pie-chart">
                                                <div class="number transactions" data-percent="55">
                                                    <span>+55</span>% </div>
                                                <a class="title" href="javascript:;"> Transactions
                                                    <i class="icon-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="margin-bottom-10 visible-sm"> </div>
                                        <div class="col-md-4">
                                            <div class="easy-pie-chart">
                                                <div class="number visits" data-percent="85">
                                                    <span>+85</span>% </div>
                                                <a class="title" href="javascript:;"> New Visits
                                                    <i class="icon-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="margin-bottom-10 visible-sm"> </div>
                                        <div class="col-md-4">
                                            <div class="easy-pie-chart">
                                                <div class="number bounce" data-percent="46">
                                                    <span>-46</span>% </div>
                                                <a class="title" href="javascript:;"> Bounce
                                                    <i class="icon-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-equalizer font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Server Stats</span>
                                        <span class="caption-helper">monthly stats...</span>
                                    </div>
                                    <div class="tools">
                                        <a href="" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="" class="reload"> </a>
                                        <a href="" class="remove"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="sparkline-chart">
                                                <div class="number" id="sparkline_bar5"></div>
                                                <a class="title" href="javascript:;"> Network
                                                    <i class="icon-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="margin-bottom-10 visible-sm"> </div>
                                        <div class="col-md-4">
                                            <div class="sparkline-chart">
                                                <div class="number" id="sparkline_bar6"></div>
                                                <a class="title" href="javascript:;"> CPU Load
                                                    <i class="icon-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="margin-bottom-10 visible-sm"> </div>
                                        <div class="col-md-4">
                                            <div class="sparkline-chart">
                                                <div class="number" id="sparkline_line"></div>
                                                <a class="title" href="javascript:;"> Load Rate
                                                    <i class="icon-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
<div class="modal fade" id="create_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <form class="form-horizontal" method="POST" action="POST" id="form_create">
                                                <input type="hidden" name="calendar_id" value="0">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel">Detail Rapat</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group form-md-line-input has-success form-md-floating-label">
                                                                <div class="input-icon">
                                                                    <label for="form_control_1">Nama Kegiatan</label>
                                                                    <input readonly type="text" name="title" class="form-control">
                                                                    <i class="icon-note"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group form-md-line-input has-error form-md-floating-label">
                                                                <div class="input-icon">
                                                                    <label for="form_control_1">Tempat</label>
                                                                    <input type="text" readonly name="description" class="form-control">
                                                                    <i class="icon-pointer"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group form-md-line-input has-warning form-md-floating-label">
                                                                <div class="input-icon">
                                                                    <label for="form_control_1">Tanggal</label>
                                                                    <input type="date" name="start_date" readonly class="form-control">
                                                                    <i class="fa fa-calendar-o"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-md-6">
                                                            <div class="form-group form-md-line-input has-warning form-md-floating-label">
                                                                <div class="input-icon">
                                                                    <label for="form_control_1">Tanggal berakhir</label>
                                                                    <input type="date" name="end_date" class="form-control">
                                                                    <i class="fa fa-calendar-o"></i>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <div class="col-md-6">
                                                            <div class="form-group form-md-line-input has-warning form-md-floating-label">
                                                                <div class="input-icon">
                                                                    <label for="form_control_1">Jam</label>
                                                                    <input type="time" name="jam" class="form-control" readonly>
                                                                    <i class="icon-speedometer"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                  
                                                        
                                                    </div>
                                                    <!-- <iframe width="875" height="500" src="<?=base_url()?>assets/surat_rapat/file_1523545885.pdf" frameborder="0" allowfullscreen scrolling="no"></iframe> -->
                                                    <!-- <div id="filepdf" class="row" style="text-align: center;">
                                                        
                                                    </div> -->
                                                    <!-- <div id="filegambar" class="row" style="text-align: center;">
                                                        
                                                    </div> -->
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="javascript::void" class="btn btn-danger" data-dismiss="modal">Tutup</a>
                                                  
                                                </div>
                                            </form>
                                        </div>
                                    </div>
</div>
<div class="modal fade" id="create_modal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="portfolio-content">
    
                                                <h3 style="text-align: center;">Detail Data Agenda</h3>
                                               
                                                <!-- <?php echo date("l jS \of F Y h:i A") . "<br>"; ?>
                                                <?php echo date("20:09:00","h:i A") . "<br>"; ?>
                                                <?php echo date('h:i A', strtotime("20:20:09")) . "<br>"; ?> -->
                                                <div class="cbp-l-project-container">
                                                  
                                                    <div class="cbp-l-project-desc">
                                                        <div class="cbp-l-project-desc-title">
                                                            <span>&nbsp; &nbsp; &nbsp; &nbsp;<a class="acara"></a></span>
                                                        </div>
                                                        <ul class="cbp-l-project-details-list">
                                                          <li>
                                                                <strong>&nbsp; &nbsp; &nbsp; &nbsp;Tempat&nbsp; &nbsp; &nbsp; &nbsp;</strong><a class="tempat"></a></li>
                                                          <li>
                                                                <strong>&nbsp; &nbsp; &nbsp; &nbsp;Waktu&nbsp; &nbsp; &nbsp; &nbsp;</strong><a class="tanggal"></a><a> (Pukul </a><a class="jam"></a><a>)</a></li>
                                                          <li>
                                                                <strong>&nbsp; &nbsp; &nbsp; &nbsp;Materi&nbsp; &nbsp; &nbsp; &nbsp;</strong><div class="col-md-12"><p class="materi"></p></div></li>
                                                          <li>
                                                                <strong>&nbsp; &nbsp; &nbsp; &nbsp;Peserta&nbsp; &nbsp; &nbsp; &nbsp;</strong><a class="peserta"></a></li>
                                                        </ul>
                                                    </div>                                                   
                                                </div>
                                            </div>
                                          <div class="modal-footer">
                                                    <a href="javascript::void" class="btn btn-danger" data-dismiss="modal">Tutup</a>
                                                  
                                          </div>
                                        </div>
                                        
                                    </div>
</div>
<script src="<?=base_url('assets/global/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js');?>" type="text/javascript"></script>
<script src="<?=base_url('assets/pages/scripts/portfolio-1.min.js');?>" type="text/javascript"></script>
<script type="text/javascript">
        var get_data1        = '<?php echo $get_data1; ?>';
        var backend_url     = '<?php echo base_url(); ?>';

        $(document).ready(function() {
            $('.date-picker').datepicker();
            $('#calendarIO').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
                defaultDate: moment().format('YYYY-MM-DD'),
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                selectable: true,
                selectHelper: true,
                select: function(start, end) {
                    $('#create_modal input[name=start_date]').val(moment(start).format('YYYY-MM-DD'));
                    $('#create_modal input[name=end_date]').val(moment(end).format('YYYY-MM-DD'));
                    $('#create_modal').modal('show');
                    save();
                    $('#calendarIO').fullCalendar('unselect');
                },
                eventDrop: function(event, delta, revertFunc) { // si changement de position
                    editDropResize(event);
                },
                eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur
                    editDropResize(event);
                },
                eventClick: function(event, element)
                {
                    deteil(event);
                    editData(event);
                    deleteData(event);
                },
                events: JSON.parse(get_data1)
            });
        });

        $(document).on('click', '.add_calendar', function(){
            $('#create_modal input[name=calendar_id]').val(0);
            $('#create_modal').modal('show');  
        })

       

        function deteil(event)
        {
            $('#create_modal input[name=calendar_id]').val(event.id);
            $('#create_modal input[name=start_date]').val(moment(event.start).format('YYYY-MM-DD'));
            $('#create_modal input[name=end_date]').val(moment(event.end).format('YYYY-MM-DD'));
            $('#create_modal input[name=title]').val(event.title);
            $('#create_modal input[name=description]').val(event.description);
            $('#create_modal input[name=jam]').val(event.jam);
            // $("#filepdf").html('<iframe width="875" height="500" frameborder="0" allowfullscreen scrolling="no" src="<?=base_url()?>assets/surat_rapat/'+event.nama_file+'"></iframe>');    
            $('#create_modal').modal('show');
        }
</script>
<script type="text/javascript">
        var get_data2        = '<?php echo $get_data2; ?>';
        var backend_url     = '<?php echo base_url(); ?>';

        $(document).ready(function() {
            $('.date-picker').datepicker();
            $('#calendarIO2').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
                defaultDate: moment().format('YYYY-MM-DD'),
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                selectable: true,
                selectHelper: true,
                select: function(start, end) {
                    $('#create_modal input[name=start_date]').val(moment(start).format('YYYY-MM-DD'));
                    $('#create_modal input[name=end_date]').val(moment(end).format('YYYY-MM-DD'));
                    $('#create_modal').modal('show');
                    save();
                    $('#calendarIO2').fullCalendar('unselect');
                },
                eventDrop: function(event, delta, revertFunc) { // si changement de position
                    editDropResize(event);
                },
                eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur
                    editDropResize(event);
                },
                eventClick: function(event, element)
                {
                    deteil2(event);
                    editData(event);
                    deleteData(event);
                },
                events: JSON.parse(get_data2)
            });
        });

        $(document).on('click', '.add_calendar', function(){
            $('#create_modal input[name=calendar_id]').val(0);
            $('#create_modal').modal('show');  
        })

       

        function deteil2(event)
        {
            
            window.location='<?= base_url() ?>Master/detail_jaldis/'+event.kode_jaldis;
          
        }
</script>
<script type="text/javascript">
        var get_data3        = '<?php echo $get_data3; ?>';
        var backend_url     = '<?php echo base_url(); ?>';

        $(document).ready(function() {
            $('.date-picker').datepicker();
            $('#calendarIO3').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
                defaultDate: moment().format('YYYY-MM-DD'),
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                selectable: true,
                selectHelper: true,
                select: function(start, end) {
                    $('#create_modal3 input[name=start_date]').val(moment(start).format('YYYY-MM-DD'));
                    $('#create_modal3 input[name=end_date]').val(moment(end).format('YYYY-MM-DD'));
                    $('#create_modal3').modal('show');
                    save();
                    $('#calendarIO3').fullCalendar('unselect');
                },
                eventDrop: function(event, delta, revertFunc) { // si changement de position
                    editDropResize(event);
                },
                eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur
                    editDropResize(event);
                },
                eventClick: function(event, element)
                {
                    deteil3(event);
                    editData(event);
                    deleteData(event);
                },
                events: JSON.parse(get_data3)
            });
        });

        $(document).on('click', '.add_calendar', function(){
            $('#create_modal3 input[name=calendar_id]').val(0);
            $('#create_modal3').modal('show');  
        })

       

        function deteil3(event)
        {
           $('#create_modal input[name=calendar_id]').val(event.id);
           $('#create_modal3 .acara').text(event.title);
           $('#create_modal3 .materi').html(event.description);
           $('#create_modal3 .peserta').text(event.peserta);
           $('#create_modal3 .jam').text(event.jam);
           //$('#create_modal3 .jam').text(date('h:i A', strtotime(event.jam)));
           $('#create_modal3 .tanggal').text(moment(event.start).format('DD-MM-YYYY'));
           $('#create_modal3 .tempat').text(event.tempat);
           $('#create_modal3').modal('show');
        }
</script>