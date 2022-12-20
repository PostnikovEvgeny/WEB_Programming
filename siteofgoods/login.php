<?php
require 'bd.php';


$data = $_POST;
if ( isset($data['do_login']) )
{
    $user = R::findOne('users', 'login = ?', array($data['login']));
    if ( $user )
    {
        if ( password_verify($data['password'], $user->password) )
        {
            $_SESSION['logged_user'] = $user;
            header('Location: /index.php');
        }else
        {
            $errors[] = 'Неверно введен пароль!';
        }
 
    }else
    {
        $errors[] = 'Пользователь с таким логином не найден!';
    }
     
    if ( ! empty($errors) )
    {
        echo '<div id="errors" style="color:white; font-size:40px">' .array_shift($errors). '</div>';
    }
 
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Авторизация</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

    <div class="login-page">
  <div class="form">
    <form class="login-form" action="login.php" method="POST">
      <input type="text" placeholder="Логин" name="login" value="<?php echo @$data['login']; ?>"/>
      <input type="password" placeholder="Пароль" name="password" value="<?php echo @$data['password']; ?>"/>
      <button type="submit" name="do_login">Войти</button>
        </form>
  </div>
</div>

</body>
</html>
