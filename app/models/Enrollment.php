<?php

require_once __DIR__ . '/../models/Database.php';


class Enrollment {

private $id;
private $student_id;
private $lesson_id;
private $payment_status;



//les getters

public function getId (){
    return $this-> id;

}
public function getStudentId (){
    return $this-> student_id ;

}
public function getLessonId (){
    return $this-> lesson_id;


}

public function getPaymentStatus (){
    return $this-> payment_status;


}

//inscrire un etudiant a un cours
public function enroll($student_id,$lesson_id){
    $db = Database::getInstance();
    $db -> query('INSERT INTO enrollments (student_id,lesson_id, payment_status) VALUES(?,?,?)',
    [$student_id, $lesson_id, 'pending']);
}

// cours dun eleve 

public function findByStudent($student_id){
    $db = Database::getInstance();
    $stmt = $db ->query(
    'SELECT e.*, l.title,l.date, l.coach, l.level FROM enrollments e 
    JOIN lessons l ON e.lesson_id = l.id WHERE e.student_id = ?',[$student_id]

    );
    // fetchAll() retourne TOUS les cours de cet élève
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// retourne toutes les inscriptions avec les noms des élèves et des cours

public function findAll(){
    $db   = Database::getInstance();
        $stmt = $db->query(
            'SELECT e.*, s.name, l.title 
             FROM enrollments e
             JOIN students s ON e.student_id = s.id
             JOIN lessons l ON e.lesson_id = l.id'
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

//modifier statut paiement 
public function updatePaymentStatus($id, $status){
    $db   = Database::getInstance();
    $db->query(
            'UPDATE enrollments SET payment_status = ? WHERE id = ?',
            [$status, $id]
    );


}


}
































?>