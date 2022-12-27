<?php
require_once('Database.php');

$db = new Database();

$un = $_POST['email'];
$pass = ($_POST['pwd']);

$res = $db->signin($un, $pass);

if($res === true){
    setcookie('loggedIn', true);
    header('location:userhome.php?rid=1');
}
else{
    header('location:signin.php?rid=2');
}