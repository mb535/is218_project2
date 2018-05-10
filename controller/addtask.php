<?php
session_start();

?>

<html lang="en">
<head>
<style>  
    body {  
      background-repeat: no-repeat;
      background-position: center center;
      background-attachment: fixed;
      background-size: cover;
      height:100%;}
    .border { width:750px ; 
       margin:auto ; 
       margin-top:30px ;
       border: 2px white; 
       padding: 10px; 
       border-radius: 15px; 
       background-color: #F0FFFF; }    
    .btn {margin-top:30px ;}
</style>
  <title>Add Task</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body background="sky.jpeg" >
    <form action="." method="post">
      <input type="hidden" name="action" value="add_new_task">
    <div class="container">
        <div class = "border">
        <h2>  To-Do Manager</h2>
        <legend>Edit Task</legend>
            <div class="form-group">
              <label for="task">Task:</label>
              <input type=text name="message" class="form-control" id="task"  autocomplete="off">
            </div>
            
            <div class="form-group">
              <label for="startdate">Start Date:</label>
              <input type="date" name="createddate" class="form-control" id="startdate"  autocomplete="off"> 
            </div>
            
            <div class="form-group">
              <label for="duedate">Due Date:</label>
              <input type="date" name="duedate" class="form-control" id="duedate"  autocomplete="off"> 
            </div>
            
             
            <input type="submit" class="btn btn-info" value="Add Task">

        </div>
      </form>
    </div>
  </body>


</html>