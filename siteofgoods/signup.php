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
 
}
?>

