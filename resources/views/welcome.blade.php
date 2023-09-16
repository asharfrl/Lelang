<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta charset="utf-8">
    <title>LELANG | LOGIN </title>
    <link rel="icon" type="image/png" href="/assets-ds/img/icons8.png">
    <!-- CSS Files -->
    <link id="pagestyle" href="/assets-ds/css/style.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet">
    <style>
    /* <!-- CSS Alert --> */
        .alert {
            padding: 15px;
            background-color: #f44336;
            color: white;
            font-weight: bold;
            border-radius: 5px;
        }

        .success {
            padding: 15px;
            background-color: #00c91b;
            color: white;
            font-weight: bold;
            border-radius: 5px;
        }

        .btn-close {
            background-color: transparent;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 0;
            margin: 0;
            position: relative;
            width: 15px;
            height: 15px;
        }

        .btn-close::before, .btn-close::after {
            content: '';
            position: absolute;
            top: 20%;
            left: 50%;
            width: 2px;
            height: 100%;
            background-color: #ffffff;
            transform: translate(-50%, -50%) rotate(45deg);
        }

        .btn-close::after {
            transform: translate(-50%, -50%) rotate(-45deg);
        }

        /* Gaya label untuk checkbox */
        .form-check-label {
            cursor: pointer;
        }

        /* Gaya checkbox yang disembunyikan */
        .form-check-input {
            display: none;
        }

    /* <!-- CSS Checkbox --> */
        /* Gaya kotak centang kustom */
        .form-check-input + .form-check-label::before {
            content: "\2713"; /* Tanda centang unicode */
            display: inline-block;
            width: 20px; /* Lebar kotak centang */
            height: 20px; /* Tinggi kotak centang */
            margin-right: 5px; /* Jarak dari label */
            text-align: center;
            border: 2px solid #007BFF; /* Warna border kotak centang saat dicentang */
            background-color: #fff; /* Warna background kotak centang saat tidak dicentang */
            border-radius: 3px; /* Sudut border kotak centang */
        }

        /* Gaya kotak centang kustom ketika mouse hover */
        .form-check-input:hover + .form-check-label::before {
            border: 2px solid #0056b3; /* Warna border saat hover */
        }

        /* Gaya kotak centang kustom ketika checkbox tidak dicentang */
        .form-check-input:not(:checked) + .form-check-label::before {
            content: "";
            border: 2px solid #ccc; /* Warna border kotak centang saat tidak dicentang */
            background-color: #fff; /* Warna background kotak centang saat tidak dicentang */
        }

        /* Gaya kotak centang kustom ketika error */
        .form-check-input:invalid + .form-check-label::before {
            border: 2px solid #dc3545; /* Warna border saat terjadi kesalahan */
            background-color: #fff; /* Warna background saat terjadi kesalahan */
        }

        /* Gaya pesan kesalahan */
        .invalid-feedback {
            color: #dc3545; /* Warna teks kesalahan */
            margin-top: 4px; /* Jarak antara checkbox dan pesan kesalahan */
            display: none; /* Pesan kesalahan awalnya disembunyikan */
        }

        /* Tampilkan pesan kesalahan saat checkbox tidak dicentang */
        .form-check-input:invalid ~ .invalid-feedback {
            display: block;
        }
    </style>
</head>

<body>

    <div class="main">
      <div class="container a-container" id="a-container">
            <form action="/logins" method="POST" id="a-form" class="form">
            @csrf

                <a href="/">
                    <img src="/assets-ds/img/icons8.png" alt="main_logo" style="width: 40px;">
                </a>
                <h2 class="form_title title">Sign in to Website</h2>
                @if (session('loginError'))
                    <div class="alert" role="alert">
                        {{ session ('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <p class="switch__description description">Silahkan Masukkan Akun Anda Untuk Lanjut</p>
                <input name="username" class="form__input" type="text" placeholder="Username" aria-label="Username" required autofocus>
                <input name="password" id="pwd" class="form__input" type="password" placeholder="Password" aria-label="Password" required>
                <!-- <input class="btn-check" type="checkbox" id="chk" required>Show Password -->
                <button type="submit" class="btn btn-lg btn-secondary button btn-lg w-100 mt-4 mb-0">Sign in</button>
            </form>
        </div>

        <div class="container b-container" id="b-container">
            <form action="/register" method="POST" id="b-form" class="form">
            @csrf
            <a href="/">
                <img src="/assets-ds/img/icons8.png" alt="main_logo" style="width: 40px;">
            </a>
            <h2 class="form_title title">Create Account</h2>
            <p class="switch__description description">Buat Akun Anda Untuk Memulai</p>
            <input class="form__input" name="username" id="username" type="text" placeholder="Username" required autofocus>
            <div class="error-message" id="username-error"></div>

            <input class="form__input" name="nama_petugas" id="nama_petugas" type="text" placeholder="Nama" required>
            <div class="error-message" id="nama_petugas-error"></div>

            <input class="form__input" name="email" id="email" type="text" placeholder="Email" required>
            <div class="error-message" id="email-error"></div>

            <input class="form__input" name="password" id="password" type="password" placeholder="Password" required>
            <div class="error-message" id="password-error"></div>
                <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                      <label class="form-check-label" for="acceptTerms">Saya Setuju dan Menerima <a href="#">Syarat dan Ketentuan</a></label>
                      <div class="invalid-feedback">Anda Harus Setuju Untuk Mengirim.</div>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-secondary button btn-lg w-100 mt-4 mb-0">Sign up</button>
            </form>
        </div>

        <div class="switch" id="switch-cnt">
            <div class="switch__circle"></div>
            <div class="switch__circle switch__circle--t"></div>
            <div class="switch__container" id="switch-c1">
                @if (session('success'))
                    <div class="success" role="alert">
                        {{ session ('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <a href="/">
                    <img src="/assets-ds/img/icons8.png" alt="main_logo" style="width: 100px;">
                </a>
                <h2 class="switch__title title">Selamat Datang</h2>
                <p class="switch__description description">Tidak Mempunyai Akun ?<br>Sign Up Untuk Membuat Akun</p>
                <button class="switch__button button switch-btn">SIGN UP</button>
            </div>
            <div class="switch__container is-hidden" id="switch-c2">
                <a href="/">
                    <img src="/assets-ds/img/icons8.png" alt="main_logo" style="width: 100px;">
                </a>
                <h2 class="switch__title title">Halo</h2>
                <p class="switch__description description">Sudah Mempunyai Akun ?<br>Sign In Untuk Masuk</p>
                <button class="switch__button button switch-btn">SIGN IN</button>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="/assets-ds/js/main.js"></script>
    <script src="/assets-ds/js/core/popper.min.js"></script>
    <script src="/assets-ds/js/core/bootstrap.min.js"></script>
    <script src="/assets-ds/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="/assets-ds/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }

    const pwd = document.getElementById("pwd");
    const chk = document.getElementById("chk");

    chk.onchange = function(e) {
        pwd.type = chk.checked ? "text" : "password";
    };
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="/assets-ds/js/argon-dashboard.min.js?v=2.0.4"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById("registration-form");

            form.addEventListener("submit", function (e) {
                e.preventDefault();

                // Reset pesan kesalahan
                const errorElements = document.querySelectorAll(".error-message");
                errorElements.forEach((errorElement) => {
                    errorElement.textContent = "";
                });

                // Validasi setiap field
                const username = document.getElementById("username").value;
                const namaPetugas = document.getElementById("nama_petugas").value;
                const email = document.getElementById("email").value;
                const password = document.getElementById("password").value;

                let valid = true;

                if (username === "") {
                    document.getElementById("username-error").textContent = "Username harus diisi.";
                    valid = false;
                }

                if (namaPetugas === "") {
                    document.getElementById("nama_petugas-error").textContent = "Nama harus diisi.";
                    valid = false;
                }

                if (email === "") {
                    document.getElementById("email-error").textContent = "Email harus diisi.";
                    valid = false;
                }

                if (password === "") {
                    document.getElementById("password-error").textContent = "Password harus diisi.";
                    valid = false;
                }

                if (valid) {
                    // Kirim formulir jika semua validasi lulus
                    form.submit();
                }
            });
        });
    </script>

</body>

</html>
