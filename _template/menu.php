<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        
        <?php
        if ($_SESSION['level'] == 'admin'){
        ?>
            <ul class="nav" id="main-menu">
            <li class="text-center">
                <img src="../assets/img/logo.jfif" class="user-image img-responsive"/>
            </li>
            <li>
                <a  href="../dashboard/"><i class="fa fa-home fa-2x"></i> Dashboard</a>
            </li>
            <li>
                <a  href="../siswa/"><i class="fa fa-users fa-2x"></i> Data Siswa</a>
            </li>
            <li>
                <a  href="../petugas/"><i class="fa fa-user fa-2x"></i> Data Petugas</a>
            </li>
            <li  >
                <a  href="../kelas/"><i class="fa fa-university fa-2x"></i> Data Kelas</a>
            </li>	
            <li>
                <a  href="../spp/"><i class="fa fa-database fa-2x"></i> Data SPP</a>
            </li>
            <li>
                <a  href="../pembayaran/"><i class="fa fa-file-invoice fa-2x"></i> Pembayaran</a>
            </li>
        </ul>
        <?php } ?>
        <?php
        if ($_SESSION['level'] == 'petugas'){
        ?>
            <ul class="nav" id="main-menu">
            <li class="text-center">
                <img src="../assets/img/logo.jfif" class="user-image img-responsive"/>
            </li>
            <li>
                <a  href="../dashboard/"><i class="fa fa-home fa-2x"></i> Dashboard</a>
            </li>
            <li>
                <a  href="../pembayaran/"><i class="fa fa-file-invoice fa-2x"></i> Pembayaran</a>
            </li>
        </ul>
        <?php } ?>
        
        <?php
        if ($_SESSION['level'] == 'siswa'){
        ?>
            <ul class="nav" id="main-menu">
            <li class="text-center">
                <img src="../assets/img/logo.jfif" class="user-image img-responsive"/>
            </li>
            <li>
                <a  href="../dashboard/"><i class="fa fa-home fa-2x"></i> Dashboard</a>
            </li>
        </ul>
        <?php } ?>
        
	
    </div>

</nav>  