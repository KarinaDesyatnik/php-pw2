<?php
    session_start();

  if(!empty($_SESSION['login']) ){ ?>

<?php
    include ("db.php");
      echo "<div style='justify-content: space-between; display: flex; margin-top: 25px;'><div style='color: #527648; font-size: 20px; font-weight: bold; padding-top: 10px;'>Вы вошли на сайт, как ".$_SESSION['login'] . '</div>' . '<div style="display:flex;">
      <div style="cursor: pointer; width: 180px; height: 50px; background:#E34D1D; display: flex; justify-content: center; align-items: center; border-radius: 50px;"><a style="color: #fff; text-decoration: none;" href="account.php">Личный кабинет</a></div>
      <div style="margin-left: 20px; cursor: pointer; width: 100px; height: 50px; background:#E34D1D; display: flex; justify-content: center; align-items: center; border-radius: 50px;"><a style="color: #fff; text-decoration: none;"  href="authorization.php?exit=1">Выйти</a></div></div></div>';
?>

   
<?php

    $sql = "SELECT * FROM blog";
$query = mysqli_query($connect, $sql);

while($res[] = mysqli_fetch_assoc($query)){
    $users = $res;
}
foreach ($users as $user) {
    echo '<br/><h2 style="text-align: center; text-transform: uppercase;">'.$user['title'].'</h2><br/>'. $user['text'].'<br/>';
}
?>


<?php } else{
?>
    <html>
    <head>
    <title>Авторизируйтесь</title>

     <link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css?family=Pangolin" rel="stylesheet">
    </head>
    <body class="main-page">
    <h2>Авторизируйтесь</h2>
      <?php
  if (!empty($_SESSION['successful'])) {
    echo $_SESSION['successful'];
}
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
    echo "<p class='text'>Авторизируйтесь для просмотра нашего блога</p>"; 
     
    }
  
    
    else
    {

    }

    ?>

    <form action="authorization.php" method="post">
 <p>
    <label>Логин:<br></label>
    <input name="login" type="text" size="15" maxlength="15">
    </p>

    <p>

    <label>Пароль:<br></label>
    <input name="password" type="password" size="15" maxlength="15">
    </p>
    <p>
    <input type="submit" name="submit" value="Войти">
<br>
<a href="reg.php" class="reg">Зарегистрироваться</a> 
    </p></form>
    <br>
  

    </body>
    </html>

<?php } ?>
