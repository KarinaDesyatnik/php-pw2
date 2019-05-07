<?php
session_start();

 include ("db.php");

 echo "<div style='color: #527648; font-size: 18px; font-weight: bold; margin-top: 20px;'>Добро пожаловать в Ваш личный кабинет" . ' ' . $_SESSION['login']  . '</div>';

$user_id = $_SESSION['id'];
   $sql = "SELECT * FROM userslog WHERE user_id like '$user_id'";
$query = mysqli_query($connect, $sql);

while($res[] = mysqli_fetch_assoc($query)){
    $users = $res;
}
foreach ($users as $user) {
	
    echo '<html>
    <head>
    <link rel="stylesheet" href="css/style.css">
    </head>
    <body class="reg-page">
    <form action="/lesson12/php-pw2/edit.php" method="post">'.'<br/>'.'Ваше имя:' .'<br/>'. '<input name="user_name" type="text" value="' .  $user['user_name'] . '">' . '<br/>'.'<br/>'. '<label>Ваш email:</label>' .'<br/>'. '<input type="text" value="' .  $user['email'] . '">' . '<br/>'.'<br/>'. 'Ваш телефон:' . '<br/>'. '<input type="text" value="' . $user['phone'].  '">' . '<br/>' . '<div>Изменить пароль</div>'. '<br/>'.'Новый пароль:' . '<br/>'. '<input type="password"  name="password" value="' .  $user['password'] . '">' .'<br/>'.'Повторить пароль:'  . '<br/>'. '<input type="password" value="' .  $user['password'] . '">' . '</br>'.
    '<input style="margin-top: 30px;" name= "update" id="submit" type="submit" value="Редактировать запись">' . '</form><a href="index.php">Вернуться на главную страницу</a>
    </body>
    </html>
    '

    ;


}



echo "<br>";
    
  
?>

