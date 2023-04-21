<?php

  include_once __DIR__.'/functions.php';
  
  $todoList = getData('database.json');

  if(isset($_POST) && !empty($_POST)){

    switch ($_POST['operation']){
      case 'add':
        $todoList[] = addToData($_POST['newTodo'],'text','done');

        break;
      case 'delete':
        array_splice($todoList,$_POST['index'],1);
        break;
      case 'check':
        $todoList[$_POST['index']]['done'] = !$todoList[$_POST['index']]['done'];
        break;
      case 'get':

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