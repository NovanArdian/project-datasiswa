<?php
session_start();

if (isset($_GET['key'])) {
    $key = $_GET['key'];
    if (isset($_SESSION['dataSiswa'][$key])) {
        $siswa = $_SESSION['dataSiswa'][$key];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($key)) {
    // update data siswa
    $_SESSION['dataSiswa'][$key]['nama'] = $_POST['nama'];
    $_SESSION['dataSiswa'][$key]['nis'] = $_POST['nis'];
    $_SESSION['dataSiswa'][$key]['rayon'] = $_POST['rayon'];

    // kembali ke halaman index
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            background: linear-gradient(45deg, #1abc9c, #ffffff);
            color: #004d40;
            font-family: 'Arial', sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background-color: #ffffff;
            width: 100%;
            max-width: 600px;
            padding: 30px;
        }

        .btn-success {
            background-color: #00c853;
            border: none;
        }

        .btn-success:hover {
            background-color: #00bfa5;
        }

        .btn-warning {
            background-color: #ffc400;
            border: none;
        }

        .btn-warning:hover {
            background-color: #ffab00;
        }

        .form-label {
            font-weight: bold;
            color: #004d40;
            font-size: 1.2rem;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #004d40;
            font-size: 1rem;
            padding: 10px;
        }

        .btn {
            border-radius: 10px;
            font-size: 1rem;
            padding: 10px 20px;
        }

        .header-logo {
            max-width: 150px;
            margin: 0 10px;
        }

        .btn-icon {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        @media (max-width: 768px) {
            .header-logo {
                max-width: 190px;
                margin: 0 15px;
            }

            .form-label,
            .form-control,
            .btn {
                font-size: 1.5rem;
            }

            .card {
                padding: 40px;
            }
        }

        @media (max-width: 576px) {
            .card {
                padding: 50px;
            }

            .header-logo {
                max-width: 200px;
                margin: 0 20px;
            }

            .form-label,
            .form-control,
            .btn {
                font-size: 1.8rem;
            }
        }
    </style>
</head>

<body>
    <div class="card text-center">
        <div class="card-body">
            <div class="mb-4 d-flex justify-content-center align-items-center flex-wrap">
                <img src="images/3.png" alt="Logo 1" class="header-logo me-2">
                <img src="images/4.png" alt="Logo 2" class="header-logo">
            </div>
            <form method="POST">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" id="nama" name="nama" class="form-control" value="<?php echo $siswa['nama']; ?>">
                </div>
                <div class="mb-3">
                    <label for="nis" class="form-label">NIS:</label>
                    <input type="text" id="nis" name="nis" class="form-control" value="<?php echo $siswa['nis']; ?>">
                </div>
                <div class="mb-3">
                    <label for="rayon" class="form-label">Rayon:</label>
                    <input type="text" id="rayon" name="rayon" class="form-control" value="<?php echo $siswa['rayon']; ?>">
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-success btn-icon">
                        <i class='bx bx-save'></i> Simpan
                    </button>
                    <a href="index.php" class="btn btn-warning btn-icon">
                        <i class='bx bx-arrow-back'></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
