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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/tampil'); ?>">Admin</a></li>
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
                    <h3 class="box-title m-b-0">Form Edit Admin</h3>
                    <p class="text-muted m-b-30 font-13"> Digunakan untuk mengubah data admin</p>
                    <?php
                    echo validation_errors('<div class="alert alert-warning">', '</div>');
                    echo $this->session->flashdata('pesan');
                    ?>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <?php echo form_open('', '', array('kd' => $admin['kd_admin'])) ?>
                            <div class="form-group">
                                <?php
                                echo form_label('Nama', 'exampleInputEmail1');
                                echo form_input('nama', $admin['nama'], 'class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama..."')
                                ?>
                            </div>
                            <div class="form-group">
                                <?php
                                echo form_label('Username', 'exampleInputEmail1');
                                echo form_input('username', $admin['username'], 'class="form-control" id="exampleInputEmail1" placeholder="Masukkan Username..."')
                                ?>
                            </div>
                            <div class="form-group">
                                <?php
                                echo form_label('Nama', 'exampleInputEmail1');
                                echo form_password('password', $admin['password'], 'class="form-control" id="exampleInputEmail1" placeholder="Masukkan Password..."')
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Level</label>
                                <select name="level" class="form-control">
                                    <option value="owner" <?php if ($admin['level'] == 'owner') {
                                                                echo "selected";
                                                            } ?>>Owner</option>
                                    <option value="kasir" <?php if ($admin['level'] == 'kasir') {
                                                                echo "selected";
                                                            } ?>>kasir</option>
                                    <option value="pelayan" <?php if ($admin['level'] == 'pelayan') {
                                                                echo "selected";
                                                            } ?>>pelayan</option>
                                </select>
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