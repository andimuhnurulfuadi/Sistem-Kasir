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
                <h4 class="text-themecolor">Tambah</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Transaksi</a></li>
                        <li class="breadcrumb-item active">Tambah</li>
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
                    <h3 class="box-title m-b-0">Daftar Makanan</h3>
                    <p class="text-muted m-b-30 font-13"> Daftar menu makanan yang tersedia di restoran</p>
                    <div class="row">
                        <?php

                        foreach ($makanan as $key => $data) :

                            echo form_open('', '');
                            echo form_hidden('kd', $data['kd_menu'], '');
                            echo form_hidden('menu', $data['nama'], '');
                            echo form_hidden('harga', $data['harga'], '');
                            ?>

                            <!-- column -->
                            <div class="col-lg col-md-4">
                                <!-- Card -->
                                <div class="card">
                                    <img class="card-img-top " src="<?php echo base_url('upload/') . $data['gambar']; ?>" alt="<?php echo $data['gambar']; ?>" width="300" height="300">
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $data['nama']; ?></h4>
                                        <h5 class="card-text">Rp. <?php echo number_format($data['harga']); ?></h5>

                                        <?php
                                            echo form_input('jumlah', '', 'class="form-control" placeholder="Jumlah Pesanan"');
                                            echo "<hr>";
                                            echo form_submit('tambah', 'Tambah', 'class="btn btn-success"');
                                            ?>
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                            <?php echo form_close(); ?>
                        <?php endforeach; ?>
                        <!-- column -->

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <h3 class="box-title m-b-0">Daftar Minuman</h3>
                    <p class="text-muted m-b-30 font-13"> Daftar menu minuman yang tersedia di restoran</p>
                    <div class="row">
                        <?php

                        foreach ($minuman as $key => $data) :

                            echo form_open('', '');
                            echo form_hidden('kd', $data['kd_menu'], '');
                            echo form_hidden('menu', $data['nama'], '');
                            echo form_hidden('harga', $data['harga'], '');
                            ?>

                            <!-- column -->
                            <div class="col-lg col-md-4">
                                <!-- Card -->
                                <div class="card">
                                    <img class="card-img-top " src="<?php echo base_url('upload/') . $data['gambar']; ?>" alt="<?php echo $data['gambar']; ?>" width="300" height="300">
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $data['nama']; ?></h4>
                                        <h5 class="card-text">Rp. <?php echo number_format($data['harga']); ?></h5>

                                        <?php
                                            echo form_input('jumlah', '', 'class="form-control" placeholder="Jumlah Pesanan"');
                                            echo "<hr>";
                                            echo form_submit('tambah', 'Tambah', 'class="btn btn-success"');
                                            ?>
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                            <?php echo form_close(); ?>
                        <?php endforeach; ?>
                        <!-- column -->

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- column -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Pesanan</h4>
                        <h6 class="card-subtitle">Menampilkan detail pesanan pelanggan</h6>
                        <?php echo $this->session->flashdata('pesan'); ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Menu</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Subtotal</th>
                                        <th class="text-nowrap">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total = 0;
                                    foreach ($this->cart->contents() as $item) :  $total = $total + $item['subtotal']; ?>
                                        <tr>
                                            <td><?php echo $item['name']; ?></td>
                                            <td>Rp.<?php echo number_format($item['price']); ?></td>
                                            <td><?php echo $item['qty']; ?></td>
                                            <td>Rp.<?php echo number_format($item['subtotal']); ?></td>
                                            <td class="text-nowrap">
                                                <a href="<?php echo site_url('transaksi/hapus_cart/' . $item['rowid']); ?>" data-toggle="tooltip" data-original-title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"> <i class="fa fa-close text-danger"></i> </a>

                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3">Total</td>
                                        <td><b>Rp.<?php echo number_format($total); ?></b></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-body">
                    <h3 class="box-title m-b-0">Pilih meja</h3>
                    <p class="text-muted m-b-30 font-13"> Digunakan untuk memilih meja pelanggan</p>
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <?php echo form_open('transaksi/simpan'); ?>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Level</label>
                                <select name="meja" class="form-control">
                                    <?php foreach ($meja as $key => $data) : ?>
                                        <option value="<?php echo $data['kd_meja'] ?>"><?php echo $data['no_meja'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Pesan | Selesai</button>
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