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
<?php 
    include 'database/connectiondb.php'; include "database/important.php";
    include 'database/session_false.php';
    if(isset($_GET["id_ck"])){
        $id_ck = $_GET["id_ck"];
    } else if(!isset($_GET["id_ck"])){
        header("Location: clientdk.php");
        exit;
    }
    $query_edk = "SELECT * FROM client_kontruksi WHERE id_ck = '$id_ck'";
    $result_edk = mysqli_query($koneksi, $query_edk);
    $editk = mysqli_fetch_assoc($result_edk);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client - PT. Inti Maju Cemerlang</title>
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
                        <li class="group"><a href="" class="text-base font-semibold text-dark py-2 mx-8 flex group-hover:text-primary transition duration-300 ease-in-out">Client</a></li>
                        <li class="group"><a href="user.php" class="text-base font-semibold text-dark py-2 mx-8 flex group-hover:text-primary transition duration-300 ease-in-out">User</a></li>
                        <li class="group"><a href="setting.php" class="text-base font-semibold text-dark py-2 mx-8 flex group-hover:text-primary transition duration-300 ease-in-out">Setting</a></li>
                        <li class="group"><a href="database/logout.php" class="text-base font-semibold text-white rounded-xl py-2 px-10 mx-2 flex bg-red-500 hover:bg-red-700 group-hover:text-gray-200 transition duration-300 ease-in-out">Keluar</a></li>
                    </ul>
                </nav>
                </div>
            </div>
         </div>
    </header>

    <!-- Body of Content -->
    <content class="pt-3.5">
        <section class="pt-28 pb-3">
            <div class="container">
                <div class="w-full px-4 bg-slate-200 border-l-2 border-slate-400">
                    <div class="px-5 py-3">
                        <p class="text-sm">Admin > <span class="font-bold">Client</span> - Edit Data Client Kontruksi</p>
                        <h4 class="text-2xl font-bold text-center">Edit Data Client</h4>
                        <hr class="w-16 mx-auto mt-2 mb-2 border-b-4 rounded-full border-primary">
                        <p class="text-sm mb-4 text-center">Formulir sunting data client kontruksi</p>
                    </div>
                    <form action="database/edit.php" method="post" enctype="multipart/form-data">
                    <div class="grid md:grid-cols-2 md:gap-6">
                            <input type="hidden" name="id" value="<?php echo $editk["id_ck"]; ?>">
                            <div class="relative z-0 mb-6 w-full group">
                                <input type="text" name="nama"  id="nama" value="<?php echo $editk["ck_nama"] ?>" class="block py-2.5 px-0 w-full font-semibold text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
                                <label for="nama" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Panjang *</label>
                            </div>
                            <div class="relative z-0 mb-6 w-full group">
                                <input type="tel" name="telepon" id="telepon" value="<?php echo $editk["ck_tel"] ?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
                                <label for="telepon" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nomor Ponsel (081-XXX-XXX-XXX) *</label>
                            </div>
                            </div>
                            <div class="grid md:grid-cols-2 md:gap-6">
                                <div class="relative z-0 mb-6 w-full group">
                                    <textarea name="alamat" id="alamat" cols="30" rows="1" class="block py-2.5 px-0 w-full font-semibold text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" required placeholder=" "><?php echo $editk["ck_alamat"] ?></textarea>
                                    <label for="alamat" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Alamat *</label>
                                </div>
                                <div class="relative z-0 mb-6 w-full group">
                                    <input type="date" name="tanggal" value="<?php echo $editk["ck_tanggalmasuk"] ?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                    <label for="tanggal" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tanggal Pendaftaran</label>
                                </div>
                            </div>
                            <div class="relative z-0 mb-6 w-full group">
                                <input type="text" name="jenis" id="jenis"  value="<?php echo $editk["ck_jenis"] ?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
                                <label for="jenis" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Jenis Permintaan (Container/Dump/Cafe/..) *</label>
                            </div>
                            <div class="relative z-0 mb-6 w-full group">
                                <textarea name="catatan" id="catatan" cols="30" rows="1" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "><?php echo $editk["ck_catatan"] ?></textarea>
                                <label for="catatan" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Catatan/Deskripsi *</label>
                            </div>
                            <div class="relative z-0 mb-6 w-full group">
                                <input type="text" name="tracking" value="<?php echo $editk["ck_tracking"] ?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" disabled>
                                <label for="ctracking" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Kode Tracking</label>
                            </div>
                            <div class="relative z-0 mb-6 w-full group">
                                <input type="text" name="progress" id="progres" value="<?php echo $editk["ck_progress"] ?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
                                <label for="progres" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Progress (0-100) *</label>
                            </div>
                            <div class="relative z-0 mb-6 w-full group">
                                <input type="text" name="keterangan" id="keterangan" value="<?php echo $editk["ck_keterangan"] ?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
                                <label for="keterangan" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Keterangan*</label>
                            </div>
                            <div class="relative z-0 mb-6 w-full group">
                            <select name="jenis_progress" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" aria-placeholder=" " required="">
                                    <?php 
                                        if($editk["ck_tipe"] == "Baru"){
                                            echo "<option value='Baru'> -> Baru</option>";
                                        } else if($editk["ck_tipe"] == "Pengerjaan"){
                                            echo "<option value='Pengerjaan'> -> Pengerjaan</option>";
                                        } else if($editk["ck_tipe"] == "Pending"){
                                            echo "<option value='Pending'> -> Pending</option>";
                                        }
                                    ?>
                                    <option value='Baru'>Baru</option>
                                    <option value='Pengerjaan'>Pengerjaan</option>
                                    <option value='Pending'>Pending</option>
                                </select>
                                <label for="ket_progress" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Keterangan Progress*</label>
                            </div>
                            <div class="grid md:grid-cols-2 md:gap-6">
                                <div class="relative z-0 mb-6 w-full group">
                                    <input type="file" src="../dist/upload/<?php echo $editk["ck_foto1"] ?>" value=" <?php echo $editk["ck_foto1"] ?>" name="foto1" id="foto1" class="block py-2.5 px-0 w-full font-semibold text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                    <label for="foto1" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Foto Bukti 1</label>
                                </div>
                                <div class="relative z-0 mb-6 w-full group">
                                    <input type="file" src="../dist/upload/<?php echo $editk["ck_foto2"] ?>" value="<?php echo $editk["ck_foto2"] ?>" name="foto2" id="foto2" class="block py-2.5 px-0 w-full font-semibold text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                    <label for="foto2" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Foto Bukti 2</label>
                                </div>
                                <p class="text-sm text-red-500">(*) Wajib diisi untuk kelengkapan data</p>
                            </div>
                            <div class="w-full text-center mx-auto">
                                <input value="Edit" name="edit_ck" type="submit" class="py-2 px-6 font-semibold mb-10 bg-primary border-2 border-primary transition duration-300 hover:shadow-lg hover:opacity-80 rounded-3xl ease-in-out">
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </section>

        <!-- Button Changger Section -->
        <section id="button-changger" class="pt-4 pb-10">
            <div class="container">
                <div class="w-full px-4">
                    <div class="mx-auto text-center">
                        <a href="javascript:history.back(1);" class="py-2 px-6 mx-auto mb-10 font-semibold bg-primary border-2 border-primary transition duration-300 hover:shadow-2xl hover:opacity-80 rounded-3xl ease-in-out">Kembali</a>
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