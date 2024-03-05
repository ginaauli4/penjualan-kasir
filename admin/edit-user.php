<?php
// Koneksi ke database menggunakan PDO
try {
    $pdo = new PDO('mysql:host=localhost;dbname=pos', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi ke database gagal: " . $e->getMessage();
    exit;
}

// Inisialisasi variabel ID supplier
$id_user = null;

// Periksa apakah ID supplier diberikan dalam URL
if(isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];

    // Buat query untuk mengambil data user
    $stmt = $pdo->prepare("SELECT * FROM user    WHERE id_user = :id_user");
    $stmt->execute(['id_user' => $id_user]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Jika user tidak ditemukan, tampilkan pesan kesalahan
    if(!$user) {
        echo "user tidak ditemukan.";
        exit;
    }
} else {
    // Jika ID user tidak diberikan dalam URL, tampilkan pesan kesalahan
    echo "ID user tidak diberikan.";
    exit;
}

// Set nilai-nilai dalam variabel PHP jika supplier ditemukan
$id_toko = $user['id_toko'];
$username = $user['username'];
$password = $user['password'];
$email = $user['email'];
$nama_lengkap = $user['nama_lengkap'];
$access_level = $user['access_level'];
$created_at = $user['created_at'];
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1.0">
        <title>Edit User</title>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 150vh;
            margin: 0;
        }

        form {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        h2 {
            color: #333333;
            margin-bottom: 30px;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 10px;
            color: #555555;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #dddddd;
            border-radius: 6px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
            border: none;
            border-radius: 6px;
            padding: 12px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        </style>
    </head>

    <body>
        <form action="proses_edit_user.php"
              method="post">
            <h2>Edit User</h2>

            <!-- Hidden field to store the ID of the user -->
            <input type="hidden"
                   name="id_user"
                   value="<?= $id_user ?>">


            <label for="username">Username:</label>
            <input type="text"
                   id="username"
                   name="username"
                   value="<?= $username ?>"
                   required>

            <label for="password">Password:</label>
            <input type="text"
                   id="password"
                   name="password"
                   value="<?= $password ?>"
                   required>

            <label for="email">Email:</label>
            <input type="email"
                   id="email"
                   name="email"
                   value="<?= $email ?>"
                   required>

            <label for="nama_lengkap">Nama Lengkap:</label>
            <input type="text"
                   id="nama_lengkap"
                   name="nama_lengkap"
                   value="<?= $nama_lengkap ?>"
                   required>


            <label for="access_level">Access Level:</label>
            <select id="access_level"
                    name="access_level"
                    required>
                <option value="admin">Admin</option>
                <option value="kasir">Kasir</option>
            </select>

            <label for="created_at">Created At:</label>
            <input type="text"
                   id="created_at"
                   name="created_at"
                   value="<?= $created_at ?>"
                   required>

            <input type="submit"
                   value="Save Changes">
        </form>
    </body>

</html>