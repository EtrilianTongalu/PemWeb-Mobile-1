<?php
$username = "";
$pass = "";
$usernameErr = "";
$passErr = "";
$valid_panjang_uname = true;
$valid_panjang_uname_msg = "";
$valid_panjang_pass = true;
$valid_panjang_pass_msg = "";
$pass_valid = true;
$pass_valid_msg = "";
$success = "";

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $pass = trim($_POST['pass']);

    if (empty($username)) {
        $usernameErr = "Username masih kosong<br>";
    }
    if (strlen($username) > 7) {
        $valid_panjang_uname = false;
        $valid_panjang_uname_msg = "Username maksimal 7 karakter<br>";
    }

    if (empty($pass)) {
        $passErr = "Password masih kosong<br>";
    } else {
        $kapital = preg_match("@[A-Z]@", $pass);
        $kecil = preg_match("@[a-z]@", $pass);
        $angka = preg_match("@[0-9]@", $pass);
        $karakter = preg_match("@[^\w]@", $pass);

        if (strlen($pass) < 10) {
            $valid_panjang_pass = false;
            $valid_panjang_pass_msg = "Password minimal 10 karakter.<br>";
        }
        if (!$kapital || !$kecil || !$angka || !$karakter) {
            $pass_valid = false;
            $pass_valid_msg = "Password terdiri dari minimal satu huruf KAPITAL, huruf kecil, angka dan karakter khusus.<br>";
        }
    }

    if (!empty($username) and !empty($pass) and $valid_panjang_uname and $valid_panjang_pass and $pass_valid) {
        $username = "";
        echo "<script>alert('Selamat, Anda Berhasil Mengisi Form dengan Benar')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Modul 2</title>
</head>

<body>
    <div style="margin: 0 auto; width: 300px;">
        <h3>Form</h3>
        <form action="index.php" method="post">
            Username : <input type="text" name="username" value="<?= $username ?>"><br>
            <small style="color: red;"><?php echo $usernameErr . $valid_panjang_uname_msg; ?></small>
            <br>
            Password : <input type="password" name="pass"><br>
            <small style="color: red;"><?php echo $passErr . $valid_panjang_pass_msg . $pass_valid_msg; ?></small>
            <br><input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>

</html>