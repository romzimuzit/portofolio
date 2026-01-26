<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Ambil data dari form
$nama  = htmlspecialchars($_POST['nama']);
$email = htmlspecialchars($_POST['email']);
$pesan = nl2br(htmlspecialchars($_POST['pesan']));

$mail = new PHPMailer(true);

try {
    // Konfigurasi SMTP Gmail
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'emailkamu@gmail.com'; // GANTI
    $mail->Password   = 'APP_PASSWORD_GMAIL';  // GANTI
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Pengirim & penerima
    $mail->setFrom($email, $nama);
    $mail->addAddress('romzi.muzitta24@gmail.com'); // email tujuan kamu

    // Konten email
    $mail->isHTML(true);
    $mail->Subject = 'Pesan Baru dari Form Kontak';
    $mail->Body    = "
        <h3>Pesan Masuk</h3>
        <p><b>Nama:</b> $nama</p>
        <p><b>Email:</b> $email</p>
        <p><b>Pesan:</b><br>$pesan</p>
    ";

    $mail->send();
    echo "<script>alert('Pesan berhasil dikirim!'); window.location='index.html';</script>";

} catch (Exception $e) {
    echo "<script>alert('Pesan gagal dikirim'); window.history.back();</script>";
}
