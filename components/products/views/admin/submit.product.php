<?php
  include('../../../../config.php');

  $action=$_POST['action'];

  /* TEXTS */
  $id=$_POST['id_item'];
  $title=$_POST['title'];
  $intro=$_POST['intro'];
  $color=$_POST['color'];
  $text=$_POST['text'];
  $url=$_POST['link1'];
  $fb=$_POST['link2'];

  $cat=$_POST['category'];

  if(isset($_POST['act'])){
      $act=1;
  } else {
    $act=0;

  }

  if(isset($_POST['order'])){
      $order=$_POST['order'];
  } else {
    $order=1;

  }

  //$order=$_POST['ordem'];

  $slug=slugify($title);

  /* LOGO */

  if(isset($_FILES['logo']['name']) && $_FILES['logo']['name']!='' ){
    $destFolderLogo='../../../../media/images/';
    $tempFileLogo=explode('.',$_FILES['logo']['name']);
    $extLogo=$tempFileLogo[count($tempFileLogo)-1];
    $fileLogo=clean($_POST['title']).'-'.uniqid().'.'.$extLogo;
    $finalFileLogo=$destFolderLogo.$fileLogo;
    move_uploaded_file($_FILES['logo']['tmp_name'], $finalFileLogo);
  } else {
    $fileLogo='';
  }

  /* FILES VIDEO */

  if(isset($_FILES['video']['name']) && $_FILES['video']['name']!=''){
    $destFolderVideo='../../../../media/videos/';
    $tempFileVideo=explode('.',$_FILES['video']['name']);
    $extVideo=$tempFileVideo[count($tempFileVideo)-1];
    $fileVideo=clean($_POST['title']).'-'.uniqid().'.'.$extVideo;
    $finalFileVideo=$destFolderVideo.$fileVideo;
    move_uploaded_file($_FILES['video']['tmp_name'], $finalFileVideo);
  } else {
    $fileVideo='';
  }

  /* PDF */

  if(isset($_FILES['pdf']['name']) && $_FILES['pdf']['name']!=''){
    $destFolderPDF='../../../../media/pdf/';
    $tempFilePDF=explode('.',$_FILES['pdf']['name']);
    $extPDF=$tempFilePDF[count($tempFilePDF)-1];
    $filePDF=clean($_POST['title']).'-'.uniqid().'.'.$extPDF;
    $finalFilePDF=$destFolderPDF.$filePDF;
    move_uploaded_file($_FILES['pdf']['tmp_name'], $finalFilePDF);
  } else{
      $filePDF='';
  }

  /* IMAGEM DE TOPO */

  if(isset($_FILES['topo']['name']) && $_FILES['topo']['name']!=''){
    $destFolderTopo='../../../../media/images/';
    $tempFiletopo=explode('.',$_FILES['topo']['name']);
    $extTopo=$tempFiletopo[count($tempFiletopo)-1];
    $fileTopo=clean($_POST['title']).'-'.uniqid().'.'.$extTopo;
    $finalFileTopo=$destFolderTopo.$fileTopo;
    move_uploaded_file($_FILES['topo']['tmp_name'], $finalFileTopo);
  } else {
      $fileTopo='';
  }


  if($action=='edit'){
    $p= getProductById($pdo, $id);
    $p->setTitle();
    $p->setIntro();
    $p->setColor();
    $p->setText();
    $p->setLink1();
    $p->setLink2();

  } else {

  }



  /* CRIAR OBJECTO*/
/*
  $product = new Product(null, $cat,$title,$slug,$fileLogo,$color,$intro,$text,$fileTopo,$filePDF,$fileVideo, $url, $fb,$order, $act, null,null );
  $product->save($pdo);*/

?>

<script>window.localhost='<?php echo BASE_URL."/backoffice/home.php?area=newproduct" ?>'</script>
