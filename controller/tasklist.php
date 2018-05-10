<?php
session_start();
?>

<html lang="en">
<style>  
    body {  
      background-repeat: no-repeat;
      background-position: center center;
      background-attachment: fixed;
      background-size: cover;
      height:100%;}
    .border { width:1200px ; 
       margin:auto ; 
       margin-top:30px ;
       border: 2px white; 
       padding: 10px; 
       border-radius: 15px; 
       background-color: #F0FFFF; }    
    .btn {margin-top:0px ;}
</style>
<head>
  <title>Tasklist</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body background="sky.jpeg">

<div class="container">
  <div class = "border">
    <h1> Welcome <?php echo " " . $_SESSION['fname'] ." ". $_SESSION['lname']; ?></h1>
    <h2>My Tasks</h2>
              
    <div class="table-responsive">          
    <table class="table">
      <thead>
        <tr>
          <th>Task            </th>
          <th>Due Date</th>
          <th>Edit</th>
          <th>Delete</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($my_tasks as $task) : ?>
        <tr>
          <td><?php echo $task['message']; ?></td>
          <td><?php echo $task['duedate']; ?></td>
          <td><form action="." method="post">
                      <input type="hidden" name="action" value="edit_tasks">
                      <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                      <input type="submit" class="btn btn-primary" value="Edit">
              </form>
          </td>
          <td><form action="." method="post">
                      <input type="hidden" name="action" value="delete_task">
                      <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                      <input type="submit" class="btn btn-danger" value="Delete">
              </form>
          </td>
          <td><form action="." method="post">
                      <input type="hidden" name="action" value="complete_task">
                      <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                      <input type="submit" class="btn btn-success" value="Complete">
              </form>
          </td>
  
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <p><a href="?action=add_task">Add New Task</a></p>
    </div>
  </div>
</div>
<div class="container">
  <div class = "border">
    <h2>Completed Tasks</h2>
              
    <div class="table-responsive">          
    <table class="table">
      <thead>
        <tr>
          <th>Task            </th>
          <th>Due Date</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($completed_tasks as $c_task) : ?>
        <tr>
          <td><?php echo $c_task['message']; ?></td>
          <td><?php echo $c_task['duedate']; ?></td>
          <td><form action="." method="post">
                      <input type="hidden" name="action" value="delete_task">
                      <input type="hidden" name="id" value="<?php echo $c_task['id']; ?>">
                      <input type="submit" class="btn btn-danger" value="Delete">
              </form>
          </td>
  
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <h3><a href="?action=logout">Logout</a></h3>
    </div>
  </div>
</div>
</body>
</html>