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

