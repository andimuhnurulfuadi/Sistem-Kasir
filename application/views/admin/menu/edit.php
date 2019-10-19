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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('menu/tampil'); ?>">Menu</a></li>
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
                    <h3 class="box-title m-b-0">Form Edit Menu</h3>
                    <p class="text-muted m-b-30 font-13"> Digunakan untuk mengubah data menu</p>
                    <?php
                    echo validation_errors('<div class="alert alert-warning">', '</div>');
                    echo $this->session->flashdata('pesan');
                    ?>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <?php echo form_open_multipart('', '', array('kd' => $menu['kd_menu'])) ?>
                            <div class="form-group">
                                <?php
                                echo form_label('Nama Menu', 'exampleInputEmail1');
                                echo form_input('nama', $menu['nama'], 'class="form-control" id="exampleInputEmail1" placeholder="Masukkan nama menu..."')
                                ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Kategori</label>
                                <select name="kategori" class="form-control">
                                    <?php echo print_r($menu); ?>
                                    <?php foreach ($kategori as $key => $data) : ?>
                                        <option value="<?php echo $data['kd_kategori']; ?>" <?php if ($menu['kd_kategori'] == $data['kd_kategori']) {
                                                                                                    echo "selected";
                                                                                                } ?>><?php echo $data['kategori']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <?php
                                echo form_label('Gambar', 'exampleInputEmail1');
                                ?>
                                <br /><img src="<?php echo base_url('upload/') . $menu['gambar']; ?>" alt="<?php echo $menu['gambar']; ?>" width="100" height="100">
                                <?php
                                echo form_upload('gambar', '', 'class="form-control" id="exampleInputEmail1"');
                                ?>
                            </div>
                            <div class="form-group">
                                <?php
                                echo form_label('Harga', 'exampleInputEmail1');
                                echo form_input('harga', $menu['harga'], 'class="form-control" id="exampleInputEmail1" placeholder="Rp. "');
                                ?>
                            </div>
                            <div class="form-group">
                                <?php echo form_label('Status', 'exampleInputEmail1'); ?>
                                <select name="status" class="form-control">
                                    <option value="ready" <?php if ($menu['status_menu'] == 'ready') {
                                                                echo "selected";
                                                            } ?>>Ready</option>
                                    <option value="kosong" <?php if ($menu['status_menu'] == 'kosong') {
                                                                echo "selected";
                                                            } ?>>Kosong</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Simpan</button>
                            <button type="reset" class="btn btn-inverse waves-effect waves-light">Reset</button>
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