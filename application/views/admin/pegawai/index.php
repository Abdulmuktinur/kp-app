<div class="content-wrapper">
    <section class="content-header" style="padding : 15px 5px 0 5px">
        <h1>Data <small>Pegawai</small></h1>
        <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Pegawai</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="padding : 15px 5px">
        <div class="box">
            <div class="box-header">
                <div class="pull-right">
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <form action="<?= base_url('Admin/Pegawai'); ?>" method="post">
                                <div class="input-group">
                                    <input type="text" name="key_pegawai" class="form-control" placeholder="Cari data pegawai" autocomplete="off" autofocus>
                                    <div class="input-group-append">
                                        <input class="btn btn-primary" type="submit" value="Cari" name="cari">
                                    </div>&nbsp;
                                    <a href="#" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah</a>
                                </div>
                            </form>
                        </div><!-- /.col-lg-6 -->
                    </div>
                </div>
            </div>

            <div class="box-body table-responsive">
                <h5>Result : <?= $total_rows; ?></h5>
                <table class="table table-bordered table-striped" name="table1" id="table1">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>NIP</th>
                            <th>NIK</th>
                            <th>NPWP</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>No Handphone</th>
                            <th colspan="3">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(empty($pegawai) ) : ?>
                            <td colspan="12"><div class="alert alert-danger" role="alert">
                                Data pegawai tidak ditemukan.
                            </div>
                            </td>
                        <?php endif; ?>
                        <?php foreach ($pegawai as $pgw) : ?>
                            <tr>
                                <th><?= ++$start ?>.</th>
                                <td><?= $pgw['NIP']; ?></td>
                                <td><?= $pgw['NIK']; ?></td>
                                <td><?= $pgw['NPWP']; ?></td>
                                <td><?= $pgw['nama']; ?></td>
                                <td><?= $pgw['tempat_lahir']; ?></td>
                                <td><?= date('d M Y', strtotime($pgw['tanggal_lahir'])); ?></td>
                                <td><?= $pgw['jenis_kelamin']; ?></td>
                                <td><?= $pgw['alamat']; ?></td>
                                <td><?= $pgw['no_telepone']; ?></td>
                                <td><a href="<?= site_url('Admin/Pegawai/detail/' . $pgw['id_pegawai']) ?>" class="badge badge-warning">Detail</a></td>
                                <td><a href="<?= site_url('Admin/Pegawai/ubah/' . $pgw['id_pegawai']) ?>" class="badge badge-success">Ubah</a></td>
                                <td><a href="<?= site_url('Admin/Pegawai/hapus/' . $pgw['id_pegawai']) ?>" class="badge badge-danger" onclick="return confirm('Anda yakin hapus data');">Hapus</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <form action="<?= base_url('Admin/Pegawai/laporan_pdf'); ?>" method="post">
                    <input class="btn btn-success" type="submit" name="print" value="Print">
                </form>
                <?= $this->pagination->create_links(); ?>
            </div>
        </div>
    </section> <!-- End Main Conten -->
</div>



<!-- <div class="col-md-12">
    <form action="<?= base_url('Admin/Pegawai'); ?>" method="post">
        <div class="input-group">
            <input type="text" name="keyword" class="form-control" placeholder="Cari data pegawai" autocomplete="off" autofocus>
            <div class="input-group-append">
                <input value="Cari" class="btn btn-primary" type="submit" name="cari">
            </div>&nbsp;
            <a href="#" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah</a>
        </div>
    </form>
</div> -->