<?php
require_once('Database.php');

$db = new Database();

$un = $_POST['email'];
$pass = ($_POST['pwd']);

$res = $db->signup($un, $pass);

if($res === true){
    header('location:userhome.php?rid=3');
}
else{
    header('location:signup.php?rid=4');
}