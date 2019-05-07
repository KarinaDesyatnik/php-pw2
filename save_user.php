<?php
session_start();
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
if (isset($_POST['password2'])) { $password2=$_POST['password2']; if ($password2 =='') { unset($password2);} }
$email = $_POST['email'];
$email_check = explode('@', $email);

if(!empty($_POST['email']) && count($email_check) == 2 )  {
    $_SESSION['valid_email'] = $email;
    unset($_SESSION['error_email']);

} else{
    $_SESSION['error_email'] = 'Поле e-mail введено неверно';
    unset($_SESSION['valid_email']);
}

if (isset($_POST['phone'])) { $phone=$_POST['phone']; if ($phone =='') { unset($phone);} }
 if (empty($login) or empty($password) or empty($password2) or empty($email)) 
    {
         $_SESSION['error_fild'] = 'Заполните все поля';
        header('Location: reg.php', true, 301);
   
    }
 if ($_SESSION['error_email'] == TRUE) 
    {
    unset($_SESSION['valid_email']);
      header('Location: reg.php', true, 301);
exit;   
    }
  
    $login = trim($login);
    $password = trim($password);
    $password2 = trim($password2);
    $email = trim($email);
    $phone = trim($phone);
    include ("db.php");
if($password != $password2) {
    $_SESSION['error_pas'] = 'Пароль должен совпадать';
      header('Location: reg.php', true, 301);
exit;
}
// if($password == $password2) {
//      unset($_SESSION['error_pas']);
  
// exit;
// }
// if ($_SESSION['error_pas'] == TRUE) 
//     {
    
//       header('Location: reg.php', true, 301);
// exit;
// }
if ($_SESSION['error_email'] == TRUE) 
    {
    unset($_SESSION['valid_email']);
      header('Location: reg.php', true, 301);
exit;
}
$result = mysqli_query($connect,"SELECT user_id FROM userslog WHERE user_name='$login'");

    $myrow = mysqli_fetch_array($result);

    if (!empty($myrow['user_id'])) {
         
     exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");

    }

    $result2 = mysqli_query($connect, "INSERT INTO userslog SET user_name='$login', password='$password', email='$email', phone='$phone'");

    if ($result2 == 'TRUE')
    {
           header('Location: index.php', true, 301);
           $_SESSION['successful'] =  "<div style='width: 100%;height:100%; display:flex; flex-direction:column; justify-content: center; align-items:center;font-family: 'Pangolin', cursive; font-size: 40px; color: #527648;'><p style='color: #527648;' >Вы успешно зарегистрированы! </p></div>";
   
    }
 else {
    echo "Ошибка! Вы не зарегистрированы.";
    }
    ?>