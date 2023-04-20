<?php

  $todolist = [
    [
      'text' => 'todo n.',
      'done' => false,
    ],[
      'text' => 'todo n.',
      'done' => true,
    ],[
      'text' => 'todo n.',
      'done' => false,
    ],[
      'text' => 'todo n.',
      'done' => false,
    ],[
      'text' => 'todo n.',
      'done' => true,
    ],
  ];

  header('Content-Type: application/json');

  echo json_encode($todolist);