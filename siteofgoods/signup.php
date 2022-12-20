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


 
}
?>



