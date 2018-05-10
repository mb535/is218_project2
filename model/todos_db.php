<?php

function add_user($email, $fname, $lname, $phone, $birthdate, $gender, $password) {
	  global $db;
  	$query = 'INSERT INTO accounts (email, fname, lname, phone, birthdate, gender, password)
  			  VALUES (:email, :fname, :lname, :phone, :birthdate, :gender, :password)';
  	$statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->bindValue(":fname", $fname);
    $statement->bindValue(":lname", $lname);
    $statement->bindValue(":phone", $phone);
    $statement->bindValue(":birthdate", $birthdate);
    $statement->bindValue(":gender", $gender);
    $statement->bindValue(":password", $password);
    $statement->execute();    
    $statement->closeCursor(); 
}
function get_tasks($owneremail){
    global $db;
    $query ='SELECT * FROM todos WHERE owneremail = :owneremail AND isdone=0 ORDER BY id';
    $statement = $db->prepare($query);
    $statement->bindValue(":owneremail", $owneremail);
    $statement->execute();
    $tasks = $statement->fetchAll();
    $statement->closeCursor();
    return $tasks; 
}
function get_completed_tasks($owneremail){
    global $db;
    $query ='SELECT * FROM todos WHERE owneremail = :owneremail AND isdone=1 ORDER BY id';
    $statement = $db->prepare($query);
    $statement->bindValue(":owneremail", $owneremail);
    $statement->execute();
    $comp_tasks = $statement->fetchAll();

    return $comp_tasks; 
}

function get_fname($email){
    global $db;
    $query ='SELECT * FROM accounts WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    $fname = $result['fname'];
    return $fname;    
}

function get_lname($email){
    global $db;
    $query = 'SELECT * FROM accounts WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    $lname = $result['lname'];
    return $lname;   
}
function get_ownerid($email){
    global $db;
    $query = 'SELECT * FROM accounts WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(":email", $email);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    $ownerid = $result['id'];
    return $ownerid;   
}

function get_users() {
    global $db;
    $query = 'SELECT * FROM accounts';
    $statement = $db->prepare($query);
    $statement->execute();
    $users = $statement->fetchAll();
    
    return $users;    
}
function add_task($owneremail, $ownerid, $message, $createddate, $duedate) {
  	global $db;
  	$query = 'INSERT INTO todos (owneremail, ownerid, createddate, duedate, message, isdone)
             VALUES (:owneremail, :ownerid, :createddate, :duedate, :message, 0)';
    $statement = $db->prepare($query);
    $statement->bindValue(":owneremail", $owneremail);
    $statement->bindValue(":ownerid", $ownerid);
    $statement->bindValue(":createddate", $createddate);
    $statement->bindValue(":duedate", $duedate);
    $statement->bindValue(":message", $message);
    $statement->execute();
    $statement->closeCursor();
}
function edit_task($task_id, $message, $createddate, $duedate) {
  	global $db;
  	$query = 'UPDATE todos
  			      SET message = :message, createddate = :createddate, duedate = :duedate
              WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(":id", $task_id);
    $statement->bindValue(":message", $message);
    $statement->bindValue(":createddate", $createddate);
    $statement->bindValue(":duedate", $duedate);
    $statement->execute();
    $statement->closeCursor();
}

function delete_task($task_id) {
  	global $db;
  	$query = 'DELETE FROM todos
              WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $task_id);
    $statement->execute();
    $statement->closeCursor();
}

function complete_task($task_id) {
  	global $db;
  	$query = 'UPDATE todos
  			      SET isdone = 1
              WHERE id = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $task_id);
    $statement->execute();
    $statement->closeCursor();
}