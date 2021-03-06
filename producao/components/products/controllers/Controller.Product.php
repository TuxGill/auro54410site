<?php

  //include($_SERVER['DOCUMENT_ROOT'].'/components/products/models/Class.Product.php');
  include('components/products/models/Class.Product.php');

  function getAllproducts($pdo){


      $sql= "select * from products where act_product=1 and del_product=0";

      $query = $pdo->prepare($sql);
      $query->execute();

      $rows = $query->fetchAll(PDO::FETCH_ASSOC);
      $products=array();

      foreach ($rows as $row) {
        $c= new Product($row['id_product'],
                        $row['fk_id_product_category'],
                        $row['title_product'],
                        $row['slug_product'],
                        $row['logo_product'],
                        $row['color_product'],
                        $row['intro_product'],
                        $row['text_product'],
                        $row['url_img_product'],
                        $row['pdf_product'],
                        $row['url_video_product'],
                        $row['link1_product'],
                        $row['link2_product'],
                        $row['order_product'],
                        $row['act_product'],
                        $row['del_product'],
                        $row['ts_product']);

        array_push($products, $c);
      }

      return $products;
  }

  function getProductBySlug($pdo, $slug){
      $sql= "select * from product where  slug_product='".$slug."' and act_product=1 and del_product=0";

      $query = $pdo->prepare($sql);
      $query->execute();

      $rows = $query->fetchAll(PDO::FETCH_ASSOC);
      $products=array();

      foreach ($rows as $row) {
        $c= new Product($row['id_product'],
                        $row['fk_id_product_category'],
                        $row['title_product'],
                        $row['slug_product'],
                        $row['logo_product'],
                        $row['color_product'],
                        $row['intro_product'],
                        $row['text_product'],
                        $row['url_img_product'],
                        $row['pdf_product'],
                        $row['url_video_product'],
                        $row['link1_product'],
                        $row['link2_product'],
                        $row['order_product'],
                        $row['act_product'],
                        $row['del_product'],
                        $row['ts_product']);

        array_push($products, $c);
      }

      return $products;
  }


  function getProductById($pdo, $id){
      $sql= "select * from product where  id_product=".$id."  and del_product=0";
      
      $query = $pdo->prepare($sql);
      $query->execute();

      $rows = $query->fetchAll(PDO::FETCH_ASSOC);
      $products=array();

      foreach ($rows as $row) {
        $c= new Product($row['id_product'],
                        $row['fk_id_product_category'],
                        $row['title_product'],
                        $row['slug_product'],
                        $row['logo_product'],
                        $row['color_product'],
                        $row['intro_product'],
                        $row['text_product'],
                        $row['url_img_product'],
                        $row['pdf_product'],
                        $row['url_video_product'],
                        $row['link1_product'],
                        $row['link2_product'],
                        $row['order_product'],
                        $row['act_product'],
                        $row['del_product'],
                        $row['ts_product']);

        array_push($products, $c);
      }

      return $products;
  }

  function getProductByCategorySlug($pdo, $slug){

      $sql= "select * from products inner join product_category on id_product_category = fk_id_product_category where and slug_product_category='".$slug."'act_product=1 and del_product=0";

      $query = $pdo->prepare($sql);
      $query->execute();

      $rows = $query->fetchAll(PDO::FETCH_ASSOC);
      $contents=array();

      foreach ($rows as $row) {
        $c= new Product($row['id_product'],
                        $row['fk_id_product_category'],
                        $row['title_product'],
                        $row['slug_product'],
                        $row['logo_product'],
                        $row['color_product'],
                        $row['intro_product'],
                        $row['text_product'],
                        $row['url_img_product'],
                        $row['pdf_product'],
                        $row['url_video_product'],
                        $row['link1_product'],
                        $row['link2_product'],
                        $row['order_product'],
                        $row['act_product'],
                        $row['del_product'],
                        $row['ts_product']);

        array_push($products, $c);
      }

      return $products;
  }



  function getProductByCategoryId($pdo, $id){
      $sql= "select * from product  where  fk_id_product_category=".$id." and  del_product=0 order by order_product ASC";

//      echo $sql;

      $query = $pdo->prepare($sql);
      $query->execute();

      $rows = $query->fetchAll(PDO::FETCH_ASSOC);
      $products=array();

      foreach ($rows as $row) {
        $c= new Product($row['id_product'],
                        $row['fk_id_product_category'],
                        $row['title_product'],
                        $row['slug_product'],
                        $row['logo_product'],
                        $row['color_product'],
                        $row['intro_product'],
                        $row['text_product'],
                        $row['url_img_product'],
                        $row['pdf_product'],
                        $row['url_video_product'],
                        $row['link1_product'],
                        $row['link2_product'],
                        $row['order_product'],
                        $row['act_product'],
                        $row['del_product'],
                        $row['ts_product']);

        array_push($products, $c);
      }

      return $products;
  }



  function getProductDetailBySlug($pdo, $slug){
      $sql= "select * from product where slug_product='".$slug."'and act_product=1 and del_product=0";

      $query = $pdo->prepare($sql);
      $query->execute();

      $rows = $query->fetchAll(PDO::FETCH_ASSOC);
      $products=array();

      foreach ($rows as $row) {
        $c= new Product($row['id_product'],
                        $row['fk_id_product_category'],
                        $row['title_product'],
                        $row['slug_product'],
                        $row['logo_product'],
                        $row['color_product'],
                        $row['intro_product'],
                        $row['text_product'],
                        $row['url_img_product'],
                        $row['pdf_product'],
                        $row['url_video_product'],
                        $row['link1_product'],
                        $row['link2_product'],
                        $row['order_product'],
                        $row['act_product'],
                        $row['del_product'],
                        $row['ts_product']);

        array_push($products, $c);
      }

      return $products;
  }

  function searchAllproducts($pdo,$term){


      $sql= "select * from product where text_product like '%".$term."%' or  title_product like '%".$term."%' and (act_product=1 and del_product=0)";

      $query = $pdo->prepare($sql);
      $query->execute();

      $rows = $query->fetchAll(PDO::FETCH_ASSOC);
      $products=array();

      foreach ($rows as $row) {
        $c= new Product($row['id_product'],
                        $row['fk_id_product_category'],
                        $row['title_product'],
                        $row['slug_product'],
                        $row['logo_product'],
                        $row['color_product'],
                        $row['intro_product'],
                        $row['text_product'],
                        $row['url_img_product'],
                        $row['pdf_product'],
                        $row['url_video_product'],
                        $row['link1_product'],
                        $row['link2_product'],
                        $row['order_product'],
                        $row['act_product'],
                        $row['del_product'],
                        $row['ts_product']);

        array_push($products, $c);
      }

      return $products;
  }



?>
