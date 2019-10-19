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
            <h4 class="text-themecolor">Admin</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
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
                <h4 class="card-title">Data Admin</h4>
                <h6 class="card-subtitle">Menampilkan daftar admin yang menggunakan sistem</h6>
                <div class="col-md-3">
                <form>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan nama admin yang ingin dicari..." aria-label="" aria-describedby="basic-addon1" name="cari">
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
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Jabatan</th>
                                <th class="text-nowrap">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($admin as $key => $data): ?>
                            <tr>
                                <td><?php echo $data['kd_admin']; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['username']; ?></td>
                                <td><?php echo $data['password']; ?></td>
                                <td><?php echo $data['level']; ?></td>
                                <td class="text-nowrap">
                                    <a href="<?php echo site_url('admin/detail/'.$data['kd_admin']); ?>" data-toggle="tooltip" data-original-title="Detail"> <i class="fa fa-list text-inverse m-r-10"></i> </a>
                                    <a href="<?php echo site_url('admin/edit/'.$data['kd_admin']); ?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    <a href="<?php echo site_url('admin/hapus/'.$data['kd_admin']); ?>" data-toggle="tooltip" data-original-title="Hapus" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" > <i class="fa fa-close text-danger"></i> </a>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6"> <a href="<?php echo site_url('admin/tambah'); ?>" class="btn btn-info text-left">Tambah</a><h4 class="text-right"><?php echo $this->pagination->create_links(); ?></h4></td>
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
