<?php

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

  if(isset($_POST['newTodo']) && !empty($_POST['newTodo'])){
    $todoList[] = [ 'text' => $_POST['newTodo'], 'done' => false,];
  }

  header('Content-Type: application/json');

  echo json_encode($todoList);