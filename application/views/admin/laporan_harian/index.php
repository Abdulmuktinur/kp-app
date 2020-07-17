<div class="content-wrapper">
    <section class="content-header" style="padding : 15px 5px 0 5px">
        <h1>Data <small>Barang</small></h1>
        <ol class="breadcrumb">
            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Barang</li>
        </ol>
    </section>
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Komoditas<strong>&nbsp;berhasil!&nbsp;</strong><?= $this->session->flashdata('flash'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <!-- Main content -->
    <section class="content" style="padding : 15px 5px">
        <div class="box">
            <div class="box-header">
                <div class="pull-right">
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <form action="<?= base_url('Admin/Laporan'); ?>" method="post">
                                <div class="input-group">
                                    <input type="text" name="key_laporan" class="form-control" placeholder="Cari data laporan" autocomplete="off" autofocus>
                                    <div class="input-group-append">
                                        <input class="btn btn-primary" value="Cari" type="submit" name="cari">
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
                            <th rowspan="2"> No</th>
                            <th rowspan="2"> Nama Komoditas</th>
                            <th rowspan="2"> Satuan</th>
                            <th rowspan="2"> Harga </th>
                            <th rowspan="2"> Tanggal Laporan</th>
                            <th colspan="3">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(empty($laporan) ) : ?>
                            <td colspan="6"><div class="alert alert-danger" role="alert">
                                Data laporan tidak ditemukan.
                            </div>
                            </td>
                        <?php endif; ?>
                        <?php foreach ($laporan as $lprn) : ?>
                            <tr class="text-center">
                                <th><?= ++$start ?>.</th>
                                <td><?= $lprn['nama_komoditas']; ?></td>
                                <td><?= $lprn['satuan']; ?></td>
                                <td><?= $lprn['harga_pangan']; ?></td>
                                <td><?= $lprn['tanggal_laporan']; ?></td>
                                <td><a href="<?= site_url('Admin/Laporan/detail/' . $lprn['id_laporan']) ?>" class="badge badge-warning float-right">Detail</a></td>
                                <td><a href="<?= site_url('Admin/Laporan/ubah/' . $lprn['id_laporan']) ?>" class="badge badge-success float-right">Ubah</a></td>
                                <td><a href="<?= site_url('Admin/Laporan/hapus/' . $lprn['id_laporan']) ?>" class="badge badge-danger float-right" onclick="return confirm('Anda yakin hapus data');">Hapus</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <form action="<?= base_url('Admin/Laporan/laporan_pdf'); ?>" method="post">
                    <input class="btn btn-success" type="submit" name="print" value="Print">
                </form>
                <?= $this->pagination->create_links(); ?>
            </div>
        </div>
    </section> <!-- End Main Conten -->
</div>