<?php

function getData($fileName){
  if(file_exists(__DIR__."/$fileName")){
    $dataJson = file_get_contents(__DIR__."/$fileName");
    if(empty($dataJson)){
      $data = [];
    } else {
      $data = json_decode($dataJson, true);
    }
  } else {
    $data = [
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
  return $data;
};

function addToData($postItem){
  if(isset($postItem)&&!empty($postItem)){

    $done = $postItem['done'];
    $postItem['done'] = $done === 'false' ? false : true;

    return $postItem;
  }
}
