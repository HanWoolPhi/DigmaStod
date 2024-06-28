<?php
// Sesuaikan dengan konfigurasi database Anda
$host = "localhost"; // Host database
$dbusername = "username"; // Username database
$dbpassword = "password"; // Password database
$dbname = "digmastud"; // Nama database

// Koneksi ke database
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Lindungi dari SQL Injection
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

// Query untuk mencari user dengan username dan password yang sesuai
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($query);

// Jika hasil query menghasilkan satu baris, berarti login sukses
if ($result->num_rows == 1) {
    // Redirect ke halaman dashboard atau halaman lainnya
    header("Location: dashboard.php");
} else {
    // Jika login gagal, bisa redirect kembali ke halaman login atau tampilkan pesan error
    echo "Login failed. Invalid username or password.";
}

$conn->close();
?>

