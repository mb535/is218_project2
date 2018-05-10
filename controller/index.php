<?php
session_start();

require('../model/database.php');
require('../model/todos_db.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'signup';
    }
}
if ($action == 'signup'){
    include('../signup_page.html');
}

else if ($action == 'add_user') {
    $fname = filter_input(INPUT_POST, 'fname');
  	$lname = filter_input(INPUT_POST, 'lname');
  	$email = filter_input(INPUT_POST, 'email');
  	$phone = filter_input(INPUT_POST, 'phone');
  	$birthdate = filter_input(INPUT_POST, 'birthdate');
  	$password = filter_input(INPUT_POST, 'password');
  	$gender = filter_input(INPUT_POST, 'gender');
  	add_user($email, $fname, $lname, $phone, $birthdate, $gender, $password);
    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;
    $_SESSION['email'] = $email;
  	header("Location: .?action=tasklist");
} 

else if ($action == 'tasklist') {
    $my_tasks = get_tasks($_SESSION['email']);
    $completed_tasks = get_completed_tasks($_SESSION['email']);
    $_SESSION['fname'] = get_fname($_SESSION['email']);
	  $_SESSION['lname'] = get_lname($_SESSION['email']);
    include('tasklist.php');
} 

else if ($action == 'auth_login'){
    $_SESSION['email'] = filter_input(INPUT_POST, 'email');
    $_SESSION['password'] = filter_input(INPUT_POST, 'password');
    $users = get_users();
    foreach ($users as $user){
      if ($user['email'] == $_SESSION['email'] && $user['password'] == $_SESSION['password']){
			    header("Location: .?action=tasklist");}   
    }
}
else if ($action == 'edit_tasks'){
    $_SESSION['id'] = filter_input(INPUT_POST, 'id');
    include('edittask.php');

}

else if ($action == 'add_task'){
    include('addtask.php');
}

else if ($action == 'add_new_task'){
    $owneremail = $_SESSION['email'];
  	$ownerid = get_ownerid($_SESSION['email']);
	  $message = filter_input(INPUT_POST, 'message');
    $createddate = filter_input(INPUT_POST, 'createddate');
	  $duedate = filter_input(INPUT_POST, 'duedate');
	  add_task($owneremail, $ownerid, $message, $createddate, $duedate);
  	header("Location: .?action=tasklist");
}

else if ($action == 'edit_task'){
    $task_id = $_SESSION['id'];
	  $message = filter_input(INPUT_POST, 'message');
    $createddate = filter_input(INPUT_POST, 'createddate');
	  $duedate = filter_input(INPUT_POST, 'duedate');
	  edit_task($task_id, $message, $createddate, $duedate);
  	header("Location: .?action=tasklist");
}

else if ($action == 'delete_task'){
    $task_id = filter_input(INPUT_POST, 'id');
    delete_task($task_id);
  	header("Location: .?action=tasklist");
}

else if ($action == 'complete_task'){
    $task_id = filter_input(INPUT_POST, 'id');
    complete_task($task_id);
  	header("Location: .?action=tasklist");
}

else if ($action == 'login') {
	include('login.html');
}

else if ($action == 'logout') {
  	session_destroy();
  	header("Location: .?action=login");
}
?>