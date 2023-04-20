<?php

  if(file_exists('todoList.json')){
    $todoListJson = file_get_contents('./todoList.json');
    $todoList = json_decode($todoListJson, true);
  } else {
    $todoList = [
      [
        'text' => 'todo n.1',
        'done' => false,
      ],[
        'text' => 'todo n.2',
        'done' => true,
      ],[
        'text' => 'todo n.3',
        'done' => false,
      ],[
        'text' => 'todo n.4',
        'done' => false,
      ],[
        'text' => 'todo n.5',
        'done' => true,
      ],
    ];
  }

  if(isset($_POST) && !empty($_POST['text'])){
    $todoList[] = [ 
      'text' => $_POST['text'], 
      'done' => $_POST['done'] == 'false' ? false : true,
    ];
  }
  $todoListJson = json_encode($todoList);

  file_put_contents('todoList.json',$todoListJson);

  header('Content-Type: application/json');
  echo ($todoListJson);