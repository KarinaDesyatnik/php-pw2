<?php
    session_start();   
if (!empty($_GET['exit'])) {     
    unset($_SESSION['login']);
    unset($_SESSION['password']);
     unset($_SESSION['id']);
    
    
    header('Location: index.php', true, 301);
exit;   
}
if (isset($_POST['login'])) {
 $login = $_POST['login'];
if ($login == '') { unset($login);} } 
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }

if (empty($login) or empty($password)) 
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    
    $login = trim($login);
    $password = trim($password);

    include ("db.php");

$result = mysqli_query($connect,"SELECT * FROM userslog WHERE user_name = '$login'");

    $myrow = mysqli_fetch_array($result);
    if (empty($myrow['password']))
    {
    exit ("Извините, введённый вами login или пароль неверный.");
    }
    else {

    if ($myrow['password']==$password) {
    
    $_SESSION['login']=$myrow['user_name']; 
    $_SESSION['id']=$myrow['user_id'];
    $_SESSION['password']=$myrow['password'];

    header('Location: index.php', true, 301);
    }
 else {

    exit ("Извините, введённый вами login или пароль неверный.");
    }
    }

    ?>