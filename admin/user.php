<!--
Magang Umsida Periode 2022 - Quartal Ke-9
Author: PT INTI MAJU CEMERLANG
Licensed to PT INTI MAJU CEMERLANG
Thanks to :
    > Iwan Setiawan - As The Owner Of The Company
    > Adinata Setiawan - Project Supervisor
Contributor & Credit: 
    > Luthfi Arian Nugraha - Fullstack - Project Leader (University Advisor : Sukma Aji, S.T., S.Kom.)
    > Yusuf Raharja - Frontend - Member Project (University Advisor : Novia Ariyanti, S.Si., M.Pd.)
    > Reyhan Adi Saputra - Frontend - Member Project (University Advisor : Novia Ariyanti, S.Si., M.Pd.)
    > Davito Rasendriya Rizqullah Putra - Wordpress - Member Project (University Advisor : Sukma Aji, S.T., S.Kom.)
-->
<?php include 'database/connectiondb.php'; include 'database/important.php'; include 'database/session_false.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - PT. Inti Maju Cemerlang</title>
    <link rel="shortcut icon" href="../dist/img/favicon-pt.ico" type="image/x-icon">
    <!-- CSS -->
    <link rel="stylesheet" href="../dist/output.css">
</head>
<body>
        <!-- Navbar Admin -->
    <header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10 py-3">
        <div class="container">
            <div class="flex items-center justify-between relative">
                <!-- Logo -->
                <div class="px-4">
                    <a href="#"><img src="../dist/img/logo-pt.png" alt="Logo Kami" width="80" title="PT.Inti Maju Cemerlang"></a>
                </div>
                <!-- Button Navbar -->
                <div class="flex items-center px-4">
                    <!-- Humberger navigasi -->
                    <button class="block absolute right-4 lg:hidden" type="button" name="hamburger" id="hamburger">
                        <span class="garis-navbar transition duration-300 ease-in-out origin-top-left"></span>
                        <span class="garis-navbar transition duration-300 ease-in-out"></span>
                        <span class="garis-navbar transition duration-300 ease-in-out origin-bottom-left"></span>
                    </button>
                <nav id="nav-menu" class="hidden absolute py-5 bg-white shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
                    <ul class="block lg:flex">
                        <li class="group"><a href="../index.php" class="text-base font-semibold text-dark py-2 mx-8 flex group-hover:text-primary transition duration-300 ease-in-out">Beranda</a></li>
                        <li class="group"><a href="dashboard.php" class="text-base font-semibold text-dark py-2 mx-8 flex group-hover:text-primary transition duration-300 ease-in-out">Dashboard</a></li>
                        <li class="group"><a href="clientdm.php" class="text-base font-semibold text-dark py-2 mx-8 flex group-hover:text-primary transition duration-300 ease-in-out">Client</a></li>
                        <li class="group"><a href="" class="text-base font-semibold text-dark py-2 mx-8 flex group-hover:text-primary transition duration-300 ease-in-out">User</a></li>
                        <li class="group"><a href="setting.php" class="text-base font-semibold text-dark py-2 mx-8 flex group-hover:text-primary transition duration-300 ease-in-out">Setting</a></li>
                        <li class="group"><a href="database/logout.php" class="text-base font-semibold text-white rounded-xl py-2 px-10 mx-2 flex bg-red-500 hover:bg-red-700 group-hover:text-gray-200 transition duration-300 ease-in-out">Keluar</a></li>
                    </ul>
                </nav>
                </div>
            </div>
         </div>
    </header>

    <?php
        // Menyamakan Kategori Admin
        $init_user = $_SESSION['kategori'];
        $edit = "-";

        // Pagination
        $batas = 10;
        $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
		$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
        $previous = $halaman - 1;
		$next = $halaman + 1;

		$jumlah_user = mysqli_num_rows($result_user);
		$total_halaman = ceil($jumlah_user / $batas);
		$data_user = mysqli_query($koneksi,"select * from user limit $halaman_awal, $batas");
		$nomor = $halaman_awal+1;
    ?>

    <!-- Body of Content -->
    <content class="pt-3.5">
        <section class="pt-28 pb-1">
            <div class="container">
                <div class="w-full px-4 pb-10 bg-slate-200 border-l-2 border-slate-400">
                    <div class="px-5 py-3 text-center">
                        <p class="text-sm text-left">Admin > <span class="font-bold">User</span></p>
                        <h4 class="text-2xl font-bold text-center">User Admin</h4>
                        <hr class="w-16 mx-auto mt-2 mb-2 border-b-4 rounded-full border-primary">
                        <p class="text-sm mb-4 text-center">Daftar nama pengguna administrasi</p>
                        <?php if($init_user == "Pengelola"){ ?>
                            <a href="userdu.php" class="py-2 px-6 mb-10 font-semibold bg-primary border-2 border-primary transition duration-300 hover:shadow-2xl hover:opacity-80 mx-auto rounded-3xl ease-in-out">Tambah Pengguna</a>
                        <?php } else if ($init_user == "Administrator"){ ?>
                            <a href="usere.php?id_admin=<?php echo $_SESSION['id']?>" class="py-2 px-6 mb-10 font-semibold bg-primary border-2 border-primary transition duration-300 hover:shadow-2xl hover:opacity-80 mx-auto rounded-3xl ease-in-out">Edit Data Anda</a>
                        <?php } ?>
                    </div>

                    <!-- Table  -->
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg mt-2 mb-5">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">Nama User</th>
                                    <th scope="col" class="py-3 px-6">Ponsel</th>
                                    <th scope="col" class="py-3 px-6">Kategori</th>
                                    <th scope="col" class="py-3 px-6">Username</th>
                                    <th scope="col" class="py-3 px-6">Log Masuk</th>
                                    <th scope="col" class="py-3 px-6"><span class="sr-only">Edit</span></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php while($user = mysqli_fetch_assoc($data_user)){ ?>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $user['nama_admin']; ?></th>
                                    <td class="py-4 px-6"><?php echo $user['telepon']; ?></td>
                                    <td class="py-4 px-6"><?php echo $user['kategori']; ?></td>
                                    <td class="py-4 px-6"><?php echo $user['username_admin']; ?></td>
                                    <td class="py-4 px-6"><?php echo $user['log_user']; ?></td>
                                    <?php if($init_user == "Pengelola"){ ?>
                                        <td class="py-4 px-6 text-center"><a href="usere.php?id_admin=<?php echo $user['id_admin']; ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:opacity-80">Edit</a> | <a href="database/delete.php?id_admin=<?php echo $user['id_admin']; ?>" class="font-medium text-red-600 dark:text-red-500 hover:opacity-80">Hapus</a></td>
                                    <?php } else if ($init_user == "Administrator"){ ?>
                                        <td class="py-4 px-6 text-center">-</td>
                                    <?php } ?>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- End Table -->

                    <div class="flex flex-warp">
                        <div class="mx-auto items-center">
                            <!-- Pagination -->
                            <nav aria-label="Page navigation example">
                                <ul class="inline-flex -space-x-px text-center">
                                    <li>
                                        <a <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?> class="py-2 px-3 ml-0 leading-tight text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                                    </li>
                                    <?php for($x=1;$x<=$total_halaman;$x++){ ?> 
                                    <li>
                                        <a href="?halaman=<?php echo $x ?>" class="py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"><?php echo $x; ?></a>
                                    </li>
                                    <?php } ?>
                                    <li>
                                        <a <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?> class="py-2 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                                    </li>
                                </ul>
                            </nav>
                            <!-- End Pagination -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </content>

    <!-- Footer Dashboard -->
    <footer class="pt-3.5">
        <div class="container">
            <div class="w-full px-4 text-center">
                <h5 class="text-sm">&copy <?php echo date('Y'); ?> PT. INTI MAJU CEMERLANG. All Right Reserved</h5>
            </div>
        </div>
    </footer>
    <script src="../dist/js/navbar.js"></script>
</body>
</html>