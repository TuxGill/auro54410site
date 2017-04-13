<?php
  include('../../../../config.php');

  $action=$_POST['action'];

  /* VAI BUSCAR A CATEGORIA PELO ID*/
  $id=$_POST['id_item'];

  $title=$_POST['title'];
  $intro=$_POST['intro'];
  $text=$_POST['text'];
/*
  if(isset($_POST['category']) && $_POST['category']!='' ){
      $category=$_POST['category'];
  } else {
    $category=null;

  }
  */

    $category = 3;

  /* IMAGEM DE TOPO */

  if(isset($_FILES['topo']['name']) && $_FILES['topo']['name']!=''){
    $destFolderTopo='../../../../media/images/';
    $tempFiletopo=explode('.',$_FILES['topo']['name']);
    $extTopo=$tempFiletopo[count($tempFiletopo)-1];
    $fileTopo=clean($_POST['title']).'-'.uniqid().'.'.$extTopo;
    $finalFileTopo=$destFolderTopo.$fileTopo;
    move_uploaded_file($_FILES['topo']['tmp_name'], $finalFileTopo);
  }

  if(isset($_POST['act']) ){
      $act=1;
  } else {
    $act=0;

  }

    $slug=slugify($title);

  if($action=='edit'){
    $cat= getProductCategoryById($pdo,$id);

    $cat[0]->setTitle($title);
    $cat[0]->setCategory($category);
    $cat[0]->setIntro($intro);
    $cat[0]->setSlug($slug);
    $cat[0]->setText($text);

    if(isset($fileTopo)) {  $cat[0]->setUrlImg($fileTopo); }
    $cat[0]->setAct($act);



  }  else{
    $cat[0]= new ContentCategory(null, $category, $title, $intro, $slug, $text, $fileTopo, 1, $act, null, null);
  }


  if($action=='edit'){
      $cat[0]->update($pdo);
  } else {
    $cat[0]->save($pdo);
  }


?>
<script>window.location='<?php echo BASE_URL."/backoffice/home.php?area=editproductcategory&id=".$id ?>'</script>
