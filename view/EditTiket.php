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
    <title>Forms Tiket</title>
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
                        <img onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full"
                            src="../4092564-about-mobile-ui-profile-ui-user-website_114033.png" alt="">
                        <a href="#" onclick="profileToggle()"
                            class="text-white p-2 no-underline hidden md:block lg:block">Admin Travel</a>
                        <div id="ProfileDropDown"
                            class="rounded hidden shadow-md bg-white absolute pin-t mt-12 mr-1 pin-r">
                            <ul class="list-reset">
                                <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">My
                                        account</a></li>
                                <li>
                                    <hr class="border-t mx-2 border-grey-ligght">
                                </li>
                                <li><a href="#"
                                        class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
            <!--/Header-->

            <div class="flex flex-1">
                <!--Sidebar-->
                <aside id="sidebar"
                    class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">
                    <div class="flex">

                    </div>
                <ul class="list-reset flex flex-col">
                    <li class=" w-full h-full py-3 px-2 border-b border-light-border ">
                        <a href="index.php"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-tachometer-alt float-left mx-2"></i>
                            Dashboard
                            <span><i class="fas fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="TabelPemesan.php"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-table float-left mx-2"></i>
                            Tabel Data Pemesan
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="TabelKendaraan.php"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-table float-left mx-2"></i>
                            Tabel Data Kendaraan
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="TabelPegawai.php"
                           class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                            <i class="fas fa-table float-left mx-2"></i>
                            Tabel Data Pegawai
                            <span><i class="fa fa-angle-right float-right"></i></span>
                        </a>
                    </li>
                    <li class="w-full h-full py-3 px-2 border-b border-light-border">
                        <a href="TabelTiket.php"
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
                        <!-- Card Sextion Starts Here -->
                        <div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
                            <!--Horizontal form-->
                            <div
                                class="mb-2 border-solid border-grey-light rounded border shadow-sm w-full md:w-1/2 lg:w-full">
                                <div class="bg-gray-300 px-2 py-3 border-solid border-gray-400 border-b">
                                    Form Tiket
                                </div>
                                <div class="p-3">
                                    <form class="w-full" action="../controller/ProsesTiket.php?aksi=update" method="post">
                                    <?php foreach($db->edit_tiket($_GET['idtiket']) as $d){ ?>
                                        <input type="hidden" name="idtiket" value="<?php echo $d['id_tiket'] ?>">
                                        <div class="md:flex md:items-center mb-6">
                                        <div class="md:w-1/4">
                                                <label
                                                    class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-full-name">
                                                    ID Pegawai
                                                </label>
                                            </div>
                                            <div class="md:w-2/4">
                                                <?php $pilih=$d['id_admin']; ?>
                                                <select class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-full-name" name="idadmin">
                                                    <?php foreach($db->drop_admin() as $e){ ?>
                                                        <option <?php if($pilih==$e['id']){echo 'selected';} ?>><?php echo $e['id'];?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                         viewBox="0 0 20 20">
                                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="md:flex md:items-center mb-6">
                                        <div class="md:w-1/4">
                                                <label
                                                    class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-full-name">
                                                    ID Pemesan
                                                </label>
                                            </div>
                                            <div class="md:w-2/4">
                                                <?php $pil=$d['id_pemesanan']; ?>
                                                <select class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-full-name" name="idpesan">
                                                    <?php foreach($db->drop_pesan() as $f){ ?>
                                                        <option <?php if($pil==$f['id_pemesanan']){echo 'selected';}?>><?php echo $f['id_pemesanan'];?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                         viewBox="0 0 20 20">
                                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="md:flex md:items-center mb-6">
                                        <div class="md:w-1/4">
                                                <label
                                                    class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-full-name">
                                                    ID Kendaraan
                                                </label>
                                            </div>
                                            <div class="md:w-2/4">
                                                <?php $pilih=$d['id_kendaraan']; ?>
                                                <select class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-full-name" name="idkendaraan">
                                                    <?php foreach($db->drop_kendaraan() as $g){ ?>
                                                        <option <?php if($pilih==$g['id_kendaraan']){echo 'selected';}?>><?php echo $g['id_kendaraan'];?></option>
                                                    <?php } ?>
                                                </select>
                                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                         viewBox="0 0 20 20">
                                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="md:flex md:items-center mb-6">
                                        <div class="md:w-1/4">
                                                <label
                                                    class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-full-name">
                                                    Tanggal Pesan
                                                </label>
                                            </div>
                                            <div class="md:w-1/4">
                                                <input
                                                    class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light"
                                                    id="inline-full-name" type="date" name="tanggal" value="<?php echo $d['tanggal_pesan'];?>">
                                            </div>
                                        </div>
                                        <div class="md:flex md:items-center mb-6">
                                        <div class="md:w-1/4">
                                                <label
                                                    class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-full-name">
                                                    Tujuan
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <input
                                                    class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light"
                                                    id="inline-full-name" type="text" name="tujuan" value="<?php echo $d['tujuan']?>">
                                            </div>
                                        </div>
                                        <div class="md:flex md:items-center mb-6">
                                        <div class="md:w-1/4">
                                                <label
                                                    class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4"
                                                    for="inline-full-name">
                                                    Harga
                                                </label>
                                            </div>
                                            <div class="md:w-3/4">
                                                <input
                                                    class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light"
                                                    id="inline-full-name" type="number" name="harga" value="<?php echo $d['harga']?>">
                                            </div>
                                        </div>
                                        <div class="md:flex md:items-center">
                                            <div class="md:w-1/3"></div>
                                            <div class="md:w-2/3">
                                                <button
                                                    class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-medium py-2 px-4 rounded"
                                                    type="submit">
                                                    Simpan
                                                </button>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </form>
                                </div>
                            </div>
                            <!--/Horizontal form-->
                        </div>
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