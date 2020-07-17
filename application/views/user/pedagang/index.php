<div class="container">
    <div class="row mt-3">
        <div class="col-lg-6">
            <a href="<?=site_url('User/Pedagang/tambah')?>" class="btn btn-primary float-right">Tambah</a>
            <h3>Daftar Pedagang</h3>
        </div>
    </div>
    <?php if($this->session->flashdata('flash') ): ?>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Pedagang<strong>&nbsp;berhasil!&nbsp;</strong><?= $this->session->flashdata('flash'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="row mt-3">
        <div class="col-md-4">
            <form action="<?= base_url('User/Pedagang');?>" method="post">
                <div class="input-group">
                    <input type="text" name="keyword_pedagang" class="form-control" placeholder="Cari data Pedagang" autocomplete="off" autofocus>
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
                            <th scope="col">Nomor induk pedagang</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Nama</th>
                            <!-- <th scope="col">NIK</th> -->
                            <th class="text-center" colspan="3">Opsi</th>
                            <!-- <th scope="col">Handle</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(empty($pedagang) ) : ?>
                        <td colspan="6"><div class="alert alert-danger" role="alert">
                            Data Pedagang tidak ditemukan.
                        </div>
                        </td>
                    <?php endif; ?>
                        <?php
                        foreach ( $pedagang as $pdg ) : ?>
                        <tr>
                            <th><?= ++$start ?>.</th>
                            <td><?= $pdg['noip'];?></td>
                            <td><?= $pdg['nik'];?></td>
                            <td><?= $pdg['nama'];?></td>
                            <td><a href="<?=site_url('user/pedagang/detail/'.$pdg['id_pedagang'])?>" class="badge badge-primary float-right">Detail</a></td>
                            <td><a href="<?=site_url('user/pedagang/ubah/'.$pdg['id_pedagang'])?>" class="badge badge-success float-right">Ubah</a></td>
                            <td><a href="<?=site_url('user/pedagang/hapus/'.$pdg['id_pedagang'])?>" class="badge badge-danger float-right" onclick="return confirm('Anda yakin hapus data');">Hapus</a></td>
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