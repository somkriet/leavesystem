<!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">ยืนยันการลา</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                   <!--  <div class="col-md-6 col-4 align-self-center">
                        <div class="text-end upgrade-btn">
                            <a href="https://www.wrappixel.com/templates/monsteradmin/"
                                class="btn btn-success d-none d-md-inline-block text-white" target="_blank">Upgrade to
                                Pro</a>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">ยืนยันการลา / Leave Approve</h4>
                                <h6 class="card-subtitle">ตารางแสดงข้อมูลการลาของ</h6>
                                <div class="table-responsive">
                                    <table id="myTable" class="table user-table no-wrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0">รหัสการลา</th>
                                                <th class="border-top-0">รหัสพนักงาน</th>
                                                <th class="border-top-0">ชื่อ-นามสกุล</th>
                                                <th class="border-top-0">รายการ</th>
                                                <th class="border-top-0">ประเภทการลา</th>
                                                <th class="border-top-0">วันที่ลา</th>
                                                <th class="border-top-0">ทำรายการโดย</th>
                                                <th class="border-top-0">เมื่อวันที่</th>
                                                <th class="border-top-0">สถานะ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Deshmukh</td>
                                                <td>Prohaska</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Deshmukh</td>
                                                <td>Gaylord</td>
                                                <td>@Ritesh</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Sanghani</td>
                                                <td>Gusikowski</td>
                                                <td>@Govinda</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Roshan</td>
                                                <td>Rogahn</td>
                                                <td>@Hritik</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Joshi</td>
                                                <td>Hickle</td>
                                                <td>@Maruti</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>

                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Nigam</td>
                                                <td>Eichmann</td>
                                                <td>@Sonu</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>
                                                <td>@Genelia</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>


                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
</div>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script type="text/javascript">
    
    $(function(){
  $('#myTable').dataTable({
    ordering: true,
    searching: true,
    lengthChange: true
  });
});

</script>