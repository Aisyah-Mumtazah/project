<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Css -->
    <link rel="stylesheet" href="./dist/styles.css">
    <link rel="stylesheet" href="./dist/all.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <title>Tabel Tiket</title>
</head>

<body>
<!--Container -->
<div class="mx-auto bg-grey-lightest">
    <!--Screen-->
    <div class="min-h-screen flex flex-col">
        <!--Header Section Starts Here-->
        <header class="bg-nav">
            <div class="flex justify-between">
                <div class="p-1 mx-3 inline-flex items-center">
                    <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                    <h1 class="text-white p-2">Traveli</h1>
                </div>
                <div class="p-1 flex flex-row items-center">
                    <img onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full" src="../4092564-about-mobile-ui-profile-ui-user-website_114033.png" alt="">
                    <a href="#" onclick="profileToggle()" class="text-white p-2 no-underline hidden md:block lg:block">Pegawai Travel</a>
                    <div id="ProfileDropDown" class="rounded hidden shadow-md bg-white absolute pin-t mt-12 mr-1 pin-r">
                        <ul class="list-reset">
                          <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">My account</a></li>
                          <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Notifications</a></li>
                          <li><hr class="border-t mx-2 border-grey-ligght"></li>
                          <li><a href="../login.php" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!--/Header-->

        <div class="flex flex-1">
            <!--Sidebar-->
            <aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">
                <div class="flex">

                </div>
                <ul class="list-reset flex flex-col">
                    <li class=" w-full h-full py-3 px-2 border-b border-light-border ">
                        <a href="indeks.php"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-tachometer-alt float-left mx-2"></i>
                            Dashboard
                            <span><i class="fas fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="TabelPemesanP.php"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-table float-left mx-2"></i>
                            Tabel Data Pemesan
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="TabelKendaraanP.php"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-table float-left mx-2"></i>
                            Tabel Data Kendaraan
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="TabelTiketP.php"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-table float-left mx-2"></i>
                            Tabel Data Pemesanan Tiket
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                </ul>

            </aside>
            <!--/Sidebar-->
            <!--Main-->
            <main class="bg-white-500 flex-1 p-3 overflow-hidden">
            <?php
                include '../model/Database.php';
                $db=new database();
            ?>
                <div class="flex flex-col">
                    <!--Grid Form-->
                    <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                        <div class="mb-2 border-solid border-gray-300 rounded border shadow-sm w-full">
                            <div class="bg-gray-200 px-3 py-4 border-solid border-gray-200 border-b">
                                Tabel Data Tiket
                            </div>
                            <button
                                    class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-semibold py-1 px-1 rounded"
                                    type="submit"><a href = "FormTiketP.php">Tambah Data</a>
                            </button>
                            <div class="p-3">
                                <table class="table-responsive w-full rounded">
                                    <thead>
                                      <tr>
                                        <th class="border w-1/8 px-4 py-2">No</th>
                                        <th class="border w-1/7 px-4 py-2">ID Tiket</th>
                                        <th class="border w-1/7 px-4 py-2">ID Admin</th>
                                        <th class="border w-1/7 px-4 py-2">ID Pemesan</th>
                                        <th class="border w-1/6 px-4 py-2">ID Kendaraan</th>
                                        <th class="border w-1/6 px-4 py-2">Tanggal Pesan</th>
                                        <th class="border w-1/6 px-4 py-2">Tujuan</th>
                                        <th class="border w-1/5 px-4 py-2">Harga (Rp)</th>
                                        <th class="border w-1/6 px-4 py-2">Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no=1;
                                        foreach($db->tampil_data_tiket() as $x){
                                    ?>
                                        <tr>
                                            <td class="border px-4 py-2"><?php echo $no++; ?></td>
                                            <td class="border px-4 py-2"><?php echo $x['id_tiket']; ?></td>
                                            <td class="border px-4 py-2"><?php echo $x['id_admin']; ?></td>
                                            <td class="border px-4 py-2"><?php echo $x['id_pemesanan']; ?></td>
                                            <td class="border px-4 py-2"><?php echo $x['id_kendaraan']; ?></td>
                                            <td class="border px-4 py-2"><?php echo $x['tanggal_pesan']; ?></td>
                                            <td class="border px-4 py-2"><?php echo $x['tujuan']; ?></td>
                                            <td class="border px-4 py-2"><?php echo $x['harga']; ?></td>
                                            <td class="border px-4 py-2">
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-white"
                                                href="EditTiketP.php?idtiket=<?php echo $x['id_tiket']; ?>&aksi=edit">
                                                        <i class="fas fa-edit"></i></a>
                                                <a class="bg-teal-300 cursor-pointer rounded p-1 mx-1 text-red-500"
                                                href="../controller/ProsesTiketP.php?idtiket=<?php echo $x['id_tiket']; ?>&aksi=hapus">
                                                        <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/Grid Form-->
                </div>
            </main>
            <!--/Main-->
        </div>
        <!--Footer-->
        <footer class="bg-grey-darkest text-white p-2">
            <div class="flex flex-1 mx-auto">&copy; My Design</div>
        </footer>
        <!--/footer-->

    </div>

</div>

<script src="./main.js"></script>

</body>

</html>