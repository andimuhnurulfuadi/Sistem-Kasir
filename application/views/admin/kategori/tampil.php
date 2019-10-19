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
            <h4 class="text-themecolor">Kategori</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Kategori</a></li>
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
                <h4 class="card-title">Data Kategori</h4>
                <h6 class="card-subtitle">Menampilkan daftar Kategori makanan yang ada di restoran</h6>
                <?php echo $this->session->flashdata('pesan'); ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Kategori</th>
                                <th class="text-nowrap">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kategori as $key => $data): ?>
                            <tr>
                                <td><?php echo $data['kd_kategori']; ?></td>
                                <td><?php echo $data['kategori']; ?></td>
                                <td class="text-nowrap">
                                    <a href="<?php echo site_url('kategori/edit/'.$data['kd_kategori']); ?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    <a href="<?php echo site_url('kategori/hapus/'.$data['kd_kategori']); ?>" data-toggle="tooltip" data-original-title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" > <i class="fa fa-close text-danger"></i> </a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6"> <a href="<?php echo site_url('kategori/tambah'); ?>" class="btn btn-info text-left">Tambah</a><h4 class="text-right"><?php echo $this->pagination->create_links(); ?></h4></td>
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
