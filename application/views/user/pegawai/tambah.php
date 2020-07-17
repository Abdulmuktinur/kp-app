<div class="container">
    <div class="row mt-3">
        <div class="col-md-4">

            <div class="card">
                <div class="card-header">
                    Form Tambah Data Pegawai
                </div>
                <div class="card-body">
                    <!-- <?php if(validation_errors() ): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors();?>
                        </div> 
                    <?php endif; ?> -->
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="NIP">NIP</label>
                            <input type="text" name="NIP" class="form-control" id="NIP">
                            <small class="form-text text-danger"><?= form_error('NIP')?></small>
                        </div>
                        <div class="form-group">
                            <label for="NIK">NIK</label>
                            <input type="text" name="NIK" class="form-control" id="NIK">
                        </div>
                        <div class="form-group">
                            <label for="NPWP">NPWP</label>
                            <input type="text" name="NPWP" class="form-control" id="NPWP">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>&nbsp;<small>(Laki - Laki / Perempuan)</small>
                            <input type="text" name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" class="form-control" id="alamat" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="no_telepone">Nomor Telepon</label>
                            <input type="text" name="no_telepone" class="form-control" id="no_telepone">
                        </div>
                        <button type="submit" class="btn btn-success" name="tambah">Tambah Data</button>
                        <a href="<?= base_url();?>User/Pegawai" class="btn btn-primary float-right" name="kembali">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>