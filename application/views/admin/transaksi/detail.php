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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('transaksi/tampil'); ?>">Transaksi</a></li>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Detail Transaksi Meja : <?php echo $transaksi['no_meja']; ?></h4>
                        <h6 class="card-subtitle">Menampilkan detail menu yang dipesan meja <?php echo $transaksi['no_meja']; ?> </h6>
                        <h5>Kode : <?php echo $transaksi['kd_transaksi']; ?> </h5>
                        <h5>Tanggal : <?php echo $transaksi['tgl_transaksi']; ?> </h5>
                        <h5>Kasir : <?php echo $transaksi['nama']; ?></h5>
                        <h5>Status Pembayaran : <span class="<?php if ($transaksi['status'] == 'selesai') {
                                                                    echo 'badge badge-success ml-auto';
                                                                } else {
                                                                    echo 'badge badge-danger ml-auto';
                                                                } ?>"><?php echo $transaksi['status']; ?></span></h5>
                        <?php echo $this->session->flashdata('pesan'); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- detail -->
        <div class="row">
            <!-- column -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Pesanan</h5>
                        <div class="table-responsive p-t-10">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Menu</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>SubTotal</th>
                                    </tr>
                                </thead>
                                <tbody class="text-dark">
                                    <?php $no = 1;
                                    foreach ($detail_transaksi as $key => $data) : ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $data['nama']; ?></td>
                                            <td>Rp. <?php echo number_format($data['harga']); ?></td>
                                            <td><?php echo $data['jumlah']; ?></td>
                                            <td>Rp. <?php echo number_format($data['sub_total']); ?></td>
                                        </tr>
                                    <?php $no++;
                                    endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body aler alert-success">

                        <h2 class="text-right">Total = Rp. <?php echo number_format($transaksi['total']); ?></h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- form bayar -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?php echo form_open('', 'class="form-material m-t-40 row"') ?>
                        <input type="hidden" name="total" value="<?php echo $transaksi['total']; ?>">
                        <input type="hidden" name="kd" value="<?php echo $transaksi['kd_transaksi']; ?>">
                        <div class="form-group col-md-1 m-t-20">
                        </div>
                        <div class="form-group col-md-5 m-t-20">
                        </div>
                        <div class="form-group col-md-1 m-t-20">
                            <label>Bayar</label>
                        </div>
                        <div class="form-group col-md-5 m-t-20">
                            <input type="number" id="example-email2" class="form-control" name="bayar" placeholder="Rp." value="<?php if (!empty($_SESSION['bayar'])) {
                                                                                                                                    echo $_SESSION['bayar'];
                                                                                                                                } ?>">
                        </div>
                        <div class="form-group col-md-1 m-t-20">
                        </div>
                        <div class="form-group col-md-5 m-t-20">
                        </div>
                        <div class="form-group col-md-1 m-t-20">
                            <label>Kembalian</label>
                        </div>
                        <div class="form-group col-md-5 m-t-20">
                            <input type="number" id="example-email2" class="form-control" name="kembali" placeholder="Rp." value="<?php if (!empty($_SESSION['kembalian'])) {
                                                                                                                                        echo $_SESSION['kembalian'];
                                                                                                                                    } ?>" readonly="">
                        </div>
                        <div class="form-group col-md-1 m-t-20">
                            <?php echo form_submit('selesai', 'Selesai', 'class="btn btn-lg btn-info"'); ?>
                        </div>
                        <div class="form-group col-md-5 m-t-20">
                        </div>
                        <div class="form-group col-md-6 m-t-20 text-right"><?php echo form_submit('hitung', 'Hitung', 'class="btn btn-lg btn-primary"'); ?></div>
                        <?php echo form_close(); ?>
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