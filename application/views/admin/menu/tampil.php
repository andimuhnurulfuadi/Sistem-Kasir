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
                <h4 class="text-themecolor">Menu</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Menu</a></li>
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
                        <h4 class="card-title">Data Menu</h4>
                        <h6 class="card-subtitle">Menampilkan daftar menu restoran</h6>
                        <div class="col-md-3">
                            <form>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Masukkan nama menu yang ingin dicari..." aria-label="" aria-describedby="basic-addon1" name="cari">
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
                                        <th>Menu</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Gambar</th>
                                        <th>status</th>
                                        <th class="text-nowrap">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($menu as $key => $data) : ?>
                                        <tr>
                                            <td><?php echo $data['kd_menu']; ?></td>
                                            <td><?php echo $data['nama']; ?></td>
                                            <td><?php echo $data['kategori']; ?></td>
                                            <td><?php echo $data['harga']; ?></td>
                                            <td><img src="<?php echo base_url('upload/') . $data['gambar']; ?>" alt="<?php echo $data['gambar']; ?>" width="100" height="100"></td>
                                            <td><?php echo $data['status_menu']; ?></td>
                                            <td class="text-nowrap">
                                                <?php if ($_SESSION['level'] == 'owner') { ?>
                                                    <a href="<?php echo site_url('menu/edit/' . $data['kd_menu']); ?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                    <a href="<?php echo site_url('menu/hapus/' . $data['kd_menu']); ?>" data-toggle="tooltip" data-original-title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"> <i class="fa fa-close text-danger"></i> </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <?php if ($_SESSION['level'] == 'owner') { ?>
                                    <tfoot>
                                        <tr>
                                            <td colspan="7" class=""> <a href="<?php echo site_url('menu/tambah'); ?>" class="btn btn-info text-left">Tambah</a>
                                                <h4 class="text-right"><?php echo $this->pagination->create_links(); ?></h4>
                                            </td>
                                        </tr>
                                    </tfoot>
                                <?php } ?>
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