<?php
 session_start();
?>
<html>
    <head>
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/style.css">

    </head>
    <body class="reg-page">
    <h2>Регистрация</h2>
    <form action="save_user.php" method="post">
<p>
    <label>Ваш логин:<br></label>
    <input name="login" type="text" size="15">
    </p>
<p>
    <label>Ваш пароль:<br></label>
    <input name="password" type="password" size="15">
    </p>
<p>
    <label>Введите пароль ещё раз:<br></label>
    <input name="password2" type="password" size="15">
    </p>
    <?php ?>
        <div style="color: red;">
            <?php echo $_SESSION['error_pas'];  ?>

        </div>

    <?php ?>
<p>

    <p>
    <label>Введите Ваш email:<br></label>
 <input type="text" name="email" placeholder="e-mail" value="<?php echo !empty ($form['valid_email']) ? $form['valid_email'] : ''; ?>">
<?php if(!empty($_SESSION['error_email'])){  ?>
        <div style="color: red;">
            <?php echo $_SESSION['error_email'];  ?>

        </div>
    <?php } ?>
    </p>
     <p>
    <label>Введите Ваш номер телефона:<br></label>
    <input name="phone" type="text" size="15">
    </p>
<p>
    <?php ?>
        <div style="color: red;">
            <?php echo $_SESSION['error_fild'];  ?>

        </div>

    <?php ?>
    <input type="submit" name="submit" value="Зарегистрироваться">
</p></form>
    </body>
    </html>
