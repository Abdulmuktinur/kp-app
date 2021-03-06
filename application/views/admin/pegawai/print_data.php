<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?= $judul ?></title>

    <!-- <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 5px;
    }

    h2,
    h3 {
        font-size: 25px;
        font-family: Arial, Helvetica, sans-serif;
        text-align: center;
    }

    h4 {
        font-size: 20px;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
    }
</style>

<body>
    <h2>PEMERINTAH KABUPATEN TUBAN</h2>
    <h3>DINAS KOPERASI, PERINDUSTRIAN DAN PERDAGANGAN</h3>
    <h4>REKAP DATA PEGAWAI </h4>
    <!-- Main content -->
    <div>
        <table style="width: 100%;">
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
                </tr>
            </thead>
            <tbody>
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
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>


    <script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>

    <script src="<?= base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>

</body>

</html>