<?php
//app/models/Lesson.php
require_once __DIR__ . '/../models/Database.php';
class Lesson {
    private $id;
    private $title;
    private $coach;
    private $date;
    private $price;
    private $level;
    private $description;




    //les getters
    public function getId(){
        return $this -> id;
    }
    public function getTitle(){
        return $this -> title;
    }

    public function getCoach(){
        return $this -> coach;
    }

    public function getLevel(){
        return $this -> level;
    }


    //trouver les cours 
    public function findAll(){
        $db = Database :: getInstance();
        $stmt = $db ->query('SELECT * FROM lessons ORDER BY date ASC');
        return $stmt -> fetchAll(PDO :: FETCH_ASSOC);
    }

    //trouver un cours par ID 
    public function findById($id){
        $db = Database :: getInstance();
        $stmt =$db -> query('SELECT * FROM lessons WHERE id = ?',[$id]);
        
        return $stmt -> fetchAll(PDO :: FETCH_ASSOC);

    }

    //creer un cours

    public function save($title, $coach, $date, $price, $level, $description){
        $db = Database :: getInstance();
        $db ->query(
            'INSERT INTO lessons (title, coach, date, price, level, description) VALUES(?,?,?,?,?,?)',
            [$title ,$coach, $date, $price, $level, $description]
        );
    }

    //modifier un cours
    public function update($id ,$title, $coach, $date, $price, $level, $description){
        $db = Database :: getInstance();
        $db ->query(
            'UPDATE lessons SET title=?, coach=?, date=?, price=?, level=?, description=? WHERE id=?',
            [$title ,$coach, $date, $price, $level, $description]
        );
    }

    //supprimer un cours
    // ✅ CODE CORRIGÉ
public function delete($id) {
    $db = Database::getInstance();

    // ÉTAPE 1 — supprimer d'abord les inscriptions liées à ce cours
    $db->query('DELETE FROM enrollments WHERE lesson_id = ?', [$id]);

    // ÉTAPE 2 — supprimer ensuite le cours
    $db->query('DELETE FROM lessons WHERE id = ?', [$id]);
}
}














?>