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
            <h4 class="text-themecolor">Detail</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/tampil'); ?>">Admin</a></li>
                    <li class="breadcrumb-item active">Detail</li>
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
                    <h4><?php echo $admin['nama']; ?></h4>
                    <h6><?php echo $admin['level']; ?></h6> </div>
            </div>
            <div class="card-body border-top">
                <div class="text-center"> <i class="fa fa-user text-danger p-r-10" aria-hidden="true"></i> Username : <?php echo $admin['username']; ?>
                    <br> <i class="fa fa-link text-danger p-r-10 m-t-10" aria-hidden="true"></i>Password :  <?php echo $admin['password']; ?></div>
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

