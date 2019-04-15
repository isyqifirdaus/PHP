<?php
session_start();
if(isset($_SESSION["user"])){
    header("location:beranda.php");
}
include ("function.php");

?>

<!DOCTYPE html>
<html>
    <head><title>Login</title></head>
    <body>
        <?php
        if(isset($_GET ["error"] )) {
            if($_GET["error"] == "wrong"){
                echo '<h3>Usename dan Pasword Salah!</h3>';
        }
    }
    if(isset($_GET["notif"])){
        if($_GET["notif"] == "logout"){
            echo '<h3> Berhasil Logout!</h3>';
    }
}
if(isset($_POST['submit'])){
    echo do_login($_POST['username'], $_POST ['password']);
}
?>
<form action = "<?php  echo $_SERVER['PHP_SELF'];?>" method="post">
Username: <input type= "text" name="username"><br>
Password: <input type="password" name="password"><br>
<input type="submit" name="submit" value="SIGN IN">
</form>
</body>
</html>

<?php
    session_start();
    include("function.php");
    echo check_login();
    ?>

    <!DOCTYPE html>
    <html>
        <head><title>praktik login session</title></head>
        <body>
            <h1>Selamat Datang!</h1>
            <h3><a href = "profil.php">Edit Profil </a></h3>
            <h3><a href = "logut.php">Logout!</a></h3>
</body>
</html>
<?php
function do_login($username, $password){
    //cek kondisi jika username dan password salah
    if($username !="admin" || $password !="admin"){
        header("location.index.php?error=wrong");
    }
    //cek kondisi jika username dan password benar
    if($usename == "admin" && $_POST["password"] == "admin"){
        $_SESSION["user"] = $username;
        $_SESSION["pass"] = $password;

        header ("location:beranda.php");
    }
}

function check_login(){
    //cek kondisi login session
    if(!isset($_SESSION["user"])){
        header("location:index.php");
    }
}
?>