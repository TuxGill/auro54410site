<?php

  include($_SERVER['DOCUMENT_ROOT'].DIRFOLDER.'/components/products/models/Class.ProductCategory.php');

  function getAllProductCategories($pdo){
    $sql= "select * from product_category where  del_product_category=0";

    $query = $pdo->prepare($sql);
    $query->execute();

    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    $product_categories=[];

    foreach ($rows as $row) {
      $c= new ProductCategory($row['id_product_category'],
       $row['fk_id_product_category'],
        $row['title_product_category'],
         $row['intro_product_category'],
         $row['slug_product_category'],
         $row['text_product_category'],
         $row['url_product_category'],
         $row['order_product_category'],
          $row['act_product_category'],
           $row['del_product_category'],
           $row['ts_product_category']);

      array_push($product_categories, $c);
    }

    return $product_categories;
  }

  function getProductCategoryById($pdo,$id){
    $sql= "select * from product_category where id_product_category=".$id." and  del_product_category=0";

    $query = $pdo->prepare($sql);
    $query->execute();

    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    $product_categories=[];

    foreach ($rows as $row) {
      $c= new ProductCategory($row['id_product_category'],
       $row['fk_id_product_category'],
         $row['title_product_category'],

           $row['intro_product_category'],
           $row['slug_product_category'],
           $row['text_product_category'],
           $row['url_product_category'],
           $row['order_product_category'],
            $row['act_product_category'],
             $row['del_product_category'],
             $row['ts_product_category']);

      array_push($product_categories, $c);
    }

    return $product_categories;
  }


?>
