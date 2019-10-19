<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Dashboard</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Content -->
    <!-- ============================================================== -->
    <div class="row">
    <!-- column -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-body bg-light">
                <div class="text-center">
                    <a href="javascript:void(0)"><img alt="img" class="thumb-lg img-circle" src="<?php echo base_url(); ?>assets/admin/images/users/agent.jpg"></a>
                    <h4><?php echo $adminaktif['nama']; ?></h4>
                    <h6><?php echo $adminaktif['level']; ?></h6> </div>
            </div>
            <div class="card-body border-top">
                <div class="text-center"> <i class="fa fa-user text-danger p-r-10" aria-hidden="true"></i> <?php echo $adminaktif['username']; ?>
                    <br> <i class="fa fa-link text-danger p-r-10 m-t-10" aria-hidden="true"></i> <?php echo $adminaktif['password']; ?></div>
            </div>
            <div class="card-body border-top">
                <div class="pd-agent-inq">
                    <h5 class="card-title">Form Ubah Data</h5>
                    <?php echo $this->session->flashdata('pesan'); ?>
                    <?php echo validation_errors('<div class="alert alert-warning">','</div>'); ?>
                    <?php 
                        $kd = array('kd' => $adminaktif['kd_admin']);
                        echo form_open('','class="form-horizontal form-agent-inq"',$kd);
                    ?>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>nama</label>
                                <?php echo form_input('nama',$adminaktif['nama'],'class="form-control" placeholder="Masukkan nama..."'); ?> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>Username</label>
                                <?php echo form_input('username',$adminaktif['username'],'class="form-control" placeholder="Masukkan username..."'); ?> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label>password</label>
                                <?php echo form_password('password',$adminaktif['password'],'class="form-control" placeholder="Masukkan password..."'); ?> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <?php echo form_submit('simpan','Simpan','class="btn btn-info"'); ?>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Content -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->

