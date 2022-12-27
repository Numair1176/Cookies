<?php
class Database{
    private $db;

    function __construct(){
        try{
            $this->db = new PDO("mysql:host=localhost;dbname=Haider",
                "root",
                "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);;
            //print('db connected');
        }
        catch(PDOException $e){
            die($e->getMessage());
        }
    } 

    function signup($u, $p){
        try{
            $sql = "INSERT INTO `users` (`uid`, `uname`, `upas`, `created_at`) VALUES (NULL, ?, ?, current_timestamp());";
            $st = $this->db->prepare($sql);
            $st->execute(array($u, $p));
            return true;
        }
        catch(PDOException $e){
            return false;
        }        
    }

    function signIn($u, $p){
        $sql = "SELECT uid FROM `users` WHERE `uname` = ? AND `upas` = ?;";
        $st = $this->db->prepare($sql);
        $st->execute(array($u, $p));

        if($st->rowCount() == 1 ){
            return true;
        }
        else{
            false;
        }
    }

    function fetchAllUsers(){
        $sql = "SELECT * FROM users";
        $st = $this->db->prepare($sql);
        $st->execute(array());
        return $st;
    }

    // function deleteUser($id){
    //     $sql = "DELETE FROM users WHERE uid = ?";
    //     $st = $this->db->prepare($sql);
    //     $st->execute(array($id));
    // }
}

?>