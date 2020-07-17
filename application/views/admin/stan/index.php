<div class="content-wrapper">
    <section class="content-header" style="padding : 15px 5px 0 5px">
        <h1>Data <small>Stan</small></h1>
        <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Stan</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" style="padding : 15px 5px">
        <div class="box">
            <div class="box-header">
                <div class="pull-right">
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <form action="<?= base_url('Admin/Stan'); ?>" method="post">
                                <div class="input-group">
                                    <input type="text" name="key_stan" class="form-control" placeholder="Cari data stan" autocomplete="off" autofocus>
                                    <div class="input-group-append">
                                        <input value="Cari" class="btn btn-primary" type="submit" name="cari">
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
                            <th>Nomor Kios</th>
                            <th>Lokasi Kios</th>
                            <th>Biaya Kios</th>
                            <!-- <th>Nama Pemilik</th> -->
                            <th colspan="3">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(empty($stan) ) : ?>
                            <td colspan="6"><div class="alert alert-danger" role="alert">
                                Data Stan tidak ditemukan.
                            </div>
                            </td>
                        <?php endif; ?>
                        <?php foreach ($stan as $stn) : ?>
                            <tr class="text-center">
                                <th><?= ++$start ?>.</th>
                                <td><?= $stn['nomor_stan']; ?></td>
                                <td><?= $stn['lokasi_stan']; ?></td>
                                <td><?= $stn['biaya_stan']; ?></td>
                                <!-- <td><?= $stn['nama']; ?></td> -->
                                <td><a href="<?= site_url('Admin/Stan/detail/' . $stn['id_stan']) ?>" class="badge badge-warning float-right">Detail</a></td>
                                <td><a href="<?= site_url('Admin/Stan/ubah/' . $stn['id_stan']) ?>" class="badge badge-success float-right">Ubah</a></td>
                                <td><a href="<?= site_url('Admin/Stan/hapus/' . $stn['id_stan']) ?>" class="badge badge-danger float-right" onclick="return confirm('Anda yakin hapus data');">Hapus</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <form action="<?= base_url('Admin/Stan/laporan_pdf'); ?>" method="post">
                    <input class="btn btn-success" type="submit" name="print" value="Print">
                </form>
                <?= $this->pagination->create_links(); ?>
            </div>
        </div>
    </section> <!-- End Main Conten -->
</div>