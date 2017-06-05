<?php
  //include($_SERVER['DOCUMENT_ROOT'].'/components/content/models/Class.Content.php');
  include('components/content/models/Class.Content.php');

  function getAllContents($pdo){
    $sql= "select * from content where act_content=1 and del_content=0";

    $query = $pdo->prepare($sql);
    $query->execute();

    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    $contents=array();

    foreach ($rows as $row) {
      $c= new Content($row['id_content'],
                      $row['fk_id_content_category'],
                      $row['title_content'],
                      $row['slug_content'],
                      $row['intro_content'],
                      $row['text_content'],
                      $row['url_img_content'],
                      $row['url_yt_content'],
                      $row['url_video_content'],
                      $row['link1_content'],
                      $row['link2_content'],
                      $row['pdf_content'],
                      $row['order_content'],
                      $row['act_content'],
                      $row['del_content'],
                      $row['ts_content']);

      array_push($contents, $c);
    }

    return $contents;
  }

// Get Contents without DEL
  function getAllContentsBO($pdo){
    $sql= "select * from content where del_content=0";

    $query = $pdo->prepare($sql);
    $query->execute();

    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    $contents=array();

    foreach ($rows as $row) {
      $c= new Content($row['id_content'],
                      $row['fk_id_content_category'],
                      $row['title_content'],
                      $row['slug_content'],
                      $row['intro_content'],
                      $row['text_content'],
                      $row['url_img_content'],
                      $row['url_yt_content'],
                      $row['url_video_content'],
                      $row['link1_content'],
                      $row['link2_content'],
                      $row['pdf_content'],
                      $row['order_content'],
                      $row['act_content'],
                      $row['del_content'],
                      $row['ts_content']);

      array_push($contents, $c);
    }

    return $contents;
  }

  function getContentById($pdo, $id){
    $sql= "select * from content where id_content='".$id."'  and del_content=0";

    $query = $pdo->prepare($sql);
    $query->execute();

    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    $contents=array();

    foreach ($rows as $row) {
      $c= new Content($row['id_content'],
                      $row['fk_id_content_category'],
                      $row['title_content'],
                      $row['slug_content'],
                      $row['intro_content'],
                      $row['text_content'],
                      $row['url_img_content'],
                      $row['url_yt_content'],
                      $row['url_video_content'],
                      $row['link1_content'],
                      $row['link2_content'],
                      $row['pdf_content'],
                      $row['order_content'],
                      $row['act_content'],
                      $row['del_content'],
                      $row['ts_content']);

      array_push($contents, $c);
    }
    return $contents;
  }


  function getContentByIdBO($pdo, $id){
    $sql= "select * from content where id_content='".$id."' and del_content=0";

    $query = $pdo->prepare($sql);
    $query->execute();

    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    $contents=array();

    foreach ($rows as $row) {
      $c= new Content($row['id_content'],
                      $row['fk_id_content_category'],
                      $row['title_content'],
                      $row['slug_content'],
                      $row['intro_content'],
                      $row['text_content'],
                      $row['url_img_content'],
                      $row['url_yt_content'],
                      $row['url_video_content'],
                      $row['link1_content'],
                      $row['link2_content'],
                      $row['pdf_content'],
                      $row['order_content'],
                      $row['act_content'],
                      $row['del_content'],
                      $row['ts_content']);

      array_push($contents, $c);
    }
    return $contents;
  }


  function getContentBySlug($pdo, $slug){
    $sql= "select * from content where and slug_content='".$slug."'act_content=1 and del_content=0";

    $query = $pdo->prepare($sql);
    $query->execute();

    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    $contents=array();

    foreach ($rows as $row) {
      $c= new Content($row['id_content'],
                      $row['fk_id_content_category'],
                      $row['title_content'],
                      $row['slug_content'],
                      $row['intro_content'],
                      $row['text_content'],
                      $row['url_img_content'],
                      $row['url_yt_content'],
                      $row['url_video_content'],
                      $row['link1_content'],
                      $row['link2_content'],
                      $row['pdf_content'],
                      $row['order_content'],
                      $row['act_content'],
                      $row['del_content'],
                      $row['ts_content']);

      array_push($contents, $c);
    }

    return $contents;
  }

  function getContentByCategorySlug($pdo, $slug){
    $sql= "select * from content where slug_content='".$slug."'and act_content=1 and del_content=0";

    $query = $pdo->prepare($sql);
    $query->execute();

    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    $contents=array();

    foreach ($rows as $row) {
      $c= new Content($row['id_content'],
                      $row['fk_id_content_category'],
                      $row['title_content'],
                      $row['slug_content'],
                      $row['intro_content'],
                      $row['text_content'],
                      $row['url_img_content'],
                      $row['url_yt_content'],
                      $row['url_video_content'],
                      $row['link1_content'],
                      $row['link2_content'],
                      $row['pdf_content'],
                      $row['order_content'],
                      $row['act_content'],
                      $row['del_content'],
                      $row['ts_content']);

      array_push($contents, $c);
    }

    return $contents;
  }

  function getContentByCategoryId($pdo, $id){
    $sql= "select * from content inner join content_category on content.fk_id_content_category = content_category.id_content_category where id_content_category='".$id."' and act_content=1 and del_content=0 order by order_content ASC";

    $query = $pdo->prepare($sql);
    $query->execute();

    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    $contents=array();

    foreach ($rows as $row) {
      $c= new Content($row['id_content'],
                      $row['fk_id_content_category'],
                      $row['title_content'],
                      $row['slug_content'],
                      $row['intro_content'],
                      $row['text_content'],
                      $row['url_img_content'],
                      $row['url_yt_content'],
                      $row['url_video_content'],
                      $row['link1_content'],
                      $row['link2_content'],
                      $row['pdf_content'],
                      $row['order_content'],
                      $row['act_content'],
                      $row['del_content'],
                      $row['ts_content']);

      array_push($contents, $c);
    }

    return $contents;
  }

// Função p devolver as noticias ( tem de estar ordenadas pelo TS). é igual a getContentByCategoryId mas tem as orders diferentes
  function getNewsByCategoryId($pdo, $id){
    $sql= "select * from content inner join content_category on content.fk_id_content_category = content_category.id_content_category where id_content_category='".$id."' and act_content=1 and del_content=0 order by ts_content DESC, order_content ASC";

    $query = $pdo->prepare($sql);
    $query->execute();

    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    $contents=array();

    foreach ($rows as $row) {
      $c= new Content($row['id_content'],
                      $row['fk_id_content_category'],
                      $row['title_content'],
                      $row['slug_content'],
                      $row['intro_content'],
                      $row['text_content'],
                      $row['url_img_content'],
                      $row['url_yt_content'],
                      $row['url_video_content'],
                      $row['link1_content'],
                      $row['link2_content'],
                      $row['pdf_content'],
                      $row['order_content'],
                      $row['act_content'],
                      $row['del_content'],
                      $row['ts_content']);

      array_push($contents, $c);
    }

    return $contents;
  }

  function getContentByCategoryIdBO($pdo, $id){
    $sql= "select * from content inner join content_category on content.fk_id_content_category = content_category.id_content_category where id_content_category='".$id."' and del_content=0";

    $query = $pdo->prepare($sql);
    $query->execute();

    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    $contents=array();

    foreach ($rows as $row) {
      $c= new Content($row['id_content'],
                      $row['fk_id_content_category'],
                      $row['title_content'],
                      $row['slug_content'],
                      $row['intro_content'],
                      $row['text_content'],
                      $row['url_img_content'],
                      $row['url_yt_content'],
                      $row['url_video_content'],
                      $row['link1_content'],
                      $row['link2_content'],
                      $row['pdf_content'],
                      $row['order_content'],
                      $row['act_content'],
                      $row['del_content'],
                      $row['ts_content']);

      array_push($contents, $c);
    }

    return $contents;
  }

   function searchAllContents($pdo,$term){
    $sql= "select * from content where text_content like '%".$term."%' and act_content=1 and del_content=0";

    //echo $sql;

    $query = $pdo->prepare($sql);
    $query->execute();

    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    $contents=array();

    foreach ($rows as $row) {
      $c= new Content($row['id_content'],
                      $row['fk_id_content_category'],
                      $row['title_content'],
                      $row['slug_content'],
                      $row['intro_content'],
                      $row['text_content'],
                      $row['url_img_content'],
                      $row['url_yt_content'],
                      $row['url_video_content'],
                      $row['link1_content'],
                      $row['link2_content'],
                      $row['pdf_content'],
                      $row['order_content'],
                      $row['act_content'],
                      $row['del_content'],
                      $row['ts_content']);

      array_push($contents, $c);
    }

    return $contents;
  }
?>
