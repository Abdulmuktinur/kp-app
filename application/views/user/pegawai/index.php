<div class="container">
    <div class="row mt-3">
        <div class="col-lg-6">
            <a href="<?=site_url('User/Pegawai/tambah')?>" class="btn btn-primary float-right">Tambah</a>
            <h3>Daftar Pegawai</h3>
        </div>
    </div>
    <?php if($this->session->flashdata('flash') ): ?>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data pegawai<strong>&nbsp;berhasil!&nbsp;</strong><?= $this->session->flashdata('flash'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="row mt-3">
        <div class="col-md-4">
            <form action="<?= base_url('User/Pegawai');?>" method="post">
                <div class="input-group">
                    <input type="text" name="keyword" class="form-control" placeholder="Cari data pegawai" autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <input class="btn btn-primary" type="submit" name="cari">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <h5>Result : <?= $total_rows;?></h5>
            <div class="table-responsive-sm">
                <table class="table table-striped table-bordered ">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIP</th>
                            <th scope="col">NIK</th>
                            <th scope="col">NPWP</th>
                            <th scope="col">Nama</th>
                            <!-- <th scope="col">NIK</th> -->
                            <th class="text-center" colspan="3">Opsi</th>
                            <!-- <th scope="col">Handle</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($pegawai) ) : ?>
                            <td colspan="6"><div class="alert alert-danger" role="alert">
                                Data pegawai tidak ditemukan.
                            </div>
                            </td>
                        <?php endif; ?>
                        <?php
                        foreach ( $pegawai as $pgw ) : ?>
                        <tr>
                            <th><?= ++$start ?>.</th>
                            <td><?= $pgw['NIP'];?></td>
                            <td><?= $pgw['NIK'];?></td>
                            <td><?= $pgw['NPWP'];?></td>
                            <td><?= $pgw['nama'];?></td>
                            <td><a href="<?=site_url('User/Pegawai/detail/'.$pgw['id_pegawai'])?>" class="badge badge-primary float-right">Detail</a></td>
                            <td><a href="<?=site_url('User/Pegawai/ubah/'.$pgw['id_pegawai'])?>" class="badge badge-success float-right">Ubah</a></td>
                            <td><a href="<?=site_url('User/Pegawai/hapus/'.$pgw['id_pegawai'])?>" class="badge badge-danger float-right" onclick="return confirm('Anda yakin hapus data');">Hapus</a></td>
                        </tr>
                        <?php 
                        endforeach; ?>  
                    </tbody>
                </table>
                <?= $this->pagination->create_links();?>
            </div>
        </div>
    </div>
</div>