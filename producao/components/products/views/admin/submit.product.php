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
  }
  /* FILES VIDEO */

  if(isset($_FILES['video']['name']) && $_FILES['video']['name']!=''){
    $destFolderVideo='../../../../media/videos/';
    $tempFileVideo=explode('.',$_FILES['video']['name']);
    $extVideo=$tempFileVideo[count($tempFileVideo)-1];
    $fileVideo=clean($_POST['title']).'-'.uniqid().'.'.$extVideo;
    $finalFileVideo=$destFolderVideo.$fileVideo;
    move_uploaded_file($_FILES['video']['tmp_name'], $finalFileVideo);
  }

  /* PDF */

  if(isset($_FILES['pdf']['name']) && $_FILES['pdf']['name']!=''){
    $destFolderPDF='../../../../media/pdf/';
    $tempFilePDF=explode('.',$_FILES['pdf']['name']);
    $extPDF=$tempFilePDF[count($tempFilePDF)-1];
    $filePDF=clean($_POST['title']).'-'.uniqid().'.'.$extPDF;
    $finalFilePDF=$destFolderPDF.$filePDF;
    move_uploaded_file($_FILES['pdf']['tmp_name'], $finalFilePDF);
  }

  /* IMAGEM DE TOPO */

  if(isset($_FILES['topo']['name']) && $_FILES['topo']['name']!=''){
    $destFolderTopo='../../../../media/images/';
    $tempFiletopo=explode('.',$_FILES['topo']['name']);
    $extTopo=$tempFiletopo[count($tempFiletopo)-1];
    $fileTopo=clean($_POST['title']).'-'.uniqid().'.'.$extTopo;
    $finalFileTopo=$destFolderTopo.$fileTopo;
    move_uploaded_file($_FILES['topo']['tmp_name'], $finalFileTopo);
  }

  if($action=='edit'){
    $p= getProductById($pdo, $id);

    $p[0]->setTitle($title);
    $p[0]->setCategory($cat);
    $p[0]->setIntro($intro);
    $p[0]->setColor($color);
    $p[0]->setText($text);
    $p[0]->setLink1($url);
    $p[0]->setLink2($fb);
    $p[0]->setAct($act);
    if(isset($fileVideo)) { $p[0]->setVideo($fileVideo); }
    if(isset($fileLogo)) { $p[0]->setLogo($fileLogo); }
    if(isset($filePDF)) { $p[0]->setVideo($filePDF); }
    if(isset($fileTopo)) { $p[0]->setLogo($fileTopo); }


  } else {

   if(!isset($fileVideo)) {$fileVideo=''; } 
    if(!isset($fileLogo)) { $fileLogo=''; }
    if(!isset($filePDF)) { $filePDF=''; }
    if(!isset($fileTopo)) { $fileTopo=''; }

  $p = new Product(null, $cat,$title,$slug,$fileLogo,$color,$intro,$text,$fileTopo,$filePDF,$fileVideo, $url, $fb,$order, $act, null,null );

  }



  if($action=='edit'){
      $p[0]->update($pdo);
  } else {
    $p->save($pdo);
  }



?>

<script>window.location='<?php echo BASE_URL."/backoffice/home.php?area=newproduct&idCat=".$cat.""?>'</script>
