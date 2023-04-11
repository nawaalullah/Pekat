<?php
session_start();
require 'functions.php';
if (isset($_POST["login"])){
    if(login($_POST)>0){
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Pekat | Masuk Akun</title>
    <link rel="shortcut icon" href="img/Kota Bandung.svg" type="image/x-icon">
    <link rel="stylesheet" href="../pekat/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>

    <div class="container">
        <div class="row col-7 position-absolute top-50 start-50 translate-middle shadow p-3 mb-5 rounded">
            <div class="col-6 my-5">
                <h2 class="text-center fw-semibold fs-2" style="opacity: 80%;">Pekat Kota Bandung <br>
                    <h6 class="text-center fw-semibold" style="opacity: 40%; margin-top: -3%;">Pengaduan Masyarakat</h6>
                </h2>
                <img src="img/login.svg" alt="">
            </div>
            <div class="col-6 my-5 pt-5">
                <div class="bg-white shadow rounded-3 pt-5 ">
                        <div style="margin-top: -15%; margin-bottom: 5%;">
                            <svg class="rounded-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                <path fill="#ecebeb" fill-opacity="0.6"
                                    d="M0,192L40,176C80,160,160,128,240,117.3C320,107,400,117,480,154.7C560,192,640,256,720,245.3C800,235,880,149,960,106.7C1040,64,1120,64,1200,58.7C1280,53,1360,43,1400,37.3L1440,32L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z">
                                </path>
                            </svg>
                        </div>
                        <div style="margin-top: -8%; margin-bottom: 10%;">
                            <h6 class="text-center fw-semibold fs-2">Masuk</h6>
                        </div>

                        <?php if(isset($error)) : ?>
                            <div class="col-lg-8 col-md-8 alert alert-danger mx-auto text-center" role="alert">
                               Username / Password Salah !
                            </div>

                            <?php endif; ?>

                        <form action="" method="POST">
                        <!-- Username -->
                        <div class="d-flex col-8 mt-3 mx-auto border-bottom" style="opacity: 99%;">
                            <div class="my-auto border-end">
                                <label for="username" class=" col-sm-2 px-2"><i
                                        class="fa-solid fa-user text-secondary fs-3"></i></label>
                            </div>
                            <div class=" col-sm-10 ms-2">
                                <input type="text" name="username" id="username" class="form-control-plaintext" placeholder="Masukan Nama Pengguna"
                                    style="border: none;" required>
                            </div>
                        </div>
                        <!-- Password -->
                        <div class="d-flex col-8 mt-3 mx-auto border-bottom" style="opacity: 99%;">
                            <div class="my-auto border-end">
                                <label for="password" class=" col-sm-1 px-2"><i class="fa-solid fa-lock text-secondary fs-3"
                                        style="margin-left: 3px;"></i></label>
                            </div>
                            <div class=" col-sm-10 ms-2">
                                <input type="password" name="password" id="password" class="form-control-plaintext"
                                    placeholder="Masukan Kata Sandi" style="border: none;" required>
                            </div>
                        </div>
                        <div class="col-6 mt-4 mx-auto" style=" opacity: 99%;">
                            <button class="btn button1 mt-3 form-control" name="login" id="login" type="submit">Masuk</button>
                        </div>
                        </form>

                        <svg style="margin-top: -11%;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                            <path fill="#ecebeb" fill-opacity="0.6"
                                d="M0,64L40,80C80,96,160,128,240,138.7C320,149,400,139,480,154.7C560,171,640,213,720,240C800,267,880,277,960,272C1040,267,1120,245,1200,229.3C1280,213,1360,203,1400,197.3L1440,192L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
                            </path>
                        </svg>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
  </script>
</body>

</html>