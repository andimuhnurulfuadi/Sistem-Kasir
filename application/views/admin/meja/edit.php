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
            <h4 class="text-themecolor">Edit</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('meja/tampil'); ?>">Meja</a></li>
                    <li class="breadcrumb-item active">Edit</li>
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
    <div class="col-md-12">
        <div class="card card-body">
            <h3 class="box-title m-b-0">Form Edit Meja</h3>
            <p class="text-muted m-b-30 font-13"> Digunakan untuk mengubah data meja</p>
            <?php
                echo validation_errors('<div class="alert alert-warning">','</div>');
                echo $this->session->flashdata('pesan');
            ?>
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <?php echo form_open('','', array('kd' => $meja['kd_meja'])) ?>
                        <div class="form-group">
                            <?php 
                                echo form_label('Nomor Meja','exampleInputEmail1'); 
                                echo form_input('no_meja',$meja['no_meja'],'class="form-control" id="exampleInputEmail1" placeholder="Masukkan nomor meja..."')
                             ?>
                        </div>
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Simpan</button>
                        <button type="reset" class="btn btn-inverse waves-effect waves-light">Batal</button>
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


