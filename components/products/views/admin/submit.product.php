<?php
  include('../../../../config.php');
  echo "OLA";
  $action=$_POST['action'];

  /* TEXTS */
  $id=$_POST['id_item'];
  $title=$_POST['title'];
  $intro=$_POST['intro'];
  $text=$_POST['text'];
  $url=$_POST['link1'];
  $fb=$_POST['link2'];

  $cat=$_POST['category'];
  $act=$_POST['act'];
  $order=$_POST['ordem'];

  $slug=slugify($title);

  /* LOGO */
  $destFolderLogo='../../../../media/content/';
  $tempFileLogo=explode('.',$_FILES['logo']['name']);
  $extLogo=$tempFileLogo[count($tempFileLogo)-1];
  $fileLogo=clean($_POST['title']).'-'.uniqid().'.'.$extLogo;
  $finalFileLogo=$destFolderLogo.$fileLogo;
  move_uploaded_file($_FILES['logo']['tmp_name'], $finalFileLogo);

  /* FILES VIDEO */
  $destFolderVideo='../../../../media/video/';
  $tempFileVideo=explode('.',$_FILES['video']['name']);
  $extVideo=$tempFileVideo[count($tempFileVideo)-1];
  $fileVideo=clean($_POST['title']).'-'.uniqid().'.'.$extVideo;
  $finalFileVideo=$destFolderVideo.$fileVideo;
  move_uploaded_file($_FILES['video']['tmp_name'], $fileVideo);

  /* PDF */
  $destFolderPDF='../../../../media/pdf/';
  $tempFilePDF=explode('.',$_FILES['pdf']['name']);
  $extPDF=$tempFilePDF[count($tempFilePDF)-1];
  $filePDF=clean($_POST['title']).'-'.uniqid().'.'.$extPDF;
  $finalFilePDF=$destFolderPDF.$filePDF;
  move_uploaded_file($_FILES['pdf']['tmp_name'], $finalFilePDF);

  /* IMAGEM DE TOPO */
  $destFolderIMG='../../../../media/pdf/';
  $tempFileIMG=explode('.',$_FILES['topo']['name']);
  $extIMG=$tempFileIMG[count($tempFileIMG)-1];
  $fileIMG=clean($_POST['title']).'-'.uniqid().'.'.$extIMG;
  $finalFileIMG=$destFolderIMG.$fileIMG;
  move_uploaded_file($_FILES['topo']['tmp_name'], $finalFileIMG);




  /* CRIAR OBJECTO*/

  $product = new Product(null, $cat,$title,$slug,$intro,$text,$fileIMG,$filePDF,$fileVideo, $url, $fb,$order, $act, null,null );
  $product->save($pdo);

?>
