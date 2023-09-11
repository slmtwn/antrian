<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <!-- Topbar Navbar -->
            <div class="row">
                <div class="col-lg mt-3">
                    <div id="date-container"></div>
                    <script>
                        function showDateTo(elemID) {

                            var date = new Date();
                            var second = date.getSeconds();
                            var minute = date.getMinutes();
                            var hour = date.getHours();
                            var day = date.getDay();
                            var dayMonth = date.getDate();
                            var month = date.getMonth();
                            var year = date.getYear();

                            var dayArray = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum&#39;at", "Sabtu"];
                            var monthArray = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

                            // Menambahkan angka nol di depan jika nilai kurang dari 10
                            if (second < 10) second = '0' + second;
                            if (minute < 10) minute = '0' + minute;
                            if (hour < 10) hour = '0' + hour;
                            if (dayMonth < 10) dayMonth = '0' + dayMonth;

                            if (year < 1000) year += 1900;

                            document.getElementById(elemID).innerHTML = dayArray[day] + ', ' + dayMonth + ' ' + monthArray[month] + ' ' + year + ' ' + hour + ':' + minute + ':' + second;

                        }

                        // Masukkan ke kontainer!
                        // Pakai interval 1 detik sekali untuk efek animasi jam
                        // (tanpa interval masih tetap bisa bekerja, tapi tidak akan ada efek animasi)
                        setInterval(function() {
                            showDateTo('date-container');
                        }, 1000);
                    </script>
                    <!-- <h5 class="h3 mb-4 text-gray-800"><?= $title; ?></h5> -->
                </div>
            </div>
            <ul class="navbar-nav ml-auto">
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Selamat datang <strong><?= $user['name']; ?></strong></span>
                        <!-- <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?> "> -->
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->