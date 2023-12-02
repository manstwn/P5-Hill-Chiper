<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hill Cipher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f7f7;
        }

        .card {
            box-shadow: 0 4px 6px rgba(165, 146, 146, 0.1);
            background-color: #fff;
        }

        .card-header {
            background-color: #375e91;
            color: #fff;
            text-align: center;
            font-size: 24px;
            border-bottom: none;
        }

        .form-control {
            margin-bottom: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        a {
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Enkripsi & Dekripsi Hill Cipher
                    </div>
                    <div class="card-body">
                        <form method="post" action="hill_cipher.php">
                            <div class="mb-3">
                                <label for="text" class="form-label">Masukkan Plainteks:</label>
                                <input type="text" class="form-control" id="text" name="text" autocomplete="off" required>
                            </div>
                            <div class="mb-3">
                                <label for="key" class="form-label">Masukkan Key (2 x 2):</label>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" id="key00" name="key00" placeholder="" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" id="key01" name="key01" placeholder="" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" id="key10" name="key10" placeholder="" required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <input type="text" class="form-control" id="key11" name="key11" placeholder="" required>
                                    </div>
                                </div>

                            </div>
                            <div class="mb-3">
                                Pilih Metode :
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="encrypt" name="mode" value="encrypt" checked>
                                    <label class="form-check-label" for="encrypt">Encrypt</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="decrypt" name="mode" value="decrypt">
                                    <label class="form-check-label" for="decrypt">Decrypt</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h5 class="mb-3 text-center">Hasil</h5>
                <?php
                if (isset($_GET['message'])) {
                    if ($_GET['message'] == 'success') {
                        echo '<div class="alert alert-danger">Data berhasil dihapus.</div>';
                    } elseif ($_GET['message'] == 'error') {
                        echo '<div class="alert alert-danger">Gagal menghapus data.</div>';
                    }
                }
                ?>
                <table class="table table-hover table-bordered text-center">
                    <thead class="table-danger">
                        <tr>
                            <th>ID</th>
                            <th>PlainText</th>
                            <th>Key</th>
                            <th>Metode</th>
                            <th>Hasil</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Koneksi ke Database
                        $db_host = 'localhost';
                        $db_user = 'root';
                        $db_pass = '';
                        $db_name = 'hill_cipher';
                        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

                        if (!$conn) {
                            die("Koneksi ke database gagal: " . mysqli_connect_error());
                        }

                        // Query untuk mengambil data dari database
                        $query = "SELECT * FROM hasil_hill_cipher";
                        $result = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['input_text'] . "</td>";
                            echo "<td>" . $row['key'] . "</td>";
                            echo "<td>" . $row['mode'] . "</td>";
                            echo "<td>" . $row['result'] . "</td>";
                            echo "<td><a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger'>Hapus</a></td>"; // Tambah tombol Hapus dengan link ke delete.php
                            echo "</tr>";
                        }

                        mysqli_close($conn);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js" integrity="sha384-LxRHzFGwDA5CfAPQGKpao4QhjNJlnI9l6H5hCR0zOX0w8UbZJJ15EN1uIvt9n6Ed" crossorigin="anonymous"></script>
</body>

</html>