<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="#"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li><a href="<?= base_url('Admin/Pegawai') ?>"><i class="fa fa-edit"></i> Data Pegawai</a></li>
            <li><a href="<?= base_url('Admin/Pedagang') ?>"><i class="fa fa-edit"></i> Data Pedagang</a></li>
            <li><a href="<?= base_url('Admin/Stan') ?>"><i class="fa fa-edit"></i> Data Stan Pasar</a></li>
            <li><a href="<?= base_url('Admin/Laporan') ?>"><i class="fa fa-pie-chart"></i> Laporan Harian</a></li>

            <li class="header">SETTING</li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Data Admin</a></li>
            <li><a href="<?= base_url('Admin/Auth') ?>"><i class="fa fa-circle-o"></i> Logout</a></li>
            </li>
        </ul>
    </section>
</aside>