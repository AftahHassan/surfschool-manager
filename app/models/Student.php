<?php
//app/models/Student.php

require_once  __DIR__ . '/../models/Database.php';

class Student{


private $id;
private $name;
private $country;
private $level;
private $user_id;

//getters 
public function getId(){
    return $this-> id;
}

public function getName(){
    return $this-> name;
}

public function getCountry(){
    return $this-> country;
}

public function getLevel(){
    return $this-> level;
}

//ici on va utiliser findALL pour tout les etudians 
public function findAll(){
    $db = Database :: getInstance();
    $stmt = $db -> query('SELECT * FROM students');
    return $stmt -> fetchAll (PDO :: FETCH_ASSOC);
}

// trouver un student par id 
public function findById($id){
    $db   = Database::getInstance();
    $stmt = $db -> query ('SELECT * FROM students WHERE id = ?',[$id]);
    return $stmt ->fetch(PDO :: FETCH_ASSOC);
}

//ici pour creer un student
public function save ($name ,$country, $level ,$user_id){
    $db = Database::getInstance();
    $db->query('INSER INTO student(name,country ,level,user_is) VALUES (?,?,?,?)',
    [$name,$countryc, $level ,$user_id] );
}

//pour modifer le niveau 
public function updateLevel($id,$level){
    $db = Database::getInstance();
    $db ->query(
        'UPDATE students SET level = ? WHERE id = ? ',[$level ,$id]
    );

}

public function delete($id){
    $db = Database :: getInstance();
    $db -> query('DELETE FROM students WHERE id= ?',[$id]);
}

}















?>