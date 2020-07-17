<div class="content-wrapper">
    <section class="content-header" style="padding : 15px 5px 0 5px">
        <h1>Data <small>Pedagang</small></h1>
        <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Pedagang</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="padding : 15px 5px">
        <div class="box">
            <div class="box-header">
                <div class="pull-right">
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <form action="<?= base_url('Admin/Pedagang'); ?>" method="post">
                                <div class="input-group">
                                    <input type="text" name="key_pedagang" class="form-control" placeholder="Cari data pedagang" autocomplete="off" autofocus>
                                    <div class="input-group-append">
                                        <input class="btn btn-primary" type="submit" value="Cari" name="cari">
                                    </div>&nbsp;
                                    <a href="#" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="box-body table-responsive">
                <h5>Result : <?= $total_rows; ?></h5>
                <table class="table table-bordered table-striped" name="table1" id="table1">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nomor induk pedagang</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>No Handphone</th>
                            <th>Nomor Stan</th>
                            <th colspan="3">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(empty($pedagang) ) : ?>
                            <td colspan="12"><div class="alert alert-danger" role="alert">
                                Data pedagang tidak ditemukan.
                            </div>
                            </td>
                        <?php endif; ?>
                        <?php foreach ($pedagang as $pdg) : ?>
                            <tr>
                                <th><?= ++$start ?>.</th>
                                <td><?= $pdg['noip']; ?></td>
                                <td><?= $pdg['nik']; ?></td>
                                <td><?= $pdg['nama']; ?></td>
                                <td><?= $pdg['alamat']; ?></td>
                                <td><?= $pdg['jenis_kelamin']; ?></td>
                                <td><?= $pdg['tempat_lahir']; ?></td>
                                <td><?= date('d M Y', strtotime($pdg['tanggal_lahir'])); ?></td>
                                <td><?= $pdg['no_handphone']; ?></td>
                                <td><?= $pdg['nomor_stan']; ?></td>
                                <td><a href="<?= site_url('Admin/Pedagang/detail/' . $pdg['id_pedagang']) ?>" class="badge badge-warning float-right">Detail</a></td>
                                <td><a href="<?= site_url('Admin/Pedagang/ubah/' . $pdg['id_pedagang']) ?>" class="badge badge-success float-right">Ubah</a></td>
                                <td><a href="<?= site_url('Admin/Pedagang/hapus/' . $pdg['id_pedagang']) ?>" class="badge badge-danger float-right" onclick="return confirm('Anda yakin hapus data');">Hapus</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <form action="<?= base_url('Admin/Pedagang/laporan_pdf'); ?>" method="post">
                    <input class="btn btn-success" type="submit" name="print" value="Print">
                </form>
                <?= $this->pagination->create_links(); ?>
            </div>
        </div>
    </section> <!-- End Main Conten -->
</div>