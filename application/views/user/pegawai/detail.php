<div class="container">
    <row class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Data Pegawai
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $pegawai['nama'];?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?=$pegawai['NIP'];?></h6>
                    <p class="card-text"><?= $pegawai['NIK'];?></p>
                    <p class="card-text"><?= $pegawai['NPWP'];?></p>
                    <a href="<?= base_url();?>User/Pegawai" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </row>
</div>