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
                <h4 class="text-themecolor">Transaksi</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Transaksi</a></li>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Transaksi</h4>
                        <h6 class="card-subtitle">Menampilkan daftar menu restoran</h6>
                        <div class="col-md-3">
                            <form>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Masukkan nomor meja pelanggan..." aria-label="" aria-describedby="basic-addon1" name="cari">
                                    <div class="input-group-append">
                                        <button class="btn btn-info" type="submit"><i class="fa fa-search"></i>&nbsp;Cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php echo $this->session->flashdata('pesan'); ?>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>No Meja</th>
                                        <th>Kasir</th>
                                        <th>Total</th>
                                        <th>Status Bayar</th>
                                        <th class="text-nowrap">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transaksi as $key => $data) : ?>
                                        <tr>
                                            <td><?php echo $data['kd_transaksi']; ?></td>
                                            <td><?php echo $data['tgl_transaksi']; ?></td>
                                            <td><?php echo $data['no_meja']; ?></td>
                                            <td><?php echo $data['nama']; ?></td>
                                            <td><?php echo $data['total']; ?></td>
                                            <td><span class="<?php if ($data['status'] == 'selesai') {
                                                                        echo 'badge badge-success ml-auto';
                                                                    } else {
                                                                        echo 'badge badge-danger ml-auto';
                                                                    } ?>"><?php echo $data['status']; ?></span></td>
                                            <td class="text-nowrap">
                                                <?php if ($_SESSION['level'] == 'owner' || $_SESSION['level'] == 'kasir') { ?>
                                                    <a href="<?php echo site_url('transaksi/detail/' . $data['kd_transaksi']); ?>" data-toggle="tooltip" data-original-title="Detail | Bayar"> <i class="fa fa-list text-inverse m-r-10"></i> </a>
                                                    <a href="<?php echo site_url('transaksi/hapus/' . $data['kd_transaksi']); ?>" data-toggle="tooltip" data-original-title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"> <i class="fa fa-close text-danger"></i> </a>
                                                <?php } ?>

                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="7" class=""> <a href="<?php echo site_url('transaksi/tambah'); ?>" class="btn btn-info text-left">Tambah</a>
                                            <?php if ($_SESSION['level'] == 'pelayan' || $_SESSION['level'] == 'kasir') { ?>
                                                <a href="" onclick="window.print()" class="btn btn-primary text-left" id="print">cetak</a>
                                            <?php } ?>
                                            <h4 class="text-right"><?php echo $this->pagination->create_links(); ?></h4>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
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