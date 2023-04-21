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

function addData($postItem,$data){
  if(isset($postItem)&&!empty($postItem)){

    foreach ($data as $key => $item) {
      if($item['text'] == $postItem['text']){
        header('HTTP/1.1 400 Bad Request');
        http_response_code(400);
        echo 'Task already exists!';
        die();        
      }
    }

    $done = $postItem['done'];
    $postItem['done'] = $done === 'false' ? false : true;
  }
  return $postItem;
}

function deleteData($postItem,$data){
  foreach ($data as $key => $dataItem) {
    $dataItem['text'] == $postItem['text'] ? $index = $key : '';
  }
  array_splice($data,$index,1);
  return $data;
}

function checkData($postItem,$data){
  foreach ($data as $key => $dataItem) {
    $dataItem['text'] == $postItem['text'] ? $index = $key : '';
  }
  $data[$index]['done'] = !$data[$index]['done'];
  return $data;
}