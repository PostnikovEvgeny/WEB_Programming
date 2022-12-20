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
        }
 
    }
 
 
}
?>
