<?php
require 'bd.php';

$data = $_POST;

if ( isset($data['do_signup']) )
{
    $errors = array();
    if ( trim($data['login']) == '' )
    {
        $errors[] = 'Введите логин!';
    }
 
    if ( trim($data['email']) == '' )
    {
        $errors[] = 'Введите Email!';
    }
 
    if ( $data['password'] == '' )
    {
        $errors[] = 'Введите пароль!';
    }

    if ( R::count('users', "login = ?", array($data['login'])) > 0)
    {
        $errors[] = 'Пользователь с таким логином уже существует!';
    }
 
    if ( R::count('users', "email = ?", array($data['email'])) > 0)
    {
        $errors[] = 'Пользователь с таким Email уже существует!';
    }

 
    if ( empty($errors) )
    {
        $user = R::dispense('users');
        $user->login = $data['login'];
        $user->email = $data['email'];
        $user->password = password_hash($data['password'], PASSWORD_DEFAULT); 
        R::store($user);
        echo '<div style="color:white; font-size:40px">Вы успешно зарегистрированы!</div>';
    }else
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
    <title> Авторизация </title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
    <div class="login-page">
  <div class="form">
    <form class="register-form" action="/signup.php" method="POST">
      <input type="text" placeholder="Логин" name="login" value="<?php echo @$data['login']; ?>"/>
      <input type="password" placeholder="Пароль" name="password" value="<?php echo @$data['password']; ?>"/>
      <input type="text" placeholder="Почтовый адрес" name="email" value="<?php echo @$data['email']; ?>"/>
      <button type="submit" name="do_signup">Регистрация</button>
      </form>
  </div>
</div>
</body>
</html>