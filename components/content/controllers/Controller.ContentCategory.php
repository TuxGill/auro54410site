<?php
  include($_SERVER['DOCUMENT_ROOT'].DIRFOLDER.'/components/content/models/Class.ContentCategory.php');

  function getAllContentCategories($pdo){
    $sql= "select * from content_category where act_content_category=1 and del_content_category=0";

    $query = $pdo->prepare($sql);
    $query->execute();

    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    $content_categories=array();

    foreach ($rows as $row) {
      $c= new ContentCategory($row['id_content_category'],
                              $row['fk_id_content_category'],
                              $row['title_content_category'],
                              $row['slug_content_category'],
                              $row['intro_content_category'],
                              $row['text_content_category'],
                              $row['url_img_content_category'],
                              $row['act_content_category'],
                              $row['del_content_category'],
                              $row['ts_content_category']);

      array_push($content_categories, $c);
    }

    return $content_categories;
  }

  function getContentCategoriesById($pdo, $id){
    $sql= "select * from content_category where id_content_category=".$id;

    $query = $pdo->prepare($sql);
    $query->execute();

    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    $content_categories=array();

    foreach ($rows as $row) {
      $c= new ContentCategory($row['id_content_category'],
                              $row['fk_id_content_category'],
                              $row['title_content_category'],
                              $row['slug_content_category'],
                              $row['intro_content_category'],
                              $row['text_content_category'],
                              $row['url_img_content_category'],
                              $row['act_content_category'],
                              $row['del_content_category'],
                              $row['ts_content_category']);

      array_push($content_categories, $c);
    }

    return $content_categories;
  }
?>
