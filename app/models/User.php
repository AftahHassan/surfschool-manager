<?php
//app/models/User.php
require_once __DIR__ . '/../models/Database.php';

class User {
    private $id;
    private $username;
    private $email;
    private $password;
    private $role;

    //les getters
    public function getId(){
        return $this -> id;
    }

    public function getUsername(){
        return $this -> username;
    }

    public function getEmail(){
        return $this -> email;
    }

    public function getRole(){
        return $this -> role;
    }


    // on passe maintenant au register(sign up)

    public function register($username, $email ,$password){
        $db =Database :: getInstance();
        $hash = password_hash($password,PASSWORD_BCRYPT);
        $db ->query('INSERT INTO users(username , email ,password ,role) VALUES(?,?,?,?)',[$username ,$email ,$hash ,'student']);

    }

    // partie  Login
    public function login($email ,$password){
         $db =Database :: getInstance();
         $stmt = $db-> query('SELECT *FROM users WHERE email =?',[$email]);
         $user =$stmt ->fetch(PDO :: FETCH_ASSOC);

           if($user && password_verify($password, $user['password'])){
              return $user;
           }
             return null;

    }

    //trouver  par L id
    public function findById($id){
        $db =Database :: getInstance();
        $stmt = $db ->query('SELECT * FROM users WHERE id = ?', [$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}























?>