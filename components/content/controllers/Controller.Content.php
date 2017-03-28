<?php
  /*TESTE 2 MARIA ola */
  include($_SERVER['DOCUMENT_ROOT'].DIRFOLDER.'/components/content/models/Class.Content.php');

  function getAllContents($pdo){
    $sql= "select * from contents where act_content=1 and del_content=0";

    $query = $pdo->prepare($sql);
    $query->execute();

    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    $contents=[];

    foreach ($rows as $row) {
      $c= new Content($row['id_content'], $row['fk_id_category'],  $row['title_content'],$row['slug_content'],  $row['intro_content'],$row['text_content'],$row['url_img_content'],$row['url_yt_content'],  $row['order_content'], $row['act_content'],  $row['del_content'],$row['ts_content']);

      array_push($contents, $c);
    }

    return $contents;


  }

  function getContentById($pdo, $id){
    $sql= "select * from contents where and id_content='".$id."'act_content=1 and del_content=0";

    $query = $pdo->prepare($sql);
    $query->execute();

    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    $contents=[];

    foreach ($rows as $row) {
      $c= new Content($row['id_content'], $row['fk_id_category'],  $row['title_content'],$row['slug_content'],  $row['intro_content'],$row['text_content'],$row['url_img_content'],$row['url_yt_content'],  $row['order_content'], $row['act_content'],  $row['del_content'],$row['ts_content']);

      array_push($contents, $c);
    }

    return $contents;
  }

  function getContentBySlug($pdo, $slug){
    $sql= "select * from contents where and slug_content='".$slug."'act_content=1 and del_content=0";

    $query = $pdo->prepare($sql);
    $query->execute();

    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    $contents=[];

    foreach ($rows as $row) {
      $c= new Content($row['id_content'], $row['fk_id_category'],  $row['title_content'],$row['slug_content'],  $row['intro_content'],$row['text_content'],$row['url_img_content'],$row['url_yt_content'],  $row['order_content'], $row['act_content'],  $row['del_content'],$row['ts_content']);

      array_push($contents, $c);
    }

    return $contents;
  }

  function getContentByCategorySlug($pdo, $slug){
    $sql= "select * from contents inner join content_category on id_content_category = fk_id_content_category where and slug_content_category='".$slug."'act_content=1 and del_content=0";

    $query = $pdo->prepare($sql);
    $query->execute();

    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    $contents=[];

    foreach ($rows as $row) {
      $c= new Content($row['id_content'], $row['fk_id_category'],  $row['title_content'],$row['slug_content'],  $row['intro_content'],$row['text_content'],$row['url_img_content'],$row['url_yt_content'],  $row['order_content'], $row['act_content'],  $row['del_content'],$row['ts_content']);

      array_push($contents, $c);
    }

    return $contents;
  }

  function getContentByCategoryId($pdo, $id){
    $sql= "select * from contents inner join content_category on id_content_category = fk_id_content_category where and id_content_category='".$id."' act_content=1 and del_content=0";

    $query = $pdo->prepare($sql);
    $query->execute();

    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    $contents=[];

    foreach ($rows as $row) {
      $c= new Content($row['id_content'], $row['fk_id_category'],  $row['title_content'],$row['slug_content'],  $row['intro_content'],$row['text_content'],$row['url_img_content'],$row['url_yt_content'],  $row['order_content'], $row['act_content'],  $row['del_content'],$row['ts_content']);

      array_push($contents, $c);
    }

    return $contents;
  }
?>
