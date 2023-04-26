<?php

  include_once __DIR__.'/functions.php';
  
  $todoList = getData('database.json');

  if(isset($_POST) && !empty($_POST)){

    switch ($_POST['operation']){

      case 'add':
        $todoList[] = addData($_POST['newTodo'],$todoList);
        break;
        
      case 'delete':
        $todoList = deleteData($_POST['todoItem'],$todoList);
        break;

      case 'check':
        $todoList = checkData($_POST['todoItem'],$todoList);
        break;
        
      default :
        header('HTTP/1.1 400 Bad Request');
        http_response_code(400);
        echo 'Operation was not declared';
        die();
    }
    
  }
  $todoListJson = json_encode($todoList);

  file_put_contents('database.json',$todoListJson);

  header('Content-Type: application/json');
  echo ($todoListJson);