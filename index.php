<?php
session_start();

// Inisialisasi array kosong 
if (!isset($_SESSION['dataSiswa'])) {
    $_SESSION['dataSiswa'] = array();
}

if (isset($_POST["kirim"])) {
    if ($_POST['nama'] == "" && $_POST['nis'] == "" && $_POST['rayon'] == "") {
        echo "data kosong <br>";
    } else {
        $siswa = array(
            "nama" => $_POST['nama'],
            "nis" => $_POST['nis'],
            "rayon" => $_POST['rayon']
        );
        array_push($_SESSION['dataSiswa'], $siswa);
    }
}

// Hapus data dari session
if (isset($_GET['hapus'])) {
    $key = $_GET['hapus'];
    unset($_SESSION['dataSiswa'][$key]);

    header('location: ' . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Home</title>
    <style>
        body {
            background: linear-gradient(45deg, #1abc9c, #ffffff);
        }

        .container {
            margin-top: 50px;
            max-width: 600px;
        }

        .card {
            border: none;
            border-radius: 10px;
        }

        .card-header {
            background-color: #1abc9c;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            padding: 15px;
        }

        .card-body {
            background-color: white;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            padding: 20px;
        }

        .form-label {
            color: #2c3e50;
        }

        .form-control {
            border: 2px solid #1abc9c;
            border-radius: 8px;
        }

        .btn-primary {
            background-color: #1abc9c;
            border: none;
            border-radius: 8px;
        }

        .btn-primary:hover {
            background-color: #16a085;
        }

        .btn-danger, .btn-primary.btn-sm {
            margin-right: 5px;
            border-radius: 5px;
        }

        .btn-secondary {
            border: none;
            background-color: yellowgreen;
            border-radius: 8px;
        }

        .btn-secondary a {
            color: white;
            text-decoration: none;
        }

        .table-container {
            margin-top: 20px;
        }

        .table thead {
            background-color: #1abc9c;
            color: white;
        }

        .alert-info {
            background-color: #eafaf1;
            color: #2c3e50;
        }

        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo-container img {
            max-width: 120px;
            margin: 0 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card text-center">
                    <div class="card-header">
                        <div class="logo-container">
                            <img src="images/3.png" alt="Logo 1">
                            <img src="images/4.png" alt="Logo 2">
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" class="row g-3">
                            <div class="col-12">
                                <label for="nama" class="form-label">Nama Siswa</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukan nama siswa" name="nama">
                            </div>
                            <div class="col-12">
                                <label for="nis" class="form-label">NIS Siswa</label>
                                <input type="number" class="form-control" id="nis" placeholder="Masukan NIS siswa" name="nis">
                            </div>
                            <div class="col-12">
                                <label for="rayon" class="form-label">Rayon</label>
                                <input type="text" class="form-control" id="rayon" placeholder="Masukan rayon siswa" name="rayon">
                            </div>
                            <div class="col-12 d-flex flex-column flex-md-row justify-content-between gap-2">
                                <button class="btn btn-primary w-100" type="submit" name="kirim"><i class='bx bx-plus'></i> Tambah</button>
                                <button class="btn btn-secondary w-100" type="submit" name="cetak">
                                    <i class='bx bx-refresh'></i> <a href="destroy.php">Reset</a></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-container">
                    <?php
                    if (!empty($_SESSION['dataSiswa'])) {
                        echo '<table class="table table-bordered table-striped">';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th>Nama</th>';
                        echo '<th>NIS</th>';
                        echo '<th>Rayon</th>';
                        echo '<th>Aksi</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                        foreach ($_SESSION['dataSiswa'] as $key => $value) {
                            $nama = htmlspecialchars($value["nama"]);
                            $nis = htmlspecialchars($value["nis"]);
                            $rayon = htmlspecialchars($value["rayon"]);
                            echo '<tr>';
                            echo "<td>{$nama}</td>";
                            echo "<td>{$nis}</td>";
                            echo "<td>{$rayon}</td>";
                            echo '<td>';
                            echo "<a href='?hapus={$key}' class=\"btn btn-danger btn-sm\"><i class='bx bx-trash-alt'></i> Hapus</a> ";
                            echo "<a href='edit.php?key={$key}' class=\"btn btn-primary btn-sm\"><i class='bx bx-pencil'></i> Edit</a>";
                            echo '</td>';
                            echo '</tr>';
                        }
                        echo '</tbody>';
                        echo '</table>';
                    } else {
                        echo '<div class="alert alert-info mt-3">Belum ada data siswa yang ditambahkan.</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
