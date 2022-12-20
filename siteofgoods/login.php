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
